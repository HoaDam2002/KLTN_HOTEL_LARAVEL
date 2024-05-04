@php
    use Carbon\Carbon;
@endphp

@extends('pages.receptionist.receptionist')

@section('css')
    <style>
        .btn-primary {
            background: var(--main-gradient) !important;
        }

        .btn {
            padding: 15px 30px !important;
        }

        .wrapper_diagram {
            padding: 0;
            height: 110px;
            cursor: pointer;
        }

        .card {
            height: 110px;
        }

        .card-header {
            padding: 3px 16px;
        }

        .card-body {
            padding-bottom: 5px;
            padding-top: 5px;
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
            color: #000 !important;
        }

        .btn-action-room-da {
            position: absolute;
            bottom: 16px;
        }

        .func_filter_status {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn_filter {
            min-width: 120px;
            text-decoration: none;
            padding: 10px 30px;
            border-radius: 30px;
            margin-bottom: 10px;
            text-align: center;
            margin: 15px;
            /* color: #fff; */
        }

        .bg-deposit {
            background-color: rgb(224, 207, 252);
            color: #000;
        }

        .bg-deposit:hover {
            color: #000;
        }

        /* modal btn booking */
        .wrapper-btn-booking-modal {
            display: flex;
            justify-content: center;
        }

        .card-text {
            font-size: 14px;
        }

        /* modal */

        .wrapper_info_room {
            display: flex;
        }

        .wrapper_info_room span {
            min-width: 200px;
        }

        .info_room_item {
            border-bottom: 1px solid #333;
            padding-right: 80px;
            min-width: 200px;
        }

        .change-room {
            display: flex;
        }

        .choose_room {
            width: 90%;
        }

        .btn-choose {
            width: 10%;
            background-color: yellowgreen;
            /* text-align: center; */
        }


        /* .infor_customer{
                                                                                                                                                                                                                                                                                                                                                                                                                                        display: flex;
                                                                                                                                                                                                                                                                                                                                                                                                                                        justify-content: center;
                                                                                                                                                                                                                                                                                                                                                                                                                                        
                                                                                                                                                                                                                                                                                                                                                                                                                                    } */
    </style>
@endsection

@section('content')
    <div class="col-xl-9 col-lg-8">
        <div class="tab-content" id="v-pills-tabContent">
            <div class="form_recep_room mb-4">
                <div class="filter">
                    <form action="/recep/diagram/search_date" method="post">
                        @csrf
                        <div class="row gy-sm-4 gy-3">
                            <div class="col-lg-4 col-sm-6 col-xs-6">
                                <input type="text" class="common-input" name="birthday" value="{{ $a }}" />
                            </div>
                            {{-- {{dd($a)}} --}}
                            <div class="col-lg-5 col-sm-6 col-xs-6">
                                <input type="text" class="common-input name_room" name="name_room"
                                    placeholder="Name Room / Infor Customer" />
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-6">
                                <button type="submit" class="btn btn-main w-100" style="font-size: 11px">
                                    Find Now
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="func_filter_status mb-4">
                <button class="btn_filter text-bg-primary" id="{{ $a }}">All</button>
                <button class="btn_filter text-bg-secondary" id="{{ $a }}">Null</button>
                <button class="btn_filter text-bg-success" id="{{ $a }}">Occupied</button>
                {{-- <button class="btn_filter bg-deposit filter_ready">Ready</button> --}}
                <button class="btn_filter text-bg-warning" id="{{ $a }}">Check in</button>
                <button class="btn_filter text-bg-danger filter_checkout" id="{{ $a }}"">Check out</button>
            </div>
            <div class="room_diagram container">
                <div class="row fill">
                    @if (isset($roomDetails))
                        {{-- {{ dd($roomDetails) }} --}}
                        @php
                            $time = Carbon::now()->toDateString();
                        @endphp

                        @foreach ($roomDetails as $item)
                            @php
                                $booking_realtime = $item['booking_realtime'];
                            @endphp
                            @if (empty($booking_realtime))
                                <div class="mb-1 col-4 col-md-3 col-lg-3 px-1 wrapper_diagram" data-bs-toggle="modal"
                                    data-bs-target="#modalRoomNull">
                                    <div class="card text-bg-secondary mb-3" style="max-width: 14rem;">
                                        <strong class="card-header name_room"
                                            id="{{ $item['id'] }}">{{ $item['type_name'] }}</strong>
                                        <div class="card-body">
                                            <p class="card-text"><i
                                                    class="fa-solid fa-calendar-days me-2"></i>{{ $item['status'] }}</p>
                                            <p class="card-text"><i
                                                    class="fa-solid fa-calendar-days me-2"></i>{{ $item['type_room']['price'] . '/ Pernight' }}
                                            </p>
                                            <p class="card-text"><i
                                                    class="fa-solid fa-calendar-days me-2"></i>{{ $item['type_room']['name'] }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @else
                                @if (count($booking_realtime) == 1)
                                    @foreach ($booking_realtime as $value)
                                        @if ($value['status'] == 'checkin')
                                            @if ($value['check_out'] == $time . ' 12:00:00')
                                                <div class="mb-1 col-4 col-md-3 col-lg-3 px-1 wrapper_diagram"
                                                    data-bs-toggle="modal" data-bs-target="#modalRoomCheckout"
                                                    id="{{ $value['id'] }}">
                                                    <div class="card text-bg-danger mb-3" style="max-width: 14rem;">
                                                        <strong class="card-header name_room"
                                                            id="{{ $item['id'] }}">{{ $item['type_name'] }}</strong>
                                                        <div class="card-body id_user" id="{{ $value['user']['id'] }}">
                                                            <p class="card-text"><i
                                                                    class="fa-solid fa-calendar-days me-2"></i>{{ $value['user']['name'] }}
                                                            </p>
                                                            <p class="card-text"><i
                                                                    class="fa-solid fa-calendar-days me-2"></i>{{ $value['check_in'] }}
                                                            </p>
                                                            <p class="card-text"><i
                                                                    class="fa-solid fa-calendar-days me-2"></i>{{ $value['check_out'] }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-1 col-4 col-md-3 col-lg-3 px-1 wrapper_diagram"
                                                    data-bs-toggle="modal" data-bs-target="#modalRoomNull">
                                                    <div class="card text-bg-secondary mb-3" style="max-width: 14rem;">
                                                        <strong class="card-header name_room"
                                                            id="{{ $item['id'] }}">{{ $item['type_name'] }}</strong>
                                                        <div class="card-body">
                                                            <p class="card-text"><i
                                                                    class="fa-solid fa-calendar-days me-2"></i>{{ $item['status'] }}
                                                            </p>
                                                            <p class="card-text"><i
                                                                    class="fa-solid fa-calendar-days me-2"></i>{{ $item['type_room']['price'] . '/ Pernight' }}
                                                            </p>
                                                            <p class="card-text"><i
                                                                    class="fa-solid fa-calendar-days me-2"></i>{{ $item['type_room']['name'] }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="mb-1 col-4 col-md-3 col-lg-3 px-1 wrapper_diagram"
                                                    data-bs-toggle="modal" data-bs-target="#modalRoomCheckout_Soon"
                                                    id="{{ $value['id'] }}">
                                                    <div class="card card-deposited mb-3" style="max-width: 14rem;">
                                                        <strong class="card-header name_room"
                                                            id="{{ $item['id'] }}">{{ $item['type_name'] }}</strong>
                                                        <div class="card-body id_user" id="{{ $value['user']['id'] }}">
                                                            <p class="card-text"><i
                                                                    class="fa-solid fa-calendar-days me-2"></i>{{ $value['user']['name'] }}
                                                            </p>
                                                            <p class="card-text"><i
                                                                    class="fa-solid fa-calendar-days me-2"></i>{{ $value['check_in'] }}
                                                            </p>
                                                            <p class="card-text"><i
                                                                    class="fa-solid fa-calendar-days me-2"></i>{{ $value['check_out'] }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                @if ($value['check_out'] == $a . ' 12:00:00')
                                                    <div class="mb-1 col-4 col-md-3 col-lg-3 px-1 wrapper_diagram"
                                                        data-bs-toggle="modal" data-bs-target="#modalRoomNull">
                                                        <div class="card text-bg-secondary mb-3" style="max-width: 14rem;">
                                                            <strong class="card-header name_room"
                                                                id="{{ $item['id'] }}">{{ $item['type_name'] }}</strong>
                                                            <div class="card-body">
                                                                <p class="card-text"><i
                                                                        class="fa-solid fa-calendar-days me-2"></i>{{ $item['status'] }}
                                                                </p>
                                                                <p class="card-text"><i
                                                                        class="fa-solid fa-calendar-days me-2"></i>{{ $item['type_room']['price'] . '/ Pernight' }}
                                                                </p>
                                                                <p class="card-text"><i
                                                                        class="fa-solid fa-calendar-days me-2"></i>{{ $item['type_room']['name'] }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endif
                                        @else
                                            <div class="mb-1 col-4 col-md-3 col-lg-3 px-1 wrapper_diagram"
                                                data-bs-toggle="modal" data-bs-target="#modalRoomCheckin"
                                                id="{{ $value['id'] }}">
                                                <div class="card text-bg-success mb-3" style="max-width: 14rem;">
                                                    <strong class="card-header name_room"
                                                        id="{{ $item['id'] }}">{{ $item['type_name'] }}</strong>
                                                    <div class="card-body id_user" id="{{ $value['user']['id'] }}">
                                                        <p class="card-text"><i
                                                                class="fa-solid fa-calendar-days me-2"></i>{{ $value['user']['name'] }}
                                                        </p>
                                                        <p class="card-text"><i
                                                                class="fa-solid fa-calendar-days me-2"></i>{{ $value['check_in'] }}
                                                        </p>
                                                        <p class="card-text"><i
                                                                class="fa-solid fa-calendar-days me-2"></i>{{ $value['check_out'] }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            @if ($value['check_out'] == $a . ' 12:00:00')
                                                <div class="mb-1 col-4 col-md-3 col-lg-3 px-1 wrapper_diagram"
                                                    data-bs-toggle="modal" data-bs-target="#modalRoomNull">
                                                    <div class="card text-bg-secondary mb-3" style="max-width: 14rem;">
                                                        <strong class="card-header name_room"
                                                            id="{{ $item['id'] }}">{{ $item['type_name'] }}</strong>
                                                        <div class="card-body">
                                                            <p class="card-text"><i
                                                                    class="fa-solid fa-calendar-days me-2"></i>{{ $item['status'] }}
                                                            </p>
                                                            <p class="card-text"><i
                                                                    class="fa-solid fa-calendar-days me-2"></i>{{ $item['type_room']['price'] . '/ Pernight' }}
                                                            </p>
                                                            <p class="card-text"><i
                                                                    class="fa-solid fa-calendar-days me-2"></i>{{ $item['type_room']['name'] }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endif
                                    @endforeach
                                @else
                                    @foreach ($booking_realtime as $value)
                                        @if ($value['status'] == 'checkin')
                                            @if ($value['check_out'] == $time . ' 12:00:00')
                                                <div class="mb-1 col-4 col-md-3 col-lg-3 px-1 wrapper_diagram"
                                                    data-bs-toggle="modal" data-bs-target="#modalRoomCheckout"
                                                    id="{{ $value['id'] }}">
                                                    <div class="card text-bg-danger mb-3" style="max-width: 14rem;">
                                                        <strong class="card-header name_room"
                                                            id="{{ $item['id'] }}">{{ $item['type_name'] }}</strong>
                                                        <div class="card-body id_user" id="{{ $value['user']['id'] }}">
                                                            <p class="card-text"><i
                                                                    class="fa-solid fa-calendar-days me-2"></i>{{ $value['user']['name'] }}
                                                            </p>
                                                            <p class="card-text"><i
                                                                    class="fa-solid fa-calendar-days me-2"></i>{{ $value['check_in'] }}
                                                            </p>
                                                            <p class="card-text"><i
                                                                    class="fa-solid fa-calendar-days me-2"></i>{{ $value['check_out'] }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="mb-1 col-4 col-md-3 col-lg-3 px-1 wrapper_diagram"
                                                    data-bs-toggle="modal" data-bs-target="#modalRoomCheckout_Soon"
                                                    id="{{ $value['id'] }}">
                                                    <div class="card card-deposited mb-3" style="max-width: 14rem;">
                                                        <strong class="card-header name_room"
                                                            id="{{ $item['id'] }}">{{ $item['type_name'] }}</strong>
                                                        <div class="card-body id_user" id="{{ $value['user']['id'] }}">
                                                            <p class="card-text"><i
                                                                    class="fa-solid fa-calendar-days me-2"></i>{{ $value['user']['name'] }}
                                                            </p>
                                                            <p class="card-text"><i
                                                                    class="fa-solid fa-calendar-days me-2"></i>{{ $value['check_in'] }}
                                                            </p>
                                                            <p class="card-text"><i
                                                                    class="fa-solid fa-calendar-days me-2"></i>{{ $value['check_out'] }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @else
                                            <div class="mb-1 col-4 col-md-3 col-lg-3 px-1 wrapper_diagram"
                                                data-bs-toggle="modal" data-bs-target="#modalRoomCheckin"
                                                id="{{ $value['id'] }}">
                                                <div class="card text-bg-success mb-3" style="max-width: 14rem;">
                                                    <strong class="card-header name_room"
                                                        id="{{ $item['id'] }}">{{ $item['type_name'] }}</strong>
                                                    <div class="card-body id_user" id="{{ $value['user']['id'] }}">
                                                        <p class="card-text"><i
                                                                class="fa-solid fa-calendar-days me-2"></i>{{ $value['user']['name'] }}
                                                        </p>
                                                        <p class="card-text"><i
                                                                class="fa-solid fa-calendar-days me-2"></i>{{ $value['check_in'] }}
                                                        </p>
                                                        <p class="card-text"><i
                                                                class="fa-solid fa-calendar-days me-2"></i>{{ $value['check_out'] }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- start modal deposits --}}
    <div class="modal fade" id="modalRoomDeposits" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <strong class="modal-title fs-5" id="staticBackdropLabel">Rooom 01</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="wrapper_info_room">
                        <span>Room name: </span>
                        <strong class="info_room_item mb-3">Room 01</strong>
                    </div>
                    <div class="wrapper_info_room">
                        <span>Room type: </span>
                        <strong class="info_room_item mb-3">Double room</strong>
                    </div>
                    <div class="wrapper_info_room">
                        <span>Deposits: </span>
                        <strong class="info_room_item mb-3">80$</strong>
                    </div>
                    <p class="d-inline-flex gap-1">
                        <a class="" data-bs-toggle="collapse" href="#collapseExample" role="button"
                            aria-expanded="false" aria-controls="collapseExample">
                            Service
                        </a>
                    </p>
                    <div class="collapse" id="collapseExample">
                        <div class="row">
                            <span class="d-block col-3"><i class="fa-solid fa-bed"></i> 2 person</span>
                            <span class="d-block col-3"><i class="fa-solid fa-bed"></i> 2 person</span>
                            <span class="d-block col-3"><i class="fa-solid fa-bed"></i> 2 person</span>
                            <span class="d-block col-3"><i class="fa-solid fa-bed"></i> 2 person</span>
                            <span class="d-block col-3"><i class="fa-solid fa-bed"></i> 2 person</span>
                            <span class="d-block col-3"><i class="fa-solid fa-bed"></i> 2 person</span>
                            <span class="d-block col-3"><i class="fa-solid fa-bed"></i> 2 person</span>
                            <span class="d-block col-3"><i class="fa-solid fa-bed"></i> 2 person</span>
                        </div>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="formGroupExampleInput" class="form-label">Name</label>
                        <input type="text" class="form-control" id="formGroupExampleInput"
                            placeholder="Example input placeholder" value="Nguyễn Văn A" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2"
                            placeholder="Another input placeholder" value="0708852641" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Email</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2"
                            placeholder="Another input placeholder" value="damvanhoa30052002@gmail.com" disabled>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Check in</span>
                        <span>>>>>></span>
                        <span>Check out</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <strong>24/03/2024 14:00</strong>
                        <strong>25/03/2024 12:00</strong>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal info diposits --}}

    {{-- start modal info room null --}}
    <div class="modal fade" id="modalRoomNull" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <strong class="modal-title fs-5 name_room" id="staticBackdropLabel"></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="wrapper_info_room">
                        <span>Room name: </span>
                        <strong class="info_room_item mb-3 name_room" id=""></strong>
                    </div>
                    <div class="wrapper_info_room">
                        <span>Room type: </span>
                        <strong class="info_room_item mb-3 type_room"></strong>
                    </div>
                    <div class="wrapper_info_room">
                        <span>Status: </span>
                        <strong class="info_room_item mb-3 status_room">n</strong>
                    </div>
                    <div class="wrapper_info_room">
                        <span>Price: </span>
                        <strong class="info_room_item mb-3 price_room"></strong>
                    </div>

                    <div class="form_add_booking">
                        <div class="btn_form_add_booking mb-2">
                            <button class="btn-booking-modal me-4" id="btn-add-booking">
                                <i class="fa-solid fa-plus"></i>
                                Add new booking
                            </button>
                            <button class="btn-booking-modal" id="btn-add-booking-with-info">
                                <i class="fa-solid fa-plus"></i>
                                Book with customer information
                            </button>
                        </div>
                        <div class="form-add-new-booking">
                            <form action="#">
                                <div class="mt-2 text-danger err_name">
                                    <small></small><br>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control name" name="name" id="floatingName"
                                        placeholder="Name" required>
                                    <label for="floatingName">Name</label>
                                </div>
                                <div class="mt-2 text-danger err_phone">
                                    <small></small><br>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control phone" name="phone" id="floatingPhone"
                                        placeholder="Phone number" required pattern="\d{9,10}">
                                    <label for="floatingPhone">Phone</label>
                                </div>
                                <div class="mt-2 text-danger err_date">
                                    <small></small><br>
                                </div>
                                <div class="mb-3 input-group form-floating">
                                    <input class="form-control" type="text" name="daterange" />
                                </div>

                                <div class="wrapper_info_room deposit_head">
                                    <span style="color: red">Deposit: </span>
                                    <strong style="color: red; font-size: 20px;"
                                        class="info_room_item mb-3 deposit"></strong>
                                </div>

                                <div class="form-check pay">
                                    <input class="form-check-input a" type="radio" name="payment" value="cash"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Cash payment for Deposit
                                    </label>
                                </div>
                                <div class="form-check mb-3 pay">
                                    <input class="form-check-input b" type="radio" name="payment" value="creditCard"
                                        id="flexRadioDefault2">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Credit card payment for Deposit
                                    </label>
                                </div>

                                <button type="button" class="btn btn-primary booking">Add new
                                    booking</button>
                            </form>
                        </div>
                        <div class="form-add-booking-inf-customer booking" style="display: none;">
                            <form class="f2">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control information" id="floatingInput"
                                        placeholder="Phone">
                                    <button type="button" class="input-group-text search_customer"><i
                                            class="fa-solid fa-magnifying-glass" style="padding: 0 10px;"></i></button>

                                </div>

                                <div class="mt-2 text-danger err_date1">
                                    <small></small><br>
                                </div>
                                <div class="mb-3 input-group form-floating days" style="margin-top: 20px;">
                                    <input class="form-control" type="text" name="daterange2" />
                                </div>

                                <div class="list-group">

                                </div>

                                <div class="wrapper_info_room deposit_head2">
                                    <span style="color: red">Deposit: </span>
                                    <strong style="color: red; font-size: 20px;"
                                        class="info_room_item mb-3 deposit2"></strong>
                                </div>

                                <div class="form-check pay2">
                                    <input class="form-check-input a" type="radio" name="payment" value="cash"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Cash payment for Deposit
                                    </label>
                                </div>
                                <div class="form-check mb-3 pay2">
                                    <input class="form-check-input b" type="radio" name="payment" value="creditCard"
                                        id="flexRadioDefault2">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Credit card payment for Deposit
                                    </label>
                                </div>


                                <button type="button" style="margin-top: 10px;" class="btn btn-primary booking_2">Add
                                    new
                                    booking</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal info room null --}}

    {{-- modal checkin --}}
    <div class="modal fade" id="modalRoomCheckin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <strong class="modal-title fs-5 name_room" id="staticBackdropLabel"></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="wrapper_info_room">
                        <span>Room name: </span>
                        <strong class="info_room_item mb-3 name_room"></strong>
                    </div>
                    <div class="wrapper_info_room">
                        <span>Room type: </span>
                        <strong class="info_room_item mb-3 type_room"></strong>
                    </div>
                    <div class="wrapper_info_room">
                        <span>Deposits: </span>
                        <strong class="info_room_item mb-3 deposit"></strong>
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="formGroupExampleInput" class="form-label">{{ __('Name') }}</label>
                        <input type="text" class="form-control name_cus" id="formGroupExampleInput"
                            placeholder="Example input placeholder" value="Nguyễn Văn A" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">{{ __('Phone') }}</label>
                        <input type="text" class="form-control phone_cus" id="formGroupExampleInput2"
                            placeholder="Another input placeholder" value="0708852641" disabled>
                    </div>

                    <div class="d-flex justify-content-between">
                        <span>Check in</span>
                        <span>>>>>></span>
                        <span>Check out</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <strong class="checkin">24/03/2024 14:00</strong>
                        <strong class="checkout">25/03/2024 12:00</strong>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary bt_cancel">Cancel</button>
                    <button type="button" class="btn btn-primary bt_checkin">Check in</button>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal checkin --}}

    {{-- start modal checkout --}}
    <div class="modal fade" id="modalRoomCheckout" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <strong class="modal-title fs-5 name_room" id="staticBackdropLabel ">Rooom 01</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="wrapper_info_room">
                        <span>Room name: </span>
                        <strong class="info_room_item mb-3 name_room">Room 01</strong>
                    </div>
                    <div class="wrapper_info_room">
                        <span>Room type: </span>
                        <strong class="info_room_item mb-3 type_room">Double room</strong>
                    </div>
                    <div class="wrapper_info_room">
                        <span>Price: </span>
                        <strong class="info_room_item mb-3 price">80$</strong>
                    </div>
                    <div class="wrapper_info_room">
                        <span>Deposits: </span>
                        <strong class="info_room_item mb-3 deposit">80$</strong>
                    </div>
                    <div class="wrapper_info_room">
                        <span>Total: </span>
                        <strong class="info_room_item mb-3 total">80$</strong>
                    </div>
                    <div class="wrapper_info_room">
                        <span>Duration: </span>
                        <strong class="info_room_item mb-3 duration" style="color: red">80$</strong>
                    </div>
                    <div class="wrapper_info_room">
                        <span>Final Total: </span>
                        <strong class="info_room_item mb-3 final_total" style="color: red">80$</strong>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="formGroupExampleInput" class="form-label">Name</label>
                        <input type="text" class="form-control name_cus" id="formGroupExampleInput"
                            placeholder="Example input placeholder" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Phone</label>
                        <input type="text" class="form-control phone_cus" id="formGroupExampleInput2"
                            placeholder="Another input placeholder" disabled>
                    </div>

                    <div class="form-check pay_checkout">
                        <input class="form-check-input a" type="radio" name="pay_checkout" value="cash"
                            id="flexRadioDefault1" checked>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Cash payment for Deposit
                        </label>
                    </div>
                    <div class="form-check mb-3 pay_checkout">
                        <input class="form-check-input b" type="radio" name="pay_checkout" value="creditCard"
                            id="flexRadioDefault2">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Credit card payment for Deposit
                        </label>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Check in</span>
                        <span>>>>>></span>
                        <span>Check out</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <strong class="checkin">24/03/2024 14:00</strong>
                        <strong class="checkout">25/03/2024 12:00</strong>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary bt_checkout">Check out</button>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal checkout --}}

    <div class="modal fade" id="modalRoomCheckout_Soon" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <strong class="modal-title fs-5 name_room" id="staticBackdropLabel ">Rooom 01</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="wrapper_info_room">
                        <span>Room name: </span>
                        <strong class="info_room_item mb-3 name_room">Room 01</strong>
                    </div>
                    <div class="wrapper_info_room">
                        <span>Room type: </span>
                        <strong class="info_room_item mb-3 type_room">Double room</strong>
                    </div>
                    <div class="wrapper_info_room">
                        <span>Price: </span>
                        <strong class="info_room_item mb-3 price">80$</strong>
                    </div>
                    <div class="wrapper_info_room">
                        <span>Deposits: </span>
                        <strong class="info_room_item mb-3 deposit">80$</strong>
                    </div>
                    <div class="wrapper_info_room">
                        <span>Total: </span>
                        <strong class="info_room_item mb-3 total">80$</strong>
                    </div>
                    <div class="wrapper_info_room">
                        <span>Duration: </span>
                        <strong class="info_room_item mb-3 duration" style="color: red">80$</strong>
                    </div>
                    <div class="wrapper_info_room">
                        <span>Final Total: </span>
                        <strong class="info_room_item mb-3 final_total" style="color: red">80$</strong>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="formGroupExampleInput" class="form-label">Name</label>
                        <input type="text" class="form-control name_cus" id="formGroupExampleInput"
                            placeholder="Example input placeholder" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Phone</label>
                        <input type="text" class="form-control phone_cus" id="formGroupExampleInput2"
                            placeholder="Another input placeholder" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">{{ __('Change Room') }}</label>
                        <div class="change-room">
                            <select name="room_change" id="formGroupExampleInput2" class="form-control choose_room">

                            </select>
                            <button class="btn-choose btn_change_room">Change</button>
                        </div>
                        {{-- <input type="text" class="form-control phone_cus" id="formGroupExampleInput2"
                            placeholder="Another input placeholder" value="0708852641" disabled> --}}
                    </div>

                    <div class="form-check pay_checkout">
                        <input class="form-check-input a" type="radio" name="pay_checkout_soon" value="cash"
                            id="flexRadioDefault1" checked>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Cash payment for Deposit
                        </label>
                    </div>
                    <div class="form-check mb-3 pay_checkout">
                        <input class="form-check-input b" type="radio" name="pay_checkout_soon" value="creditCard"
                            id="flexRadioDefault2">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Credit card payment for Deposit
                        </label>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Check in</span>
                        <span>>>>>></span>
                        <span>Check out</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <strong class="checkin">24/03/2024 14:00</strong>
                        <strong class="checkout">25/03/2024 12:00</strong>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary bt_checkout_soon">Check out</button>
                </div>
            </div>
        </div>
    </div>
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                {{-- <img src="..." class="rounded me-2" alt="..."> --}}
                <strong class="me-auto">{{ __('Notification') }}</strong>
                {{-- <small>11 mins ago</small> --}}
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Success!!!
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let id_user = "";
            let phone = "";
            $('.list-group').on('click', '.list-group-item', function() {
                let action = $(this);
                id_user = $(this).find('h5.mb-1').attr('id');
                phone = $(this).find('p.abc').text();

                if (action.hasClass('active')) {
                    action.removeClass('active');
                    $('.days').hide();
                    $('button.booking_2').prop('disabled', true);

                } else {
                    $('.list-group-item').removeClass('active');
                    $(this).addClass('active');
                    $('.days').show();
                    $('button.booking_2').prop('disabled', false);
                }
            });

            const toastTrigger = document.getElementById('liveToastBtn')
            const toastLiveExample = document.getElementById('liveToast')

            if (toastTrigger) {
                const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
                toastTrigger.addEventListener('click', () => {
                    toastBootstrap.show()
                })
            }


            let price = '';

            let time = "{{ $a }}";

            let check_in = time;

            let check_in2 = time;

            let deposit = '';
            let deposit2 = '';

            var currentDate = new Date(time);
            var currentDate_now = new Date();



            currentDate.setDate(currentDate.getDate() + 1);
            currentDate_now.setDate(currentDate_now.getDate() + 1);

            var newDay = currentDate.getDate();
            var newMonth = currentDate.getMonth() + 1;
            var newYear = currentDate.getFullYear();

            var newDay_now = currentDate_now.getDate() - 1;
            var newMonth_now = currentDate_now.getMonth() + 1;
            var newYear_now = currentDate_now.getFullYear();

            if (newDay_now < 10) {
                newDay_now = '0' + newDay_now;
            }


            if (newMonth_now < 10) {
                newMonth_now = '0' + newMonth_now;
            }

            if (newDay < 10) {
                newDay = '0' + newDay;
            }
            if (newMonth < 10) {
                newMonth = '0' + newMonth;
            }


            let time_now = newYear_now + '-' + newMonth_now + '-' + newDay_now;

            // console.log(time.trim());
            console.log(time_now, time);

            if (time != time_now) {
                $('.bt_checkin').hide();
                $('.filter_checkout').hide();
                $('.bt_checkout').hide();
                $('.bt_checkout_soon').hide();
            }

            var check_out = newYear + '-' + newMonth + '-' + newDay;

            let check_out2 = newYear + '-' + newMonth + '-' + newDay;

            let check = true;
            let check2 = true;

            $('div.pay').hide();
            $('div.deposit_head').hide()
            $('div.text-danger').hide()

            $('div.pay2').hide();
            $('div.deposit_head2').hide()
            $('div.days').hide()
            $('button.booking_2').prop('disabled', true);

            $(function() {
                $('input[name="birthday"]').daterangepicker({
                    singleDatePicker: true,
                    showDropdowns: true,
                    minDate: moment(),
                    minYear: moment(),
                    startDate: moment(time, 'YYYY-MM-DD'),
                    endDate: moment(time, 'YYYY-MM-DD'),
                    maxYear: parseInt(moment().format('YYYY'), 10),
                    autoApply: true
                }, function(start, end, label) {
                    // time_search = start.format('YYYY-MM-DD');
                });


                $('input[name="daterange"]').daterangepicker({
                    opens: 'left',
                    autoApply: true,
                    minDate: moment(),
                    startDate: moment(time, 'YYYY-MM-DD'),
                    endDate: moment(check_out, 'YYYY-MM-DD'),
                }, function(start, end, label) {
                    check_in = start.format('YYYY-MM-DD');
                    check_out = end.format('YYYY-MM-DD');

                    deposit = cul_deposit(check_in, check_out, price, 'deposit');
                    $('strong.deposit').text(deposit + "$");


                    if (check_in > time) {
                        $('div.pay').show();
                        $('div.deposit_head').show()
                        check = false;
                        console.log('alo');
                    } else {
                        check = true;
                        $('div.deposit_head').hide()
                        $('div.pay').hide();
                    }
                });

                $('input[name="daterange2"]').daterangepicker({
                    opens: 'left',
                    autoApply: true,
                    minDate: moment(),
                    startDate: moment(time, 'YYYY-MM-DD'),
                    endDate: moment(check_out, 'YYYY-MM-DD'),
                }, function(start, end, label) {
                    check_in2 = start.format('YYYY-MM-DD');
                    check_out2 = end.format('YYYY-MM-DD');

                    console.log(check_in2, check_out2);

                    deposit2 = cul_deposit(check_in2, check_out2, price, 'deposit');
                    $('strong.deposit2').text(deposit2 + "$");


                    if (check_in2 > time) {
                        $('div.pay2').show();
                        $('div.deposit_head2').show()
                        check2 = false;
                    } else {
                        check2 = true;
                        $('div.deposit_head2').hide()
                        $('div.pay2').hide();
                    }
                });
            });

            $('button.btn_filter').attr('id', time);

            $('#btn-add-booking').click(function() {
                $('.form-add-new-booking').css('display', 'block');
                $('.form-add-booking-inf-customer').css('display', 'none');
            })

            $('#btn-add-booking-with-info').click(function() {
                $('.form-add-new-booking').css('display', 'none');
                $('.form-add-booking-inf-customer').css('display', 'block');
            })

            $(document).on('input', 'input.name_room', function() {

                let infor = $(this).val();

                $.ajax({
                    type: "post",
                    url: "/recep/diagram/search_infor",
                    data: {
                        time: time,
                        infor: infor
                    },
                    dataType: "json",
                    success: function(response) {
                        let item = response.item;

                        let html = '';

                        if (response.check == 'true') {
                            console.log(response.check);
                            render_all_room(item);
                        } else {
                            item.map(function(item) {
                                item.booking_realtime.map(function(value) {
                                    if (value.user) {
                                        if (value.status == 'checkin') {
                                            if (value.check_out == time_now +
                                                " 12:00:00") {
                                                html +=
                                                    '<div class="mb-1 col-4 col-md-3 col-lg-3 px-1 wrapper_diagram" data-bs-toggle="modal" data-bs-target="#modalRoomCheckout" id=' +
                                                    value.id + '>' +
                                                    '<div class="card text-bg-danger mb-3" style="max-width: 14rem;">' +
                                                    '<strong class="card-header name_room" id="' +
                                                    item.id +
                                                    '">' + item.type_name +
                                                    '</strong>' +
                                                    '<div class="card-body id_user" id = ' +
                                                    value.user.id +
                                                    '>' +
                                                    '<p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>' +
                                                    value.user.name + '</p>' +
                                                    '<p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>' +
                                                    value.check_in + '</p>' +
                                                    '<p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>' +
                                                    value.check_out + '</p>' +
                                                    '</div>' +
                                                    '</div>' +
                                                    '</div>';
                                            } else {
                                                html +=
                                                    '<div class="mb-1 col-4 col-md-3 col-lg-3 px-1 wrapper_diagram" data-bs-toggle="modal" data-bs-target="#modalRoomCheckout_Soon" id=' +
                                                    value.id + '>' +
                                                    '<div class="card card-deposited mb-3" style="max-width: 14rem;">' +
                                                    '<strong class="card-header name_room" id="' +
                                                    value
                                                    .id + '">' + item
                                                    .type_name +
                                                    '</strong>' +
                                                    '<div class="card-body id_user" id=' +
                                                    value.user
                                                    .id +
                                                    '>' +
                                                    '<p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>' +
                                                    value.user.name + '</p>' +
                                                    '<p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>' +
                                                    value.check_in + '</p>' +
                                                    '<p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>' +
                                                    value.check_out + '</p>' +
                                                    '</div>' +
                                                    '</div>' +
                                                    '</div>';
                                            }

                                        } else if (value.status == 'pending') {
                                            html +=
                                                '<div class="mb-1 col-4 col-md-3 col-lg-3 px-1 wrapper_diagram" data-bs-toggle="modal" data-bs-target="#modalRoomCheckin" id=' +
                                                value.id + ' >' +
                                                '<div class="card text-bg-success mb-3" style="max-width: 14rem;">' +
                                                '<strong class="card-header name_room" id="' +
                                                item
                                                .id + '">' + item.type_name +
                                                '</strong>' +
                                                '<div class="card-body id_user" id=' +
                                                value.user
                                                .id +
                                                '>' +
                                                '<p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>' +
                                                value.user.name + '</p>' +
                                                '<p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>' +
                                                value.check_in + '</p>' +
                                                '<p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>' +
                                                value.check_out + '</p>' +
                                                '</div>' +
                                                '</div>' +
                                                '</div>';
                                        }
                                    }
                                })

                            });
                            $('div.fill').html(html);
                        }

                    }
                });
            });

            $(document).on('click', 'button.btn_filter', function() {
                let time = $(this).attr('id');
                let status = $(this).text()

                $.ajax({
                    type: "post",
                    url: "/recep/diagram/filter",
                    data: {
                        time: time,
                        status: status
                    },
                    dataType: "json",
                    success: function(response) {
                        let item = response.item;
                        console.log(item);
                        // console.log(status);
                        if (status == "Null") {
                            let html = '';
                            item.map(function(value) {
                                html +=
                                    '<div class="mb-1 col-4 col-md-3 col-lg-3 px-1 wrapper_diagram" data-bs-toggle="modal" data-bs-target="#modalRoomNull" id=' +
                                    value.id + '>' +
                                    '<div class="card text-bg-secondary mb-3" style="max-width: 14rem;">' +
                                    '<strong class="card-header name_room" id="' + value
                                    .id + '">' + value.type_name +
                                    '</strong>' +
                                    '<div class="card-body >' +
                                    '<p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>' +
                                    value.status + '</p>' +
                                    '<p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>' +
                                    value.type_room.price + '/Pernight </p>' +
                                    '<p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>' +
                                    value.type_room.name + '</p>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>';

                            });
                            $('div.fill').html(html);

                        } else if (status == 'Occupied') {
                            let html = '';
                            console.log(item);
                            item.map(function(value) {
                                value.booking_realtime.map(function(item) {
                                    if (item.status == "pending") {
                                        console.log(item.id);
                                        html +=
                                            '<div class="mb-1 col-4 col-md-3 col-lg-3 px-1 wrapper_diagram" data-bs-toggle="modal" data-bs-target="#modalRoomCheckin" id=' +
                                            item.id + '>' +
                                            '<div class="card text-bg-success mb-3" style="max-width: 14rem;">' +
                                            '<strong class="card-header name_room" id="' +
                                            value
                                            .id + '">' + value.type_name +
                                            '</strong>' +
                                            '<div class="card-body id_user" id=' +
                                            item.user.id +
                                            '>' +
                                            '<p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>' +
                                            item.user
                                            .name + '</p>' +
                                            '<p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>' +
                                            item.check_in +
                                            '</p>' +
                                            '<p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>' +
                                            item
                                            .check_out + '</p>' +
                                            '</div>' +
                                            '</div>' +
                                            '</div>';
                                    }
                                })

                            });
                            $('div.fill').html(html);

                        } else if (status == 'Check in') {
                            let html = '';

                            item.map(function(value) {
                                value.booking_realtime.map(function(item) {
                                    if (item.status == "checkin") {
                                        html +=
                                            '<div class="mb-1 col-4 col-md-3 col-lg-3 px-1 wrapper_diagram" data-bs-toggle="modal" data-bs-target="#modalRoomCheckout_Soon" id=' +
                                            item.id + '>' +
                                            '<div class="card card-deposited mb-3" style="max-width: 14rem;">' +
                                            '<strong class="card-header name_room" id="' +
                                            value
                                            .id + '">' + value.type_name +
                                            '</strong>' +
                                            '<div class="card-body id_user" id=' +
                                            item.user.id +
                                            '>' +
                                            '<p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>' +
                                            item.user
                                            .name + '</p>' +
                                            '<p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>' +
                                            item.check_in +
                                            '</p>' +
                                            '<p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>' +
                                            item
                                            .check_out + '</p>' +
                                            '</div>' +
                                            '</div>' +
                                            '</div>';
                                    }
                                })

                            });
                            $('div.fill').html(html);
                        } else if (status == 'Check out') {
                            let html = '';
                            item.map(function(item) {
                                item.booking_realtime.map(function(value) {
                                    if (value.check_out == time_now +
                                        " 12:00:00") {
                                        html +=
                                            '<div class="mb-1 col-4 col-md-3 col-lg-3 px-1 wrapper_diagram" data-bs-toggle="modal" data-bs-target="#modalRoomCheckout" id=' +
                                            value.id + '>' +
                                            '<div class="card text-bg-danger mb-3" style="max-width: 14rem;">' +
                                            '<strong class="card-header name_room" id="' +
                                            item.id +
                                            '">' + item.type_name +
                                            '</strong>' +
                                            '<div class="card-body id_user" id = ' +
                                            value.user.id +
                                            '>' +
                                            '<p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>' +
                                            value.user.name + '</p>' +
                                            '<p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>' +
                                            value.check_in + '</p>' +
                                            '<p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>' +
                                            value.check_out + '</p>' +
                                            '</div>' +
                                            '</div>' +
                                            '</div>';
                                    }
                                })
                            })
                            $('div.fill').html(html);

                        } else {
                            render_all_room(item);
                        }
                    }
                });
            })

            let id_room = "";
            let id_roomDetail = "";
            let payment = "in";
            let id_booking_realtime = "";
            let payment_checkout = "";
            let pay_checkout_soon = "";

            $(document).on('click', 'div.wrapper_diagram', function() {
                id_room = $(this).find('strong.name_room').attr('id');
                console.log(id_room);
                let modal = $(this).attr('data-bs-target');
                id_booking_realtime = $(this).attr('id');

                if ($('input[name="payment"]').prop('checked')) {
                    payment = $('input[name="payment"]:checked').val();
                }

                $('input[name="payment"]').change(function() {
                    payment = $('input[name="payment"]:checked').val();

                });

                if ($('input[name="pay_checkout"]').prop('checked')) {
                    payment_checkout = $('input[name="pay_checkout"]:checked').val();
                }

                $('input[name="pay_checkout"]').change(function() {
                    payment_checkout = $('input[name="pay_checkout"]:checked').val();
                });

                if ($('input[name="pay_checkout_soon"]').prop('checked')) {
                    pay_checkout_soon = $('input[name="pay_checkout_soon"]:checked').val();
                }

                $('input[name="pay_checkout_soon"]').change(function() {
                    pay_checkout_soon = $('input[name="pay_checkout_soon"]:checked').val();
                });

                $.ajax({
                    type: "post",
                    url: "/recep/diagram/fill_modal",
                    data: {
                        id_room: id_room
                    },
                    dataType: "json",
                    success: function(response) {
                        let item = response.item[0];
                        let list_room = [];
                        if (response.list_room) {
                            list_room = response.list_room;
                        }

                        console.log(list_room);
                        let name_room = item.type_name;
                        let type_room = item.type_room.name;
                        let status = item.status;
                        price = item.type_room.price;
                        id_room = item.type_room.id;
                        id_roomDetail = item.id;

                        if (modal == '#modalRoomNull') {
                            $(modal).find('strong.name_room').text(name_room);
                            $(modal).find('strong.type_room').text(type_room);
                            $(modal).find('strong.status_room').text(status);
                            $(modal).find('strong.price_room').text(price + "$ / Pernight");
                            $(modal).find('input.room_name').val(name_room);
                            deposit = cul_deposit(check_in, check_out, price, 'deposit');

                            $('strong.deposit').text(deposit + "$");
                            $('strong.deposit2').text(deposit + "$");

                        } else if (modal == '#modalRoomCheckin') {

                            let booking_realtime = [];

                            item.booking_realtime.map(function(value) {
                                if (value.id == id_booking_realtime) {
                                    booking_realtime = value;
                                }
                            })

                            let checkin = booking_realtime.check_in;
                            let checkout = booking_realtime.check_out;
                            let price = booking_realtime.price;
                            let name_cus = booking_realtime.user.name;
                            let phone = booking_realtime.user.phone;

                            $(modal).find('strong.name_room').text(name_room);
                            $(modal).find('strong.type_room').text(type_room);
                            $(modal).find('input.name_cus').val(name_cus);
                            $(modal).find('input.phone_cus').val(phone);
                            $(modal).find('strong.checkin').text(checkin);
                            $(modal).find('strong.checkout').text(checkout);

                            let deposit = cul_deposit(checkin, checkout, price, 'deposit');
                            let duration = cul_deposit(checkin, checkout, price, 'duration');
                            let total = price * duration;
                            let final_total = total - deposit;
                            console.log(deposit, duration);

                            $(modal).find('strong.deposit').text(deposit + "$");
                            $(modal).find('strong.final_total').text(final_total + "$");
                            $(modal).find('strong.total').text(total + "$");



                            $(document).on('click', 'button.bt_checkin', function() {
                                $.ajax({
                                    type: "post",
                                    url: "/recep/diagram/change_status_booking_realtime",
                                    data: {
                                        time: time,
                                        id_booking_realtime: id_booking_realtime
                                    },
                                    dataType: "json",
                                    success: function(response) {
                                        let rooms = response.room;
                                        render_all_room(rooms);

                                        $('#modalRoomCheckin').modal(
                                            'hide');
                                        var toast = new bootstrap.Toast(
                                            document.getElementById(
                                                'liveToast'));
                                        toast.show();
                                    }
                                });
                            })

                            $(document).on('click', 'button.bt_cancel', function() {
                                $.ajax({
                                    type: "post",
                                    url: "/recep/diagram/cancel",
                                    data: {
                                        time: time,
                                        id_booking_realtime: id_booking_realtime
                                    },
                                    dataType: "json",
                                    success: function(response) {
                                        let rooms = response.room;
                                        render_all_room(rooms);

                                        $('#modalRoomCheckin').modal(
                                            'hide');
                                        var toast = new bootstrap.Toast(
                                            document.getElementById(
                                                'liveToast'));
                                        toast.show();
                                    }
                                });
                            })



                        } else if (modal == '#modalRoomCheckout') {

                            let booking_realtime = [];

                            item.booking_realtime.map(function(value) {
                                if (value.id == id_booking_realtime) {
                                    booking_realtime = value;
                                }
                            })

                            console.log(booking_realtime);

                            let checkin = booking_realtime.check_in;
                            let checkout = booking_realtime.check_out;
                            let price = booking_realtime.price;
                            let name_cus = booking_realtime.user.name;
                            let phone = booking_realtime.user.phone;
                            let id_booking = '';
                            let deposit_booking = '';
                            let total = '';
                            let final_total = '';
                            let tour = '';

                            let deposit = cul_deposit(checkin, checkout, price, 'deposit');

                            let duration = cul_deposit(checkin, checkout, price, 'duration');

                            if (booking_realtime.booking) {
                                deposit_booking = booking_realtime.booking.deposits;
                                id_booking = booking_realtime.booking.id;
                                quantity_booking = booking_realtime.booking.quantity;
                                total = (price * duration) * quantity_booking;
                                final_total = total - deposit_booking;
                                let list_tour = booking_realtime.booking.booking_realtime.map(
                                    function(value) {
                                        return value.room_detail.type_name
                                    })
                                tour = list_tour.join(', ');
                            } else {
                                total = price * duration;
                                final_total = total - deposit;
                            }


                            $(modal).find('strong.deposit').text(deposit + "$");
                            $(modal).find('strong.final_total').text(final_total + "$");
                            $(modal).find('strong.total').text(total + "$");

                            $(modal).find('strong.name_room').text(name_room);
                            $(modal).find('strong.type_room').text(type_room);
                            $(modal).find('strong.deposit').text(deposit + "$");
                            $(modal).find('strong.price').text(price + "$");
                            $(modal).find('strong.checkin').text(checkin);
                            $(modal).find('strong.checkout').text(checkout);
                            $(modal).find('strong.duration').text(duration);
                            $(modal).find('input.name_cus').val(name_cus + "    Tour: " + tour);
                            $(modal).find('input.phone_cus').val(phone);

                            $(document).on('click', 'button.bt_checkout', function() {
                                $.ajax({
                                    type: "post",
                                    url: "/recep/diagram/checkout",
                                    data: {
                                        time: time,
                                        payment: payment_checkout,
                                        id_booking_realtime: id_booking_realtime,
                                        id_booking: id_booking,
                                        deposit_booking: deposit_booking
                                    },
                                    dataType: "json",
                                    success: function(response) {
                                        let arr = response.room;

                                        render_all_room(arr);
                                        $('#modalRoomCheckout').modal(
                                            'hide');
                                        var toast = new bootstrap.Toast(
                                            document.getElementById(
                                                'liveToast'));
                                        toast.show();
                                    }
                                });
                            })
                        } else if (modal == '#modalRoomCheckout_Soon') {

                            let html = '<option value="">Choose Room</option>';

                            list_room.map(function(value) {
                                html += '<option value="' + value.id + '">' + value
                                    .type_name + '</option>'
                            })

                            $('.choose_room').html(html);

                            let booking_realtime = [];

                            item.booking_realtime.map(function(value) {
                                if (value.id == id_booking_realtime) {
                                    booking_realtime = value;
                                }
                            })

                            let checkin = booking_realtime.check_in;
                            let checkout = booking_realtime.check_out;
                            let price = booking_realtime.price;
                            let name_cus = booking_realtime.user.name;
                            let phone = booking_realtime.user.phone;

                            console.log(checkin, checkout, time_now + ' 12:00:00');

                            let deposit = cul_deposit(checkin, checkout, price, 'deposit');

                            let duration = cul_deposit(checkin, checkout, price, 'duration');

                            let duration_soon = cul_deposit(checkin, time_now + ' 12:00:00',
                                price, 'duration');

                            if (duration_soon == 0) {
                                duration_soon = 1;
                            }

                            console.log(checkin, checkout, duration_soon);
                            let total = price * duration;
                            let total_soon = price * duration_soon;
                            let final_total = total_soon - deposit;

                            $(modal).find('strong.deposit').text(deposit + "$");
                            $(modal).find('strong.final_total').text(final_total + "$");
                            $(modal).find('strong.total').text(total + "$");

                            console.log(booking_realtime);

                            $(modal).find('strong.name_room').text(name_room);
                            $(modal).find('strong.type_room').text(type_room);
                            $(modal).find('strong.deposit').text(deposit + "$");
                            $(modal).find('strong.price').text(price + "$");
                            $(modal).find('strong.checkin').text(checkin);
                            $(modal).find('strong.checkout').text(checkout);
                            $(modal).find('strong.duration').text(duration_soon);
                            $(modal).find('input.name_cus').val(name_cus);
                            $(modal).find('input.phone_cus').val(phone);

                            $(document).on('click', 'button.btn_change_room', function() {
                                let id_room_change = $(this).closest('.change-room')
                                    .find('.choose_room').val();

                                console.log(id_booking_realtime);
                                $.ajax({
                                    type: "post",
                                    url: "/recep/diagram/change_room",
                                    data: {
                                        time: time,
                                        id_room_change: id_room_change,
                                        id_booking_realtime: id_booking_realtime
                                    },
                                    dataType: "json",
                                    success: function(response) {
                                        let arr = response.room;

                                        render_all_room(arr);
                                        $('#modalRoomCheckout_Soon').modal(
                                            'hide');
                                        var toast = new bootstrap.Toast(
                                            document.getElementById(
                                                'liveToast'));
                                        toast.show();
                                    }
                                });
                            })


                            $(document).on('click', 'button.bt_checkout_soon', function() {
                                $.ajax({
                                    type: "post",
                                    url: "/recep/diagram/checkout_soon",
                                    data: {
                                        time: time,
                                        checkout: time,
                                        payment: pay_checkout_soon,
                                        id_booking_realtime: id_booking_realtime
                                    },
                                    dataType: "json",
                                    success: function(response) {
                                        let arr = response.room;

                                        render_all_room(arr);
                                        $('#modalRoomCheckout_Soon').modal(
                                            'hide');
                                        var toast = new bootstrap.Toast(
                                            document.getElementById(
                                                'liveToast'));
                                        toast.show();
                                    }
                                });
                            })
                        }
                    }
                });



                $(document).on('click', 'button.booking', function() {
                    // event.preventDefault();
                    let path = $(this).closest('div.form_add_booking');
                    let name = path.find('input.name').val();
                    let phone = path.find('input.phone').val();
                    let identity = path.find('input.identity').val();


                    $.ajax({
                        type: "post",
                        url: "/recep/diagram/booking_modal/cus_no_acc",
                        data: {
                            time: time,
                            name: name,
                            phone: phone,
                            indentity_card: identity,
                            id_room: id_room,
                            price: price,
                            id_roomDetail: id_roomDetail,
                            payment: payment,
                            check_in: check_in,
                            check_out: check_out,
                            deposit: (check) ? "0" : deposit
                        },
                        dataType: "json",
                        success: function(response) {
                            if (response.mess) {
                                $('div.err_date').show();
                                $('div.err_date').find('small').text(response.mess);
                            } else {
                                let rooms = response.room;
                                render_all_room(rooms);

                                $('#modalRoomNull').modal('hide');
                                var toast = new bootstrap.Toast(document.getElementById(
                                    'liveToast'));
                                toast.show();
                            }
                        },
                        error: function(response) {
                            let err_phone = response.responseJSON.errors.phone;
                            let err_name = response.responseJSON.errors.name;

                            if (err_name) {
                                $('div.err_name').show();
                                $('div.err_name').find('small').text(err_name);
                            }

                            if (err_phone) {
                                $('div.err_phone').show();
                                $('div.err_phone').find('small').text(err_phone);
                            }
                        }
                    });

                })
            })

            let type_customer = '';

            $(document).on('click', 'button.search_customer', function() {
                let information = $('.information').val();

                $.ajax({
                    type: "post",
                    url: "/recep/diagram/search_customer",
                    data: {
                        information: information
                    },
                    dataType: "json",
                    success: function(response) {
                        let customer = response.customer;
                        let html = "";
                        let count_booking = '';

                        customer.map(function(value) {
                            if (value.customer_no_acc != null) {
                                type_customer = "customer_no_acc";
                                count_booking = value.customer_no_acc.count_booking
                            } else {
                                type_customer = "customer";
                                count_booking = value.customer.count_booking
                            }
                            html +=
                                "<div class=\"list-group-item list-group-item-action\" aria-current=\"true\" style=\"cursor: pointer;\">" +
                                "<div class=\"d-flex w-100 justify-content-between\">" +
                                "<h5 class=\"mb-1\" id= " + value.id + " >Name: " +
                                value.name + "</h5>" +
                                "</div>" +
                                "<p class=\"mb-1\">Phone:<p class=\"abc\">" + value
                                .phone + " </p> </p>" +
                                "<small>Count Booking: " + count_booking + "</small>" +
                                "</div>";
                        })
                        $('.list-group').html(html);
                    }
                });
            })

            $(document).on('click', 'button.booking_2', function() {

                $.ajax({
                    type: "post",
                    url: "/recep/diagram/booking_available_cus",
                    data: {
                        time: time,
                        id_booking: '0',
                        id_room: id_room,
                        price: price,
                        id_roomDetail: id_roomDetail,
                        payment: payment,
                        check_in: check_in2,
                        check_out: check_out2,
                        deposit: (check2) ? "0" : deposit2,
                        id_user: id_user,
                        phone: phone
                    },
                    dataType: "json",
                    success: function(response) {
                        let rooms = response.room;
                        if (response.mess) {
                            $('div.err_date1').show();
                            $('div.err_date1').find('small').text(response.mess);
                        } else {
                            render_all_room(rooms);
                            $('#modalRoomNull').modal('hide');
                            var toast = new bootstrap.Toast(document.getElementById(
                                'liveToast'));
                            toast.show();
                        }

                    },
                    error: function(response) {
                        // let err_phone = response.responseJSON.errors.phone;
                        // let err_name = response.responseJSON.errors.name;

                        // if (err_name) {
                        //     $('div.err_name').show();
                        //     $('div.err_name').find('small').text(err_name);
                        // }

                        // if (err_phone) {
                        //     $('div.err_phone').show();
                        //     $('div.err_phone').find('small').text(err_phone);
                    }

                })
            })

            // $(document).on('click', 'button.btn-choose', function() {

            // })

            function render_all_room(arr) {
                console.log(arr);
                let html = '';
                arr.map(function(item) {
                    let bookingrealtime = item.booking_realtime;
                    if (bookingrealtime.length == 0) {
                        html +=
                            '<div class="mb-1 col-4 col-md-3 col-lg-3 px-1 wrapper_diagram" data-bs-toggle="modal" data-bs-target="#modalRoomNull">' +
                            '<div class="card text-bg-secondary mb-3" style="max-width: 14rem;">' +
                            '<strong class="card-header name_room" id="' + item.id + '">' + item.type_name +
                            '</strong>' +
                            '<div class="card-body">' +
                            '<p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>' +
                            item.status + '</p>' +
                            '<p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>' +
                            item.type_room.price + '/ Pernight </p>' +
                            '<p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>' +
                            item.type_room.name + '</p>' +
                            '</div>' +
                            '</div>' +
                            '</div>';
                    } else {
                        if (bookingrealtime.length == 1) {
                            bookingrealtime.map(function(value) {
                                if (value.status == 'checkin') {
                                    if (value.check_out == time_now + " 12:00:00") {
                                        html +=
                                            '<div class="mb-1 col-4 col-md-3 col-lg-3 px-1 wrapper_diagram" data-bs-toggle="modal" data-bs-target="#modalRoomCheckout" id=' +
                                            value.id + '>' +
                                            '<div class="card text-bg-danger mb-3" style="max-width: 14rem;">' +
                                            '<strong class="card-header name_room" id="' + item.id +
                                            '">' + item.type_name +
                                            '</strong>' +
                                            '<div class="card-body id_user" id = ' + value.user.id +
                                            '>' +
                                            '<p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>' +
                                            value.user.name + '</p>' +
                                            '<p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>' +
                                            value.check_in + '</p>' +
                                            '<p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>' +
                                            value.check_out + '</p>' +
                                            '</div>' +
                                            '</div>' +
                                            '</div>';

                                        html +=
                                            '<div class="mb-1 col-4 col-md-3 col-lg-3 px-1 wrapper_diagram" data-bs-toggle="modal" data-bs-target="#modalRoomNull">' +
                                            '<div class="card text-bg-secondary mb-3" style="max-width: 14rem;">' +
                                            '<strong class="card-header name_room" id="' + item.id +
                                            '">' + item.type_name +
                                            '</strong>' +
                                            '<div class="card-body">' +
                                            '<p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>' +
                                            item.status + '</p>' +
                                            '<p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>' +
                                            item.type_room.price + '/ Pernight </p>' +
                                            '<p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>' +
                                            item.type_room.name + '</p>' +
                                            '</div>' +
                                            '</div>' +
                                            '</div>';
                                    } else {
                                        html +=
                                            '<div class="mb-1 col-4 col-md-3 col-lg-3 px-1 wrapper_diagram" data-bs-toggle="modal" data-bs-target="#modalRoomCheckout_Soon" id=' +
                                            value.id + '>' +
                                            '<div class="card card-deposited mb-3" style="max-width: 14rem;">' +
                                            '<strong class="card-header name_room" id="' + item.id +
                                            '">' + item.type_name +
                                            '</strong>' +
                                            '<div class="card-body id_user" id = ' + value.user.id +
                                            '>' +
                                            '<p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>' +
                                            value.user.name + '</p>' +
                                            '<p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>' +
                                            value.check_in + '</p>' +
                                            '<p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>' +
                                            value.check_out + '</p>' +
                                            '</div>' +
                                            '</div>' +
                                            '</div>';

                                        if (value.check_out == time + " 12:00:00") {
                                            html +=
                                                '<div class="mb-1 col-4 col-md-3 col-lg-3 px-1 wrapper_diagram" data-bs-toggle="modal" data-bs-target="#modalRoomNull">' +
                                                '<div class="card text-bg-secondary mb-3" style="max-width: 14rem;">' +
                                                '<strong class="card-header name_room" id="' + item
                                                .id +
                                                '">' + item.type_name +
                                                '</strong>' +
                                                '<div class="card-body">' +
                                                '<p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>' +
                                                item.status + '</p>' +
                                                '<p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>' +
                                                item.type_room.price + '/ Pernight </p>' +
                                                '<p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>' +
                                                item.type_room.name + '</p>' +
                                                '</div>' +
                                                '</div>' +
                                                '</div>';
                                        }
                                    }
                                } else {
                                    html +=
                                        '<div class="mb-1 col-4 col-md-3 col-lg-3 px-1 wrapper_diagram" data-bs-toggle="modal" data-bs-target="#modalRoomCheckin" id=' +
                                        value.id + '>' +
                                        '<div class="card text-bg-success mb-3" style="max-width: 14rem;">' +
                                        '<strong class="card-header name_room" id="' + item.id +
                                        '">' + item.type_name +
                                        '</strong>' +
                                        '<div class="card-body id_user" id = ' + value.user.id +
                                        '>' +
                                        '<p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>' +
                                        value.user.name + '</p>' +
                                        '<p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>' +
                                        value.check_in + '</p>' +
                                        '<p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>' +
                                        value.check_out + '</p>' +
                                        '</div>' +
                                        '</div>' +
                                        '</div>';

                                    if (value.check_out == time + " 12:00:00") {
                                        html +=
                                            '<div class="mb-1 col-4 col-md-3 col-lg-3 px-1 wrapper_diagram" data-bs-toggle="modal" data-bs-target="#modalRoomNull">' +
                                            '<div class="card text-bg-secondary mb-3" style="max-width: 14rem;">' +
                                            '<strong class="card-header name_room" id="' + item
                                            .id +
                                            '">' + item.type_name +
                                            '</strong>' +
                                            '<div class="card-body">' +
                                            '<p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>' +
                                            item.status + '</p>' +
                                            '<p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>' +
                                            item.type_room.price + '/ Pernight </p>' +
                                            '<p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>' +
                                            item.type_room.name + '</p>' +
                                            '</div>' +
                                            '</div>' +
                                            '</div>';
                                    }
                                }
                            })
                        } else {
                            bookingrealtime.map(function(value) {
                                if (value.status == 'checkin') {
                                    if (value.check_out == time_now + " 12:00:00") {
                                        html +=
                                            '<div class="mb-1 col-4 col-md-3 col-lg-3 px-1 wrapper_diagram" data-bs-toggle="modal" data-bs-target="#modalRoomCheckout" id=' +
                                            value.id + '>' +
                                            '<div class="card text-bg-danger mb-3" style="max-width: 14rem;">' +
                                            '<strong class="card-header name_room" id="' + item.id +
                                            '">' + item.type_name +
                                            '</strong>' +
                                            '<div class="card-body id_user" id = ' + value.user.id +
                                            '>' +
                                            '<p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>' +
                                            value.user.name + '</p>' +
                                            '<p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>' +
                                            value.check_in + ' </p>' +
                                            '<p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>' +
                                            value.check_out + '</p>' +
                                            '</div>' +
                                            '</div>' +
                                            '</div>';


                                    } else {
                                        html +=
                                            '<div class="mb-1 col-4 col-md-3 col-lg-3 px-1 wrapper_diagram" data-bs-toggle="modal" data-bs-target="#modalRoomCheckout_Soon" id=' +
                                            value.id + '>' +
                                            '<div class="card card-deposited mb-3" style="max-width: 14rem;">' +
                                            '<strong class="card-header name_room" id="' + item.id +
                                            '">' + item.type_name +
                                            '</strong>' +
                                            '<div class="card-body id_user" id = ' + value.user.id +
                                            '>' +
                                            '<p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>' +
                                            value.user.name + '</p>' +
                                            '<p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>' +
                                            value.check_in + '</p>' +
                                            '<p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>' +
                                            value.check_out + '</p>' +
                                            '</div>' +
                                            '</div>' +
                                            '</div>';


                                    }
                                } else {
                                    html +=
                                        '<div class="mb-1 col-4 col-md-3 col-lg-3 px-1 wrapper_diagram" data-bs-toggle="modal" data-bs-target="#modalRoomCheckin" id=' +
                                        value.id + '>' +
                                        '<div class="card text-bg-success mb-3" style="max-width: 14rem;">' +
                                        '<strong class="card-header name_room" id="' + item.id +
                                        '">' + item.type_name +
                                        '</strong>' +
                                        '<div class="card-body id_user" id = ' + value.user.id +
                                        '>' +
                                        '<p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>' +
                                        value.user.name + '</p>' +
                                        '<p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>' +
                                        value.check_in + '</p>' +
                                        '<p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>' +
                                        value.check_out + '</p>' +
                                        '</div>' +
                                        '</div>' +
                                        '</div>';
                                }
                            })
                        }
                    }

                });
                $('div.fill').html(html);
            }

            function cul_deposit(a, b, c, action) {
                var date1 = new Date(a);
                var date2 = new Date(b);

                var difference = date2.getTime() - date1.getTime();

                var daysDifference = Math.floor(difference / (1000 * 60 * 60 * 24)) + 1;
                let deposit = (daysDifference * price) * 0.2;

                if (action == "duration") {
                    return daysDifference;
                } else if (action == "deposit") {
                    return deposit;
                }
            }

            function date_time_now() {
                var currentDate_now = new Date();
                var newDay_now = currentDate_now.getDate();
                var newMonth_now = currentDate_now.getMonth() + 1;
                var newYear_now = currentDate_now.getFullYear();

                var hour = currentDate_now.getHours(); // Lấy giờ (0-23)
                var minute = currentDate_now.getMinutes(); // Lấy phút (0-59)
                var second = currentDate_now.getSeconds(); // Lấy giây (0-59)

                if (minute < 10) {
                    minute = '0' + minute;
                }
                if (second < 10) {
                    second = '0' + second;
                }

                let date_time_now = time_now + ' ' + hour + ':' + minute + ':' + second;

                return date_time_now;
            }

        });
    </script>
@endsection
