<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ticket Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .qr-code {
            text-align: center;
            margin-top: 20px;
        }
        .ticket {
            border: 1px solid #ddd;
            margin-bottom: 10px;
            padding: 10px;
        }
    </style>
</head>
<body>
<div class="header">
    <h1>Ticket Confirmation</h1>
    <p>Event: {{ $checkout->event->title }}</p>
    <p>Date: {{ date('d-M-Y', strtotime($checkout->event->start_datetime)) }} to {{ date('d-M-Y', strtotime($checkout->event->end_datetime)) }}</p>
    <p>Venue: {{ $checkout->event->venue }}</p>
</div>

@foreach ($tickets as $index => $ticketPath)
    <div class="ticket">
        <p>Ticket {{ $index + 1 }} of {{ $checkout->quantity }}</p>
        <div class="qr-code">
            <img src="{{ public_path('storage/' . $ticketPath) }}" alt="QR Code">
        </div>
    </div>
@endforeach
</body>
</html>
