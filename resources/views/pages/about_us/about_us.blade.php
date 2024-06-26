@extends('layout.app')

@section('content')
    <div class="mobile-menu d-lg-none d-block">
        <button type="button" class="close-button"> <i class="las la-times"></i> </button>
        <div class="mobile-menu__inner">
            <a href="index.html" class="mobile-menu__logo">
                <img src="assets/images/logo/logo.png" alt="Logo">
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
                <img src="assets/images/logo/white-logo.png" alt="Logo">
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



    <!-- ==================== Header Start Here ==================== -->
    {{-- <header class="header dark-header has-border">
        <div class="container container-two">
            <nav class="header-inner flx-between">
                <!-- Logo Start -->
                <div class="logo">
                    <a href="index.html" class="link">
                        <img src="assets/images/logo/white-logo.png" alt="Logo">
                    </a>
                </div>
                <!-- Logo End -->

                <!-- Menu Start  -->
                <div class="header-menu d-lg-block d-none ">

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
                    <a href="property-details.html" class="btn btn-outline-main btn-outline-main-dark d-lg-block d-none">
                        Add Listing
                        <span class="icon-right icon">
                            <i class="fas fa-arrow-right"></i>
                        </span>
                    </a>
                    <button type="button" class="toggle-mobileMenu d-lg-none ms-3"> <i class="las la-bars"></i>
                    </button>
                </div>
                <!-- Header Right End  -->
            </nav>
        </div>
    </header> --}}
    <!-- ==================== Header End Here ==================== -->


    <!-- ==================== Breadcrumb Start Here ==================== -->
    <section class="breadcrumb padding-y-120">
        <img src="assets/images/thumbs/breadcrumb-img.png" alt="" class="breadcrumb__img">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb__wrapper">
                        <h2 class="breadcrumb__title"> {{__("About Us")}}</h2>
                        <ul class="breadcrumb__list">
                            <li class="breadcrumb__item"><a href="/" class="breadcrumb__link"> <i
                                        class="las la-home"></i> {{__("Home")}}</a> </li>
                            <li class="breadcrumb__item"><i class="fas fa-angle-right"></i></li>
                            <li class="breadcrumb__item"> <span class="breadcrumb__item-text"> {{__("About Us")}} </span> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==================== Breadcrumb End Here ==================== -->

    <!-- ============================= About Section Start =========================== -->
    <section class="about-three bg-white padding-y-120">
        <div class="container container-two">
            <div class="row gy-4">
                <div class="col-lg-6">
                    <div class="about-three-thumb">
                        <div class="about-three-thumb__inner">
                            <img src="{{ asset('home/home1.jpg') }}" alt="">
                            <div class="project-content">
                                <div class="project-content__inner">
                                    <h2 class="project-content__number"> 30+ </h2>
                                    <span class="project-content__text font-12">{{__("Vip rooms")}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content">
                        <div class="section-heading style-left">
                            <span class="section-heading__subtitle bg-gray-100"> <span
                                    class="text-gradient fw-semibold">{{__("About Us")}}</span> </span>
                            <h2 class="section-heading__title">{{__("We bring great things to customers")}}</h2>
                            <p class="section-heading__desc font-18">{{__("We offer a variety of room types to meet the diverse needs of our guests, from standard rooms to premium suites. All rooms feature stunning views, plush bedding, and modern conveniences such as free Wi-Fi, flat-screen TVs, and minibars.")}}</p>
                        </div>
                        <ul class="check-list style-two" >
                            <li class="check-list__item d-flex align-items-center">
                                <span class="icon"><i class="fas fa-check"></i></span>
                                <span class="text fw-semibold">{{__("Crafting Memorable Moments")}}</span>
                            </li>
                            <li class="check-list__item d-flex align-items-center">
                                <span class="icon"><i class="fas fa-check"></i></span>
                                <span class="text fw-semibold">{{__("Redefining Hospitality")}}</span>
                            </li>
                            <li class="check-list__item d-flex align-items-center">
                                <span class="icon"><i class="fas fa-check"></i></span>
                                <span class="text fw-semibold">{{__("Discover Tranquility and Luxury")}}</span>
                            </li>
                            <li class="check-list__item d-flex align-items-center">
                                <span class="icon"><i class="fas fa-check"></i></span>
                                <span class="text fw-semibold">{{__("Exquisite Stays, Exceptional Service")}}</span>
                            </li>
                        </ul>
                        {{-- <div class="about-button">
                            <a href="#" class="btn btn-outline-main bg-white">Learn More <span class="icon-right">
                                    <i class="fas fa-arrow-right"></i> </span> </a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================= About Section End =========================== -->

    <!-- ======================= Property Type Three Start =========================== -->
    <section class="property-type-three padding-b-60">
        <div class="container container-two">
            <div class="section-heading style-left">
                <span class="section-heading__subtitle bg-white"> 
                    {{-- <span class="text-gradient fw-semibold">Property Type{{__("")}}</span> --}}
                     </span>
                <h2 class="section-heading__title">{{__("Reasons for you to choose our hotel")}}</h2>
            </div>
            <div class="row gy-4">
                <div class="col-xl-4 col-sm-6 col-xs-6">
                    <div class="property-type-three-item d-flex align-items-start">
                        <span class="property-type-three-item__icon flex-shrink-0">
                            <img src="assets/images/icons/ppty-type-icon1.svg" alt="">
                        </span>
                        <div class="property-type-three-item__content">
                            <h6 class="property-type-three-item__title">{{__("24/7 Reception Service")}}</h6>
                            <p class="property-type-three-item__desc font-18">{{__("We understand that customer needs can appear at any time of the day. Therefore, our reception team is always ready to serve you 24/7, ensuring all your requests and questions will be resolved quickly and effectively.")}}</p>
                            {{-- <a href="property.html" class="simple-btn text-heading fw-semibold">More About
                                <span class="icon-right"> <i class="fas fa-arrow-right"></i> </span>
                            </a> --}}
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 col-xs-6">
                    <div class="property-type-three-item d-flex align-items-start">
                        <span class="property-type-three-item__icon flex-shrink-0">
                            <img src="assets/images/icons/ppty-type-icon2.svg" alt="">
                        </span>
                        <div class="property-type-three-item__content">
                            <h6 class="property-type-three-item__title">{{__("Room Service")}}</h6>
                            <p class="property-type-three-item__desc font-18">{{__("Bring maximum benefit to our room service. From daily cleaning, in-room meal service to meeting other special requests, we are ready to provide you with a comfortable and worry-free stay.")}} </p>
                            {{-- <a href="property.html" class="simple-btn text-heading fw-semibold">More About
                                <span class="icon-right"> <i class="fas fa-arrow-right"></i> </span>
                            </a> --}}
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 col-xs-6">
                    <div class="property-type-three-item d-flex align-items-start">
                        <span class="property-type-three-item__icon flex-shrink-0">
                            <img src="assets/images/icons/ppty-type-icon3.svg" alt="">
                        </span>
                        <div class="property-type-three-item__content">
                            <h6 class="property-type-three-item__title">{{__("Restaurants and Cuisine")}}</h6>
                            <p class="property-type-three-item__desc font-18">{{__("Our restaurant not only brings you delicious food but also a memorable culinary experience. With a diverse menu from local to international dishes, you will enjoy great meals in a luxurious and cozy space.")}}</p>
                            {{-- <a href="property.html" class="simple-btn text-heading fw-semibold">More About
                                <span class="icon-right"> <i class="fas fa-arrow-right"></i> </span>
                            </a> --}}
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 col-xs-6">
                    <div class="property-type-three-item d-flex align-items-start">
                        <span class="property-type-three-item__icon flex-shrink-0">
                            <img src="assets/images/icons/ppty-type-icon4.svg" alt="">
                        </span>
                        <div class="property-type-three-item__content">
                            <h6 class="property-type-three-item__title">{{__("Great Location")}}</h6>
                            <p class="property-type-three-item__desc font-18">{{__("DanaHotel is located right in the center of city, convenient to famous tourist attractions, shopping areas, and restaurants. With a prime location, customers will easily explore and experience the best of the city.")}}</p>
                            {{-- <a href="property.html" class="simple-btn text-heading fw-semibold">More About
                                <span class="icon-right"> <i class="fas fa-arrow-right"></i> </span>
                            </a> --}}
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 col-xs-6">
                    <div class="property-type-three-item d-flex align-items-start">
                        <span class="property-type-three-item__icon flex-shrink-0">
                            <img src="assets/images/icons/ppty-type-icon5.svg" alt="">
                        </span>
                        <div class="property-type-three-item__content">
                            <h6 class="property-type-three-item__title">{{__("Attractive Promotion Program")}}</h6>
                            <p class="property-type-three-item__desc font-18">{{__("We always have special promotions and offers for customers, including discounts when booking online, vacation packages with spa services, and many other incentives. This helps customers enjoy their vacation economically and fully.")}}</p>
                            {{-- <a href="property.html" class="simple-btn text-heading fw-semibold">More About
                                <span class="icon-right"> <i class="fas fa-arrow-right"></i> </span>
                            </a> --}}
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 col-xs-6">
                    <div class="property-type-three-item d-flex align-items-start">
                        <span class="property-type-three-item__icon flex-shrink-0">
                            <img src="assets/images/icons/ppty-type-icon6.svg" alt="">
                        </span>
                        <div class="property-type-three-item__content">
                            <h6 class="property-type-three-item__title">{{__("Positive feedback from previous customers")}}</h6>
                            <p class="property-type-three-item__desc font-18">{{__("Positive feedback from previous customers who have stayed at the hotel is proof of the quality of service and great experience we bring.")}} </p>
                            {{-- <a href="property.html" class="simple-btn text-heading fw-semibold">More About
                                <span class="icon-right"> <i class="fas fa-arrow-right"></i> </span>
                            </a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======================= Property Type Three End =========================== -->

    <!-- ============================= CTA section Start ===================== -->
@endsection
