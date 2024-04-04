<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
        <title>DANA Hotel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


        <!-- Favicon -->
        <link rel="shortcut icon"
            href="{{ asset('assets/customer/images/logo/z5175648554199_ccc2baf0a7ac356050aa28149405a89d.jpg') }}">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="{{ asset('assets/customer/css/bootstrap.min.css') }}">
        <!-- Fontawesome -->
        <link rel="stylesheet" href="{{ asset('assets/customer/css/fontawesome-all.min.css') }}">
        <!-- Magnific popup css -->
        <link rel="stylesheet" href="{{ asset('assets/customer/css/magnific-popup.css.css') }}">
        <!-- Slick -->
        <link rel="stylesheet" href="{{ asset('assets/customer/css/slick.css') }}">
        <!-- line awesome -->
        <link rel="stylesheet" href="{{ asset('assets/customer/css/line-awesome.min.css') }}">
        <!-- Image Uploader -->
        <link rel="stylesheet" href="{{ asset('assets/customer/css/image-uploader.min.css') }}">
        <!-- jQuery Ui Css -->
        <link rel="stylesheet" href="{{ asset('assets/customer/css/jquery-ui.css') }}">
        <!-- Main css -->
        <link rel="stylesheet" href="{{ asset('assets/customer/css/main.css') }}">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css"
            href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>

 <!-- Jquery js -->
 <script src="{{ asset('assets/customer/js/jquery-3.7.1.min.js') }}"></script>

 <!-- Bootstrap Bundle Js -->
 <script src="{{ asset('assets/customer/js/boostrap.bundle.min.js') }}"></script>
 <!-- Magnific Popup -->
 <script src="{{ asset('assets/customer/js/magnific-popup.min.js') }}"></script>
 <!-- Slick js -->
 <script src="{{ asset('assets/customer/js/slick.min.js') }}"></script>
 <!-- Counter Up Js -->
 <script src="{{ asset('assets/customer/js/counterup.min.js') }}"></script>
 <!-- Marquee text slider -->
 <script src="{{ asset('assets/customer/js/jquery.marquee.min.js') }}"></script>
 <!-- Image Uploader -->
 <script src="{{ asset('assets/customer/js/image-uploader.min.js') }}"></script>
 <!-- jQuery Ui Css -->
 <script src="{{ asset('assets/customer/js/jquery-ui.min.js') }}"></script>

 <!-- main js -->
 <script src="{{ asset('assets/customer/js/main.js') }}"></script>

 <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
 <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
 <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

