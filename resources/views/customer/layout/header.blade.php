<!-- ==================== Mobile Menu Start Here ==================== -->
<div class="mobile-menu d-lg-none d-block">
    <button type="button" class="close-button"> <i class="las la-times"></i> </button>
    <div class="mobile-menu__inner">
        <a href="index.html" class="mobile-menu__logo">
            <img src="{{ asset('assets/customer/images/logo/logo.png') }}" alt="Logo">
        </a>
        <div class="mobile-menu__menu">

            <ul class="nav-menu flx-align nav-menu--mobile">
                <li class="nav-menu__item has-submenu">
                    <a href="javascript:void(0)" class="nav-menu__link">Home</a>
                    <ul class="nav-submenu">
                        <li class="nav-submenu__item">
                            <a href="index.html" class="nav-submenu__link"> Home One</a>
                        </li>
                        <li class="nav-submenu__item">
                            <a href="index-2.html" class="nav-submenu__link"> Home Two</a>
                        </li>
                        <li class="nav-submenu__item">
                            <a href="index-3.html" class="nav-submenu__link"> Home Three</a>
                        </li>
                        <li class="nav-submenu__item">
                            <a href="index-4.html" class="nav-submenu__link"> Home Four</a>
                        </li>
                        <li class="nav-submenu__item">
                            <a href="index-5.html" class="nav-submenu__link"> Home Five</a>
                        </li>
                        <li class="nav-submenu__item">
                            <a href="index-6.html" class="nav-submenu__link"> Home Video</a>
                        </li>
                        <li class="nav-submenu__item">
                            <a href="index-7.html" class="nav-submenu__link"> Home Map</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-menu__item has-submenu">
                    <a href="javascript:void(0)" class="nav-menu__link">Pages</a>
                    <ul class="nav-submenu">
                        <li class="nav-submenu__item">
                            <a href="property.html" class="nav-submenu__link"> Property</a>
                        </li>
                        <li class="nav-submenu__item">
                            <a href="property-sidebar.html" class="nav-submenu__link"> Property Sidebar </a>
                        </li>
                        <li class="nav-submenu__item">
                            <a href="property-details.html" class="nav-submenu__link"> Property Details</a>
                        </li>
                        <li class="nav-submenu__item">
                            <a href="add-listing.html" class="nav-submenu__link"> Add New Listing</a>
                        </li>
                        <li class="nav-submenu__item">
                            <a href="map-location.html" class="nav-submenu__link"> Map Location</a>
                        </li>
                        <li class="nav-submenu__item">
                            <a href="about.html" class="nav-submenu__link"> About Us</a>
                        </li>
                        <li class="nav-submenu__item">
                            <a href="faq.html" class="nav-submenu__link"> FAQ</a>
                        </li>
                        <li class="nav-submenu__item">
                            <a href="checkout.html" class="nav-submenu__link"> Checkout</a>
                        </li>
                        <li class="nav-submenu__item">
                            <a href="cart.html" class="nav-submenu__link"> Cart</a>
                        </li>
                        <li class="nav-submenu__item">
                            <a href="login.html" class="nav-submenu__link"> Login</a>
                        </li>
                        <li class="nav-submenu__item">
                            <a href="account.html" class="nav-submenu__link"> Account</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-menu__item has-submenu">
                    <a href="javascript:void(0)" class="nav-menu__link">Project</a>
                    <ul class="nav-submenu">
                        <li class="nav-submenu__item">
                            <a href="project.html" class="nav-submenu__link"> Project </a>
                        </li>
                        <li class="nav-submenu__item">
                            <a href="project-details.html" class="nav-submenu__link">Project Details</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-menu__item has-submenu">
                    <a href="javascript:void(0)" class="nav-menu__link">Blog</a>
                    <ul class="nav-submenu">
                        <li class="nav-submenu__item">
                            <a href="blog-classic.html" class="nav-submenu__link"> Blog Classic</a>
                        </li>
                        <li class="nav-submenu__item">
                            <a href="blog-details.html" class="nav-submenu__link"> Blog Details</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-menu__item">
                    <a href="contact.html" class="nav-menu__link">Contact</a>
                </li>
            </ul>
            <a href="#" class="btn btn-outline-light d-lg-none d-block mt-4">Sell Property <span
                    class="icon-right text-gradient"> <i class="fas fa-arrow-right"></i> </span> </a>
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
        <button type="button" class="close-button d-flex position-relative top-0 end-0"> <i
                class="las la-times"></i> </button>
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
<header class="header">
    <div class="container container-two">
        <nav class="header-inner flx-between">
            <!-- Logo Start -->
            <div class="logo">
                <a href="index.html" class="link">
                    <img src="{{ asset('assets/customer/images/logo/logo.png') }}" alt="Logo">
                </a>
            </div>
            <!-- Logo End  -->

            <!-- Menu Start  -->
            <div class="header-menu d-lg-block d-none">

                <ul class="nav-menu flx-align ">
                    <li class="nav-menu__item has-submenu">
                        <a href="javascript:void(0)" class="nav-menu__link">Home</a>
                        <ul class="nav-submenu">
                            <li class="nav-submenu__item">
                                <a href="index.html" class="nav-submenu__link"> Home One</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="index-2.html" class="nav-submenu__link"> Home Two</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="index-3.html" class="nav-submenu__link"> Home Three</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="index-4.html" class="nav-submenu__link"> Home Four</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="index-5.html" class="nav-submenu__link"> Home Five</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="index-6.html" class="nav-submenu__link"> Home Video</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="index-7.html" class="nav-submenu__link"> Home Map</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-menu__item has-submenu">
                        <a href="javascript:void(0)" class="nav-menu__link">Pages</a>
                        <ul class="nav-submenu">
                            <li class="nav-submenu__item">
                                <a href="property.html" class="nav-submenu__link"> Property</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="property-sidebar.html" class="nav-submenu__link"> Property Sidebar </a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="property-details.html" class="nav-submenu__link"> Property Details</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="add-listing.html" class="nav-submenu__link"> Add New Listing</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="map-location.html" class="nav-submenu__link"> Map Location</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="about.html" class="nav-submenu__link"> About Us</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="faq.html" class="nav-submenu__link"> FAQ</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="checkout.html" class="nav-submenu__link"> Checkout</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="cart.html" class="nav-submenu__link"> Cart</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="login.html" class="nav-submenu__link"> Login</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="account.html" class="nav-submenu__link"> Account</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-menu__item has-submenu">
                        <a href="javascript:void(0)" class="nav-menu__link">Project</a>
                        <ul class="nav-submenu">
                            <li class="nav-submenu__item">
                                <a href="project.html" class="nav-submenu__link"> Project </a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="project-details.html" class="nav-submenu__link">Project Details</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-menu__item has-submenu">
                        <a href="javascript:void(0)" class="nav-menu__link">Blog</a>
                        <ul class="nav-submenu">
                            <li class="nav-submenu__item">
                                <a href="blog-classic.html" class="nav-submenu__link"> Blog Classic</a>
                            </li>
                            <li class="nav-submenu__item">
                                <a href="blog-details.html" class="nav-submenu__link"> Blog Details</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-menu__item">
                        <a href="contact.html" class="nav-menu__link">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- Menu End  -->

            <!-- Header Right start -->
            <div class="header-right flx-align">
                <button type="button" class="offcanvas-btn d-lg-block d-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="24" viewBox="0 0 30 24"
                        fill="none">
                        <line x1="0.0078125" y1="12.293" x2="30.0078" y2="12.293" stroke="#181616"
                            stroke-width="3" />
                        <path d="M5.00781 22.293H30.0078" stroke="#181616" stroke-width="3" />
                        <path d="M10.0078 2.29297H30.0078" stroke="#181616" stroke-width="3" />
                    </svg>
                </button>
                {{-- <a href="property-details.html" class="btn btn-outline-light d-lg-block d-none">Sell Property 
                    <span class="icon-right text-gradient icon"> 
                        <i class="fas fa-arrow-right"></i>
                     </span> 
                </a> --}}
                <button type="button" class="toggle-mobileMenu d-lg-none ms-3"> <i class="las la-bars"></i>
                </button>
            </div>
            <!-- Header Right End  -->
        </nav>
    </div>
</header>
<!-- ==================== Header End Here ==================== -->
