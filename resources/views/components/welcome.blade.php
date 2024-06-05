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

        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }

    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>


<x-app-layout>
    <div  style="margin-top: 3rem">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="text-align: center;font-size: 50px;">
            {{ __('Dashboard') }}
        </h2>
    </div>


    <div class="container">
        <div class="row" style="display: flex;justify-content: space-around">
            <div class="col-md-5" style="background: #fff;border-radius: 7px;padding: 15px;margin: 5px">
                <h3>Users</h3>
                <canvas id="usersChart" width="400" height="200"></canvas>
            </div>
            <div class="col-md-5" style="background: #fff;border-radius: 7px;padding: 15px;margin: 5px">
                <h3>Events</h3>
                <canvas id="eventsChart" width="400" height="200"></canvas>
            </div>
            <div class="col-md-10" style="background: #fff;border-radius: 7px;padding: 15px;margin: 5px 5px 5px 10px">
                <h3>Orders</h3>
                <canvas id="ordersChart" width="400" height="200"></canvas>
            </div>
        </div>
    </div>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Users Chart
            const usersCtx = document.getElementById('usersChart').getContext('2d');
            const usersChart = new Chart(usersCtx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($usersPerDay->keys()) !!},
                    datasets: [{
                        label: 'Users',
                        data: {!! json_encode($usersPerDay->values()) !!},
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Events Chart
            const eventsCtx = document.getElementById('eventsChart').getContext('2d');
            const eventsChart = new Chart(eventsCtx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($eventsPerDay->keys()) !!},
                    datasets: [{
                        label: 'Events',
                        data: {!! json_encode($eventsPerDay->values()) !!},
                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Orders Chart
            const ordersCtx = document.getElementById('ordersChart').getContext('2d');
            const ordersChart = new Chart(ordersCtx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($ordersPerDay->keys()) !!},
                    datasets: [{
                        label: 'Orders',
                        data: {!! json_encode($ordersPerDay->values()) !!},
                        backgroundColor: 'rgba(255, 159, 64, 0.2)',
                        borderColor: 'rgba(255, 159, 64, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>

</x-app-layout>

