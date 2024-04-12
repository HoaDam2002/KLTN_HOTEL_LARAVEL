@php
    use Carbon\carbon;
@endphp
@extends('layout.app')

@section('content')
    <section class="property bg-gray-100 padding-y-120">
        <div class="container container-two">
            <div class="property-filter">
                {{-- <form action="#">
                    <div class="row gy-4">
                        <div class="col-lg-4 col-md-3 col-sm-6 col-xs-6">
                            <div class="select-has-icon">
                                <select class="form-select common-input common-input--withLeftIcon pill text-gray-800"
                                    id="type">
                                    <option value="" selected="">Type</option>
                                    @foreach ($type_room as $type)
                                        <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                                    @endforeach
                                </select>
                                <span class="input-icon input-icon--left text-gradient">
                                    <img src="assets/images/icons/type.svg" alt="">
                                </span>
                            </div>

                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                            <div class="position-relative">
                                <input type="text" class="common-input common-input--withLeftIcon pill text-gray-800"
                                    id="name" placeholder="Name Room">
                                <span class="input-icon input-icon--left text-gradient">
                                    <img src="assets/images/icons/filter.svg" alt="">
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                            <div class="position-relative">
                                <input type="text" class="common-input common-input--withLeftIcon pill text-gray-800"
                                    id="price" placeholder="Price">
                                <span class="input-icon input-icon--left text-gradient">
                                    <img src="assets/images/icons/filter.svg" alt="">
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-6 col-xs-6">
                            <div class="select-has-icon">
                                <select class="form-select common-input common-input--withLeftIcon pill text-gray-800"
                                    id="bed">
                                    <option value="" selected="">Beds</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                                <span class="input-icon input-icon--left text-gradient">
                                    <img src="assets/images/icons/status.svg" alt="">
                                </span>
                            </div>
                        </div>
                    </div>
                </form> --}}
                <form action="/customer/find_room" method="POST">
                    @csrf
                    <div class="row gy-sm-4 gy-3">
                        <div class="col-lg-4 col-sm-6 col-xs-6">
                            @php
                                $current_day = Carbon::now();
                                $next_day = $current_day->addDay()->format('d/m/Y');
                                $current_day = Carbon::now()->format('d/m/Y');
                            @endphp
                            <input type="text" class="common-input" name="daterange" id="daterange_home"
                                value="{{ $current_day . ' - ' . $next_day }}" />
                        </div>
                        <div class="col-lg-4 col-sm-6 col-xs-6">
                            <div class="select-has-icon icon-black">
                                <select class="select common-input" name="room_type" class="room_type">
                                    <option selected value="">Choose Type Room</option>
                                    @php
                                        if (session()->has('type_room')) {
                                            $type_room = session('type_room');
                                        }
                                    @endphp
                                    @foreach ($type_room as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-6 col-xs-6">
                            <button type="submit" class="btn btn-main w-100">
                                Find Now
                            </button>
                        </div>
                    </div>
                </form>

                {{-- <h3 style="text-align: center;">Our Room</h3> --}}

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

            <div class="list-grid-item-wrapper show-two-item row gy-4" id="renderRoom">
                @if (!empty($data))
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($data as $room)
                        @php
                            $image = $room->images;
                        @endphp
                        <div class="col-lg-4 col-sm-6">
                            <div class="property-item style-two">
                                <div class="property-item__thumb">
                                    <a href="/room-detail/{{ $room->id }}" class="link">
                                        <img src={{ asset("/customer/image_room/$image") }} alt=""
                                            class="cover-img">
                                    </a>
                                </div>
                                <div class="property-item__content">
                                    <h6 class="property-item__title">
                                        <a href="/room-detail/{{ $room->id }}" class="link"> {{ $room->name }}
                                        </a>
                                    </h6>

                                    <ul class="amenities-list flx-align">
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bed"></i></span>
                                            <span class="text">
                                                {{ $room->beds }} beds
                                            </span>
                                        </li>
                                        <li class="amenities-list__item flx-align">
                                            <span class="icon text-gradient"><i class="fas fa-bath"></i></span>
                                            <span class="text">1 Baths</span>
                                        </li>
                                    </ul>
                                    <h6 class="property-item__price"> {{ $room->price }}
                                        <span class="day">/per day</span>
                                    </h6>
                                    <h6 class="property-item__price">
                                        {{ isset($count_quantity) ? $count_quantity[$i] : $room->quantity }}
                                        <span class="day">{{ isset($count_quantity) ? 'Available' : 'Rooms' }}</span>
                                    </h6>
                                    <p class="property-item__location d-flex gap-2">
                                        <span class="icon text-gradient"> <i class="fas fa-map-marker-alt"></i></span>
                                        Da Nang, Viet Nam
                                    </p>
                                    <a href="/room-detail/{{ $room->id }}"
                                        class="simple-btn text-gradient fw-semibold font-14">Book Now
                                        <span class="icon-right"> <i class="fas fa-arrow-right"></i> </span> </a>
                                </div>
                            </div>
                        </div>
                        @php
                            $i++;
                        @endphp
                    @endforeach
                @else
                    <h4 style="text-align: center;">None of room available for the time that you chosen</h4>
                @endif
            </div>
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

@section('js')
    {{-- <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let type, price, name, bed = "";

            $('select#type, input#name, input#price, select#bed').change(function() {
                var type = $('select#type').val();
                var name = $('input#name').val();
                var price = $('input#price').val();
                var bed = $('select#bed').val();


                $.ajax({
                    type: "post",
                    url: "{{ url('room/search') }}",
                    data: {
                        type: type,
                        name: name,
                        price: price,
                        bed: bed,
                    },
                    success: function(response) {
                        let item = response.item
                        console.log(item)
                        let html = '';
                        if (item.length != 0) {
                            response.item.map(function(value, key) {
                                let type_name = value.type_room.type_name;
                                let url = "{{ asset('/customer/image_room') }}" + "/" +
                                    type_name + "/" + value.images
                                html += '<div class="col-lg-4 col-sm-6">' +
                                    '<div class="property-item style-two">' +
                                    '<div class="property-item__thumb">' +
                                    '<a href="/room-detail/' + value.id +
                                    '" class="link">' +
                                    '<img src="' + url + '" alt="" class="cover-img">' +
                                    '</a>' +
                                    '</div>' +
                                    '<div class="property-item__content">' +
                                    '<h6 class="property-item__title">' +
                                    '<a href="/room-detail/' + value.id +
                                    '" class="link">' + value
                                    .name + '</a>' +
                                    '</h6>' +
                                    '<ul class="amenities-list flx-align">' +
                                    '<li class="amenities-list__item flx-align">' +
                                    '<span class="icon text-gradient"><i class="fas fa-bed"></i></span>' +
                                    '<span class="text">' + value.beds +
                                    ' beds</span>' +
                                    '</li>' +
                                    '<li class="amenities-list__item flx-align">' +
                                    '<span class="icon text-gradient"><i class="fas fa-bath"></i></span>' +
                                    '<span class="text">1 Baths</span>' +
                                    '</li>' +
                                    '</ul>' +
                                    '<h6 class="property-item__price">' + value.price +
                                    '<span class="day">/per day</span></h6>' +
                                    '<p class="property-item__location d-flex gap-2">' +
                                    '<span class="icon text-gradient"> <i class="fas fa-map-marker-alt"></i></span>' +
                                    'Da Nang, Viet Nam' +
                                    '</p>' +
                                    '<a href="property-details.html" class="simple-btn text-gradient fw-semibold font-14">Book Now<span class="icon-right"> <i class="fas fa-arrow-right"></i> </span> </a>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>';
                            })

                        } else {
                            html = '<h6>Not Avaiable</h6>'
                        }
                        $('div#renderRoom').html(html);
                        $('nav#paginate').remove();
                    }
                });

            });
        })
    </script> --}}
@endsection
