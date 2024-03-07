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
                            <span class="banner-content__subtitle text-uppercase font-14">FinTech Fusion</span>
                            <h1 class="banner-content__title">
                                Invest today in You
                                <span class="text-gradient">Dream Home</span>
                            </h1>
                            <p class="banner-content__desc font-18">
                                Unlock the Power of Real Estate Making Your Real Estate
                                Dreams a Reality Real Estate here Unlock the Power of
                                Real Estate
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-0 order-1">
                    <div class="banner-thumb">
                        <img src="{{ asset('assets/customer/images/thumbs/banner-img.png') }}" alt="" />
                        <img src="{{ asset('assets/customer/images/shapes/shape-triangle.png') }}" alt=""
                            class="shape-element one" />
                        <img src="{{ asset('assets/customer/images/shapes/shape-circle.png') }}" alt=""
                            class="shape-element two" />
                        <img src="{{ asset('assets/customer/images/shapes/shape-moon.png') }}" alt=""
                            class="shape-element three" />
                    </div>
                </div>
                <div class="col-lg-12">
                    <ul class="common-tab nav nav-pills" id="pills-tab" role="tablist">
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-rent" role="tabpanel"
                            aria-labelledby="pills-rent-tab" tabindex="0">
                            <div class="filter">
                                <form action="#">
                                    <div class="row gy-sm-4 gy-3">
                                        <div class="col-lg-3 col-sm-6 col-xs-6">
                                            @php
                                                $currentDay = Carbon::now();
                                                // dd($currentDay);
                                            @endphp
                                            {{-- <input type="text" class="common-input" placeholder="Enter Keyword" /> --}}
                                            <input type="text" class="common-input" name="daterange" value="01/01/2018 - 01/15/2018" />
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-xs-6">
                                            <div class="select-has-icon icon-black">
                                                <select class="select common-input">
                                                    <option value="1" disabled>
                                                        Property Type
                                                    </option>
                                                    <option value="1">Apartment</option>
                                                    <option value="1">House</option>
                                                    <option value="1">Land</option>
                                                    <option value="1">
                                                        Single Family
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-xs-6">
                                            <div class="select-has-icon icon-black">
                                                <select class="select common-input">
                                                    <option value="1" disabled>
                                                        Location
                                                    </option>
                                                    <option value="1">
                                                        Bangladesh
                                                    </option>
                                                    <option value="1">Japan</option>
                                                    <option value="1">Korea</option>
                                                    <option value="1">Singapore</option>
                                                    <option value="1">Germany</option>
                                                    <option value="1">Thailand</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-xs-6">
                                            <button type="submit" class="btn btn-main w-100">
                                                Find Now
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-buy" role="tabpanel" aria-labelledby="pills-buy-tab"
                            tabindex="0">
                            <div class="filter">
                                <form action="#">
                                    <div class="row gy-sm-4 gy-3">
                                        <div class="col-lg-3 col-sm-6 col-xs-6">
                                            <input type="text" class="common-input" placeholder="Enter Keyword" />
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-xs-6">
                                            <div class="select-has-icon icon-black">
                                                <select class="select common-input">
                                                    <option value="1" disabled>
                                                        Property Type
                                                    </option>
                                                    <option value="1">Apartment</option>
                                                    <option value="1">House</option>
                                                    <option value="1">Land</option>
                                                    <option value="1">
                                                        Single Family
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-xs-6">
                                            <div class="select-has-icon icon-black">
                                                <select class="select common-input">
                                                    <option value="1" disabled>
                                                        Location
                                                    </option>
                                                    <option value="1">
                                                        Bangladesh
                                                    </option>
                                                    <option value="1">Japan</option>
                                                    <option value="1">Korea</option>
                                                    <option value="1">Singapore</option>
                                                    <option value="1">Germany</option>
                                                    <option value="1">Thailand</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-xs-6">
                                            <button type="submit" class="btn btn-main w-100">
                                                Find Now
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-sell" role="tabpanel" aria-labelledby="pills-sell-tab"
                            tabindex="0">
                            <div class="filter">
                                <form action="#">
                                    <div class="row gy-sm-4 gy-3">
                                        <div class="col-lg-3 col-sm-6 col-xs-6">
                                            <input type="text" class="common-input" placeholder="Enter Keyword" />
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-xs-6">
                                            <div class="select-has-icon icon-black">
                                                <select class="select common-input">
                                                    <option value="1" disabled>
                                                        Property Type
                                                    </option>
                                                    <option value="1">Apartment</option>
                                                    <option value="1">House</option>
                                                    <option value="1">Land</option>
                                                    <option value="1">
                                                        Single Family
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-xs-6">
                                            <div class="select-has-icon icon-black">
                                                <select class="select common-input">
                                                    <option value="1" disabled>
                                                        Location
                                                    </option>
                                                    <option value="1">
                                                        Bangladesh
                                                    </option>
                                                    <option value="1">Japan</option>
                                                    <option value="1">Korea</option>
                                                    <option value="1">Singapore</option>
                                                    <option value="1">Germany</option>
                                                    <option value="1">Thailand</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-xs-6">
                                            <button type="submit" class="btn btn-main w-100">
                                                Find Now
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

@section('js')
<script>
    $(function() {

      $('input[name="daterange"]').daterangepicker({
        opens: 'left'
      }, function(start, end, label) {
        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
      });
    });
    </script>
    
@endsection