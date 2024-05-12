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

    .menu_drop {
        inset: -20px 30px auto auto !important;
    }
</style>

<!-- ==================== Mobile Menu Start Here ==================== -->
<div class="mobile-menu d-lg-none d-block">
    <button type="button" class="close-button"> <i class="las la-times"></i> </button>
    <div class="mobile-menu__inner">
        <a href="/food_service" class="mobile-menu__logo">
            <img src="{{ asset('assets/customer/images/logo/logo.png') }}" alt="Logo">
        </a>
        <div class="mobile-menu__menu">
            <ul class="nav-menu flx-align nav-menu--mobile">
                <li class="nav-menu__item">
                    <a href="/" class="nav-menu__link">{{ __('Home') }}</a>
                </li>
                <li class="nav-menu__item">
                    <a href="/food_service/manation" class="nav-menu__link">{{ __('Food Manation')
                        }}</a>
                </li>
                <li class="nav-menu__item">
                    <a href="/food_service/order" class="nav-menu__link">{{ __('Order Food') }}</a>
                </li>
                <li class="nav-menu__item">
                    <a href="/" class="nav-menu__link">{{ __('Log out') }}</a>
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
                <a href="/food_service" class="link">
                    <img src="{{ asset('assets/customer/images/logo/z5175648554199_ccc2baf0a7ac356050aa28149405a89d.jpg') }}"
                        alt="Logo" style="width: 190px; height: 40px; object-fit: contain">
                </a>
            </div>
            <!-- Logo End  -->

            <!-- Menu Start  -->
            <div class="header-menu d-lg-block d-none">
                <ul class="nav-menu flx-align ">
                    <li class="nav-submenu__item">
                        <a href="/food_service/manation" class="nav-submenu__link">{{ __('Food Manation') }}</a>
                    </li>
                    <li class="nav-submenu__item">
                        <a href="/food_service/order" class="nav-submenu__link">{{ __('Order Food') }}</a>
                    </li>
                </ul>
            </div>
            <!-- Menu End  -->

            <!-- Header Right start -->
            <div class="header-right flx-align">
                <button type="button" class="toggle-mobileMenu d-lg-none ms-3"> <i class="las la-bars"></i>
                </button>
                <button class="btn d-lg-block d-none" data-bs-toggle="dropdown" aria-expanded="false">
                    <a href="/customer/account" class="account-icon-link"><i class="fa-regular fa-circle-user"></i></a>
                </button>
                <ul class="dropdown-menu menu_drop">
                    <li><a class="dropdown-item" href="#">Log out</a></li>
                </ul>
            </div>

            @include('layout.modal_sign_in')

            @include('layout.modal_sign_up')
            <!-- Header Right End  -->
        </nav>
    </div>
</header>
<!-- ==================== Header End Here ==================== -->