<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
</head>
<style>
    /* Styles here */
</style>
<body>
<div class="container">
    <div class="grid gap-8">
        <div>
            <h1 class="text-2xl font-bold">Checkout</h1>
        </div>
        <div class="grid gap-6">
            <div class="grid gap-2">
                <h2 class="text-lg font-semibold">Event Details</h2>
                <div class="grid sm:grid-cols-2 gap-4">
                    <div>
                        <p><strong>Event:</strong> {{ $event->title }}</p>
                        <p><strong>Venue:</strong> {{ $event->venue }}</p>
                        <p><strong>Date:</strong> {{ date('d-M-Y',strtotime($event->start_datetime))  }} to {{ date('d-M-Y',strtotime($event->end_datetime)) }}</p>
                    </div>
                    <div>
                        <img src="/storage/{{ $event->image }}" alt="Event Image" class="w-full h-48 object-cover rounded">
                    </div>
                </div>
            </div>
            <div class="grid gap-2">
                <h2 class="text-lg font-semibold">Ticket Details</h2>
                <p><strong>Type:</strong> {{ $ticket->type }}</p>
                <p><strong>Price:</strong> ${{ $ticket->price }}</p>
            </div>
            <form action="{{ route('checkout.store') }}" method="POST">
                @csrf
                <input type="hidden" name="event_id" value="{{ $event->id }}">
                <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                <div class="grid gap-4">
                    <div>
                        <label for="coupon_code" class="block text-sm font-medium text-gray-700">Coupon Code (optional)</label>
                        <input type="text" id="coupon_code" name="coupon_code" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                    <button type="submit" class="button">Proceed to Payment</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
