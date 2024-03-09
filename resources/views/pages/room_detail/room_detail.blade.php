@extends('layout.app')
@section('css')
    <style>
        .avatar_comment {
            width: 60px;
            height: 60px;
            margin-right: 15px;
            object-fit: contain;
            border-radius: 50%;
        }

        .date_comment {
            font-size: 13px;
        }

        .info_comment {
            display: flex;
            align-items: center;
        }

        .common-sidebar-wrapper {
            top: 50px;
        }

        .price_wrapper {
            background-color: #fff;
            border-radius: 20px;
            overflow: hidden;

        }

        .price {
            box-sizing: border-box;
            background-color: #33333333;
            text-align: center;
            padding: 10px 0;
            color: black;
        }

        .price span {
            font-size: 20px;
        }

        .price strong {
            font-size: 25px;
        }

        .info_price {
            padding: 30px;
        }

        .action_price select {
            height: 60px;
        }

        .down_payment {
            display: flex;
            justify-content: space-between;
            font-size: 20px;
        }

        .btn_request_book {
            background: var(--main-gradient);
            width: 100%;
            padding: 15px;
            margin-top: 20px;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
            color: #fff;
            font-size: 20px;
        }

        .name_room {
            margin: 0;
        }
    </style>
@endsection
@section('content')
    <section class="property-details padding-y-60">
        <div class="container container-two">
            <div class="row gy-4">
                <div class="col-lg-8">
                    <div class="row gy-4">
                        <h5 class="name_room">Garden View Room</h5>
                        <div class="col-sm-12 col-6" style="margin-top: 5px;">
                            <div class="property-details__thumb">
                                <img src="{{ asset('assets/customer/images/thumbs/property-details-1.png') }}" alt=""
                                    class="cover-img">
                            </div>
                        </div>
                        <div class="col-sm-4 col-6">
                            <div class="property-details__thumb">
                                <img src="{{ asset('assets/customer/images/thumbs/property-details-2.png') }}"
                                    alt="" class="cover-img">
                            </div>
                        </div>
                        <div class="col-sm-4 col-6">
                            <div class="property-details__thumb">
                                <img src="{{ asset('assets/customer/images/thumbs/property-details-3.png') }}"
                                    alt="" class="cover-img">
                            </div>
                        </div>
                        <div class="col-sm-4 col-6">
                            <div class="property-details__thumb">
                                <img src="{{ asset('assets/customer/images/thumbs/property-details-4.png') }}"
                                    alt="" class="cover-img">
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
                                                <img src="{{ asset('assets/customer/images/icons/amenities1.svg') }}"
                                                    alt="">
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
                                                <img src="{{ asset('assets/customer/images/icons/amenities2.svg') }}"
                                                    alt="">
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
                                                <img src="{{ asset('assets/customer/images/icons/amenities3.svg') }}"
                                                    alt="">
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
                                                <img src="{{ asset('assets/customer/images/icons/amenities4.svg') }}"
                                                    alt="">
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
                                                <img src="{{ asset('assets/customer/images/icons/amenities5.svg') }}"
                                                    alt="">
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
                                                <img src="{{ asset('assets/customer/images/icons/amenities6.svg') }}"
                                                    alt="">
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
                                <p>This room is located on a high floor of the hotel, offering guests a magnificent view
                                    of the city or the surrounding landscape. Upon entering, natural light floods in from
                                    the large windows, illuminating the spacious and airy space. The interior decoration
                                    adopts a modern and luxurious style, with bright colors and meticulously designed
                                    furniture.
                                </p><br>
                                <p>
                                    The room is equipped with all modern amenities to ensure comfort and convenience for
                                    guests, including a large and comfortable bed, a convenient work desk, a cozy sofa, and
                                    a small living area for relaxation. Additionally, the room comes with a luxurious
                                    bathroom featuring premium toiletries and either a bathtub or a standing shower,
                                    providing guests with a delightful bathing experience.
                                </p><br>
                                <p>
                                    Guests can also enjoy the hotel's amenities such as 24/7 room service, restaurants, and
                                    bars serving delicious food and a variety of drinks, a gym, and a spa to unwind after a
                                    long day of exploring the city. This room is an ideal choice for travelers looking to
                                    indulge in a comfortable and luxurious holiday.</p>
                            </div>
                        </div>
                        <div class="property-details-item">
                            <h6 class="property-details-item__title">Evaluate</h6>
                            <div class="shadow">
                                <div class="my-1 py-1">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-md-12 col-lg-12">
                                            <div class="card text-dark">
                                                <div class="card-body p-4">
                                                    <div class="d-flex flex-start">
                                                        <img class="avatar_comment"
                                                            src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(23).webp"
                                                            alt="avatar" />
                                                        <div>
                                                            <h6 class="fw-bold mb-2">Maggie Marsh</h6>
                                                            <div class="info_comment mb-2">
                                                                <div class="rateYo" id="rate1" data-rating="3"></div>
                                                                <div class="d-flex align-items-center ms-1">
                                                                    <p class="mb-0 date_comment">
                                                                        March 07, 2021
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <p class="mb-0">
                                                                Lorem Ipsum is simply dummy text of the printing and
                                                                typesetting
                                                                industry. Lorem Ipsum has been the industry's standard dummy
                                                                text ever
                                                                since the 1500s, when an unknown printer took a galley of
                                                                type and
                                                                scrambled it.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- <hr class="my-0" /> --}}

                                                <div class="card-body p-4">
                                                    <div class="d-flex flex-start">
                                                        <img class="avatar_comment"
                                                            src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(23).webp"
                                                            alt="avatar" />
                                                        <div>
                                                            <h6 class="fw-bold mb-2">Maggie Marsh</h6>
                                                            <div class="info_comment mb-2">
                                                                <div class="rateYo" id="rate2" data-rating="4"></div>
                                                                <div class="d-flex align-items-center ms-1">
                                                                    <p class="mb-0 date_comment">
                                                                        March 07, 2021
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <p class="mb-0">
                                                                Lorem Ipsum is simply dummy text of the printing and
                                                                typesetting
                                                                industry. Lorem Ipsum has been the industry's standard dummy
                                                                text ever
                                                                since the 1500s, when an unknown printer took a galley of
                                                                type and
                                                                scrambled it.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- <hr class="my-0" style="height: 1px;" /> --}}

                                                <div class="card-body p-4">
                                                    <div class="d-flex flex-start">
                                                        <img class="avatar_comment"
                                                            src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(23).webp"
                                                            alt="avatar" />
                                                        <div>
                                                            <h6 class="fw-bold mb-2">Maggie Marsh</h6>
                                                            <div class="info_comment mb-2">
                                                                <div class="rateYo" id="rate3" data-rating="5"></div>
                                                                <div class="d-flex align-items-center ms-1">
                                                                    <p class="mb-0 date_comment">
                                                                        March 07, 2021
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <p class="mb-0">
                                                                Lorem Ipsum is simply dummy text of the printing and
                                                                typesetting
                                                                industry. Lorem Ipsum has been the industry's standard dummy
                                                                text ever
                                                                since the 1500s, when an unknown printer took a galley of
                                                                type and
                                                                scrambled it.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <hr class="my-0" />

                                                <div class="card-body p-4">
                                                    <div class="d-flex flex-start">
                                                        <img class="avatar_comment"
                                                            src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(23).webp"
                                                            alt="avatar" />
                                                        <div>
                                                            <h6 class="fw-bold mb-2">Maggie Marsh</h6>
                                                            <div class="info_comment mb-2">
                                                                <div class="rateYo" id="rate4" data-rating="1"></div>
                                                                <div class="d-flex align-items-center ms-1">
                                                                    <p class="mb-0 date_comment">
                                                                        March 07, 2021
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <p class="mb-0">
                                                                Lorem Ipsum is simply dummy text of the printing and
                                                                typesetting
                                                                industry. Lorem Ipsum has been the industry's standard dummy
                                                                text ever
                                                                since the 1500s, when an unknown printer took a galley of
                                                                type and
                                                                scrambled it.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="common-sidebar-wrapper price_wrapper shadow">
                        <div class="price">
                            <span>from <strong>$40</strong> / night</span>
                        </div>
                        <div class="info_price">
                            <form action="" class="action_price">
                                <input type="text" class="common-input" name="daterange"
                                    value="01/01/2018 - 01/15/2018" />
                                <select class="form-select form-select-lg mb-3" aria-label="Large select example">
                                    <option selected>Select Guests</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </form>
                            <div class="down_payment">
                                <span>Down-Payment Total</span>
                                <strong>$12</strong>
                            </div>
                            <button class="btn_request_book">Request to book</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.rateYo').each((key, element) => {
                let id = $(element).attr('id');
                let rate = $(element).attr('data-rating');
                data_rating(id, rate);
            });
        })

        function data_rating(id, rate) {
            $(function() {
                $(`#${id}`).rateYo({
                    rating: rate,
                    readOnly: true,
                    starWidth: "15px"
                });
            });
        }

        //daterangerpicker
        $(function() {
            $('input[name="daterange"]').daterangepicker({
                opens: 'left'
            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end
                    .format('YYYY-MM-DD'));
            });
        });
    </script>
@endsection
