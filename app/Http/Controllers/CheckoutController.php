<?php

namespace App\Http\Controllers;

use App\Mail\TicketConfirmation;
use App\Models\Checkout;
use App\Models\Event;
use App\Models\MyTicket;
use App\Models\Ticket;
use App\Models\CouponCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

class CheckoutController extends Controller
{

    public function showOrders(Request $request)
    {
        $userId = $request->user()->id;
        $orders = MyTicket::where('user_id', $userId)->with('event', 'ticket')->paginate(6);

        return view('myTickets.index', ['orders' => $orders]);
    }
    public function showBuyers($id)
    {
        $buyers = Checkout::where('event_id', $id)->with('user', 'ticket')->paginate(6);

        return view('barcode.scan-qrlist', ['buyers' => $buyers]);
    }

    public function create(Request $request)
    {
        $event = Event::findOrFail($request->event_id);
        $tickets = Ticket::where('event_id', $event->id)->get();

        return view('checkout.create', compact('event', 'tickets'));
    }

    public function store(Request $request)
    {
        $ticket = Ticket::findOrFail($request->ticket_id);
        $user_id = $request->input('user_id');
        $event_id = $request->input('event_id');
        $ticket_id = $request->input('ticket_id');
        $coupon_code = $request->input('coupon_code');
        $quantity = $request->input('quantity');
        $total_amount = $quantity * $ticket->price * (1 - $this->calculateDiscount($request->coupon_code,$request->ticket_id));

            // Store the checkout information
        $checkout = Checkout::create([
            'user_id' => $user_id,
            'event_id' => $event_id,
            'ticket_id' => $ticket_id,
            'coupon_code' => $coupon_code,
            'quantity' => $quantity,
            'total_amount' => $total_amount,
        ]);
        $tickets = [];
        // Generate and store tickets
        $ticket = Ticket::find($ticket_id);
        for ($i = 1; $i <= $quantity; $i++) {
            $uniqueCode = uniqid(); // Generate a unique code for each ticket
            $qrCodeContent = route('ticket.show', ['code' => $uniqueCode]);
            $qrCode = new QrCode($qrCodeContent);
            $qrCode->setSize(200);
            $writer = new PngWriter();
            $qrCodeData = $writer->write($qrCode);
            $qrCodePath = 'qr_codes/' . $uniqueCode . '.png';
            file_put_contents(public_path('storage/' . $qrCodePath), $qrCodeData->getString());

            $ticket = MyTicket::create([
                'user_id' => $user_id,
                'event_id' => $event_id,
                'ticket_id' => $ticket_id,
                'unique_code' => $uniqueCode,
                'qr_code_path' => $qrCodePath,
            ]);

            $tickets[] = $ticket;

        }

        Mail::to($request->user()->email)->send(new TicketConfirmation($tickets));


        return redirect()->route('thanks');
    }



    public function confirmation($id)
    {
        $checkout = Checkout::findOrFail($id);
        return view('thanks', compact('checkout'));
    }


    private function calculateDiscount($couponCode, $ticketId)
    {
        if (!$couponCode) {
            return 0; // No coupon code provided
        }

        $coupon = CouponCode::where('code', $couponCode)
            ->where('ticket_id', $ticketId)
            ->first();

        if ($coupon) {
            return $coupon->percentage / 100;
        }
        return 0; // Invalid coupon code
    }
    public function verifyQrCode(Request $request)
    {
        $qrCode = $request->input('qr_code');
        $eventId = $request->input('event_id');


        // Find the ticket in the database based on the unique code
        $ticket = MyTicket::where('unique_code', $qrCode)
            ->where('event_id', $eventId)
            ->first();

        if ($ticket) {
            if ($ticket->scanned) {
                return response()->json([
                    'is_valid' => false,
                    'message' => 'QR code already scanned',
                ]);
            } else {
                // Update the ticket as scanned
                $ticket->scanned = true;
                $ticket->save();

                // Fetch the user name and ticket type
                $user = $ticket->user;
                $ticketType = $ticket->ticket->type;

                return response()->json([
                    'is_valid' => true,
                    'event' => $ticket->event->title,
                    'ticket_type' => $ticketType,
                    'user_name' => $user->name,
                ]);
            }
        } else {
            return response()->json([
                'is_valid' => false,
                'message' => 'Invalid QR code',
            ]);
        }
    }

    public function showOrdersSummary(Request $request)
    {
        // Get the ID of the currently authenticated user
        $userId = $request->user()->id;

        // Get the number of orders per page (customizable value)
        $perPage = 10;

        // Get the current page number from the request (default to 1)
        $currentPage = $request->query('page', 1);

        // Fetch only the events created by the currently authenticated user with pagination
        $events = Event::where('created_by', $userId)
            ->paginate($perPage, ['*'], 'page', $currentPage);

        // Prepare an array to hold order data
        $orders = [];

        // Loop through each event
        foreach ($events as $event) {
            // Get total tickets for the event
            $totalTickets = Ticket::where('event_id', $event->id)->sum('quantity_available');

            // Get tickets sold for the event
            $ticketsSold = MyTicket::where('event_id', $event->id)->count();

            // Calculate tickets left
            $ticketsLeft = $totalTickets - $ticketsSold;

            // Add order data to the array
            $orders[] = [
                'event_name' => $event->title,
                'total_ticket' => $totalTickets,
                'ticket_sold' => $ticketsSold,
                'ticket_left' => $ticketsLeft,
            ];
        }

        // Pass pagination information to the view
        $pagination = [
            'currentPage' => $currentPage,
            'perPage' => $perPage,
            'hasMorePages' => $events->hasMorePages(),
        ];

        return view('orders.index', ['orders' => $orders, 'pagination' => $pagination]);
    }




}
