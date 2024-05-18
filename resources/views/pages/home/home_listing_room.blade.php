{{-- start listing room --}}
<section class="property-two bg-gray-100 padding-t-60 padding-b-120">
    <div class="container container-two">
        <div class="section-heading">
            <span class="section-heading__subtitle bg-white">
                {{-- <span class="text-gradient fw-semibold">Latest Proparties</span> --}}
            </span>
            <h2 class="section-heading__title">{{__("Explore our room listings")}}</h2>
        </div>


        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-houses" role="tabpanel" aria-labelledby="pills-houses-tab"
                tabindex="0">
                <div class="row gy-4">
                    @if (isset($data))
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
                                        <a href="/room-detail/{{ $room->id }}/null null" class="link">
                                            <img src={{ asset("/customer/image_room/$image") }} alt=""
                                                class="cover-img">
                                        </a>
                                    </div>
                                    <div class="property-item__content">
                                        <h6 class="property-item__title">
                                            <a href="/room-detail/{{ $room->id }}/null null" class="link">
                                                {{ $room->name }}
                                            </a>
                                        </h6>

                                        <ul class="amenities-list flx-align">
                                            <li class="amenities-list__item flx-align">
                                                <span class="icon text-gradient"><i class="fas fa-bed"></i></span>
                                                <span class="text">
                                                    {{ $room->beds }} {{__("beds")}}
                                                </span>
                                            </li>
                                            <li class="amenities-list__item flx-align">
                                                <span class="icon text-gradient"><i class="fas fa-bath"></i></span>
                                                <span class="text">{{__("1 Baths")}}</span>
                                            </li>
                                        </ul>
                                        <h6 class="property-item__price"> {{ $room->price }}
                                            <span class="day">{{__("/per day")}}</span>
                                        </h6>
                                        <h6 class="property-item__price">
                                            {{ isset($count_quantity) ? $count_quantity[$i] : $room->quantity }}
                                            <span
                                                class="day">{{ isset($count_quantity) ? __('Available' ) : __('Rooms') }}</span>
                                        </h6>
                                        <p class="property-item__location d-flex gap-2">
                                            <span class="icon text-gradient"> <i
                                                    class="fas fa-map-marker-alt"></i></span>
                                            Da Nang, Viet Nam
                                        </p>
                                        <a href="/room-detail/{{ $room->id }}/null null"
                                            class="simple-btn text-gradient fw-semibold font-14">{{__("Book Now")}}
                                            <span class="icon-right"> <i class="fas fa-arrow-right"></i> </span> </a>
                                    </div>
                                </div>
                            </div>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
{{-- end listing room --}}
