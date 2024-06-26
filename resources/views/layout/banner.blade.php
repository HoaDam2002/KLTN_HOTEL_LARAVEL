@php
    use Carbon\carbon;
@endphp
<section class="banner">
    <div class="container container-two">
        <div class="position-relative">
            <div class="row">
                <div class="col-lg-6">
                    <div class="banner-inner position-relative">
                        <div class="banner-content">
                            {{-- <span class="banner-content__subtitle text-uppercase font-14">FinTech Fusion</span> --}}
                            <h1 class="banner-content__title">
                                {{__("Welcome to")}}
                                <span class="text-gradient">{{__("DANAHOTEL")}}</span>
                            </h1>
                            <p class="banner-content__desc font-18">
                               {{__("DANAHOTEL boasts a perfect blend of modern architecture and the traditional charm of VietNam. Each room is furnished with luxurious interiors and modern amenities, ensuring a comfortable and cozy stay for all our guests.")}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-0 order-1">
                    <div class="banner-thumb">
                        <img src="{{ asset('home/home1.jpg') }}" alt="" />
                        <img src="{{ asset('assets/customer/images/shapes/shape-triangle.png') }}" alt=""
                            class="shape-element one" />
                        {{-- <img src="{{ asset('assets/customer/images/shapes/shape-circle.png') }}" alt=""
                            class="shape-element two" />
                        <img src="{{ asset('assets/customer/images/shapes/shape-moon.png') }}" alt=""
                            class="shape-element three" /> --}}
                    </div>
                </div>
                <div class="col-lg-10 m-auto">
                    <ul class="common-tab nav nav-pills" id="pills-tab" role="tablist">
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-rent" role="tabpanel"
                            aria-labelledby="pills-rent-tab" tabindex="0">
                            <div class="filter">
                                <form action="/customer/find_room" method="POST">
                                    @csrf
                                    <div class="row gy-sm-4 gy-3">
                                        <div class="col-lg-8 col-sm-6 col-xs-6">
                                            @php
                                                $current_day = Carbon::now();
                                                $next_day = $current_day->addDay()->format('d/m/Y');
                                                $current_day = Carbon::now()->format('d/m/Y');
                                            @endphp
                                            <input type="text" class="common-input" name="daterange" id="daterange_home" value="{{ $current_day . ' - ' . $next_day }}" />
                                        </div>
                                        {{-- <div class="col-lg-4 col-sm-6 col-xs-6">
                                            <div class="select-has-icon icon-black">
                                                <select class="select common-input" name="room_type" class="room_type">
                                                    <option selected value="">Choose Type Room</option>
                                                    @php
                                                        if(session()->has('type_room')){
                                                            $type_room = session('type_room');
                                                        }
                                                    @endphp
                                                    @foreach ($type_room as $value )
                                                        <option value="{{$value->id}}">{{$value->name}}</option>                                 
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div> --}}

                                        <div class="col-lg-4 col-sm-6 col-xs-6">
                                            <button type="submit" class="btn btn-main w-100">
                                               {{__("Find Now")}}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
