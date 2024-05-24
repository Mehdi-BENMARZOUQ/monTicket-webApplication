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

    <link rel="stylesheet" href="../../fonts/icomoon/style.css">

    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/magnific-popup.css">
    <link rel="stylesheet" href="../../css/jquery-ui.css">
    <link rel="stylesheet" href="../../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../../css/owl.theme.default.min.css">

    <link rel="stylesheet" href="../../css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="../../fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="../../css/aos.css">
    <link rel="stylesheet" href="../../css/rangeslider.css">

    <link rel="stylesheet" href="../../css/style.css">
    <style>
        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #f38181;
            padding: 1rem 2rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .logo {
            width: 2rem;
            height: 2rem;
            fill: #fff;
            cursor: pointer;
        }

        .links {
            display: flex;
            align-items: center;
            color: #fff;
        }

        .links a {
            margin-right: 1rem;
            text-decoration: none;
            color: inherit;
        }

        .links a:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>
<header class="site-navbar" role="banner" style="position: unset;padding:0 80px;">

    <a href="#" class="logo">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="m8 3 4 8 5-5 5 15H2L8 3z" fill="#fff"/>
        </svg>
    </a>
    <div class="links">
        @guest
            <div class="mb-0">
                <a href="{{ route('login') }}" class="text-white h5 mb-0 login-link">Login</a>
            </div>
        @else
            <div class="mb-0">
                <nav class="site-navigation position-relative text-right" role="navigation">
                    <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                        <li class="has-children">
                            <a href="about.html">
                                    <span>
                                        {{ Auth::user()->name }}


                                    <svg width="17px" height="17px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.88 66.91" style="position: relative;top: -1px" xml:space="preserve"><g><path fill="#fff" d="M11.68,1.95C8.95-0.7,4.6-0.64,1.95,2.08c-2.65,2.72-2.59,7.08,0.13,9.73l54.79,53.13l4.8-4.93l-4.8,4.95 c2.74,2.65,7.1,2.58,9.75-0.15c0.08-0.08,0.15-0.16,0.22-0.24l53.95-52.76c2.73-2.65,2.79-7.01,0.14-9.73 c-2.65-2.72-7.01-2.79-9.73-0.13L61.65,50.41L11.68,1.95L11.68,1.95z"/></g></svg>
                                    </span></a>
                            <ul class="dropdown ">
                                <li><a class="" href="/user/profile">{{ __('Profile') }}</a></li>
                                <li><a class="" href="#">My Events</a></li>
                                <li><form method="POST" action="{{ route('logout') }}" class="dropdown-item p-0 m-0">
                                        @csrf
                                        <button type="submit" class="btn btn-link w-100 text-left px-3 py-2">
                                            {{ __('Log Out') }}
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        @endguest
    </div>
</header>


