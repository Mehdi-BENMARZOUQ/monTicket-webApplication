<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barcode Validation</title>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

</head>
<body>
<h1>Ticket Details</h1>

<video id="preview"></video>

<script type="text/javascript">
    let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
    scanner.addListener('scan', function (content) {
        console.log(content);

        // Send the scanned QR code content to the server for verification
        $.ajax({
            url: "{{ route('verify.qr_code') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                qr_code: content
            },
            success: function(response) {
                if (response.is_valid) {
                    alert('QR code is valid for event: ' + response.event + ' with ticket type: ' + response.ticket_type);
                } else {
                    alert('QR code is invalid');
                }
            },
            error: function(xhr) {
                alert('An error occurred: ' + xhr.responseText);
            }
        });
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
