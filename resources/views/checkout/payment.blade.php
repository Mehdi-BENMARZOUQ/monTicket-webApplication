<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Payment</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
<div class="container">
    <h1 class="text-2xl font-bold">Checkout Payment</h1>
    <div class="checkout-details">
        <h2 class="text-lg font-semibold">Event Details</h2>
        <p>Event Name: {{ $checkout->event->title }}</p>
        <p>Ticket Type: {{ $checkout->ticket->type }}</p>
        <p>Quantity: {{ $checkout->quantity }}</p>
        <p>Total: ${{ $checkout->total_amount }}</p>
    </div>
    <div class="payment-methods">
        <h2 class="text-lg font-semibold">Select Payment Method</h2>
        <form action="{{ route('checkout.processPayment', $checkout->id) }}" method="POST">
            @csrf
            <div>
                <label for="payment_method">Payment Method</label>
                <select name="payment_method" id="payment_method" required>
                    <option value="stripe">Stripe</option>
                    <option value="paypal">PayPal</option>
                </select>
            </div>
            <button type="submit">Pay Now</button>
        </form>
    </div>
</div>
</body>
</html>
