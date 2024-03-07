@extends('layout.app')

@section('content')

    <section class="property bg-gray-100 padding-y-120">
        <div class="container container-two">
            <div class="property-filter">
                <form action="#">
                    <div class="row gy-4">
                        <div class="col-lg-2 col-md-3 col-sm-6 col-xs-6">
                            <div class="select-has-icon">
                                <select class="form-select common-input common-input--withLeftIcon pill text-gray-800">
                                    <option value="Status" disabled="" selected="">Status</option>
                                    <option value="All">All</option>
                                    <option value="Buy">Buy</option>
                                    <option value="Rent">Rent</option>
                                </select>
                                <span class="input-icon input-icon--left text-gradient">
                                    <img src="assets/images/icons/status.svg" alt="">
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                            <div class="select-has-icon">
                                <select class="form-select common-input common-input--withLeftIcon pill text-gray-800">
                                    <option value="Type" disabled="" selected="">Type</option>
                                    <option value="All">All</option>
                                    <option value="Houses">Houses</option>
                                    <option value="Apartments">Apartments</option>
                                    <option value="Office">Office</option>
                                    <option value="Villa">Villa</option>
                                </select>
                                <span class="input-icon input-icon--left text-gradient">
                                    <img src="assets/images/icons/type.svg" alt="">
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3 col-sm-6 col-xs-6">
                            <div class="select-has-icon">
                                <select class="form-select common-input common-input--withLeftIcon pill text-gray-800">
                                    <option value="Location" disabled="" selected="">Location</option>
                                    <option value="1">Bangladesh</option>
                                    <option value="1">Japan</option>
                                    <option value="1">Korea</option>
                                    <option value="1">Singapore</option>
                                    <option value="1">Germany</option>
                                    <option value="1">Thailand</option>
                                </select>
                                <span class="input-icon input-icon--left text-gradient">
                                    <img src="assets/images/icons/location.svg" alt="">
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                            <div class="position-relative">
                                <input type="text" class="common-input common-input--withLeftIcon pill text-gray-800"
                                    placeholder="Advanced Filter">
                                <span class="input-icon input-icon--left text-gradient">
                                    <img src="assets/images/icons/filter.svg" alt="">
                                </span>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="property-filter__bottom flx-between gap-2">
                    {{-- <span class="property-filter__text font-18 text-gray-800">Showing 1-10 of 23</span> --}}
                    <div class="d-flex align-items-center gap-2">
                        <div class="list-grid d-flex align-items-center gap-2 me-4">
                            <button class="list-grid__button grid-button active text-body"><i
                                    class="las la-border-all"></i></button>
                            <button class="list-grid__button list-button text-body"><i class="las la-list"></i></button>
                        </div>
                        {{-- <div class="d-flex align-items-center gap-2">
                            <span class="property-filter__text font-18 text-gray-800"> Sort by: </span>
                            <div class="select-has-icon">
                                <select class="form-select common-input pill text-gray-800 px-3 py-2">
                                    <option value="Newest">Newest</option>
                                    <option value="Best Seller">Best Seller</option>
                                    <option value="Best Match">Best Match</option>
                                    <option value="Low Price">Low Price</option>
                                    <option value="High Price">High Price</option>
                                </select>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>

            <div class="list-grid-item-wrapper show-two-item row gy-4">
                <div class="col-lg-4 col-sm-6">
                    <div class="property-item style-two">
                        <div class="property-item__thumb">
                            <a href="property-details.html" class="link">
                                <img src="assets/images/thumbs/property-7.png" alt="" class="cover-img">
                            </a>
                        </div>
                        <div class="property-item__content">
                            <h6 class="property-item__title">
                                <a href="property-details.html" class="link"> Turning Dreams into Addresses Home State
                                </a>
                            </h6>
                            <ul class="amenities-list flx-align">
                                <li class="amenities-list__item flx-align">
                                    <span class="icon text-gradient"><i class="fas fa-bed"></i></span>
                                    <span class="text">3 Beds</span>
                                </li>
                                <li class="amenities-list__item flx-align">
                                    <span class="icon text-gradient"><i class="fas fa-bath"></i></span>
                                    <span class="text">3 Baths</span>
                                </li>
                            </ul>
                            <h6 class="property-item__price"> $456.00
                                <span class="day">/per day</span>
                            </h6>
                            <p class="property-item__location d-flex gap-2">
                                <span class="icon text-gradient"> <i class="fas fa-map-marker-alt"></i></span>
                                66 Broklyant, New York America
                            </p>
                            <a href="property-details.html" class="simple-btn text-gradient fw-semibold font-14">Book Now
                                <span class="icon-right"> <i class="fas fa-arrow-right"></i> </span> </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="property-item style-two">
                        <div class="property-item__thumb">
                            <a href="property-details.html" class="link">
                                <img src="assets/images/thumbs/property-8.png" alt="" class="cover-img">
                            </a>
                        </div>
                        <div class="property-item__content">
                            <h6 class="property-item__title">
                                <a href="property-details.html" class="link"> Your journey homeownership starts here too
                                </a>
                            </h6>
                            <ul class="amenities-list flx-align">
                                <li class="amenities-list__item flx-align">
                                    <span class="icon text-gradient"><i class="fas fa-bed"></i></span>
                                    <span class="text">3 Beds</span>
                                </li>
                                <li class="amenities-list__item flx-align">
                                    <span class="icon text-gradient"><i class="fas fa-bath"></i></span>
                                    <span class="text">3 Baths</span>
                                </li>
                            </ul>
                            <h6 class="property-item__price"> $300.00
                                <span class="day">/per day</span>
                            </h6>
                            <p class="property-item__location d-flex gap-2">
                                <span class="icon text-gradient"> <i class="fas fa-map-marker-alt"></i></span>
                                66 Broklyant, New York America
                            </p>
                            <a href="property-details.html" class="simple-btn text-gradient fw-semibold font-14">Book Now
                                <span class="icon-right"> <i class="fas fa-arrow-right"></i> </span> </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="property-item style-two">
                        <div class="property-item__thumb">
                            <a href="property-details.html" class="link">
                                <img src="assets/images/thumbs/property-9.png" alt="" class="cover-img">
                            </a>
                        </div>
                        <div class="property-item__content">
                            <h6 class="property-item__title">
                                <a href="property-details.html" class="link"> Brick by Brick Your Dream Home Awaits </a>
                            </h6>
                            <ul class="amenities-list flx-align">
                                <li class="amenities-list__item flx-align">
                                    <span class="icon text-gradient"><i class="fas fa-bed"></i></span>
                                    <span class="text">3 Beds</span>
                                </li>
                                <li class="amenities-list__item flx-align">
                                    <span class="icon text-gradient"><i class="fas fa-bath"></i></span>
                                    <span class="text">3 Baths</span>
                                </li>
                            </ul>
                            <h6 class="property-item__price"> $380.00
                                <span class="day">/per day</span>
                            </h6>
                            <p class="property-item__location d-flex gap-2">
                                <span class="icon text-gradient"> <i class="fas fa-map-marker-alt"></i></span>
                                66 Broklyant, New York America
                            </p>
                            <a href="property-details.html" class="simple-btn text-gradient fw-semibold font-14">Book Now
                                <span class="icon-right"> <i class="fas fa-arrow-right"></i> </span> </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="property-item style-two">
                        <div class="property-item__thumb">
                            <a href="property-details.html" class="link">
                                <img src="assets/images/thumbs/property-10.png" alt="" class="cover-img">
                            </a>
                        </div>
                        <div class="property-item__content">
                            <h6 class="property-item__title">
                                <a href="property-details.html" class="link"> Opening Doors to Your Dreams For Living
                                </a>
                            </h6>
                            <ul class="amenities-list flx-align">
                                <li class="amenities-list__item flx-align">
                                    <span class="icon text-gradient"><i class="fas fa-bed"></i></span>
                                    <span class="text">3 Beds</span>
                                </li>
                                <li class="amenities-list__item flx-align">
                                    <span class="icon text-gradient"><i class="fas fa-bath"></i></span>
                                    <span class="text">3 Baths</span>
                                </li>
                            </ul>
                            <h6 class="property-item__price"> $190.00
                                <span class="day">/per day</span>
                            </h6>
                            <p class="property-item__location d-flex gap-2">
                                <span class="icon text-gradient"> <i class="fas fa-map-marker-alt"></i></span>
                                66 Broklyant, New York America
                            </p>
                            <a href="property-details.html" class="simple-btn text-gradient fw-semibold font-14">Book Now
                                <span class="icon-right"> <i class="fas fa-arrow-right"></i> </span> </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="property-item style-two">
                        <div class="property-item__thumb">
                            <a href="property-details.html" class="link">
                                <img src="assets/images/thumbs/property-11.png" alt="" class="cover-img">
                            </a>
                        </div>
                        <div class="property-item__content">
                            <h6 class="property-item__title">
                                <a href="property-details.html" class="link"> Home is Where Your Story Begins </a>
                            </h6>
                            <ul class="amenities-list flx-align">
                                <li class="amenities-list__item flx-align">
                                    <span class="icon text-gradient"><i class="fas fa-bed"></i></span>
                                    <span class="text">3 Beds</span>
                                </li>
                                <li class="amenities-list__item flx-align">
                                    <span class="icon text-gradient"><i class="fas fa-bath"></i></span>
                                    <span class="text">3 Baths</span>
                                </li>
                            </ul>
                            <h6 class="property-item__price"> $480.00
                                <span class="day">/per day</span>
                            </h6>
                            <p class="property-item__location d-flex gap-2">
                                <span class="icon text-gradient"> <i class="fas fa-map-marker-alt"></i></span>
                                66 Broklyant, New York America
                            </p>
                            <a href="property-details.html" class="simple-btn text-gradient fw-semibold font-14">Book Now
                                <span class="icon-right"> <i class="fas fa-arrow-right"></i> </span> </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="property-item style-two">
                        <div class="property-item__thumb">
                            <a href="property-details.html" class="link">
                                <img src="assets/images/thumbs/property-12.png" alt="" class="cover-img">
                            </a>
                        </div>
                        <div class="property-item__content">
                            <h6 class="property-item__title">
                                <a href="property-details.html" class="link"> Building Trust, One Home at a Time </a>
                            </h6>
                            <ul class="amenities-list flx-align">
                                <li class="amenities-list__item flx-align">
                                    <span class="icon text-gradient"><i class="fas fa-bed"></i></span>
                                    <span class="text">3 Beds</span>
                                </li>
                                <li class="amenities-list__item flx-align">
                                    <span class="icon text-gradient"><i class="fas fa-bath"></i></span>
                                    <span class="text">3 Baths</span>
                                </li>
                            </ul>
                            <h6 class="property-item__price"> $520.00
                                <span class="day">/per day</span>
                            </h6>
                            <p class="property-item__location d-flex gap-2">
                                <span class="icon text-gradient"> <i class="fas fa-map-marker-alt"></i></span>
                                66 Broklyant, New York America
                            </p>
                            <a href="property-details.html" class="simple-btn text-gradient fw-semibold font-14">Book Now
                                <span class="icon-right"> <i class="fas fa-arrow-right"></i> </span> </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="property-item style-two">
                        <div class="property-item__thumb">
                            <a href="property-details.html" class="link">
                                <img src="assets/images/thumbs/property-13.png" alt="" class="cover-img">
                            </a>
                        </div>
                        <div class="property-item__content">
                            <h6 class="property-item__title">
                                <a href="property-details.html" class="link"> Guiding You Home with Experience </a>
                            </h6>
                            <ul class="amenities-list flx-align">
                                <li class="amenities-list__item flx-align">
                                    <span class="icon text-gradient"><i class="fas fa-bed"></i></span>
                                    <span class="text">3 Beds</span>
                                </li>
                                <li class="amenities-list__item flx-align">
                                    <span class="icon text-gradient"><i class="fas fa-bath"></i></span>
                                    <span class="text">3 Baths</span>
                                </li>
                            </ul>
                            <h6 class="property-item__price"> $350.00
                                <span class="day">/per day</span>
                            </h6>
                            <p class="property-item__location d-flex gap-2">
                                <span class="icon text-gradient"> <i class="fas fa-map-marker-alt"></i></span>
                                66 Broklyant, New York America
                            </p>
                            <a href="property-details.html" class="simple-btn text-gradient fw-semibold font-14">Book Now
                                <span class="icon-right"> <i class="fas fa-arrow-right"></i> </span> </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="property-item style-two">
                        <div class="property-item__thumb">
                            <a href="property-details.html" class="link">
                                <img src="assets/images/thumbs/property-14.png" alt="" class="cover-img">
                            </a>
                        </div>
                        <div class="property-item__content">
                            <h6 class="property-item__title">
                                <a href="property-details.html" class="link"> A Tradition of Trust in Real Estate </a>
                            </h6>
                            <ul class="amenities-list flx-align">
                                <li class="amenities-list__item flx-align">
                                    <span class="icon text-gradient"><i class="fas fa-bed"></i></span>
                                    <span class="text">3 Beds</span>
                                </li>
                                <li class="amenities-list__item flx-align">
                                    <span class="icon text-gradient"><i class="fas fa-bath"></i></span>
                                    <span class="text">3 Baths</span>
                                </li>
                            </ul>
                            <h6 class="property-item__price"> $530.00
                                <span class="day">/per day</span>
                            </h6>
                            <p class="property-item__location d-flex gap-2">
                                <span class="icon text-gradient"> <i class="fas fa-map-marker-alt"></i></span>
                                66 Broklyant, New York America
                            </p>
                            <a href="property-details.html" class="simple-btn text-gradient fw-semibold font-14">Book Now
                                <span class="icon-right"> <i class="fas fa-arrow-right"></i> </span> </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="property-item style-two">
                        <div class="property-item__thumb">
                            <a href="property-details.html" class="link">
                                <img src="assets/images/thumbs/property-15.png" alt="" class="cover-img">
                            </a>
                        </div>
                        <div class="property-item__content">
                            <h6 class="property-item__title">
                                <a href="property-details.html" class="link"> Target Audience and Reflect the Values
                                </a>
                            </h6>
                            <ul class="amenities-list flx-align">
                                <li class="amenities-list__item flx-align">
                                    <span class="icon text-gradient"><i class="fas fa-bed"></i></span>
                                    <span class="text">3 Beds</span>
                                </li>
                                <li class="amenities-list__item flx-align">
                                    <span class="icon text-gradient"><i class="fas fa-bath"></i></span>
                                    <span class="text">3 Baths</span>
                                </li>
                            </ul>
                            <h6 class="property-item__price"> $560.00
                                <span class="day">/per day</span>
                            </h6>
                            <p class="property-item__location d-flex gap-2">
                                <span class="icon text-gradient"> <i class="fas fa-map-marker-alt"></i></span>
                                66 Broklyant, New York America
                            </p>
                            <a href="property-details.html" class="simple-btn text-gradient fw-semibold font-14">Book Now
                                <span class="icon-right"> <i class="fas fa-arrow-right"></i> </span> </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="property-item style-two">
                        <div class="property-item__thumb">
                            <a href="property-details.html" class="link">
                                <img src="assets/images/thumbs/property-16.png" alt="" class="cover-img">
                            </a>
                        </div>
                        <div class="property-item__content">
                            <h6 class="property-item__title">
                                <a href="property-details.html" class="link"> Making House Hunting an Adventure </a>
                            </h6>
                            <ul class="amenities-list flx-align">
                                <li class="amenities-list__item flx-align">
                                    <span class="icon text-gradient"><i class="fas fa-bed"></i></span>
                                    <span class="text">3 Beds</span>
                                </li>
                                <li class="amenities-list__item flx-align">
                                    <span class="icon text-gradient"><i class="fas fa-bath"></i></span>
                                    <span class="text">3 Baths</span>
                                </li>
                            </ul>
                            <h6 class="property-item__price"> $500.00
                                <span class="day">/per day</span>
                            </h6>
                            <p class="property-item__location d-flex gap-2">
                                <span class="icon text-gradient"> <i class="fas fa-map-marker-alt"></i></span>
                                66 Broklyant, New York America
                            </p>
                            <a href="property-details.html" class="simple-btn text-gradient fw-semibold font-14">Book Now
                                <span class="icon-right"> <i class="fas fa-arrow-right"></i> </span> </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="property-item style-two">
                        <div class="property-item__thumb">
                            <a href="property-details.html" class="link">
                                <img src="assets/images/thumbs/property-17.png" alt="" class="cover-img">
                            </a>
                        </div>
                        <div class="property-item__content">
                            <h6 class="property-item__title">
                                <a href="property-details.html" class="link"> Opening New Doors to Your Future </a>
                            </h6>
                            <ul class="amenities-list flx-align">
                                <li class="amenities-list__item flx-align">
                                    <span class="icon text-gradient"><i class="fas fa-bed"></i></span>
                                    <span class="text">3 Beds</span>
                                </li>
                                <li class="amenities-list__item flx-align">
                                    <span class="icon text-gradient"><i class="fas fa-bath"></i></span>
                                    <span class="text">3 Baths</span>
                                </li>
                            </ul>
                            <h6 class="property-item__price"> $580.00
                                <span class="day">/per day</span>
                            </h6>
                            <p class="property-item__location d-flex gap-2">
                                <span class="icon text-gradient"> <i class="fas fa-map-marker-alt"></i></span>
                                66 Broklyant, New York America
                            </p>
                            <a href="property-details.html" class="simple-btn text-gradient fw-semibold font-14">Book Now
                                <span class="icon-right"> <i class="fas fa-arrow-right"></i> </span> </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="property-item style-two">
                        <div class="property-item__thumb">
                            <a href="property-details.html" class="link">
                                <img src="assets/images/thumbs/property-18.png" alt="" class="cover-img">
                            </a>
                        </div>
                        <div class="property-item__content">
                            <h6 class="property-item__title">
                                <a href="property-details.html" class="link"> Your Journey to Home Starts Here </a>
                            </h6>
                            <ul class="amenities-list flx-align">
                                <li class="amenities-list__item flx-align">
                                    <span class="icon text-gradient"><i class="fas fa-bed"></i></span>
                                    <span class="text">3 Beds</span>
                                </li>
                                <li class="amenities-list__item flx-align">
                                    <span class="icon text-gradient"><i class="fas fa-bath"></i></span>
                                    <span class="text">3 Baths</span>
                                </li>
                            </ul>
                            <h6 class="property-item__price"> $563.00
                                <span class="day">/per day</span>
                            </h6>
                            <p class="property-item__location d-flex gap-2">
                                <span class="icon text-gradient"> <i class="fas fa-map-marker-alt"></i></span>
                                66 Broklyant, New York America
                            </p>
                            <a href="property-details.html" class="simple-btn text-gradient fw-semibold font-14">Book Now
                                <span class="icon-right"> <i class="fas fa-arrow-right"></i> </span> </a>
                        </div>
                    </div>
                </div>
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination common-pagination">
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                </ul>
            </nav>
        </div>
    </section>

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
