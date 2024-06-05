<!DOCTYPE html>
<html>
<head>
    <title>Tickets</title>
</head>
<body>
<h1 style='color:#4d4d4d;font-family: "Rubik", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";text-align: center;font-weight: 700'>Your Tickets</h1>
@foreach ($tickets as $ticket)
    <div>
        <h2>Event: {{ $ticket->event->title }}</h2>
        <p>Ticket ID: {{ $ticket->ticket->id }}</p>
        <p>Unique Code: {{ $ticket->unique_code }}</p>
        <img src="{{ public_path('storage/' . $ticket->qr_code_path) }}" alt="QR Code">
    </div>
    <hr>
@endforeach
</body>
</html>
