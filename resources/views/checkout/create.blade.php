<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="shortcut icon" href="../images/logoMonTicket.png">{{--Logo--}}

    <link rel="stylesheet" href="../fonts/icomoon/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <link rel="stylesheet" href="../css/jquery-ui.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="../css/aos.css">
    <link rel="stylesheet" href="../css/rangeslider.css">
    <link rel="stylesheet" href="../build/assets/app-C_TSVpcb.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .checkout-container {
            max-width: 3xl;
            margin: auto;
            padding: 40px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .checkout-header {
            text-align: center;
        }
    </style>
</head>
<body>
<div style=" margin-top: 12px;">
    <a href="{{route("welcome")}}" style="color: #1b1bbd;text-decoration: none;font-weight: 600;padding: 0 2rem;display: flex;align-items: center">
        <svg width="12px" height="12px" id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.88 108.06"><title>back-arrow</title><path fill="#1b1bbd" d="M63.94,24.28a14.28,14.28,0,0,0-20.36-20L4.1,44.42a14.27,14.27,0,0,0,0,20l38.69,39.35a14.27,14.27,0,0,0,20.35-20L48.06,68.41l60.66-.29a14.27,14.27,0,1,0-.23-28.54l-59.85.28,15.3-15.58Z"/></svg>
        <p style="margin-left: 5px">Back to events list</p>
    </a>
</div>
<div class="container" style="margin-top:5px;">
    <div class="grid gap-8 checkout-container">
        <div class="checkout-header" style="margin-bottom: 25px;">
            <h1 class="" style="color: #4d4d4d;font-weight: 700;font-size: 60px;">Checkout</h1>
        </div>
        <div style="width: 140px;height: 130px;margin-bottom: 10px">
            <img style="width: 100%;height: 100%" src="{{Auth::user()->organization_logo}}" alt="">
        </div>
        <div class="grid gap-6">

            <div class="grid gap-2">
                <h2 class="text-lg font-semibold" style="font-size: 30px;font-weight: 700">Event Details</h2>
                <div class="grid sm:grid-cols-2 gap-4">
                    <div>

                        <div class="row" style="display: flex;justify-content: space-between;align-items: center">
                            <div class="col-5">
                                <p style="margin: 10px 0;"><strong>Event Name:</strong></p>
                                <input style="width: 100%;opacity: 0.6;cursor: not-allowed;border-radius: 8px;" type="text" disabled value="{{ $event->title }}">
                            </div>
                            <div class="col-5">
                                <p style="margin: 10px 0;" ><strong>Address :</strong></p>
                                <input style="width: 100%;opacity: 0.6;cursor: not-allowed;border-radius: 8px;" type="text" disabled value="{{ $event->venue }}">
                            </div>
                        </div>
                        <div>
                            <p style="margin: 10px 0;" >
                                <strong>Date:</strong>
                            </p>
                            <input style="width: 100%;opacity: 0.6;cursor: not-allowed;border-radius: 8px;" type="text" disabled value="{{ date('d-M-Y', strtotime($event->start_datetime)) }} to {{ date('d-M-Y', strtotime($event->end_datetime)) }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid gap-2" style="margin-top:20px;">
                <h2 class="text-lg font-semibold" style="font-size: 30px;font-weight: 700">Ticket Details</h2>
            </div>
            <form action="{{ route('checkout.store') }}" method="POST">
                @csrf
                <input type="hidden" name="event_id" value="{{ $event->id }}">
                <div class="row">
                    <div class="col-4">
                        <label for="ticket_id" style="margin: 10px 0;"><strong>Ticket Type</strong></label><br>
                        <select name="ticket_id" id="ticket_id" style="border-radius: 8px;">
                            @foreach ($tickets as $ticket)
                                <option style="border-radius: 8px;" value="{{ $ticket->id }}" data-price="{{ $ticket->price }}">{{ $ticket->type }} - {{ $ticket->price }}$</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="quantity" style="margin: 10px 0;"><strong>Quantity</strong></label><br>
                        <input style="border-radius: 8px;" type="number" name="quantity" id="quantity" min="1" required>
                    </div>
                    <div class="col-4">
                        <p style="margin: 10px 0;"><strong>Subtotal: $</strong><br>
                        <div style="font-weight: 600">
                            <span id="subtotal">0.00</span>
                        </div>
                        </p>
                    </div>
                </div>
                <div class="grid gap-2" style="margin-top:20px;">
                    <h2 class="text-lg font-semibold" style="font-size: 30px;font-weight: 700">Discounts</h2>
                </div>
                <div class="row">
                    <div class="col-5" style="margin: 10px 0;">
                        <label for="coupon_code"> <strong> Coupon Code (optional)</strong></label><br>
                        <input style="border-radius: 8px;width: 100%" type="text" name="coupon_code" id="coupon_code">
                    </div>
                    <div class="col-5" style="text-align: center">
                        <p style="margin: 10px 0;"><strong>Total: $</strong><br>
                        <div style="font-weight: 600">
                            <span id="total">0.00</span>
                        </div>
                        </p>
                    </div>
                </div>
                <div class="grid gap-2" style="margin-top:20px;">
                    <h2 class="text-lg font-semibold" style="font-size: 30px;font-weight: 700">Choose Payment Method</h2>
                    <div class="row">
                        <div class="col-6">
                            <input type="radio" name="payment_method" value="stripe" id="stripe" required>
                            <label for="stripe"><strong>Stripe</strong></label>
                        </div>
                        <div class="col-6">
                            <input type="radio" name="payment_method" value="paypal" id="paypal" required>
                            <label for="paypal"><strong>PayPal</strong></label>
                        </div>
                    </div>
                </div>
                <button class="btn-dark" type="submit" style="
                width: 100%;
                background-color: #f38181;
                color: #fff;
                border: none;
                cursor: pointer;
                padding: 0.5rem 1rem;
                border-radius: 0.25rem;
                margin-top: 20px;
                transition: background-color 0.3s ease;"
                >Proceed to Payment</button>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        function calculateTotal() {
            var price = parseFloat($('#ticket_id option:selected').data('price'));
            var quantity = parseInt($('#quantity').val());
            var subtotal = price * quantity;
            $('#subtotal').text(subtotal.toFixed(2));

            var couponCode = $('#coupon_code').val();
            if (couponCode) {
                $.ajax({
                    url: '{{ route("validate.coupon") }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        code: couponCode
                    },
                    success: function (response) {
                        if (response.valid) {
                            var discount = subtotal * (response.percentage / 100);
                            var total = subtotal - discount;
                            $('#total').text(total.toFixed(2));
                        } else {
                            $('#total').text(subtotal.toFixed(2));
                        }
                    }
                });
            } else {
                $('#total').text(subtotal.toFixed(2));
            }
        }

        $('#ticket_id, #quantity').on('change', calculateTotal);
        $('#coupon_code').on('keyup', calculateTotal);
    });
</script>
<script>
    $('#quantity').on('change', function() {
        if ($(this).val() < 1) {
            Swal.fire({
                icon: 'error',
                title: 'Invalid Quantity',
                text: 'Quantity must be at least 1.'
            });
        }
    });
</script>

<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/jquery-migrate-3.0.1.min.js"></script>
<script src="../js/jquery-ui.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/owl.carousel.min.js"></script>
<script src="../js/jquery.stellar.min.js"></script>
<script src="../js/jquery.countdown.min.js"></script>
<script src="../js/jquery.magnific-popup.min.js"></script>
<script src="../js/bootstrap-datepicker.min.js"></script>
<script src="../js/aos.js"></script>
<script src="../js/rangeslider.min.js"></script>
<script src="../js/typed.js"></script>
<script src="../js/main.js"></script>
</body>
</html>
