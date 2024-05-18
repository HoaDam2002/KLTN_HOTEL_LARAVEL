@extends('layout.app')
@section('content')
    {{-- start about us --}}
    <section class="about padding-y-120">
        <div class="container container-two">
            <div class="row gy-4 align-items-center">
                <div class="col-lg-6">
                    <div class="about-thumb">
                        <img src="{{ asset('home/home2.jpg') }}" alt="">
                        <div class="client-statistics flx-align">
                            <span class="client-statistics__icon">
                                <i class="fas fa-users text-gradient"></i>
                            </span>
                            <div class="client-statistics__content">
                                <h5 class="client-statistics__number statisticsCounter">3,000+</h5>
                                <span class="client-statistics__text fs-18">{{__("Satisfied Clients")}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content">
                        <div class="section-heading style-left">
                            <span class="section-heading__subtitle"> <span class="text-gradient fw-semibold">{{__("About Us")}}</span>
                            </span>
                            <h2 class="section-heading__title">{{__("Details About Us and Our Operations")}}</h2>
                            <p class="section-heading__desc">{{__("Our dedicated and professional staff are available nhuw chõ ni hắn đổi thanh about ú cái tui đỏi lại nè 24/7 to ensure your maximum satisfaction during your stay. We are always ready to listen and respond to any of your needs with enthusiasm and friendliness.")}}</p>
                        </div>
                        <div class="about-box d-flex">
                            <div class="about-box__icon">
                                <img src="{{ asset('assets/customer/images/icons/about-icon.svg') }}" alt="">
                            </div>
                            <div class="about-box__content">
                                <h6 class="about-box__title">{{__("Luxury restaurant")}}</h6>
                                <p class="about-box__desc font-13">{{__("Our restaurant serves a wide range of dishes, from local cuisine to international favorites, crafted by our talented chefs. Dont miss the chance to enjoy our sumptuous breakfast buffet, as well as our diverse lunch and dinner menus.")}}</p>
                            </div>
                        </div>
                        <div class="about-button">
                            <a href="/aboutus" class="btn btn-main"> {{__("Learn More")}}<span class="icon-right"> <i
                                        class="fas fa-arrow-right"></i> </span> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- end about us --}}


    {{-- Start Convenient --}}
    {{-- <section class="property-type-three padding-t-120 padding-b-60" style="background-color: hsl(var(--white));">
        <div class="container container-two">
            <div class="section-heading style-left">
                <span class="section-heading__subtitle bg-white"> <span class="text-gradient fw-semibold">Property
                        Type</span> </span>
                <h2 class="section-heading__title">Our Room Amenities Overview</h2>
            </div>
            <div class="row gy-4">
                <div class="col-xl-4 col-sm-6 col-xs-6">
                    <div class="property-type-three-item d-flex align-items-start">
                        <span class="property-type-three-item__icon flex-shrink-0">
                            <img src="{{ asset('assets/customer/images/icons/ppty-type-icon1.svg') }}" alt="">
                        </span>
                        <div class="property-type-three-item__content">
                            <h6 class="property-type-three-item__title">Prestige Management</h6>
                            <p class="property-type-three-item__desc font-18">Real estate is a lucrative ind involves the
                                buying selling and reproperties. It encompa </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 col-xs-6">
                    <div class="property-type-three-item d-flex align-items-start">
                        <span class="property-type-three-item__icon flex-shrink-0">
                            <img src="{{ asset('assets/customer/images/icons/ppty-type-icon2.svg') }}" alt="">
                        </span>
                        <div class="property-type-three-item__content">
                            <h6 class="property-type-three-item__title">Prime Investments</h6>
                            <p class="property-type-three-item__desc font-18">Real estate is a lucrative ind involves the
                                buying selling and reproperties. It encompa </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 col-xs-6">
                    <div class="property-type-three-item d-flex align-items-start">
                        <span class="property-type-three-item__icon flex-shrink-0">
                            <img src="{{ asset('assets/customer/images/icons/ppty-type-icon3.svg') }}" alt="">
                        </span>
                        <div class="property-type-three-item__content">
                            <h6 class="property-type-three-item__title">SmartHouse Agency</h6>
                            <p class="property-type-three-item__desc font-18">Real estate is a lucrative ind involves the
                                buying selling and reproperties. It encompa </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 col-xs-6">
                    <div class="property-type-three-item d-flex align-items-start">
                        <span class="property-type-three-item__icon flex-shrink-0">
                            <img src="{{ asset('assets/customer/images/icons/ppty-type-icon4.svg') }}" alt="">
                        </span>
                        <div class="property-type-three-item__content">
                            <h6 class="property-type-three-item__title">Reliable Rentals</h6>
                            <p class="property-type-three-item__desc font-18">Real estate is a lucrative ind involves the
                                buying selling and reproperties. It encompa </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 col-xs-6">
                    <div class="property-type-three-item d-flex align-items-start">
                        <span class="property-type-three-item__icon flex-shrink-0">
                            <img src="{{ asset('assets/customer/images/icons/ppty-type-icon5.svg') }}" alt="">
                        </span>
                        <div class="property-type-three-item__content">
                            <h6 class="property-type-three-item__title">Golden Key Properties</h6>
                            <p class="property-type-three-item__desc font-18">Real estate is a lucrative ind involves the
                                buying selling and reproperties. It encompa </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 col-xs-6">
                    <div class="property-type-three-item d-flex align-items-start">
                        <span class="property-type-three-item__icon flex-shrink-0">
                            <img src="{{ asset('assets/customer/images/icons/ppty-type-icon6.svg') }}" alt="">
                        </span>
                        <div class="property-type-three-item__content">
                            <h6 class="property-type-three-item__title">Swift Home Sales</h6>
                            <p class="property-type-three-item__desc font-18">Real estate is a lucrative ind involves the
                                buying selling and reproperties. It encompa </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    {{-- End Convenient --}}


    {{-- start listing room --}}
    @include('pages.home.home_listing_room',compact('data'))
    {{-- end listing room --}}
@endsection
