<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Confirmation</title>
</head>
<body>
<h1>Thank you for your purchase!</h1>
<p>Event Name: {{ $checkout->event->name }}</p>
<p>Ticket Type: {{ $checkout->ticket->type }}</p>
<p>Quantity: {{ $checkout->quantity }}</p>
<p>Total Amount: ${{ $checkout->total_amount }}</p>

<!-- Display QR Code -->
<div>
    <img src="{{ $qrCodeUrl }}" alt="QR Code">
</div>
</body>
</html>
