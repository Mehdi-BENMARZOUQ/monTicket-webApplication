<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket #{{ $ticket_number }}</title>
</head>
<body>
<h1>Ticket #{{ $ticket_number }}</h1>
<p>Event: {{ $checkout->event->title }}</p>
<p>Date: {{ $checkout->event->date }}</p>
<p>Type: {{ $checkout->ticket->type }}</p>
<img src="{{ asset('storage/' . $checkout->qr_code_path) }}" alt="QR Code">
</body>
</html>
