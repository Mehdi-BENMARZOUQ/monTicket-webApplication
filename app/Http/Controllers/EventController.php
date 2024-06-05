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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Endroid\QrCode\Builder\Builder;

class EventController extends Controller
{

   /* public function scanBarcode($id)
    {
        $event = Event::with('tickets.user')->findOrFail($id);


        // Generate QR codes for each ticket
        foreach ($event->tickets as $ticket) {
            $qrCode = Builder::create()
                ->data($ticket->id)
                ->size(100)
                ->build();

            // Save the QR code image as a base64 string in the ticket object
            $ticket->qrCode = base64_encode($qrCode->getString());
        }
        return view('barcode.scan-qrlist', compact('event'));
    }*/

    public function usersByEvent($eventId)
    {
        $event = Event::with(['tickets.user'])->findOrFail($eventId);
        return view('barcode.scan-qrlist', compact('event'));
    }
    public function displayList(Request $request)
    {
        $events = Event::paginate(7);

        return view('dashboard.eventsList', compact('events'));
    }

    public function displayWelcomeList(Request $request)
    {
        // Retrieve the count of events for each category
        $categoryCounts = DB::table('events')
            ->join('event_categories', 'events.category_id', '=', 'event_categories.id')
            ->select('event_categories.name', DB::raw('COUNT(*) as count'))
            ->groupBy('event_categories.name')
            ->get();

        // Retrieve the events (assuming you want to display all events)
        $events = Event::paginate(7);

        // Create a map of category names to their respective event counts
        $categoryCountsMap = $categoryCounts->pluck('count', 'name');

        return view('welcome', compact('events','categoryCountsMap'));
    }


    public function myList(Request $request)
    {
        $userId = Auth::id();

        $events = Event::where('created_by', $userId)->paginate(7);



        return view('events.manageEvents', compact('events',));
    }
    public function getTickets($id)
    {
        $tickets = Ticket::where('event_id', $id)->get();
        return response()->json($tickets);
    }

    public function eventsByCategory(Request $request, $categoryName)
    {
        $category = EventCategory::where('name', $categoryName)->firstOrFail();
        $events = Event::where('category_id', $category->id)->paginate(6);

        return view('events.eventsByCategory', compact('events', 'category'));
    }
    public function create()
    {
        $categories = EventCategory::all();
        return view('events.create', compact('categories'));
    }
    /*Testing by debbuging*/
    /* if ($request->hasFile('image')) {
         $imagePath = $request->file('image')->store('images', 'public');
         dd($imagePath); // Debugging line to check if the image path is correct
     } else {
         dd('No image uploaded'); // Debugging line to check if the image was not uploaded
     }*/
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:event_categories,id',
            'venue' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'start_datetime' => 'required|date',
            'end_datetime' => 'required|date',
            'image' => 'nullable|image',
        ]);

        $imagePath = $request->image ? $request->file('image')->store('public/images/upload') : null;

        $event = new Event([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'venue' => $request->venue,
            'location' => $request->location,
            'start_datetime' => $request->start_datetime,
            'end_datetime' => $request->end_datetime,
            'image' => $imagePath ? str_replace('public/', '', $imagePath) : null,
            'created_by' => Auth::id(),
        ]);

        $event->save();

        return redirect()->route('tickets.create', ['event_id' => $event->id])->with('success', 'Event created successfully.');
    }

    public function show($id)
    {

        $event = Event::findOrFail($id);
        $moreEvents = Event::where('id', '!=', $id)->take(4)->get();
        $tickets = Ticket::where('event_id', $id)->get();
        return view('single.single', compact('event', 'moreEvents','tickets'));
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $categories = EventCategory::all();
        $tickets = Ticket::where('event_id', $id)->get();

        return view('events.updateEvent', compact('event', 'categories', 'tickets'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:event_categories,id',
            'venue' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'start_datetime' => 'required|date',
            'end_datetime' => 'required|date',
            'image' => 'nullable|image',
        ]);

        $event = Event::findOrFail($id);

        $imagePath = $event->image;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images/upload');
            $imagePath = str_replace('public/', '', $imagePath);
        }

        $event->update([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'venue' => $request->venue,
            'location' => $request->location,
            'start_datetime' => $request->start_datetime,
            'end_datetime' => $request->end_datetime,
            'image' => $imagePath,
        ]);

        return redirect()->route('events.edit', $id)->with('success', 'Event updated successfully.');
    }


    public function delete($id)
    {
        $event = Event::find($id);
        if (!$event) {
            return response()->json(['error' => 'Event not found'], 404);
        }

        $event->delete();

        return redirect()->back()->with('success', 'Event deleted successfully.');
    }


    public function search(Request $request)
    {
        $request->validate([
            'location' => 'required|string',
            'category' => 'required|string',
        ]);

        $events = Event::where('location', $request->location)
            ->whereHas('category', function($query) use ($request) {
                $query->where('name', $request->category);
            })
            ->paginate(6);

        $category = EventCategory::where('name', $request->category)->firstOrFail();

        return view('events.index', compact('events','category'));
    }
}
