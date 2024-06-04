<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use App\Mail\TicketConfirmation;

class CheckoutController extends Controller
{
    public function create(Request $request)
    {
        $event = Event::findOrFail($request->event_id);
        $tickets = Ticket::where('event_id', $event->id)->get();

        return view('checkout.create', compact('event', 'tickets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'ticket_id' => 'required|exists:tickets,id',
            'quantity' => 'required|integer|min:1',
            'coupon_code' => 'nullable|string',
        ]);

        $ticket = Ticket::findOrFail($request->ticket_id);
        $quantity = $request->quantity;
        $subtotal = $ticket->price * $quantity;
        $discount = $this->calculateDiscount($request->coupon_code);
        $total = $subtotal * (1 - $discount);

        $checkout = Checkout::create([
            'event_id' => $request->event_id,
            'ticket_id' => $request->ticket_id,
            'quantity' => $quantity,
            'coupon_code' => $request->coupon_code,
            'total_amount' => $subtotal,
            'total' => $total,
        ]);

        return redirect()->route('checkout.payment', $checkout->id);
    }

    public function payment($id)
    {
        $checkout = Checkout::findOrFail($id);
        return view('checkout.payment', compact('checkout'));
    }

        public function processPayment(Request $request, $id)
    {
        $checkout = Checkout::findOrFail($id);
        $paymentMethod = $request->input('payment_method');

        // Simulate payment processing
        if ($paymentMethod === 'stripe') {
            // Handle Stripe payment
        } elseif ($paymentMethod === 'paypal') {
            // Handle PayPal payment
        }

        // Generate QR code
        $qrCode = new QrCode(route('checkout.confirmation', $checkout->id));
        $qrCode->setSize(200);
        $writer = new PngWriter();
        $qrCodeData = $writer->write($qrCode);
        $qrCodePath = 'qr_codes/' . $checkout->id . '.png';
        file_put_contents(public_path('storage/' . $qrCodePath), $qrCodeData->getString());
        $checkout->update(['qr_code_path' => $qrCodePath]);

        // Send confirmation email
        Mail::to($request->user()->email)->send(new TicketConfirmation($checkout));

        return redirect()->route('checkout.confirmation', $checkout->id)
            ->with('message', 'Payment processed successfully.');
    }

    public function confirmation($id)
    {
        $checkout = Checkout::findOrFail($id);
        return view('checkout.confirmation', compact('checkout'));
    }

    private function calculateDiscount($couponCode)
    {
        if ($couponCode === 'DISCOUNT10') {
            return 0.1;
        }
        return 0;
    }
}
