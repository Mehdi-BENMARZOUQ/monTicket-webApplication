<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style>
        body {
            line-height: 1.7;
            color: #4d4d4d;
            font-weight: 400;
            font-size: 1rem;
            font-family: "Rubik", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"; }

    </style>
</head>
<body>
<h1 style="text-align:center;color:#f38181;text-shadow: #914D4D 2px 1px 4px;">Thank you for your purchase!</h1>
<div style="display:flex;justify-content:space-around;max-width:70%;margin:0 200px;">
    <div style="width:140px;height:130px;">
        <img style="width:100%;height:100%;" src="/storage/{{ $checkout->qr_code_path }}" alt="QR Code">

    </div>
    <div style="width:250px;height:250px;display:flex;align-items:center;">
        <img style="width:100%;height:100%;" src="/storage/{{ $checkout->event->image }}" alt="QR Code">
    </div>

    <div>
        <p>
            <strong>Event Name: </strong> <br>
            {{ $checkout->event->title }}
        </p>
        <p>
            <strong>Ticket Type: </strong> <br>
            {{ $checkout->ticket->type }}
        </p>
        <p>
            <strong>Quantity: </strong> <br>
            {{ $checkout->quantity }}
        </p>
        <p>
            <strong>Total Amount: </strong> <br>
            ${{ $checkout->total_amount }}
        </p>

    </div>

</div>


</body>
</body>
</html>
