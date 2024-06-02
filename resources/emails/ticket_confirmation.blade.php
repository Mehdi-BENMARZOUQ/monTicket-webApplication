<!DOCTYPE html>
<html>
<head>
    <title>Ticket Confirmation</title>
</head>
<body>
<h1>Ticket Confirmation</h1>
<p>Thank you for your purchase. Here is your ticket information:</p>
<p>Ticket ID: {{ $checkout->id }}</p>
<p>
    <img src="data:image/png;base64,{{ $qrCode }}" alt="QR Code">
</p>
</body>
</html>
