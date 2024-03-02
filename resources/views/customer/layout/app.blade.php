<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
        @include('customer.layout.header')

        {{-- start banner --}}
        @php
            $name_page = Route::currentRouteName();
        @endphp
        @if ($name_page == 'home_customer')
            @include('customer.layout.banner')
        @endif
        {{-- end banner --}}


        @yield('content')


        @include('customer.layout.footer')
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

    @yield('js');
</body>

</html>
