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
            background-color: #fff;
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
            color: #f38181;
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

    <a href="/" class="col-2">
        <div style="width: 65px;height: 65px">
            <img style="width: 100%;height: 100%" src="/images/logoMonTicket.png" alt="">
        </div>
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
                            <a href="#" style="color:#f38181">
                                    <span>
                                        {{ Auth::user()->name }}


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


