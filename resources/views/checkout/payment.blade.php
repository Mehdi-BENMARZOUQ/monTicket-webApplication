<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Purchase Confirmation</title>
</head>
<body>
<h1>Thank you for your purchase!</h1>
<p>You have successfully purchased {{ $ticket->quantity }} {{ $ticket->type }} ticket(s) for {{ $ticket->event->name }}.</p>
<p>Total: ${{ $ticket->total }}</p>
<p>We look forward to seeing you at the event!</p>
</body>
</html>
