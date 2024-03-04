@extends('customer.layout.app')

@section('content')
    <section class="breadcrumb padding-y-120">
        <img src="assets/images/thumbs/breadcrumb-img.png" alt="" class="breadcrumb__img">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb__wrapper">
                        <h2 class="breadcrumb__title"> Property Details</h2>
                        <ul class="breadcrumb__list">
                            <li class="breadcrumb__item"><a href="index.html" class="breadcrumb__link"> <i
                                        class="las la-home"></i> Home</a> </li>
                            <li class="breadcrumb__item"><i class="fas fa-angle-right"></i></li>
                            <li class="breadcrumb__item"> <span class="breadcrumb__item-text"> Property Details </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==================== Breadcrumb End Here ==================== -->

    <section class="property-details padding-y-120">
        <div class="container container-two">
            <div class="row gy-4">
                <div class="col-lg-8">
                    <div class="row gy-4">
                        <div class="col-sm-12 col-6">
                            <div class="property-details__thumb">
                                <img src="assets/images/thumbs/property-details-1.png" alt="" class="cover-img">
                            </div>
                        </div>
                        <div class="col-sm-4 col-6">
                            <div class="property-details__thumb">
                                <img src="assets/images/thumbs/property-details-2.png" alt="" class="cover-img">
                            </div>
                        </div>
                        <div class="col-sm-4 col-6">
                            <div class="property-details__thumb">
                                <img src="assets/images/thumbs/property-details-3.png" alt="" class="cover-img">
                            </div>
                        </div>
                        <div class="col-sm-4 col-6">
                            <div class="property-details__thumb">
                                <img src="assets/images/thumbs/property-details-4.png" alt="" class="cover-img">
                            </div>
                        </div>
                    </div>
                    <div class="property-details-wrapper">
                        <div class="property-details-item">
                            <h6 class="property-details-item__title">Preview</h6>
                            <div class="property-details-item__content">
                                <div class="row gy-4 gy-lg-5">
                                    <div class="col-sm-4 col-6">
                                        <div class="amenities-content d-flex align-items-center">
                                            <span class="amenities-content__icon">
                                                <img src="assets/images/icons/amenities1.svg" alt="">
                                            </span>
                                            <div class="amenities-content__inner">
                                                <span class="amenities-content__text">Room</span>
                                                <h6 class="amenities-content__title mb-0 font-16">4 Room</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-6">
                                        <div class="amenities-content d-flex align-items-center">
                                            <span class="amenities-content__icon">
                                                <img src="assets/images/icons/amenities2.svg" alt="">
                                            </span>
                                            <div class="amenities-content__inner">
                                                <span class="amenities-content__text">Bed</span>
                                                <h6 class="amenities-content__title mb-0 font-16">3 Beds</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-6">
                                        <div class="amenities-content d-flex align-items-center">
                                            <span class="amenities-content__icon">
                                                <img src="assets/images/icons/amenities3.svg" alt="">
                                            </span>
                                            <div class="amenities-content__inner">
                                                <span class="amenities-content__text">Bath</span>
                                                <h6 class="amenities-content__title mb-0 font-16">2 Baths</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-6">
                                        <div class="amenities-content d-flex align-items-center">
                                            <span class="amenities-content__icon">
                                                <img src="assets/images/icons/amenities4.svg" alt="">
                                            </span>
                                            <div class="amenities-content__inner">
                                                <span class="amenities-content__text">Space</span>
                                                <h6 class="amenities-content__title mb-0 font-16">3 Space</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-6">
                                        <div class="amenities-content d-flex align-items-center">
                                            <span class="amenities-content__icon">
                                                <img src="assets/images/icons/amenities5.svg" alt="">
                                            </span>
                                            <div class="amenities-content__inner">
                                                <span class="amenities-content__text">Size</span>
                                                <h6 class="amenities-content__title mb-0 font-16">1020 sqft</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-6">
                                        <div class="amenities-content d-flex align-items-center">
                                            <span class="amenities-content__icon">
                                                <img src="assets/images/icons/amenities6.svg" alt="">
                                            </span>
                                            <div class="amenities-content__inner">
                                                <span class="amenities-content__text">Property Type</span>
                                                <h6 class="amenities-content__title mb-0 font-16">Apartment</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="property-details-item">
                            <h6 class="property-details-item__title">Features</h6>
                            <div class="property-details-item__content">
                                <div class="row gy-2">
                                    <div class="col-sm-6">
                                        <ul class="check-list">
                                            <li class="check-list__item d-flex align-items-center">
                                                <span class="icon"><i class="fas fa-check"></i></span>
                                                <span class="text">Dream Property Solutions</span>
                                            </li>
                                            <li class="check-list__item d-flex align-items-center">
                                                <span class="icon"><i class="fas fa-check"></i></span>
                                                <span class="text">Secure Property Partners</span>
                                            </li>
                                            <li class="check-list__item d-flex align-items-center">
                                                <span class="icon"><i class="fas fa-check"></i></span>
                                                <span class="text">Doors to Your Future</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-6">
                                        <ul class="check-list">
                                            <li class="check-list__item d-flex align-items-center">
                                                <span class="icon"><i class="fas fa-check"></i></span>
                                                <span class="text">Prestige Property Management</span>
                                            </li>
                                            <li class="check-list__item d-flex align-items-center">
                                                <span class="icon"><i class="fas fa-check"></i></span>
                                                <span class="text">Global Real Estate Investments</span>
                                            </li>
                                            <li class="check-list__item d-flex align-items-center">
                                                <span class="icon"><i class="fas fa-check"></i></span>
                                                <span class="text">You Home with Experience</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="property-details-item">
                            <h6 class="property-details-item__title">Address</h6>
                            <div class="property-details-item__content">
                                <div class="row gy-4">
                                    <div class="col-6">
                                        <div class="address-content d-flex gap-4 align-items-center">
                                            <span class="address-content__text font-18">Address</span>
                                            <h6 class="address-content__title font-15 mb-0">Mirpur 1,Chineese</h6>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="address-content d-flex gap-4 align-items-center">
                                            <span class="address-content__text font-18">Code</span>
                                            <h6 class="address-content__title font-15 mb-0">2365</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="address-map">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1150112.1628856962!2d44.64619029447154!3d23.086651461779507!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f43348a67e24b%3A0xff45e502e1ceb7e2!2sBurj%20Khalifa!5e0!3m2!1sen!2sbd!4v1707037970965!5m2!1sen!2sbd"
                                        allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="property-details-item">
                            <h6 class="property-details-item__title">House</h6>
                            <div class="property-details-item__content">
                                <div class="house-content position-relative">
                                    <img src="assets/images/thumbs/house.png" alt="">
                                    <a href="https://www.youtube.com/watch?v=pPl3ZZdTP3g"
                                        class="popup-video-link video-popup__button style-two">
                                        <i class="fas fa-play text-gradient"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="common-sidebar-wrapper">
                        <div class="common-sidebar">
                            <h6 class="common-sidebar__title"> Category </h6>
                            <ul class="category-list">
                                <li class="category-list__item">
                                    <a href="blog-classic.html" class="category-list__link flx-between">
                                        <span class="text">Prime Investments</span>
                                        <span class="number">(1)</span>
                                    </a>
                                </li>
                                <li class="category-list__item">
                                    <a href="blog-classic.html" class="category-list__link flx-between">
                                        <span class="text">ProHome Finders</span>
                                        <span class="number"> (8) </span>
                                    </a>
                                </li>
                                <li class="category-list__item">
                                    <a href="blog-classic.html" class="category-list__link flx-between">
                                        <span class="text">SmartHouse Agency</span>
                                        <span class="number"> (3) </span>
                                    </a>
                                </li>
                                <li class="category-list__item">
                                    <a href="blog-classic.html" class="category-list__link flx-between">
                                        <span class="text">Secure Property Partners</span>
                                        <span class="number"> (5) </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="common-sidebar">
                            <h6 class="common-sidebar__title"> Recent Post </h6>
                            <div class="latest-blog">
                                <div class="latest-blog__thumb">
                                    <a href="blog-details.html"> <img src="assets/images/thumbs/latest-blog1.png"
                                            class="cover-img" alt=""></a>
                                </div>
                                <div class="latest-blog__content">
                                    <span class="latest-blog__category font-12 flx-align gap-1">
                                        <span class="icon text-gradient"><i class="fas fa-folder-open"></i></span>
                                        Category</span>
                                    <h6 class="latest-blog__title">
                                        <a href="blog-details.html">A picture is worth standard and stand us return</a>
                                    </h6>
                                </div>
                            </div>
                            <div class="latest-blog">
                                <div class="latest-blog__thumb">
                                    <a href="blog-details.html"> <img src="assets/images/thumbs/latest-blog2.png"
                                            class="cover-img" alt=""></a>
                                </div>
                                <div class="latest-blog__content">
                                    <span class="latest-blog__category font-12 flx-align gap-1">
                                        <span class="icon text-gradient"><i class="fas fa-folder-open"></i></span>
                                        Category</span>
                                    <h6 class="latest-blog__title">
                                        <a href="blog-details.html">Your journ homeownership starts here</a>
                                    </h6>
                                </div>
                            </div>
                            <div class="latest-blog">
                                <div class="latest-blog__thumb">
                                    <a href="blog-details.html"> <img src="assets/images/thumbs/latest-blog3.png"
                                            class="cover-img" alt=""></a>
                                </div>
                                <div class="latest-blog__content">
                                    <span class="latest-blog__category font-12 flx-align gap-1">
                                        <span class="icon text-gradient"><i class="fas fa-folder-open"></i></span>
                                        Category</span>
                                    <h6 class="latest-blog__title">
                                        <a href="blog-details.html">Trust us to guide you the a through the process</a>
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="common-sidebar">
                            <h6 class="common-sidebar__title"> Properties </h6>
                            <div class="row gy-4">
                                <div class="col-lg-6 col-sm-4 col-6">
                                    <a href="property.html" class="properties-item d-block w-100">
                                        <img src="assets/images/thumbs/properties-1.png" alt="Property Image"
                                            class="cover-img">
                                        <span class="properties-item__text">Relax House</span>
                                    </a>
                                </div>
                                <div class="col-lg-6 col-sm-4 col-6">
                                    <a href="property.html" class="properties-item d-block w-100">
                                        <img src="assets/images/thumbs/properties-2.png" alt="Property Image"
                                            class="cover-img">
                                        <span class="properties-item__text">Hunting Adventure</span>
                                    </a>
                                </div>
                                <div class="col-lg-6 col-sm-4 col-6">
                                    <a href="property.html" class="properties-item d-block w-100">
                                        <img src="assets/images/thumbs/properties-3.png" alt="Property Image"
                                            class="cover-img">
                                        <span class="properties-item__text">Homeowner ship</span>
                                    </a>
                                </div>
                                <div class="col-lg-6 col-sm-4 col-6">
                                    <a href="property.html" class="properties-item d-block w-100">
                                        <img src="assets/images/thumbs/properties-4.png" alt="Property Image"
                                            class="cover-img">
                                        <span class="properties-item__text">Real Dreams</span>
                                    </a>
                                </div>
                                <div class="col-lg-6 col-sm-4 col-6">
                                    <a href="property.html" class="properties-item d-block w-100">
                                        <img src="assets/images/thumbs/properties-5.png" alt="Property Image"
                                            class="cover-img">
                                        <span class="properties-item__text">New Doors</span>
                                    </a>
                                </div>
                                <div class="col-lg-6 col-sm-4 col-6">
                                    <a href="property.html" class="properties-item d-block w-100">
                                        <img src="assets/images/thumbs/properties-6.png" alt="Property Image"
                                            class="cover-img">
                                        <span class="properties-item__text">The Heart</span>
                                    </a>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- ============================= CTA section Start ===================== -->
    <section class="cta padding-b-120">
        <div class="container container-two">
            <div class="cta-box flx-between gap-2">
                <div class="cta-content">
                    <h2 class="cta-content__title">Subscribe To Our <span class="text-gradient">Newsletter</span> </h2>
                    <p class="cta-content__desc">It is a long established fact that a reader will be distracted by the
                        readable content of a page when looking at its layout.</p>
                    <form action="#" class="cta-content__form d-flex align-items-center gap-2">
                        <div class="position-relative w-100">
                            <input type="text" class="common-input common-input--withLeftIcon w-100"
                                placeholder="Enter Your Email Address">
                            <span class="input-icon input-icon--left text-gradient font-20 line-height-1"><i
                                    class="far fa-envelope"></i></span>
                        </div>
                        <button type="submit" class="btn btn-main text-uppercase flex-shrink-0"> Subscribe <span
                                class="text">Now</span> </button>
                    </form>
                </div>
                <div class="cta-content__thumb d-xl-block d-none">
                    <img src="assets/images/thumbs/cta-img.png" alt="">
                </div>
            </div>
        </div>
    </section>
@endsection
