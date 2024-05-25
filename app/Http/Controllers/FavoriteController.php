<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    /*public function index()
    {
        $user = Auth::user();
        $favoriteEvents = $user->favorites()->with('event')->get();
        return view('favorites.index', compact('favoriteEvents'));
    }*/

    public function index()
    {
        $user = Auth::user();
        $favoriteEvents = $user->events()->with('category')->get();
        return view('favorites.index', compact('favoriteEvents'));
    }

    public function store(Request $request, $eventId)
    {
        $user = Auth::user();
        $event = Event::findOrFail($eventId);

        if ($user->favorites()->where('event_id', $eventId)->exists()) {
            return back()->with('error', 'Event already in favorites.');
        }

        $user->events()->attach($eventId);

        return back()->with('success', 'Event added to favorites.');
    }

    public function destroy(Request $request, $eventId)
    {
        $user = Auth::user();
        $user->events()->detach($eventId);

        return back()->with('success', 'Event removed from favorites.');
    }

}
