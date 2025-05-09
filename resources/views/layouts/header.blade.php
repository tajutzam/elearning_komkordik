<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="{{ asset('/') }}favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/') }}favicon.ico" />
    <title>Elearning | KOMKORDIK</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('/') }}assets/js/require.min.js"></script>
    <script>
        requirejs.config({
            baseUrl: '/'
        });
    </script>
    <!-- Dashboard Core -->
    <link href="{{ asset('/') }}assets/css/dashboard.css" rel="stylesheet" />
    <script src="{{ asset('/') }}assets/js/dashboard.js"></script>
    <!-- c3.js Charts Plugin -->
    <link href="{{ asset('/') }}assets/plugins/charts-c3/plugin.css" rel="stylesheet" />
    <script src="{{ asset('/') }}assets/plugins/charts-c3/plugin.js"></script>
    <!-- Google Maps Plugin -->
    <link href="{{ asset('/') }}assets/plugins/maps-google/plugin.css" rel="stylesheet" />
    <script src="{{ asset('/') }}assets/plugins/maps-google/plugin.js"></script>
    <!-- Input Mask Plugin -->
    <script src="{{ asset('/') }}assets/plugins/input-mask/plugin.js"></script>
    {{-- toast plugins --}}
    <link href="https://cdn.jsdelivr.net/npm/jquery-toast-plugin@1.3.2/dist/jquery.toast.min.css" rel="stylesheet">

</head>

<body class="">
    <div class="page">
        <div class="page-main">
            <div class="header py-4">
                <div class="container">
                    <div class="d-flex">
                        <a class="header-brand" href="{{ asset('/') }}index.html">
                            <img src="{{ asset('/') }}logo.png" class="header-brand-img" alt="tabler logo">
                            RSPPN
                        </a>
                        <div class="d-flex order-lg-2 ml-auto">
                            <div class="dropdown d-none d-md-flex">
                            </div>
                            <div class="dropdown">
                                <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                                    <span class="avatar"
                                        style="background-image: url({{ asset('/') }}default-ava.jpg)"></span>
                                    <span class="ml-2 d-none d-lg-block">
                                        <span class="text-default">{{ auth()->user()->name }}</span>
                                        <small class="text-muted d-block mt-1">{{ auth()->user()->role }}</small>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item" href="#">
                                        <i class="dropdown-icon fe fe-user"></i> Profile
                                    </a>
                                    <a class="dropdown-item" href="/logout">
                                        <i class="dropdown-icon fe fe-log-out"></i> Sign out
                                    </a>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse"
                            data-target="#headerMenuCollapse">
                            <span class="header-toggler-icon"></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 ml-auto">

                        </div>
                        @auth
                            @if (auth()->user()->role == 'admin')
                                @include('layouts.navbar-admin')
                            @else
                                @include('layouts.navbar-mahasiswa')
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
