@include('functions')
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
            {{ __('events List') }}
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

                                    <svg width="19px" height="19px" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 115.28 122.88" style="enable-background:new 0 0 115.28 122.88" xml:space="preserve"><style type="text/css">.st0{fill-rule:evenodd;clip-rule:evenodd;}</style><g><path fill="#fff" class="st0" d="M25.38,57h64.88V37.34H69.59c-2.17,0-5.19-1.17-6.62-2.6c-1.43-1.43-2.3-4.01-2.3-6.17V7.64l0,0H8.15 c-0.18,0-0.32,0.09-0.41,0.18C7.59,7.92,7.55,8.05,7.55,8.24v106.45c0,0.14,0.09,0.32,0.18,0.41c0.09,0.14,0.28,0.18,0.41,0.18 c22.78,0,58.09,0,81.51,0c0.18,0,0.17-0.09,0.27-0.18c0.14-0.09,0.33-0.28,0.33-0.41v-11.16H25.38c-4.14,0-7.56-3.4-7.56-7.56 V64.55C17.82,60.4,21.22,57,25.38,57L25.38,57z M29.5,67.4h13.19c2.87,0,5.02,0.68,6.46,2.05c1.43,1.37,2.14,3.31,2.14,5.84 c0,2.59-0.78,4.62-2.34,6.08c-1.56,1.46-3.94,2.19-7.14,2.19h-4.35v9.49H29.5V67.4L29.5,67.4z M37.45,78.37h1.95 c1.54,0,2.62-0.27,3.24-0.8c0.62-0.53,0.93-1.21,0.93-2.04c0-0.81-0.27-1.49-0.81-2.05c-0.54-0.56-1.55-0.84-3.05-0.84h-2.27V78.37 L37.45,78.37z M54.99,67.4h11.78c2.32,0,4.2,0.32,5.63,0.94c1.43,0.63,2.61,1.53,3.55,2.71c0.93,1.18,1.61,2.55,2.02,4.11 c0.42,1.56,0.63,3.22,0.63,4.97c0,2.74-0.31,4.87-0.94,6.38c-0.62,1.51-1.49,2.78-2.6,3.8c-1.11,1.02-2.3,1.7-3.57,2.04 c-1.74,0.47-3.31,0.7-4.72,0.7H54.99V67.4L54.99,67.4z M62.9,73.21v14.01h1.95c1.66,0,2.84-0.19,3.55-0.55 c0.7-0.37,1.25-1.01,1.65-1.92c0.4-0.92,0.6-2.4,0.6-4.45c0-2.72-0.44-4.57-1.33-5.58c-0.89-1-2.36-1.5-4.42-1.5H62.9L62.9,73.21z M82.25,67.4h19.6v5.52H90.21v4.48h9.96v5.2h-9.96v10.46h-7.95V67.4L82.25,67.4z M97.79,57h9.93c4.16,0,7.56,3.41,7.56,7.56v31.42 c0,4.15-3.41,7.56-7.56,7.56h-9.93v13.55c0,1.61-0.65,3.04-1.7,4.1c-1.06,1.06-2.49,1.7-4.1,1.7c-29.44,0-56.59,0-86.18,0 c-1.61,0-3.04-0.64-4.1-1.7c-1.06-1.06-1.7-2.49-1.7-4.1V5.85c0-1.61,0.65-3.04,1.7-4.1c1.06-1.06,2.53-1.7,4.1-1.7h58.72 C64.66,0,64.8,0,64.94,0c0.64,0,1.29,0.28,1.75,0.69h0.09c0.09,0.05,0.14,0.09,0.23,0.18l29.99,30.36c0.51,0.51,0.88,1.2,0.88,1.98 c0,0.23-0.05,0.41-0.09,0.65V57L97.79,57z M67.52,27.97V8.94l21.43,21.7H70.19c-0.74,0-1.38-0.32-1.89-0.78 C67.84,29.4,67.52,28.71,67.52,27.97L67.52,27.97z"/></g></svg>
                                    Download
                                </button>
                            </div>

                            <table class="transactions-table" style="width: 100%;line-height: 2.7rem">
                                <thead style="border-bottom: 1px solid #0000005c;">
                                <tr>
                                    <th style="text-transform: uppercase;text-align: center">ID</th>
                                    <th style="text-transform: uppercase;text-align: center">Organized By</th>
                                    <th style="text-transform: uppercase;text-align: center">title</th>
                                    <th style="text-transform: uppercase;text-align: center">description</th>
                                    <th style="text-transform: uppercase;text-align: center">Category</th>
                                    <th style="text-transform: uppercase;text-align: center">venue</th>
                                    <th style="text-transform: uppercase;text-align: center">Start and End</th>
                                    <th style="text-transform: uppercase;text-align: center">Show Tickets</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($events as $event)
                                    <tr>
                                        <td style="text-align: center" class="id">{{ $event->id }}</td>
                                        <td style="text-align: center">{{ $event->creator->name }} </td>
                                        <td style="text-align: center">{{ $event->title }} </td>
                                        <td style="text-align: center">{{wrapDescription($event->description ,19) }}</td>
                                        <td style="color: #f38181;font-weight: 600;text-align: center">{{ $event->category->name}}</td>
                                        <td style="text-align: center">{{ $event->venue }}</td>
                                        <td style="text-align: center">{{ date('d-M-Y',strtotime($event->start_datetime)) }}
                                            <br>
                                            {{ date('d-M-Y',strtotime($event->end_datetime)) }}
                                        </td>
                                        <td>
                                            <div style="display: flex;font-weight: 600;color: #f38181;align-items: center">
                                                Send Message
                                                <svg width="17px" height="17px"  id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"  viewBox="0 0 111.686 122.879" enable-background="new 0 0 111.686 122.879" xml:space="preserve"><g><path fill="#f38181" d="M83.896,5.08H27.789c-12.491,0-22.709,10.219-22.709,22.71v40.079c0,12.489,10.22,22.71,22.709,22.71h17.643 c-2.524,9.986-5.581,18.959-14.92,27.241c17.857-4.567,31.642-13.8,41.759-27.241h3.051c12.488,0,31.285-10.219,31.285-22.71V27.79 C106.605,15.299,96.387,5.08,83.896,5.08L83.896,5.08z M81.129,41.069c-4.551,0-8.24,3.691-8.24,8.242s3.689,8.242,8.24,8.242 c4.553,0,8.242-3.691,8.242-8.242S85.682,41.069,81.129,41.069L81.129,41.069z M30.556,41.069c-4.552,0-8.242,3.691-8.242,8.242 s3.69,8.242,8.242,8.242c4.551,0,8.242-3.691,8.242-8.242S35.107,41.069,30.556,41.069L30.556,41.069z M55.843,41.069 c-4.551,0-8.242,3.691-8.242,8.242s3.691,8.242,8.242,8.242c4.552,0,8.241-3.691,8.241-8.242S60.395,41.069,55.843,41.069 L55.843,41.069z M27.789,0h56.108h0.006v0.02c7.658,0.002,14.604,3.119,19.623,8.139l-0.01,0.01 c5.027,5.033,8.148,11.977,8.15,19.618h0.02v0.003h-0.02v40.079h0.02v0.004h-0.02c-0.004,8.17-5.68,15.289-13.24,20.261 c-7.041,4.629-15.932,7.504-23.104,7.505v0.021H75.32v-0.021h-0.576c-5.064,6.309-10.941,11.694-17.674,16.115 c-7.443,4.888-15.864,8.571-25.31,10.987l-0.004-0.016c-1.778,0.45-3.737-0.085-5.036-1.552c-1.852-2.093-1.656-5.292,0.437-7.144 c4.118-3.651,6.849-7.451,8.826-11.434c1.101-2.219,1.986-4.534,2.755-6.938h-10.95h-0.007v-0.021 c-7.656-0.002-14.602-3.119-19.622-8.139C3.138,82.478,0.021,75.53,0.02,67.871H0v-0.003h0.02V27.79H0v-0.007h0.02 C0.021,20.282,3.023,13.46,7.878,8.464C7.967,8.36,8.059,8.258,8.157,8.16c5.021-5.021,11.968-8.14,19.628-8.141V0H27.789L27.789,0 z"/></g></svg>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            {{ $events->links() }}
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




</script>

<script src="js/main.js"></script>

</body>
</html>
