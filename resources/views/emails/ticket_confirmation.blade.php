<!DOCTYPE html>
<html>
<head>
    <title>Tickets</title>
</head>
<body>
<h1 style='color:#4d4d4d;font-family: "Rubik", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";text-align: center;font-weight: 700'>Your Tickets</h1>
@foreach ($tickets as $ticket)
    <div >
        <h2 style='font-family: "Rubik", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";'>
            <span style="color:#f38181;">
                Event:
            </span> {{ $ticket->event->title }}
        </h2>
        <p style='font-family: "Rubik", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";'>
            <span style="color:#f38181;">
                Ticket ID:
            </span>

             {{ $ticket->ticket->id }}
        </p>
        <img src="{{ public_path('storage/' . $ticket->qr_code_path) }}" alt="QR Code">
        <p style='font-family: "Rubik", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";'>
            <span style="color:#f38181;">
                Unique Code:
            </span>
             {{ $ticket->unique_code }}
        </p>
    </div>
    <hr>
@endforeach
</body>
</html>
