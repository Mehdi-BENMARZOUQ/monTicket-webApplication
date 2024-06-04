<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barcode Validation</title>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
</head>
<body>
<h1>Ticket Details</h1>
{{--
<p>Event Name: {{ $checkout->event->name }}</p>
<p>Ticket Type: {{ $checkout->ticket->type }}</p>
<p>Quantity: {{ $checkout->quantity }}</p>
<p>Total Amount: ${{ $checkout->total_amount }}</p>

<p>Status: {{ $checkout->is_valid ? 'Valid' : 'Invalid' }}</p>
--}}



<video id="preview"></video>

<script type="text/javascript">
    let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
    scanner.addListener('scan', function (content) {
        console.log(content);
    });
    Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
            scanner.start(cameras[0]);
        } else {
            console.error('No cameras found.');
        }
    }).catch(function (e) {
        console.error(e);
    });
</script>
</body>
</html>

