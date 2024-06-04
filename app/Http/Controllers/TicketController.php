<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Checkout;
use App\Models\Event;
use App\Models\EventCategory;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;


class TicketController extends Controller
{
    public function show($checkout_id, $ticket_number)
    {
        $checkout = Checkout::findOrFail($checkout_id);

        // Ensure the ticket number is valid (optional but recommended)
        if ($ticket_number > $checkout->quantity) {
            abort(404, 'Ticket not found.');
        }

        return view('tickets.show', compact('checkout', 'ticket_number'));
    }

    public function update(Request $request, $eventId)
    {
        $event = Event::find($eventId);

        if (!$event || Auth::id() !== $event->user_id) {
            return redirect()->route('events.myList');
        }

        $request->validate([
            'tickets.*.type' => 'required|string|max:255',
            'tickets.*.price' => 'required|numeric|min:0',
            'tickets.*.quantity' => 'required|integer|min:0',
            'newTickets.*.type' => 'nullable|string|max:255',
            'newTickets.*.price' => 'nullable|numeric|min:0',
            'newTickets.*.quantity' => 'nullable|integer|min:0',
        ]);

        foreach ($request->tickets as $ticketData) {
            $ticket = Ticket::find($ticketData['id']);
            if ($ticket && $ticket->event_id == $event->id) {
                $ticket->type = $ticketData['type'];
                $ticket->price = $ticketData['price'];
                $ticket->quantity = $ticketData['quantity'];
                $ticket->save();
            }
        }

        if ($request->newTickets) {
            foreach ($request->newTickets as $newTicketData) {
                if ($newTicketData['type']) {
                    $newTicket = new Ticket();
                    $newTicket->type = $newTicketData['type'];
                    $newTicket->price = $newTicketData['price'];
                    $newTicket->quantity = $newTicketData['quantity'];
                    $newTicket->event_id = $event->id;
                    $newTicket->save();
                }
            }
        }

        return redirect()->route('events.edit', ['id' => $event->id]);
    }




    public function create($event_id)
    {
        $event = Event::findOrFail($event_id);

        return view('tickets.create', compact('event'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'type.*' => 'required|string|max:255',
            'price.*' => 'required|numeric',
            'quantity_available.*' => 'required|integer|min:0',
        ]);

        foreach ($request->type as $index => $type) {

            Ticket::create([
                'event_id' => $request->event_id,
                'type' => $type,
                'price' => $request->price[$index],
                'quantity_available' => $request->quantity_available[$index],
            ]);
        }

        return redirect()->route('events.myList')->with('success', 'Tickets created successfully.');
    }
}
