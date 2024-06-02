<?php

namespace App\Mail;

use App\Models\Checkout;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;

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
        // Create the QR code
        $result = Builder::create()
            ->writer(new PngWriter())
            ->data('Ticket ID: ' . $this->checkout->id)
            ->build();

        // Encode the QR code as base64
        $qrCode = base64_encode($result->getString());

        return $this->view('emails.ticket_confirmation')
            ->with(['qrCode' => $qrCode]);
    }
}
