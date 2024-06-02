<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CheckoutController extends Controller
{
    public function create(Request $request)
    {
        $event = Event::findOrFail($request->event_id);
        $ticket = Ticket::findOrFail($request->ticket_id);

        return view('checkout.create', compact('event', 'ticket'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'ticket_id' => 'required|exists:tickets,id',
            'coupon_code' => 'nullable|string',
        ]);

        $ticket = Ticket::findOrFail($request->ticket_id);
        $discount = $this->calculateDiscount($request->coupon_code);
        $totalAmount = $ticket->price * (1 - $discount);

        $checkout = Checkout::create([
            'event_id' => $request->event_id,
            'ticket_id' => $request->ticket_id,
            'coupon_code' => $request->coupon_code,
            'total_amount' => $totalAmount,
        ]);

        return redirect()->route('checkout.payment', $checkout->id);
    }

    public function payment($id)
    {
        $checkout = Checkout::findOrFail($id);
        return view('checkout.payment', compact('checkout'));
    }

    public function pay(Request $request)
    {
        // Handle payment through Stripe or PayPal
        // For simplicity, let's assume the payment is successful

        $checkout = Checkout::findOrFail($request->checkout_id);

        // Send confirmation email with QR code
        Mail::to($request->user()->email)->send(new \App\Mail\TicketConfirmation($checkout));

        return redirect()->route('checkout.confirmation', $checkout->id);
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
