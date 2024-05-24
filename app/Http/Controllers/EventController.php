<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Event;
use App\Models\EventCategory;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;


class EventController extends Controller
{

    public function displayList(Request $request){
        $events = Event::paginate(7);
        return view('dashboard.eventsList', compact('events'));
    }


    public function create()
    {
        $categories = EventCategory::all();
        return view('events.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:event_categories,id',
            'venue' => 'required|string|max:255',
            'start_datetime' => 'required|date',
            'end_datetime' => 'required|date',
            'image' => 'nullable|image',
        ]);

        $event = new Event([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'venue' => $request->venue,
            'start_datetime' => $request->start_datetime,
            'end_datetime' => $request->end_datetime,
            'image' => $request->image ? $request->file('image')->store('images') : null,
            'created_by' => Auth::id(),
        ]);

        $event->save();

        return redirect()->route('tickets.create', ['event_id' => $event->id])->with('success', 'Event created successfully.');
    }
}
