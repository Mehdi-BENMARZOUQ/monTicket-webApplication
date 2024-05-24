<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Free-Template.co" />

    <link rel="shortcut icon" href="images/logoMonTicket.png">{{--Logo--}}

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

</head>
<body>

<div class="site-wrap">


    <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar" role="banner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-11 col-xl-2">
                    <h1 class="mb-0 site-logo">
                        <a href="/" class="text-white h2 mb-0">
                            <div style="width: 100px;height: 100px">
                                <img style="width: 100%;height: 100%" src="/images/logoMonTicket.png" alt="">
                            </div>
                        </a>
                    </h1>
                </div>
                <div class="col-12 col-md-8 d-none d-xl-block">
                    <nav class="site-navigation position-relative text-right" role="navigation">
                        <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                            <li class="active"><a href="index.html"><span>Home</span></a></li>
                            <li><a href="{{route('events.create')}}">
                                    <span>
                                    <svg style="position: relative;top: -1px" width="16px" height="16px" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"  viewBox="0 0 122.875 122.648" enable-background="new 0 0 122.875 122.648" xml:space="preserve"><g><path fill="#fff" fill-rule="evenodd" clip-rule="evenodd" d="M108.993,47.079c7.683-0.059,13.898,6.12,13.882,13.805 c-0.018,7.683-6.26,13.959-13.942,14.019L75.24,75.138l-0.235,33.73c-0.063,7.619-6.338,13.789-14.014,13.78 c-7.678-0.01-13.848-6.197-13.785-13.818l0.233-33.497l-33.558,0.235C6.2,75.628-0.016,69.448,0,61.764 c0.018-7.683,6.261-13.959,13.943-14.018l33.692-0.236l0.236-33.73C47.935,6.161,54.209-0.009,61.885,0 c7.678,0.009,13.848,6.197,13.784,13.818l-0.233,33.497L108.993,47.079L108.993,47.079z"/></g></svg>
                                        Create Event
                                    </span>
                                </a></li>
                            <li><a href="about.html">
                                    <span>
                                    <svg width="16px" height="16px" style="position: relative;top: -1px" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.88 107.68" xml:space="preserve"><g><path fill="#fff" d="M61.43,13.53C66.76,7.51,72.8,3.69,78.96,1.69c6.48-2.1,13.07-2.15,19.09-0.6c6.05,1.55,11.52,4.72,15.74,9.03 c5.58,5.7,9.09,13.36,9.09,22.02c0,13.7-6.6,26.75-17.42,39.37c-10.14,11.83-24.05,23.35-39.61,34.73 c-2.58,1.89-5.98,1.88-8.5,0.22l0,0.01l-0.03-0.02l0,0.01l-0.02-0.01l-0.21-0.15c-4.46-2.92-8.75-5.91-12.8-8.94 c-4.05-3.03-8.01-6.22-11.83-9.56C12.58,70.42,0,51.4,0,32.13c0-8.8,3.44-16.44,8.93-22.08c4.25-4.37,9.73-7.51,15.79-9.03V1.02 c5.99-1.5,12.57-1.4,19.05,0.69C49.99,3.71,56.09,7.54,61.43,13.53L61.43,13.53L61.43,13.53z M83.51,15.87 C78.02,17.65,72.51,22.02,68,29.78c-0.63,1.19-1.6,2.21-2.85,2.93c-3.56,2.05-8.11,0.82-10.15-2.74 c-4.5-7.82-10.14-12.27-15.78-14.08c-3.71-1.19-7.46-1.25-10.88-0.4l0,0l-0.02,0c-3.35,0.83-6.37,2.56-8.7,4.95 c-2.87,2.95-4.67,7-4.67,11.7c0,14.53,10.59,29.82,27.3,44.43c3.28,2.87,6.95,5.82,10.95,8.81c2.61,1.96,5.35,3.92,8.04,5.74 c13.03-9.76,24.53-19.53,32.9-29.3c8.58-10,13.8-19.92,13.8-29.68c0-4.55-1.84-8.58-4.76-11.57c-2.38-2.42-5.43-4.2-8.8-5.06 C90.98,14.63,87.23,14.67,83.51,15.87L83.51,15.87L83.51,15.87z"/></g></svg>
                                        Likes
                                    </span></a></li>
                            <li><a href="blog.html">
                                    <span>
                                    <svg width="20px" height="20px" style="position: relative;top: -1px" xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 492.05"><path fill="#fff" d="M48.36 320.24 340.19 28.4l.46-.31c1.91-1.83 4.11-3.24 6.43-4.19 5.1-2.09 10.87-2.08 15.98 0a20.7 20.7 0 0 1 6.74 4.5l38.33 38.33a7.412 7.412 0 0 1 2.13 4.63c.15 1.69-.25 3.48-1.22 4.98-2.24 3.44-3.86 7.2-4.78 11.06-6.25 25.91 17.07 48.94 42.53 42.83 3.78-.9 7.49-2.47 10.86-4.64a7.597 7.597 0 0 1 5.07-1.48c1.78.13 3.53.88 4.87 2.22l38.34 38.34c1.98 1.98 3.49 4.28 4.49 6.73a21.32 21.32 0 0 1 1.58 8 21.32 21.32 0 0 1-1.58 8c-1 2.44-2.51 4.75-4.49 6.73L214.09 485.97a20.685 20.685 0 0 1-6.73 4.49 20.946 20.946 0 0 1-8 1.59c-2.71 0-5.44-.53-8-1.59-2.46-1-4.76-2.52-6.74-4.49l-38.61-38.61c-1.19-1.18-1.92-2.79-2.1-4.45-.18-1.61.14-3.34 1.01-4.82 2.12-3.37 3.59-7.04 4.4-10.81 5.39-24.77-16.55-47.47-41.85-42.2-3.75.79-7.42 2.2-10.81 4.19a8.134 8.134 0 0 1-5.03 1.23 7.505 7.505 0 0 1-4.66-2.18L48.36 349.7a20.493 20.493 0 0 1-4.5-6.74 21.15 21.15 0 0 1-1.58-7.99c0-2.7.53-5.42 1.58-7.99a20.7 20.7 0 0 1 4.5-6.74zM324.92 26.26l-10.27 10.41-20.59-20.58c-1.52-1.52-3.99-1.96-5.96-1.16-.62.26-1.22.66-1.73 1.16l-36.32 36.32c.48.31.96.68 1.43 1.15l10.4 10.4c.28.28.48.52.7.81 5.37 7.51-4.83 15.87-11.1 9.59l-10.42-10.4c-.27-.27-.46-.53-.7-.82l-.42-.63L62.49 239.98c.69.35 1.34.82 1.97 1.45l10.4 10.41c.28.28.49.53.71.81 5.37 7.52-4.83 15.88-11.11 9.6-2.77-2.79-10.22-9.2-11.83-12.42l-36.54 36.55-.58.35c-1.14 1.52-1.44 3.7-.71 5.47.24.63.65 1.22 1.15 1.72l13.46 13.46-3.91 16.65-19.69-19.7a19.47 19.47 0 0 1-4.31-6.46c-2-4.87-1.99-10.43 0-15.3a19.51 19.51 0 0 1 4.31-6.47L276.1 5.82l.44-.3c1.83-1.76 3.93-3.11 6.16-4.02 4.89-2 10.42-2 15.31 0 2.34.96 4.55 2.41 6.45 4.31l20.46 20.45zm119.87 203.97c.61.6 1.24 1.07 1.89 1.42L251.77 426.56l-.32-.49c-.24-.3-.46-.57-.74-.85l-10.85-10.86c-6.56-6.55-17.19 2.18-11.6 10.01.24.3.45.57.73.85l10.87 10.85c.42.43.86.79 1.31 1.09l-37.94 37.94c-.54.53-1.16.95-1.8 1.21-.7.28-1.46.43-2.22.43-.71 0-1.49-.16-2.21-.46-.66-.26-1.3-.66-1.79-1.18l-34.59-34.58a51.6 51.6 0 0 0 3.83-12.69c5.6-33.97-23.73-63.91-58.24-58.22-4.34.7-8.61 2-12.68 3.82l-34.59-34.59c-.53-.54-.95-1.15-1.2-1.81-.28-.66-.42-1.42-.42-2.21 0-1.2.4-2.47 1.17-3.49l.59-.37 38.13-38.13c.21.41.45.83.75 1.24.24.31.45.57.74.85l10.86 10.86c6.55 6.56 17.19-2.17 11.59-10.01-.23-.3-.45-.56-.73-.85l-10.86-10.86a8.604 8.604 0 0 0-2.06-1.52L302.47 87.57l.44.65c.24.3.45.57.73.85l10.86 10.86c6.55 6.55 17.19-2.18 11.59-10.01-.24-.3-.45-.56-.74-.85L314.5 78.22c-.48-.48-.98-.87-1.49-1.19l37.91-37.91c.52-.52 1.15-.94 1.8-1.21 2.06-.84 4.64-.37 6.22 1.21l34.27 34.28a50.213 50.213 0 0 0-4.3 12.79c-6.79 35.35 24.22 65.79 59.1 59.08 4.39-.84 8.71-2.29 12.79-4.3l34.27 34.27a5.3 5.3 0 0 1 1.2 1.81c.27.67.41 1.43.41 2.21 0 1.41-.54 2.94-1.62 4.02l-38.01 38.01c-.19-.36-.41-.71-.66-1.07-.24-.3-.45-.57-.74-.85l-10.86-10.86c-6.55-6.55-17.18 2.17-11.59 10.01.24.3.46.56.74.85l10.85 10.86zm-130.4-83.78 75.13 75.16c4.65 4.9 6.99 11.22 6.99 17.51 0 6.52-2.48 13.05-7.42 17.98L277.13 369.06c-4.93 4.94-11.47 7.42-17.97 7.42-6.52 0-13.05-2.48-17.98-7.42l-74.7-74.7c-4.94-4.93-7.42-11.46-7.42-17.98 0-6.48 2.48-13 7.42-17.95l111.96-111.99c4.95-4.95 11.47-7.42 17.98-7.42 6.51.03 13.05 2.51 17.97 7.43zm64.24 85.16-74.7-74.69a10.624 10.624 0 0 0-7.51-3.13c-2.73.03-5.46 1.06-7.52 3.12L176.94 268.87c-2.05 2.04-3.08 4.77-3.08 7.51 0 2.73 1.03 5.47 3.08 7.52l74.7 74.7c2.05 2.05 4.79 3.08 7.52 3.08 2.73 0 5.46-1.03 7.51-3.08l111.96-111.96c2.05-2.05 3.08-4.79 3.08-7.52 0-2.61-.94-5.23-2.8-7.25l-.28-.26zm-171.35 171.9c6.55 6.55 17.19-2.18 11.6-10.01-.25-.31-.46-.57-.74-.85l-10.86-10.87c-6.55-6.55-17.19 2.18-11.59 10.02.23.3.45.56.73.85l10.86 10.86zm-32.57-32.58c6.55 6.56 17.19-2.17 11.59-10.01-.24-.3-.45-.56-.74-.85l-10.85-10.86c-6.55-6.55-17.19 2.18-11.6 10.01.24.3.45.57.74.85l10.86 10.86zm-32.58-32.57c6.55 6.55 17.19-2.18 11.6-10.01-.24-.31-.45-.57-.73-.85l-10.87-10.87c-6.55-6.55-17.19 2.18-11.59 10.02.24.3.45.56.73.85l10.86 10.86zm270.09-140.71c6.56 6.56 17.19-2.17 11.6-10-.25-.31-.46-.57-.74-.85l-10.86-10.87c-6.56-6.55-17.19 2.18-11.6 10.01.25.3.46.57.75.85l10.85 10.86zm-32.57-32.57c6.55 6.55 17.19-2.18 11.59-10.01-.24-.3-.45-.56-.74-.85l-10.85-10.85c-6.56-6.56-17.19 2.17-11.6 10 .25.3.46.56.74.85l10.86 10.86zm-32.57-32.57c6.55 6.55 17.18-2.18 11.59-10.01-.25-.31-.46-.57-.74-.85l-10.85-10.86c-6.56-6.56-17.19 2.18-11.6 10 .24.31.45.57.74.85l10.86 10.87z"/></svg>
                                        Ticket
                                    </span></a></li>
                            <li><a href="contact.html">
                                    <span>

                                        <svg width="20px" height="20px" style="position: relative;top: -1px" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 84.65 122.88"  xml:space="preserve"><style type="text/css">.st0{fill-rule:evenodd;clip-rule:evenodd;}</style><g><path fill="#fff" class="st0" d="M34.96,0C52.49,41.94-1.6,42.08,0.04,85.44c1.11,29.32,21.19,40.03,41.5,36.92c-0.59-0.43-1.18-0.9-1.75-1.37 c-6.24-5.22-9.35-11.89-9.35-20.71c0-17.59,17.09-14.11,10.15-33.31l0.08,0.03l-0.02-0.03c1.6,1.02,3.01,2.04,4.25,3.09 c6.98,5.89,11.31,16.22,8.69,26.06c-3.07,11.47-14.68,11.23-10.17,25.92c20.41-3.97,40.47-21.74,41.23-48.49 c-1.87-17.91-17.73-22.85-9.22-41.86c-10.91,0.71-13.54,6.57-13.51,19.47C63.26,67.73,35.3,65.26,49.95,45 C62.55,27.59,50.16,9.69,34.96,0L34.96,0L34.96,0z"/></g></svg>
                                        On Fire
                                    </span>
                                </a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-11 col-xl-2">
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


                                    </span></a>
                                    <ul class="dropdown ">
                                        @if( Auth::user()->role === 'admin' )
                                        <li><a class="" href="{{route('dashboard')}}">Dashboard</a></li>
                                        @endif
                                        <li><a class="" href="/events/manage">Manage my events</a></li>
                                        <li><a class="" href="/user/profile">{{ __('Profile') }}</a></li>
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


                <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;">
                    <a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a>
                </div>
            </div>
        </div>
    </header>

