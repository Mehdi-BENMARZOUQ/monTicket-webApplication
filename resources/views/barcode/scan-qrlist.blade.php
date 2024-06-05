@include('events.navbar')

<script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Assuming the event ID is in the URL like /scan-barcode/{event_id}
    let urlParts = window.location.pathname.split('/');
    let eventId = urlParts[urlParts.length - 1];

    let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
    scanner.addListener('scan', function (content) {


        const uniqueCode = content.split('/').pop();


        $.ajax({
            url: "{{ route('verify.qr_codes') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                qr_code: uniqueCode,
                event_id: eventId
            },
            success: function(response) {
                if (response.is_valid) {
                    Swal.fire({
                        icon: 'success',
                        title: 'QR code is valid ',
                        text: 'QR code is valid for event: ' + response.event + ' with ticket type: ' + response.ticket_type,
                    });
                    // Highlight the user's name in green
                    $('tbody tr').each(function() {
                        if ($(this).find('td:nth-child(2)').text().trim() === response.user_name) {
                            $(this).css('color', 'green');
                        }
                    });
                } else {
                    if (response.message === 'QR code already scanned') {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Warning',
                            text: 'This QR code has already been scanned.',
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'User does not exist!',
                        });
                    }
                }
            },
            error: function(xhr) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'An error occurred: ' + xhr.responseText,
                });
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

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="content" style="background: #FAFCFF;width: 100%;">
                <div class="List-container">
                    <div class="cars" style="padding: 10px 35px;">
                        <table class="transactions-table" style="width: 100%;line-height: 2.7rem">
                            <thead style="border-bottom: 1px solid #0000005c;">
                            <tr>
                                <th style="text-transform: uppercase;text-align: center">User Name</th>
                                <th style="text-transform: uppercase;text-align: center">Email</th>
                                <th style="text-transform: uppercase;text-align: center">Event Title</th>
                                <th style="text-transform: uppercase;text-align: center">Ticket Type</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($buyers as $buyer)
                                <tr>
                                    <td style="text-align: center">{{ $buyer->user->name }}</td>
                                    <td style="text-align: center">{{ $buyer->user->email }}</td>
                                    <td style="text-align: center">{{ $buyer->event->title }}</td>
                                    <td style="text-align: center">{{ $buyer->ticket->type }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="position:relative;">
    <div style="transform: rotate(90deg) !important;position: absolute;right: 0">
        <video id="preview" ></video>
    </div>
</div>
<script>
    let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
    scanner.addListener('scan', function (content) {
        console.log(content);
        alert(content);
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
