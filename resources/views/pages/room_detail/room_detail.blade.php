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
            /* background: var(--main-gradient); */
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

        .numberofroomandguests {
            border: 1px solid #ced4da;
            height: 60px;
            border-radius: 10px;
            text-align: left;
            align-items: center;
            line-height: 60px;
            padding: 0 16px;
            display: block !important;
            position: relative !important;
        }

        .dropdown_numberof {
            width: 100%;
            inset: 0px auto auto 0px;
            margin: 0px;
            transform: translate3d(0px, 61.3333px, 0px) !important;
            position: absolute;
        }

        .item_numberof {
            display: flex;
            justify-content: space-between;
            padding: 0 16px;
        }

        .wrapper_btn_numberof {}

        .minus_btn {
            width: 30px;
            height: 30px;
            text-align: center;
            line-height: 30px;
            border: 1px solid #333;
            border-radius: 50%;
        }

        .quantity_numberof {
            margin: 0 10px;
        }

        .plus_btn {
            width: 30px;
            height: 30px;
            text-align: center;
            line-height: 30px;
            border: 1px solid #333;
            border-radius: 50%;
        }
    </style>
@endsection
@section('content')
    <section class="property-details padding-y-60">
        <div class="container container-two">
            <div class="row gy-4">
                <div class="col-lg-8">
                    <div class="row gy-4">
                        <h5 class="name_room">{{ $room[0]['name'] }}</h5>
                        <div class="col-sm-12 col-6" style="margin-top: 5px;">
                            <div class="property-details__thumb">
                                @php
                                    $image = $room[0]['images'];
                                    if ($checkin != 'null' && $checkout != 'null') {
                                        $checkin[4] = '/';
                                        $checkin[7] = '/';
                                        $checkout[4] = '/';
                                        $checkout[7] = '/';
                                    }
                                    // dd($checkin,$checkout)
                                @endphp
                                <img src="{{ asset("/customer/image_room/detail/$image") }}" alt=""
                                    class="cover-img">
                            </div>
                        </div>
                    </div>
                    <div class="property-details-wrapper">
                        <div class="property-details-item">
                            <h6 class="property-details-item__title">{{ __('Preview') }}</h6>
                            <div class="property-details-item__content">
                                <div class="row gy-4 gy-lg-5">
                                    <div class="col-sm-4 col-6">
                                        <div class="amenities-content d-flex align-items-center">
                                            <span class="amenities-content__icon">
                                                <img src="{{ asset('assets/customer/images/icons/client-statistics.svg') }}"
                                                    alt="">
                                            </span>
                                            <div class="amenities-content__inner">
                                                <span class="amenities-content__text"> {{ __('Max Person') }}</span>
                                                <h6 class="amenities-content__title mb-0 font-16">{{ $room[0]['person'] }}
                                                    {{ __('Person') }}</h6>
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
                                                <span class="amenities-content__text">{{ __('Bed') }}</span>
                                                <h6 class="amenities-content__title mb-0 font-16">{{ $room[0]['beds'] }}
                                                    {{ __('Beds') }}</h6>
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
                                                <span class="amenities-content__text">{{ __('Bath') }}</span>
                                                <h6 class="amenities-content__title mb-0 font-16">{{ __('1 Baths') }}</h6>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4 col-6">
                                        <div class="amenities-content d-flex align-items-center">
                                            <span class="amenities-content__icon">
                                                <img src="{{ asset('assets/customer/images/icons/amenities1.svg') }}"
                                                    alt="">
                                            </span>
                                            <div class="amenities-content__inner">
                                                <span class="amenities-content__text">{{ __('Available Room') }}</span>
                                                <h6 class="amenities-content__title mb-0 font-16 available_room">
                                                    {{ $count_available }}
                                                    <span>{{ __('Room') }}</span>
                                                </h6>
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
                                                <span class="amenities-content__text">{{ __('Property Type') }}</span>
                                                <h6 class="amenities-content__title mb-0 font-16">{{ __('Apartment') }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="property-details-item">
                            <h6 class="property-details-item__title">{{ __('Features') }}</h6>
                            <div class="property-details-item__content">
                                <p>{{ __('This room is located on a high floor of the hotel, offering guests a magnificent view of the city or the surrounding landscape. Upon entering, natural light floods in from the large windows, illuminating the spacious and airy space. The interior decoration adopts a modern and luxurious style, with bright colors and meticulously designed furniture.') }}
                                </p><br>
                                <p>
                                    {{ __('The room is equipped with all modern amenities to ensure comfort and convenience for guests, including a large and comfortable bed, a convenient work desk, a cozy sofa, and a small living area for relaxation. Additionally, the room comes with a luxurious bathroom featuring premium toiletries and either a bathtub or a standing shower, providing guests with a delightful bathing experience.') }}
                                </p><br>
                                <p>{{ __("Guests can also enjoy the hotel's amenities such as 24/7 room service, restaurants, and bars serving delicious food and a variety of drinks, a gym, and a spa to unwind after a long day of exploring the city. This room is an ideal choice for travelers looking to indulge in a comfortable and luxurious holiday.") }}
                                </p>
                            </div>
                        </div>
                        <div class="property-details-item">
                            <h6 class="property-details-item__title">{{ __('Evaluate') }}</h6>
                            <div class="shadow">
                                <div class="my-1 py-1">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-md-12 col-lg-12">
                                            <div class="card text-dark">
                                                @if (!empty($comment))
                                                    {{-- {{ dd($comment) }} --}}
                                                    @foreach ($comment as $item)
                                                        @php
                                                            $avatar = $item['user']['customer']['avatar'];
                                                            $name = $item['user']['name'];
                                                            $date = $item['created_at'];
                                                            $comment = $item['comment'];

                                                            $date = new DateTime($date);

                                                            $formatted_time = $date->format('F d, Y');
                                                        @endphp
                                                        <div class="card-body p-4">
                                                            <div class="d-flex flex-start">
                                                                <img class="avatar_comment"
                                                                    src='{{ asset("/customer/avatar/$avatar") }}'
                                                                    alt="avatar" />
                                                                <div>
                                                                    <h6 class="fw-bold mb-2">{{ $name }}</h6>
                                                                    <div class="info_comment mb-2">
                                                                        <div class="rateYo" id="rate{{ $item['id'] }}"
                                                                            data-rating="{{ $item['rate'] }}">
                                                                        </div>
                                                                        <div class="d-flex align-items-center ms-1">
                                                                            <p class="mb-0 date_comment">
                                                                                {{ $formatted_time }}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <p class="mb-0">
                                                                        {{ $comment }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif

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
                            <span>{{ __('From') }} <strong>${{ $room[0]['price'] }}</strong>
                                {{ __('/ night') }}</span>
                        </div>
                        <div class="info_price">
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissble">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ url('pay/session') }}" class="action_price" method="post">
                                @csrf
                                <input type="text" class="common-input" name="daterange" value=""
                                    style="border-radius: 10px" />
                                <input type="text" name="name" class="name" value="{{ $room[0]['name'] }}" hidden>
                                <input type="text" name="deposits" class="deposits" hidden>
                                <input type="text" name="id_room" class="id_room" value="{{ $room[0]['id'] }}"
                                    hidden>

                                <input type="text" name="price" class="price" value="{{ $room[0]['price'] }}"
                                    hidden>
                                <input type="text" name="check_in" class="checkin" hidden>
                                <input type="text" name="check_out" class="checkout" hidden>
                                <input type="text" name="quantity" class="quantity" hidden>
                                <input type="text" name="total" class="total" hidden>
                                <input type="text" name="guests" class="guests" hidden>

                                <div class="dropdown numberofroomandguests mb-3">
                                    <div class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="true"
                                        data-bs-auto-close="outside" id="number_of_rg">
                                        {{ __('Rooms') . ": 1, " . __('Guests:') . " 4" }}</div>

                                    <div class="dropdown-menu dropdown_numberof">
                                        <div class="item_numberof">
                                            <span>{{ __('Rooms') }}</span>
                                            <div class="wrapper_btn_numberof">
                                                <button class="minus_btn" id="minus_room"><span>-</span></button>
                                                <span class="quantity_numberof" id="quantity_room">1</span>
                                                <button class="plus_btn" id="plus_room"><span>+</span></button>
                                            </div>
                                        </div>
                                        <div class="item_numberof">
                                            <span>Guests</span>
                                            <div class="wrapper_btn_numberof">
                                                <button class="minus_btn" id="minus_guest"><span>-</span></button>
                                                <span class="quantity_numberof" id="quantity_guest">4</span>
                                                <button class="plus_btn" id="plus_guest"><span>+</span></button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="down_payment duration">
                                    <span>{{ __('Duration') }}</span>
                                    <strong>{{ $diffInDays ? $diffInDays : 1 }} {{ __('day') }}</strong>
                                </div>
                                <div class="down_payment total">
                                    <span>{{ __('Total') }}</span>
                                    <strong>{{ $diffInDays ? $diffInDays * $room[0]['price'] : $room[0]['price'] }}$</strong>
                                </div>
                                <span
                                    style="font-weight: bold; text-align: center; margin-top: 20px;">{{ __('You must deposit 20% in advance to request a reservation') }}</span>

                                <button class="btn_request_book request_deposit" type="submit">{{ __('Deposit') . " " }}
                                    {{ $diffInDays ? $diffInDays * $room[0]['price'] * 0.2 : $room[0]['price'] * 0.2 }}$</button>
                            </form>

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
            let count_guests = 4;
            let count_rooms = 1;

            let max_person = {{ $room[0]['person'] }}
            let available_room = parseInt($('.available_room').text(), 10)

            let available_person = max_person;

            let duration = 1;
            let price = {{ $room[0]['price'] }}
            let total = price;
            let deposit = total * 0.2;

            checkin = "{{ $checkin }}"
            checkout = "{{ $checkout }}"

            console.log(checkin, checkout);

            if (checkin == 'null' && checkout == 'null') {
                $('button.request_deposit').prop('disabled', true);

                $('button.minus_btn').prop('disabled', true);
                $('button.plus_btn').prop('disabled', true);

                $('button.request_deposit').css('background-color', 'rgb(214,214,214)');
            } else {
                duration = {{ $diffInDays }}
                total = duration * price
                deposit = total * 0.2;
                $('input.checkin').val(checkin);
                $('input.checkout').val(checkout);
                $('button.request_deposit').css('background', 'var(--main-gradient)');
            }

            $('input.deposits').val(deposit);
            $('input.total').val(total);
            $('input.deposit').val(deposit);
            $('input.quantity').val(count_rooms);
            $('input.guests').val(count_guests);
            
            $('.rateYo').each((key, element) => {
                let id = $(element).attr('id');
                let rate = $(element).attr('data-rating');
                data_rating(id, rate);
            });

            $('input[name="daterange"]').on('apply.daterangepicker', function(ev, picker) {
                var startDate = picker.startDate.format('YYYY-MM-DD');
                var endDate = picker.endDate.format('YYYY-MM-DD');
                console.log(startDate === endDate);
                if (startDate === endDate) {
                    $('button.request_deposit').css('background-color', 'rgb(214,214,214)');
                    $('button.request_deposit').prop('disabled', true);
                    alert('{{ __('Please choose different arrival and departure dates') }}')
                    return;
                } else {
                    duration = picker.endDate.diff(picker.startDate, 'days');
                    up();

                    $.ajax({
                        type: "post",
                        url: "/customer/find_room/ajax",
                        data: {
                            checkin: checkin,
                            checkout: checkout,
                            id_room: {{ $room[0]['id'] }},
                        },
                        dataType: "json",
                        success: function(response) {
                            let data = response.room

                            if (data != null) {
                                $('button.request_deposit').css('background',
                                    'var(--main-gradient)');
                                $('button.request_deposit').prop('disabled', false);

                                $('button.minus_btn').prop('disabled', false);
                                $('button.plus_btn').prop('disabled', false);
                                available_room = data.length;
                            }
                        }
                    });
                }
            });

            function data_rating(id, rate) {
                $(function() {
                    $(`#${id}`).rateYo({
                        rating: rate,
                        readOnly: true,
                        starWidth: "15px"
                    });
                });
            };

            $(function() {
                $('input[name="daterange"]').daterangepicker({
                    opens: 'left',
                    minDate: moment(),
                    autoApply: true,
                    startDate: checkin != 'null' ? moment(checkin, 'YYYY-MM-DD') : moment(),
                    endDate: checkout != 'null' ? moment(checkout, 'YYYY-MM-DD') : moment()
                }, function(start, end, label) {
                    checkin = start.format('YYYY-MM-DD');
                    checkout = end.format('YYYY-MM-DD');

                    $('input.checkin').val(checkin);
                    $('input.checkout').val(checkout);
                    console.log(checkin, checkout);

                    duration = end.diff(start, 'days') + 1;
                });
            });

            $('#minus_room').click(function(e) {
                e.preventDefault();
                if (count_rooms > 1) {
                    count_rooms -= 1;
                    $('#quantity_room').html(count_rooms);
                    available_person = count_rooms * max_person;
                    let a = $('#quantity_guest').text();
                    if (a != available_person) {
                        count_guests = available_person;
                        $('#quantity_guest').html(count_guests);
                    }
                    up();

                }
                updateNumberOfRG();
            })

            $('#plus_room').click(function(e) {
                e.preventDefault();
                if (count_rooms < available_room) {
                    count_rooms += 1;
                    available_person = count_rooms * max_person;
                    count_guests = available_person;
                    $('#quantity_guest').html(count_guests);
                    up();
                }
                $('#quantity_room').html(count_rooms);
                updateNumberOfRG();
            })

            $('#minus_guest').click(function(e) {
                e.preventDefault();
                if (count_guests > 1) {
                    count_guests -= 1;
                    $('#quantity_guest').html(count_guests);
                    up();

                }
                updateNumberOfRG();
            })

            $('#plus_guest').click(function(e) {
                e.preventDefault();
                if (count_guests < available_person) {
                    count_guests += 1;
                    $('#quantity_guest').html(count_guests);
                    up();
                }
                updateNumberOfRG();
            })

            function up() {
                total = duration * ({{ $room[0]['price'] }} * count_rooms);
                deposit = total * 0.2;
                $('.request_deposit').text(' {{ __('Deposit') }}' + deposit + '$');
                $('.total strong').text('$' + total);
                $('.duration strong').text(duration + ' days');

                $('input.deposits').val(deposit);
                $('input.total').val(total);
                $('input.quantity').val(count_rooms);
                $('input.guests').val(count_guests);
            }

            function updateNumberOfRG() {
                if (count_guests > 0 || count_rooms > 0) {
                    $('#number_of_rg').html(
                        `{{ __('Rooms:') }} ${count_rooms}, {{ __('Guests:') }} ${count_guests}`);
                } else {
                    $('#number_of_rg').html('{{ __('Number of rooms and guests') }}');
                }
            }
        })
    </script>
@endsection
