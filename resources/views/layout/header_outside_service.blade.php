<style>
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

<!-- ==================== Mobile Menu Start Here ==================== -->
<div class="mobile-menu d-lg-none d-block">
    <button type="button" class="close-button"> <i class="las la-times"></i> </button>
    <div class="mobile-menu__inner">
        <a href="index.html" class="mobile-menu__logo">
            <img src="{{ asset('assets/customer/images/logo/logo.png') }}" alt="Logo">
        </a>
        <div class="mobile-menu__menu">
            <ul class="nav-menu flx-align nav-menu--mobile">
                <li class="nav-menu__item">
                    <a href="/" class="nav-menu__link">{{ __('Home') }}</a>
                </li>
                <li class="nav-menu__item has-submenu">
                    <a href="javascript:void(0)" class="nav-menu__link">{{ __('Pages') }}</a>
                    <ul class="nav-submenu">
                        <li class="nav-submenu__item">
                            <a href="property.html" class="nav-submenu__link">{{ __('Rooms') }}</a>
                        </li>
                        <li class="nav-submenu__item">
                            <a href="/room-detail" class="nav-submenu__link">{{ __('Room Details') }}</a>
                        </li>
                        <li class="nav-submenu__item">
                            <a href="add-listing.html" class="nav-submenu__link"> {{ __('Add New Listing') }}</a>
                        </li>
                        <li class="nav-submenu__item">
                            <a href="map-location.html" class="nav-submenu__link"> {{ __('Map Location') }}</a>
                        </li>
                        <li class="nav-submenu__item">
                            <a href="about.html" class="nav-submenu__link"> {{ __('About Us') }}</a>
                        </li>
                        <li class="nav-submenu__item">
                            <a href="checkout.html" class="nav-submenu__link"> {{ __('Checkout') }}</a>
                        </li>
                        <li class="nav-submenu__item">
                            <a href="account.html" class="nav-submenu__link"> {{ __('Account') }}</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-menu__item has-submenu">
                    <a href="javascript:void(0)" class="nav-menu__link">{{ __('Room') }}</a>
                    <ul class="nav-submenu">
                        <li class="nav-submenu__item">
                            <a href="/listroom" class="nav-submenu__link">{{ __('Room List') }}</a>
                        </li>
                        <li class="nav-submenu__item">
                            <a href="/room-detail" class="nav-submenu__link">{{ __('Room Details') }}</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-menu__item">
                    <a href="contact.html" class="nav-menu__link">{{ __('Contact') }}</a>
                </li>
            </ul>
            <button class="btn btn-outline-light d-lg-none d-block mt-4" data-bs-toggle="modal"
                data-bs-target="#modal_signin" style="width: 100%">
                {{ __('Sign In') }}
                <span class="icon-right text-gradient icon">
                    <i class="fas fa-arrow-right"></i>
                </span>
            </button>
        </div>
    </div>
</div>
<!-- ==================== Mobile Menu End Here ==================== -->


<!-- ==================== Right Offcanvas Start Here ==================== -->
<div class="common-offcanvas d-lg-block d-none">
    <div class="flx-between">
        <a href="index.html" class="mobile-menu__logo">
            <img src="{{ asset('assets/customer/images/logo/white-logo.png') }}" alt="Logo">
        </a>
        <button type="button" class="close-button d-flex position-relative top-0 end-0"> <i class="las la-times"></i>
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
        <li class="social-list__item"><a href="https://www.facebook.com" class="social-list__link flx-center"><i
                    class="fab fa-facebook-f"></i></a> </li>
        <li class="social-list__item"><a href="https://www.twitter.com" class="social-list__link flx-center"> <i
                    class="fab fa-twitter"></i></a></li>
        <li class="social-list__item"><a href="https://www.linkedin.com" class="social-list__link flx-center"> <i
                    class="fab fa-linkedin-in"></i></a></li>
        <li class="social-list__item"><a href="https://www.pinterest.com" class="social-list__link flx-center"> <i
                    class="fab fa-instagram"></i></a></li>
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
                <a href="index.html" class="link">
                    <img src="{{ asset('assets/customer/images/logo/z5175648554199_ccc2baf0a7ac356050aa28149405a89d.jpg') }}"
                        alt="Logo" style="width: 190px; height: 40px; object-fit: contain">
                </a>
            </div>
            <!-- Logo End  -->

            <!-- Menu Start  -->
            <div class="header-menu d-lg-block d-none">

                <ul class="nav-menu flx-align ">
                    <li class="nav-submenu__item">
                        <a href="/outside_service/manation" class="nav-submenu__link">{{ __('Service Manation') }}</a>
                    </li>
                    <li class="nav-submenu__item">
                        <a href="/outside_service/order" class="nav-submenu__link">{{ __('Order Service') }}</a>
                    </li>
                </ul>
            </div>
            <!-- Menu End  -->

            <!-- Header Right start -->
            <div class="header-right flx-align">
                {{-- <button class="btn btn-outline-light d-lg-block d-none" data-bs-toggle="modal"
                    data-bs-target="#modal_signin">
                    {{ __('Sign In') }}
                    <span class="icon-right text-gradient icon">
                        <i class="fas fa-arrow-right"></i>
                    </span>
                </button> --}}
                {{-- <button type="button" class="toggle-mobileMenu d-lg-none ms-3"> <i class="las la-bars"></i>
                </button> --}}
                <button class="btn d-lg-block d-none">
                    <a href="/customer/account" class="account-icon-link"><i
                            class="fa-regular fa-circle-user"></i></a>
                    {{-- <a href="/customer/account" class="account-icon-link"><img
                            src="{{ asset('assets/customer/images/logo/z5175648554199_ccc2baf0a7ac356050aa28149405a89d.jpg') }}"
                            alt="account"></a> --}}
                </button>
            </div>

            @include('layout.modal_sign_in')

            @include('layout.modal_sign_up')
            <!-- Header Right End  -->
        </nav>
    </div>
</header>
<!-- ==================== Header End Here ==================== -->
