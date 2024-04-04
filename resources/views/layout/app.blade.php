<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>DANA Hotel</title>

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

        <style>
            * {
                font-family: "Poppins", sans-serif;
            }
        </style>


        @yield('css')
    </head>

    <body>
        <!--==================== Preloader Start ====================-->
        <div class="preloader">
            <div class="loader"></div>
        </div>
        <!--==================== Preloader End ====================-->

        <!--==================== Overlay Start ====================-->
        <div class="overlay"></div>
        <!--==================== Overlay End ====================-->

        <!--==================== Sidebar Overlay End ====================-->
        <div class="side-overlay"></div>
        <!--==================== Sidebar Overlay End ====================-->

        <!-- ==================== Scroll to Top End Here ==================== -->
        <div class="progress-wrap">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>

        <main class="body-bg">
            @php
                $name_page = Route::currentRouteName();
            @endphp

            @switch($name_page)
                @case('food_service')
                    @include('layout.header_food_service')
                @break

                @case('outside_service')
                    @include('layout.header_outside_service')
                @break

                @case('verify_email')
                @break

                @default
                    @include('layout.header')
            @endswitch



            {{-- start banner --}}
            @if ($name_page == 'home_customer')
                @include('layout.banner')
            @endif
            {{-- end banner --}}


            @yield('content')

            @if ($name_page != 'verify_email')
                @include('layout.footer')
            @endif
        </main>


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

        <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                let lang = "{{ App::getLocale() }}";
                if (lang) {
                    if (lang == 'en') {
                        document.getElementById('en-flag').classList.add('active');
                        document.getElementById('vi-flag').classList.remove('active');
                    } else if (lang == 'vi') {
                        document.getElementById('vi-flag').classList.add('active');
                        document.getElementById('en-flag').classList.remove('active');
                    }
                }
            })
        </script>
        @yield('js')
    </body>

</html>
