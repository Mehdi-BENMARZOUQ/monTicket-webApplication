<?php

namespace App\Mail;

use App\Models\Checkout;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TicketConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $checkout;

    public function __construct(Checkout $checkout)
    {
        $this->checkout = $checkout;
    }

    public function build()
    {
        $qrCodeUrl = asset('storage/' . $this->checkout->qr_code_path);

        return $this->view('emails.ticket_confirmation')
            ->with([
                'checkout' => $this->checkout,
                'qrCodeUrl' => $qrCodeUrl,
            ]);
    }
}
