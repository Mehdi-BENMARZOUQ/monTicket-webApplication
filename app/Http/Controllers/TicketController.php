<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
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

        return redirect()->route('events.index')->with('success', 'Tickets created successfully.');
    }
}
