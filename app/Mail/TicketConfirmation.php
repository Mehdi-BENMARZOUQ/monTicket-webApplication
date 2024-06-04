<?php

namespace App\Mail;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

class TicketConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $checkout;

    public function __construct($checkout)
    {
        $this->checkout = $checkout;
    }

    public function build()
    {
        // Generate QR codes for each ticket
        $tickets = [];
        for ($i = 0; $i < $this->checkout->quantity; $i++) {
            $qrCode = new QrCode(route('ticket.show', ['checkout_id' => $this->checkout->id, 'ticket_number' => $i + 1]));
            $qrCode->setSize(200);
            $writer = new PngWriter();
            $qrCodeData = $writer->write($qrCode);
            $qrCodePath = 'qr_codes/' . $this->checkout->id . '_ticket_' . ($i + 1) . '.png';
            file_put_contents(public_path('storage/' . $qrCodePath), $qrCodeData->getString());
            $tickets[] = $qrCodePath;
        }

        // Generate PDF from view
        $pdf = PDF::loadView('emails.ticket_confirmation', [
            'checkout' => $this->checkout,
            'tickets' => $tickets,
        ]);

        return $this->view('emails.ticket_confirmation')
            ->with([
                'checkout' => $this->checkout,
                'tickets' => $tickets,
            ])
            ->attachData($pdf->output(), 'ticket_confirmation.pdf', [
                'mime' => 'application/pdf',
            ]);
    }
}

