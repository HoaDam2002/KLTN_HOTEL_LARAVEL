@extends('pages.account.account')

@section('css')
    <style>
        /* .room_diagram .row {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        margin: auto;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    } */

        .card {
            padding: 0;

        }

        .card-body {
            min-height: 180px;
            position: relative;
        }

        .card-deposited {
            background-color: #FFE69C;
        }

        .card-using {
            background-color: rgb(224, 207, 252);
            color: #000;
        }

        .card-checkin {
            background-color: rgb(117, 183, 152)
        }

        .btn-action {
            position: absolute;
            bottom: 16px;
            color: #000 !important;
        }

        .func_filter_status {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .btn_filter {
            min-width: 120px;
            text-decoration: none;
            padding: 10px 30px;
            border-radius: 30px;
            margin-bottom: 10px;
            text-align: center;
        }
    </style>
@endsection

@section('content_account')
    <div class="col-xl-9 col-lg-8">
        <div class="tab-content" id="v-pills-tabContent">
            <div class="form_recep_room mb-4">
                <div class="filter">
                    <form action="#">
                        <div class="row gy-sm-4 gy-3">
                            <div class="col-lg-4 col-sm-6 col-xs-6">
                                <input type="text" class="common-input" name="daterange" value="01/01/2018 - 01/15/2018" />
                            </div>
                            <div class="col-lg-3 col-sm-6 col-xs-6">
                                <div class="select-has-icon icon-black">
                                    <select class="select common-input">
                                        <option value="1">
                                            Type Rooms
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
                            <div class="col-md-3 col-sm-6 col-xs-6">
                                <div class="select-has-icon icon-black">
                                    <select class="select common-input">
                                        <option value="1">
                                            Guests
                                        </option>
                                        <option value="1">Japan</option>
                                        <option value="1">Korea</option>
                                        <option value="1">Singapore</option>
                                        <option value="1">Germany</option>
                                        <option value="1">Thailand</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-6 col-xs-6">
                                <button type="submit" class="btn btn-main w-100" style="font-size: 11px">
                                    Find Now
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="func_filter_status mb-4">
                <a href="#" class="btn_filter text-bg-secondary">All</a>
                <a href="#" class="btn_filter text-bg-success">Null</a>
                <a href="#" class="btn_filter text-bg-info">Staked</a>
                <a href="#" class="btn_filter text-bg-warning">Check in</a>
                <a href="#" class="btn_filter text-bg-danger">checkout</a>
            </div>
            <div class="room_diagram container">
                <div class="row">
                    <div class="mb-3 col-6 col-md-4 col-lg-3 px-2">
                        <div class="card card-using mb-3 px-2" style="max-width: 14rem;">
                            <h6 class="card-header">Double 02</h6>
                            <div class="card-body">
                                <span class="card-title mb-3"><i class="fa-regular fa-user me-2"></i>Nguyen Van
                                    A</span>
                                <p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>20/02/2024</p>
                                <p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>24/02/2024</p>
                                <div class="btn-booking">
                                    <button class="btn btn-sm btn-warning btn-action">Checkout</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 col-6 col-md-4 col-lg-3 px-2 ">
                        <div class="card text-bg-secondary mb-3 px-2" style="max-width: 14rem;">
                            <h6 class="card-header">Single 01</h6>
                            <div class="card-body">
                                <h6 class="card-title text-white">Empty room</h6>
                                <p class="card-text"></p>
                                <div class="btn-booking">
                                    <button class="btn btn-sm btn-light btn-action">Booking</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 col-6 col-md-4 col-lg-3 px-2">
                        <div class="card text-bg-success mb-3 px-2" style="max-width: 14rem;">
                            <h6 class="card-header">Family 05</h6>
                            <div class="card-body">
                                <h5 class="card-title">Success card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                    of
                                    the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 col-6 col-md-4 col-lg-3 px-2">
                        <div class="card text-bg-danger mb-3 px-2" style="max-width: 14rem;">
                            <h6 class="card-header">Double 10</h6>
                            <div class="card-body">
                                <h5 class="card-title">Danger card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                    of
                                    the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 col-6 col-md-4 col-lg-3 px-2">
                        <div class="card mb-3 px-2 card-deposited" style="max-width: 14rem;">
                            <div class="card-header">Header</div>
                            <div class="card-body">
                                <h5 class="card-title">Warning card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                    of
                                    the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 col-6 col-md-4 col-lg-3 px-2">
                        <div class="card text-bg-info mb-3 px-2" style="max-width: 14rem;">
                            <div class="card-header">Header</div>
                            <div class="card-body">
                                <h5 class="card-title">Info card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                    of
                                    the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 col-6 col-md-4 col-lg-3 px-2">
                        <div class="card text-bg-light mb-3 px-2" style="max-width: 14rem;">
                            <div class="card-header">Header</div>
                            <div class="card-body">
                                <h5 class="card-title">Light card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk
                                    of
                                    the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 col-6 col-md-4 col-lg-3 px-2">
                        <div class="card text-bg-dark mb-3 px-2" style="max-width: 14rem;">
                            <div class="card-header">Header</div>
                            <div class="card-body">
                                <h5 class="card-title">Dark card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of
                                    the card's content.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
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
