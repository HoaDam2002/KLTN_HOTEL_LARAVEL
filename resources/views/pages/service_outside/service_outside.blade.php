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

            .locale_link {
                width: 35px;
            }

            .flag-button {
                width: 35px;
                /* display: none; */
            }

            .language-switcher {
                display: none;
            }

            .language-switcher.active {
                display: block;
            }

            .dropdown {
                position: absolute;
                z-index: 100;
                display: none;
            }

            .language-switcher:hover .dropdown {
                display: block;
            }

            .account-icon-link {
                text-decoration: none;
                color: #333;
            }

            .account-icon-link i {
                font-size: 40px;
            }

            .account-icon-link img {
                width: 40px;
                border-radius: 50%;
                object-fit: cover;
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



            <!-- ==================== Right Offcanvas Start Here ==================== -->
            <div class="common-offcanvas d-lg-block d-none">
                <div class="flx-between">
                    <a href="/" class="mobile-menu__logo">
                        <img src="{{ asset('assets/customer/images/logo/white-logo.png') }}" alt="Logo">
                    </a>
                    <button type="button" class="close-button d-flex position-relative top-0 end-0"> <i
                            class="las la-times"></i>
                    </button>
                </div>

                <div class="search-box mt-5">
                    <form action="#">
                        <input type="text" class="common-input common-input--light" placeholder="Search...">
                        <button type="submit" class="icon"> <i class="fas fa-search"></i> </button>
                    </form>
                </div>

                <ul class="address-list mt-5">
                    <li class="address-list__item flx-align">
                        <span class="address-list__icon"><i class="fas fa-map-marker-alt"></i></span>
                        <div class="address-list__content">
                            <p class="address-list__text">Burmsille Street, MN 55337, <br> United States</p>
                        </div>
                    </li>
                    <li class="address-list__item flx-align">
                        <span class="address-list__icon"> <i class="fas fa-phone"></i></span>
                        <div class="address-list__content">
                            <a href="tel:" class="address-list__text">+(1) 123 456 7890 </a>
                            <a href="tel:" class="address-list__text">+(1) 098 765 4321 </a>
                        </div>
                    </li>
                    <li class="address-list__item flx-align">
                        <span class="address-list__icon"> <i class="fas fa-envelope"></i></span>
                        <div class="address-list__content">
                            <a href="mailto:" class="address-list__text"> info@driller.com</a>
                            <a href="mailto:" class="address-list__text">info.example@driller.com</a>
                        </div>
                    </li>
                </ul>

                <div class="google-map mt-5">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d1511.2499674845235!2d-73.99553882767792!3d40.75102778252164!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1686536419224!5m2!1sen!2sbd"
                        loading="lazy" class="w-100 h-100"></iframe>
                </div>

                <ul class="social-list">
                    <li class="social-list__item"><a href="https://www.facebook.com"
                            class="social-list__link flx-center"><i class="fab fa-facebook-f"></i></a> </li>
                    <li class="social-list__item"><a href="https://www.twitter.com"
                            class="social-list__link flx-center"> <i class="fab fa-twitter"></i></a></li>
                    <li class="social-list__item"><a href="https://www.linkedin.com"
                            class="social-list__link flx-center"> <i class="fab fa-linkedin-in"></i></a></li>
                    <li class="social-list__item"><a href="https://www.pinterest.com"
                            class="social-list__link flx-center"> <i class="fab fa-instagram"></i></a></li>
                </ul>

            </div>
            <!-- ==================== Right Offcanvas End Here ==================== -->

            <!-- ==================== Header Top Start Here ==================== -->
            <div class="header-top">
                <div class="container container-two">
                    <div class="flx-between">
                        <div class="header-info flx-align">
                            <div class="language-switcher" id="vi-flag">
                                <button class="flag-button"><img
                                        src="{{ asset('assets/customer/images/lang/flag_vi.jpg') }}" /></button>
                                <div id="en-dropdown" class="dropdown">
                                    <a href="{{ route('app.setLocale', ['locale' => 'en']) }}" class="locale_link">
                                        <img src="{{ asset('assets/customer/images/lang/flag_en.jpg') }}" />
                                    </a>
                                </div>
                            </div>
                            <div class="language-switcher active" id="en-flag">
                                <button class="flag-button"><img
                                        src="{{ asset('assets/customer/images/lang/flag_en.jpg') }}" /></button>
                                <div id="vi-dropdown" class="dropdown">
                                    <a href="{{ route('app.setLocale', ['locale' => 'vi']) }}" class="locale_link">
                                        <img src="{{ asset('assets/customer/images/lang/flag_vi.jpg') }}" />
                                    </a>
                                </div>
                            </div>
                            <div class="header-info__item flx-align">
                                <span class="header-info__icon"><i class="fas fa-phone"></i></span>
                                <a href="tel:" class="header-info__text">(629) 555-0129</a>
                            </div>
                            <div class="header-info__item flx-align">
                                <span class="header-info__icon"><i class="fas fa-envelope"></i></span>
                                <a href="mailto:" class="header-info__text">info@example.com</a>
                            </div>
                        </div>
                        <div class="header-info flx-align d-sm-block d-none">
                            <div class="header-info__item flx-align">
                                <span class="header-info__icon"><i class="fas fa-map-marker-alt"></i></span>
                                <span class="header-info__text">6391 Elgin St. Celina, 10299</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ==================== Header Top End Here ==================== -->
            <!-- ==================== Header Start Here ==================== -->
            <header class="header" style="position: relative">
                <div class="container container-two">
                    <nav class="header-inner flx-between">
                        <!-- Logo Start -->
                        <div class="logo">
                            <a href="/outside_service" class="link">
                                <img src="{{ asset('assets/customer/images/logo/z5175648554199_ccc2baf0a7ac356050aa28149405a89d.jpg') }}"
                                    alt="Logo" style="width: 190px; height: 40px; object-fit: contain">
                            </a>
                        </div>
                        <!-- Logo End  -->

                        <!-- Menu Start  -->
                        <div class="header-menu d-lg-block d-none">

                            <h3 style="padding: 15px; margin: 0">Service department</h3>
                        </div>
                        <!-- Menu End  -->

                        <!-- Header Right start -->
                        <div class="header-right flx-align">
                            @if (Auth::check())
                                <button class="btn d-lg-block d-none">
                                    <a href="/dashboard" class="account-icon-link"><i
                                            class="fa-regular fa-circle-user"></i></a>
                                    {{-- <a href="/dashboard" class="account-icon-link"><img
                                    src="{{ asset('assets/customer/images/logo/z5175648554199_ccc2baf0a7ac356050aa28149405a89d.jpg') }}"
                                    alt="account"></a> --}}
                                </button>
                            @else
                                <a href="/login" class="btn btn-outline-light d-lg-block d-none">
                                    {{ __('Sign In') }}
                                    <span class="icon-right text-gradient icon">
                                        <i class="fas fa-arrow-right"></i>
                                    </span>
                                </a>
                            @endif
                            <button type="button" class="toggle-mobileMenu d-lg-none ms-3"> <i
                                    class="las la-bars"></i>
                            </button>

                        </div>
                        <!-- Header Right End  -->
                    </nav>
                </div>
            </header>
            <!-- ==================== Header End Here ==================== -->
            <section class="account padding-y-60">
                <div class="container">
                    <div class="row gy-4">
                        {{-- start menu account customer --}}
                        <div class="col-xl-3 col-lg-4">
                            <div class="account-sidebar search-sidebar">
                                <div class="nav side-tab flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical">
                                    {{-- <a href="/dashboard"
                                        class="nav-link {{ Route::currentRouteName() == 'account_home_customer' ? 'active' : '' }}"
                                        id="home_account" onclick="menu_account_customer(this.id)">
                                        <span class="icon"><i class="fas fa-home"></i></span>{{ __('Home') }}
                                    </a> --}}
                                    <a href="/outside_service"
                                        class="nav-link {{ Route::currentRouteName() == 'home_service' ? 'active' : '' }}"
                                        id="profile_account" onclick="menu_account_customer(this.id)">
                                        <span class="icon"> <i class="fas fa-user"></i></span>
                                        {{ __('Home') }}
                                    </a>
                                    <a href="/outside_service/manation"
                                        class="nav-link {{ Route::currentRouteName() == 'service_manation' ? 'active' : '' }}"
                                        id="my_bookings" onclick="menu_account_customer(this.id)">
                                        <span class="icon"> <i class="fas fa-list"></i></span>
                                        {{ __('Management Service') }}
                                    </a>
                                    <a href="/outside_service/order"
                                        class="nav-link {{ Route::currentRouteName() == 'service_order' ? 'active' : '' }}"
                                        id="acc_payment" onclick="menu_account_customer(this.id)">
                                        <span class="icon">
                                            <i class="fas fa-money-check"></i></span>
                                        {{ __('List Order Service') }}
                                    </a>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="nav-link" id=""
                                            onclick="menu_account_customer(this.id)"><span class="icon">
                                                <i class="fas fa-sign-out-alt"></i></span>
                                            {{ __('Logout') }}</a></button>
                                    </form>

                                </div>
                            </div>
                        </div>
                        {{-- end menu accout customer --}}

                        {{-- start menu account receptionist --}}
                        @yield('content')


                    </div>
                </div>
            </section>

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

        @yield('js')
    </body>

</html>
