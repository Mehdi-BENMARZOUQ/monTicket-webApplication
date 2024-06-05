<?php

namespace App\Http\Controllers;

use App\Mail\SendMessage;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function sendEmail(Request $request)
    {
        $request->validate([
            'eventId' => 'required|integer',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $eventId = $request->input('eventId');
        $subject = $request->input('subject');
        $messageBody = $request->input('message');

        // Here you can get the event details and recipient email
        // For example:
        $event = Event::findOrFail($eventId);
        $recipientEmail = $event->creator->email;

        // For demonstration, using a static email
        //$recipientEmail = 'recipient@example.com';

        // Send the email
        Mail::to($recipientEmail)->send(new SendMessage($subject, $messageBody));

        return redirect()->back()->with('success', 'Email sent successfully!');
    }
}
