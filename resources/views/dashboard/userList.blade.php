<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Free-Template.co" />

    <link rel="shortcut icon" href="ftco-32x32.png">{{--Logo--}}

    <link href="https://fonts.googleapis.com/css?family=Rubik:400,700" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/rangeslider.css">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.css">

    <style>
    .swal-button{
        display: inline-block;
        border-radius: 2px;
        padding: 4px 15px;
        color: #fff;
        font-weight: 600;
        background: #f38181;
    }
    .swal-cancel-button{
        color: #f38181 !important;
        border: 1px solid #f38181 !important;
        background: transparent !important;
    }

    .swal-cancel-button:hover{
        color: #fff !important;
        border: 1px solid #f38181 !important;
        background: #f38181 !important;
    }
        .active{
            background: #f38181;
        }

        .flex-container {
            display: flex;
            min-height: 100vh;
        }

        .icon-svg {
            transition: width 0.3s, height 0.3s; /* Apply transition to width and height properties */
        }

        .icon-svg:hover {
            width: 40px; /* Increase width on hover */
            height: 40px; /* Increase height on hover */
        }


        .popup {
            display: none;
            background-color: rgb(0, 0, 0);
            z-index: 1000;
            width: 100vw;
            top: 0;
            height: 100vh;
            position: fixed;
            left: 0;
        }
        .popup-container{

            transform: translate(-50%, -50%);
            position: absolute;
            background: white;
            top: 50%;
            left: 50%;
        }

        /* Close button styling */
        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 100;
        }

        .popup-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            width: 600px;
            height: 374px;
        }

        .popup-close {
            position: absolute;
            top: 0px;
            right: 20px;
            font-size: 30px;
            color: #f38181;
            cursor: pointer;
        }

        #update-form {
            margin-top: 20px;
        }

        #update-form p {
            margin-bottom: 10px;
        }

        #update-form label {
            display: inline-block;
            width: 100px;
        }

        #update-form input[type="text"],
        #update-form select {
            width: calc(100% - 110px);
            padding: 5px;
        }

        #update-button {
            background-color: #f38181;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        #update-button:hover {
            background-color: #ff5a5a;
        }

        #close-button {
            background-color: #ccc;
            color: #333;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        #close-button:hover {
            background-color: #999;
        }
        .delete-btn:focus{
            border: none;
        }

        .filter-buttons{
            display: flex;
            justify-content: end;
            align-items: center;
        }

        .download-button{
            background: #f38181;
            display: flex;
            padding: 10px;
            border-radius: 4px;
            margin-right: 10px;
            color: #fff;
            font-weight: 600;
        }
        #searchInput:focus{
            border-radius: 10px;
            padding: 8px;
            border: 2px solid #f38181;
            box-shadow: none;
        }
    </style>
</head>



<x-app-layout>
    <div  style="margin-top: 3rem">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="text-align: center;font-size: 50px;">
            {{ __('User List') }}
        </h2>
    </div>
    <!-- Right Content -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

        <div class="content" style="background: #FAFCFF;width: 100%;">
            <div class="List-container">
                <div class="cars" style="padding: 10px 35px;">
                    <div class="filter-buttons" style="text-align: end;padding-bottom: 30px">
                        <div class="btn">
                            <input id="searchInput" type="search" placeholder="Search.." style="    border-radius: 10px;padding: 8px;">
                        </div>
                        <button id="downloadButton" class="download-button" onclick="generatePDF()">

                            <svg width="19px" height="19px" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 115.28 122.88" style="enable-background:new 0 0 115.28 122.88;margin-right: 5px;" xml:space="preserve"><style type="text/css">.st0{fill-rule:evenodd;clip-rule:evenodd;}</style><g><path fill="#fff" class="st0" d="M25.38,57h64.88V37.34H69.59c-2.17,0-5.19-1.17-6.62-2.6c-1.43-1.43-2.3-4.01-2.3-6.17V7.64l0,0H8.15 c-0.18,0-0.32,0.09-0.41,0.18C7.59,7.92,7.55,8.05,7.55,8.24v106.45c0,0.14,0.09,0.32,0.18,0.41c0.09,0.14,0.28,0.18,0.41,0.18 c22.78,0,58.09,0,81.51,0c0.18,0,0.17-0.09,0.27-0.18c0.14-0.09,0.33-0.28,0.33-0.41v-11.16H25.38c-4.14,0-7.56-3.4-7.56-7.56 V64.55C17.82,60.4,21.22,57,25.38,57L25.38,57z M29.5,67.4h13.19c2.87,0,5.02,0.68,6.46,2.05c1.43,1.37,2.14,3.31,2.14,5.84 c0,2.59-0.78,4.62-2.34,6.08c-1.56,1.46-3.94,2.19-7.14,2.19h-4.35v9.49H29.5V67.4L29.5,67.4z M37.45,78.37h1.95 c1.54,0,2.62-0.27,3.24-0.8c0.62-0.53,0.93-1.21,0.93-2.04c0-0.81-0.27-1.49-0.81-2.05c-0.54-0.56-1.55-0.84-3.05-0.84h-2.27V78.37 L37.45,78.37z M54.99,67.4h11.78c2.32,0,4.2,0.32,5.63,0.94c1.43,0.63,2.61,1.53,3.55,2.71c0.93,1.18,1.61,2.55,2.02,4.11 c0.42,1.56,0.63,3.22,0.63,4.97c0,2.74-0.31,4.87-0.94,6.38c-0.62,1.51-1.49,2.78-2.6,3.8c-1.11,1.02-2.3,1.7-3.57,2.04 c-1.74,0.47-3.31,0.7-4.72,0.7H54.99V67.4L54.99,67.4z M62.9,73.21v14.01h1.95c1.66,0,2.84-0.19,3.55-0.55 c0.7-0.37,1.25-1.01,1.65-1.92c0.4-0.92,0.6-2.4,0.6-4.45c0-2.72-0.44-4.57-1.33-5.58c-0.89-1-2.36-1.5-4.42-1.5H62.9L62.9,73.21z M82.25,67.4h19.6v5.52H90.21v4.48h9.96v5.2h-9.96v10.46h-7.95V67.4L82.25,67.4z M97.79,57h9.93c4.16,0,7.56,3.41,7.56,7.56v31.42 c0,4.15-3.41,7.56-7.56,7.56h-9.93v13.55c0,1.61-0.65,3.04-1.7,4.1c-1.06,1.06-2.49,1.7-4.1,1.7c-29.44,0-56.59,0-86.18,0 c-1.61,0-3.04-0.64-4.1-1.7c-1.06-1.06-1.7-2.49-1.7-4.1V5.85c0-1.61,0.65-3.04,1.7-4.1c1.06-1.06,2.53-1.7,4.1-1.7h58.72 C64.66,0,64.8,0,64.94,0c0.64,0,1.29,0.28,1.75,0.69h0.09c0.09,0.05,0.14,0.09,0.23,0.18l29.99,30.36c0.51,0.51,0.88,1.2,0.88,1.98 c0,0.23-0.05,0.41-0.09,0.65V57L97.79,57z M67.52,27.97V8.94l21.43,21.7H70.19c-0.74,0-1.38-0.32-1.89-0.78 C67.84,29.4,67.52,28.71,67.52,27.97L67.52,27.97z"/></g></svg>
                            Download
                        </button>
                    </div>

                    <table class="transactions-table" style="width: 100%;line-height: 2.7rem">
                        <thead style="border-bottom: 1px solid #0000005c;">
                        <tr>
                            <th style="text-transform: uppercase;text-align: center">ID</th>
                            <th style="text-transform: uppercase;text-align: center">Full Name</th>
                            <th style="text-transform: uppercase;text-align: center">Organization Name</th>
                            <th style="text-transform: uppercase;text-align: center">Email</th>
                            <th style="text-transform: uppercase;text-align: center">Phone & Address</th>
                            <th style="text-transform: uppercase;text-align: center">Role</th>
                            <th style="text-transform: uppercase;text-align: center">Actions</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td style="text-align: center" class="id">{{ $user->id }}</td>
                                <td style="text-align: center">{{ $user->name }} | {{ $user->lastName }}</td>
                                <td style="text-align: center">{{ $user->organization_name }}</td>
                                <td style="text-align: center">{{ $user->email }}</td>
                                <td style="text-align: center">{{ $user->phone }}<br>{{ $user->address }}</td>
                                <td class="{{ $user->role }}" style="text-transform: uppercase;text-align: center">{{ $user->role }}</td>
                                <td style="display: flex;justify-content: space-around;align-items: center">
                                    @if(Auth::user() && Auth::user()->id != $user->id)
                                        <svg data-id="{{ $user->id }}" id="user-svg" class="user-svg edit-icon icon-svg" width="17px" height="17px"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 106.86 122.88" style="enable-background:new 0 0 106.86 122.88" xml:space="preserve"><style type="text/css">.st0{fill-rule:evenodd;clip-rule:evenodd;}</style><g><path fill="#32CD32" class="st0" d="M39.62,64.58c-1.46,0-2.64-1.41-2.64-3.14c0-1.74,1.18-3.14,2.64-3.14h34.89c1.46,0,2.64,1.41,2.64,3.14 c0,1.74-1.18,3.14-2.64,3.14H39.62L39.62,64.58z M46.77,116.58c1.74,0,3.15,1.41,3.15,3.15c0,1.74-1.41,3.15-3.15,3.15H7.33 c-2.02,0-3.85-0.82-5.18-2.15C0.82,119.4,0,117.57,0,115.55V7.33c0-2.02,0.82-3.85,2.15-5.18C3.48,0.82,5.31,0,7.33,0h90.02 c2.02,0,3.85,0.83,5.18,2.15c1.33,1.33,2.15,3.16,2.15,5.18v50.14c0,1.74-1.41,3.15-3.15,3.15c-1.74,0-3.15-1.41-3.15-3.15V7.33 c0-0.28-0.12-0.54-0.31-0.72c-0.19-0.19-0.44-0.31-0.72-0.31H7.33c-0.28,0-0.54,0.12-0.73,0.3C6.42,6.8,6.3,7.05,6.3,7.33v108.21 c0,0.28,0.12,0.54,0.3,0.72c0.19,0.19,0.45,0.31,0.73,0.31H46.77L46.77,116.58z M98.7,74.34c-0.51-0.49-1.1-0.72-1.78-0.71 c-0.68,0.01-1.26,0.27-1.74,0.78l-3.91,4.07l10.97,10.59l3.95-4.11c0.47-0.48,0.67-1.1,0.66-1.78c-0.01-0.67-0.25-1.28-0.73-1.74 L98.7,74.34L98.7,74.34z M78.21,114.01c-1.45,0.46-2.89,0.94-4.33,1.41c-1.45,0.48-2.89,0.97-4.33,1.45 c-3.41,1.12-5.32,1.74-5.72,1.85c-0.39,0.12-0.16-1.48,0.7-4.81l2.71-10.45l0,0l20.55-21.38l10.96,10.55L78.21,114.01L78.21,114.01 z M39.62,86.95c-1.46,0-2.65-1.43-2.65-3.19c0-1.76,1.19-3.19,2.65-3.19h17.19c1.46,0,2.65,1.43,2.65,3.19 c0,1.76-1.19,3.19-2.65,3.19H39.62L39.62,86.95z M39.62,42.26c-1.46,0-2.64-1.41-2.64-3.14c0-1.74,1.18-3.14,2.64-3.14h34.89 c1.46,0,2.64,1.41,2.64,3.14c0,1.74-1.18,3.14-2.64,3.14H39.62L39.62,42.26z M24.48,79.46c2.06,0,3.72,1.67,3.72,3.72 c0,2.06-1.67,3.72-3.72,3.72c-2.06,0-3.72-1.67-3.72-3.72C20.76,81.13,22.43,79.46,24.48,79.46L24.48,79.46z M24.48,57.44 c2.06,0,3.72,1.67,3.72,3.72c0,2.06-1.67,3.72-3.72,3.72c-2.06,0-3.72-1.67-3.72-3.72C20.76,59.11,22.43,57.44,24.48,57.44 L24.48,57.44z M24.48,35.42c2.06,0,3.72,1.67,3.72,3.72c0,2.06-1.67,3.72-3.72,3.72c-2.06,0-3.72-1.67-3.72-3.72 C20.76,37.08,22.43,35.42,24.48,35.42L24.48,35.42z"/></g></svg>

                                        <form id="delete-user-{{ $user->id }}" action="{{ route('users.delete', ['id' => $user->id]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="delete-btn" style="border: none;background: transparent;" onclick="confirmDelete({{ $user->id }})">
                                                <svg  id="delete-svg" class="delete-icon icon-svg" width="20px" height="20px"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"  viewBox="0 0 122.88 122.879" enable-background="new 0 0 122.88 122.879" xml:space="preserve"><g><path fill="#FF4141" d="M61.44,0c16.96,0,32.328,6.882,43.453,17.986c11.104,11.125,17.986,26.494,17.986,43.453 c0,16.961-6.883,32.328-17.986,43.453C93.769,115.998,78.4,122.879,61.44,122.879c-16.96,0-32.329-6.881-43.454-17.986 C6.882,93.768,0,78.4,0,61.439C0,44.48,6.882,29.111,17.986,17.986C29.112,6.882,44.48,0,61.44,0L61.44,0z M73.452,39.152 c2.75-2.792,7.221-2.805,9.986-0.026c2.764,2.776,2.775,7.292,0.027,10.083L71.4,61.445l12.077,12.25 c2.728,2.77,2.689,7.256-0.081,10.021c-2.772,2.766-7.229,2.758-9.954-0.012L61.445,71.541L49.428,83.729 c-2.75,2.793-7.22,2.805-9.985,0.025c-2.763-2.775-2.776-7.291-0.026-10.082L51.48,61.435l-12.078-12.25 c-2.726-2.769-2.689-7.256,0.082-10.022c2.772-2.765,7.229-2.758,9.954,0.013L61.435,51.34L73.452,39.152L73.452,39.152z M96.899,25.98C87.826,16.907,75.29,11.296,61.44,11.296c-13.851,0-26.387,5.611-35.46,14.685 c-9.073,9.073-14.684,21.609-14.684,35.459s5.611,26.387,14.684,35.459c9.073,9.074,21.609,14.686,35.46,14.686 c13.85,0,26.386-5.611,35.459-14.686c9.073-9.072,14.684-21.609,14.684-35.459S105.973,35.054,96.899,25.98L96.899,25.98z"/></g></svg>

                                            </button>
                                        </form>
                                    @else
                                        <p>You Can't Edit <br>your own <span style="color: #f38181;font-weight: 900">Role</span></p>
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                        </tbody>

                    </table>
                    {{ $users->links() }}
                </div>

            </div>

        </div>
            </div>
        </div>
    </div>

    <div id="popup" class="popup">
        <div class="popup-container">
            <span class="popup-close" id="popup-close">&times;</span>
            <div style="margin-top: 30px">
                <h3 style="font-weight: 900;color: #f38181;font-size: 30px">Edit Profile</h3>
                <p>Update your personal information.</p>
            </div>
            <form id="update-form">
                <input type="hidden" id="user-id">
                <p>
                    <label for="user-name">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path fill="#f38181" d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        Name:
                    </label>
                    <input type="text" id="user-name" disabled>
                </p>
                <p>
                    <label for="user-role">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path fill="#f38181" d="M16 20V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                            <rect width="20" height="14" x="2" y="6" rx="2"></rect>
                        </svg>
                        Role:</label>
                    <select id="user-role">
                        <option class="participant" value="participant">Participant</option>
                        <option class="admin" value="admin">Admin</option>
                        <option class="event_organizer" value="event_organizer">Event Organizer</option>
                    </select>
                </p>
                <p style="text-align: right;margin-top: 60px">
                    <button type="button" id="update-button">Update</button>
                </p>
            </form>
        </div>
    </div>
</x-app-layout>




<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/bootstrap-datepicker.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/rangeslider.min.js"></script>
<!-- Include jsPDF library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.3/jspdf.umd.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.js"></script>

<script src="js/typed.js"></script>

<script>
        $(document).ready(function() {
        $('.user-svg').click(function(event) {
            const userId = $(this).data('id');
            $.ajax({
                url: `/users/${userId}`,
                method: 'GET',
                success: function(data) {
                    $('#user-id').val(data.id);
                    $('#user-name').val(data.name);
                    $('#user-role').val(data.role);
                    $('#popup').css('display', 'block');
                },
                error: function() {
                    Swal.fire({
                        title: 'Error!',
                        text: 'An error occurred while fetching the user data.',
                        icon: 'error',
                        confirmButtonColor: '#f38181',
                        confirmButtonText: 'OK'
                    });
                }
            });
        });

        $('#popup-close').click(function() {
        $('#popup').hide();
    });

        $('#update-button').click(function() {
        const userId = $('#user-id').val();
        const userName = $('#user-name').val();
        const userRole = $('#user-role').val();
        $.ajax({
        url: `/users/${userId}`,
        method: 'PUT',
        data: {
        name: userName,
        role: userRole,
        _token: '{{ csrf_token() }}'
    },
        success: function(data) {
        Swal.fire({
        title: 'Success!',
        text: 'User updated successfully!',
        icon: 'success',
        confirmButtonText: 'OK',
        confirmButtonColor: '#f38181',
        customClass: {
        confirmButton: 'swal-button',
    },
        buttonsStyling: false
    }).then((result) => {
        if (result.isConfirmed) {
        location.reload();
    }
    });
    },
        error: function() {
        Swal.fire({
        title: 'Error!',
        text: 'An error occurred while updating the user.',
        icon: 'error',
        confirmButtonText: 'OK',
        confirmButtonColor: '#f38181'
    });
    }
    });
    });
    });


function confirmDelete(userId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#f38181',
            cancelButtonText: 'Cancel',
            confirmButtonText: 'Yes, delete it!',
            customClass: {
                cancelButton: 'swal-cancel-button'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-user-' + userId).submit();
            }
        });
    }
    document.getElementById("searchInput").addEventListener("input", function() {
        var input, filter, table, tr, td, i, j, txtValue;
        input = this;
        filter = input.value.toUpperCase();
        table = document.getElementsByClassName("transactions-table")[0];
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            if (i === 0) continue;

            var found = false;
            for (j = 0; j < tr[i].getElementsByTagName("td").length; j++) {
                td = tr[i].getElementsByTagName("td")[j];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        found = true;
                        break;
                    }
                }
            }
            if (found) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    });

    function generatePDF() {
        const doc = new jsPDF();
        const table = document.querySelector('.transactions-table');
        const rows = table.querySelectorAll('tr');

        let y = 15; // Initial y position

        // Header row
        const headerRow = rows[0];
        headerRow.querySelectorAll('th').forEach((cell, index) => {
            doc.text(cell.innerText, index * 40 + 10, y);
        });
        y += 10; // Increment y position for next row

        // Data rows
        rows.forEach((row, rowIndex) => {
            if (rowIndex !== 0) { // Skip header row
                let x = 10; // Initial x position
                row.querySelectorAll('td').forEach((cell, cellIndex) => {
                    doc.text(cell.innerText, x, y);
                    x += 40; // Increment x position for next cell
                });
                y += 10; // Increment y position for next row
            }
        });

        doc.save('userList.pdf');
    }


</script>

<script src="js/main.js"></script>

</body>
</html>
