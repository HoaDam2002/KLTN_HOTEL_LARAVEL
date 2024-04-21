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
            font-size: 13px;
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
    </style>
@endsection

@section('content')
    <div class="col-xl-9 col-lg-8">
        <div class="tab-content" id="v-pills-tabContent">
            <div class="form_recep_room mb-4">
                <div class="filter">
                    <form action="#">
                        <div class="row gy-sm-4 gy-3">
                            <div class="col-lg-5 col-sm-6 col-xs-6">
                                <input type="text" class="common-input" name="daterange" value="" />
                            </div>
                            <div class="col-lg-4 col-sm-6 col-xs-6">
                                <input type="text" class="common-input" name="name_room" placeholder="Name Room" />
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
                <a href="#" class="btn_filter text-bg-primary">All</a>
                <a href="#" class="btn_filter text-bg-secondary">Null</a>
                <a href="#" class="btn_filter text-bg-success">Occupied</a>
                <a href="#" class="btn_filter bg-deposit">Deposits</a>
                <a href="#" class="btn_filter text-bg-warning">Check in</a>
                <a href="#" class="btn_filter text-bg-danger">checkout</a>
            </div>
            <div class="room_diagram container">
                <div class="row">
                    @if (isset($roomDetails))
                        @foreach ($roomDetails as $item)
                            @php
                                if (empty($item['booking_realtime'])) {
                                    $p1 = $item['status'];
                                    $p2 = $item['type_room']['price'];
                                    $p3 = $item['type_room']['name'];
                                    $modal = '#modalRoomNull';
                                    $color = 'text-bg-secondary';
                                } else {
                                    $status = $item['booking_realtime'][0]['status'];

                                    $name_user = $item['booking_realtime'][0]['user']['name'];
                                    if ($status == 'checkin') {
                                        $p1 = $name_user;
                                        $p2 = $item['booking_realtime'][0]['check_in'];
                                        $p3 = $item['booking_realtime'][0]['check_out'];
                                        $modal = '#modalRoomCheckin';
                                        $color = 'card-deposited';
                                    }else {
                                        $p1 = $name_user;
                                        $p2 = $item['booking_realtime'][0]['check_in'];
                                        $p3 = $item['booking_realtime'][0]['check_out'];
                                        $modal = '#modalRoomCheckin';
                                        $color = 'text-bg-success';
                                    }
                                }
                            @endphp

                            <div class="mb-1 col-4 col-md-3 col-lg-3 px-1 wrapper_diagram" data-bs-toggle="modal"
                                data-bs-target="{{$modal}}">
                                <div class="card {{$color}} mb-3" style="max-width: 14rem;">
                                    <strong class="card-header">{{$item['type_name']}}</strong>
                                    <div class="card-body">
                                        <p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>{{$p1}}</p>
                                        <p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>{{$p2}}</p>
                                        <p class="card-text"><i class="fa-solid fa-calendar-days me-2"></i>{{$p3}}</p>
                                    </div>
                                </div>
                            </div>
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
                    <div class="img_room_modal row mb-3 ">
                        <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8aG90ZWwlMjByb29tfGVufDB8fDB8fHww"
                            alt="" class="rounded col-4">
                        <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8aG90ZWwlMjByb29tfGVufDB8fDB8fHww"
                            alt="" class="rounded col-4">
                        <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8aG90ZWwlMjByb29tfGVufDB8fDB8fHww"
                            alt="" class="rounded col-4">
                    </div>
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
                    <strong class="modal-title fs-5" id="staticBackdropLabel">Rooom 01</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="img_room_modal row mb-3 ">
                        <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8aG90ZWwlMjByb29tfGVufDB8fDB8fHww"
                            alt="" class="rounded col-4">
                        <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8aG90ZWwlMjByb29tfGVufDB8fDB8fHww"
                            alt="" class="rounded col-4">
                        <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8aG90ZWwlMjByb29tfGVufDB8fDB8fHww"
                            alt="" class="rounded col-4">
                    </div>
                    <div class="wrapper_info_room">
                        <span>Room name: </span>
                        <strong class="info_room_item mb-3">Room 01</strong>
                    </div>
                    <div class="wrapper_info_room">
                        <span>Room type: </span>
                        <strong class="info_room_item mb-3">Double room</strong>
                    </div>
                    <div class="wrapper_info_room">
                        <span>Status: </span>
                        <strong class="info_room_item mb-3">Clean</strong>
                    </div>
                    <div class="wrapper_info_room">
                        <span>Price: </span>
                        <strong class="info_room_item mb-3">80$/pernight</strong>
                    </div>
                    <p class="d-inline-flex mb-3">
                        <a class="" data-bs-toggle="collapse" href="#collapseExample" role="button"
                            aria-expanded="false" aria-controls="collapseExample">
                            Service
                        </a>
                    </p>
                    <div class="collapse" id="collapseExample">
                        <div class="row mb-3">
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
                            <form>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="name" id="floatingName"
                                        placeholder="Name">
                                    <label for="floatingName">Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="phone" id="floatingPhone"
                                        placeholder="Phone number">
                                    <label for="floatingPhone">Phone</label>
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control form-control-lg" name="room_name"
                                        value="Double 02" disabled />
                                </div>
                                <div class="mb-3 input-group form-floating">
                                    <input type="text" class="form-control" name="checkin" id="floatingCheckin"
                                        placeholder="Checkin">
                                    <label for="floatingCheckin">Checkin</label>
                                    <span class="input-group-text"><i class="fa-solid fa-calendar-days"
                                            style="padding: 0 10px;"></i></span>

                                </div>
                                <div class="mb-3 input-group form-floating">
                                    <input type="text" class="form-control" name="checkin" id="floatingCheckin"
                                        placeholder="Checkin">
                                    <label for="floatingCheckin">Checkin</label>
                                    <span class="input-group-text"><i class="fa-solid fa-calendar-days"
                                            style="padding: 0 10px;"></i></span>

                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payout"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Cash payment
                                    </label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="payout" id="flexRadioDefault2"
                                        checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Credit card payment
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-primary">Add new booking</button>
                            </form>
                        </div>
                        <div class="form-add-booking-inf-customer" style="display: none;">
                            <form>
                                <div class="input-group mb-3">
                                    <input type="email" class="form-control" id="floatingInput" placeholder="Phone">
                                    <button class="input-group-text"><i class="fa-solid fa-magnifying-glass"
                                            style="padding: 0 10px;"></i></button>
                                </div>
                                <button type="submit" class="btn btn-primary">Add new booking</button>
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
                    <strong class="modal-title fs-5" id="staticBackdropLabel">Rooom 01</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="img_room_modal row mb-3 ">
                        <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8aG90ZWwlMjByb29tfGVufDB8fDB8fHww"
                            alt="" class="rounded col-4">
                        <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8aG90ZWwlMjByb29tfGVufDB8fDB8fHww"
                            alt="" class="rounded col-4">
                        <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8aG90ZWwlMjByb29tfGVufDB8fDB8fHww"
                            alt="" class="rounded col-4">
                    </div>
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
                    <button type="button" class="btn btn-primary">Check in</button>
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
                    <strong class="modal-title fs-5" id="staticBackdropLabel">Rooom 01</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="img_room_modal row mb-3 ">
                        <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8aG90ZWwlMjByb29tfGVufDB8fDB8fHww"
                            alt="" class="rounded col-4">
                        <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8aG90ZWwlMjByb29tfGVufDB8fDB8fHww"
                            alt="" class="rounded col-4">
                        <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8aG90ZWwlMjByb29tfGVufDB8fDB8fHww"
                            alt="" class="rounded col-4">
                    </div>
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
                    <button type="button" class="btn btn-primary">Check out</button>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal checkout --}}
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

        $(document).ready(function() {
            $('#btn-add-booking').click(function() {
                $('.form-add-new-booking').css('display', 'block');
                $('.form-add-booking-inf-customer').css('display', 'none');
            })

            $('#btn-add-booking-with-info').click(function() {
                $('.form-add-new-booking').css('display', 'none');
                $('.form-add-booking-inf-customer').css('display', 'block');
            })
        });
    </script>
@endsection
