<?php

namespace App\Mail;

use App\Models\MyTicket;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TicketConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $tickets;

    /**
     * Create a new message instance.
     *
     * @param array $tickets
     * @return void
     */
    public function __construct($tickets)
    {
        $this->tickets = $tickets;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $pdf = Pdf::loadView('emails.ticket_confirmation', ['tickets' => $this->tickets]);

        return $this->subject('Your Ticket Confirmation')
            ->view('thanks')
            ->attachData($pdf->output(), 'tickets.pdf', [
                'mime' => 'application/pdf',
            ]);
    }
}
