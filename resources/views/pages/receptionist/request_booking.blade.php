@extends('pages.receptionist.receptionist')

<style>
    span.status {
        color: #fff;
        padding: 5px 10px;
        border-radius: 40px;
        min-width: 85px;
    }

    .status.cancel {
        background-color: orange;
    }

    .status.confirm {
        background-color: green;
    }

    .status.pending {
        background-color: blue;
    }

    .status.finish {
        background-color: black;
    }

    .status.checkin {
        background-color: crimson;
    }

    .btn_filter {
        background: var(--main-gradient);
        color: #fff;
        padding: 8px 20px;
    }

    .filter_booking form {
        position: relative;
    }

    .filter_booking input {
        width: 100%;
        padding: 8px 15px;
        outline: none;
    }

    .btn_search_booking {
        position: absolute;
        top: 15px;
        right: 20px;
    }

    .btn_detail_booking a {
        color: #fff;
        padding: 8px 20px;
        border-radius: 40px;
        min-width: 85px;
        background: var(--main-gradient);
    }

    .btn_detail_booking a:hover {
        color: #fff;
    }
</style>
@section('content')
    <div class="col-xl-9 col-lg-8">
        <div class="tab-content" id="v-pills-tabContent">
            <div class="overflow-auto">
                <div class="card common-card min-w-maxContent" style="margin-bottom: 20px">
                    <div class="card-body filter_booking d-flex">
                        <button class="btn_filter dropdown-toggle" data-bs-toggle="dropdown"
                            aria-expanded="false">Filter</button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Cancel</a></li>
                            <li><a class="dropdown-item" href="#">Check in</a></li>
                            <li><a class="dropdown-item" href="#">Confirm</a></li>
                            <li><a class="dropdown-item" href="#">Pending</a></li>
                            <li><a class="dropdown-item" href="#">Finish</a></li>
                        </ul>
                        <form action="" class="w-50 ms-3">
                            <input type="text" name="" id="" placeholder="Room Name" class="">
                            <button type="submit" class="btn_search_booking"><i
                                    class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </div>
                </div>
                <div class="card common-card min-w-maxContent">
                    <div class="card-body">
                        <table class="table style-two">
                            <thead>
                                <tr>
                                    <th>{{ __('My Room Information') }}</th>
                                    <th>{{ __('Check in') }}</th>
                                    <th>{{ __('Check out') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                {{-- {{dd($data_new_booking)}} --}}
                                @if (!empty($data_new_booking))
                                    @foreach ($data_new_booking as $item)
                                        @php
                                            $check_in = $item['check_in'];
                                            $check_out = $item['check_out'];
                                        @endphp

                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center gap-3">
                                                    <div class="cart-item__thumb">
                                                        <img src="{{ asset('customer/image_room/' . $item['room']['images']) }}"
                                                            alt="">
                                                    </div>
                                                    <div class="cart-item__content">
                                                        <h6 class="cart-item__title fw-500 font-18">
                                                            <strong>{{ $item['room']['name'] }}</strong>
                                                        </h6>
                                                        <span class="cart-item__price">Price:
                                                            <span
                                                                class="fw-500 text-heading">${{ $item['price'] }}</span></span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="date">{{ $check_in }}</span>
                                            </td>
                                            <td>
                                                <span class="date">{{ $check_out }}</span>
                                            </td>
                                            <td>
                                                <span class="status" style="background-color: rgb(255,165,0)"
                                                    id="">{{ $item['status'] }}</span>
                                            </td>
                                            <td>
                                                <button type="button" class="btn_detail_booking">
                                                    <a href="/recep/info-booking/{{ $item['id'] }}">Detail</a>
                                                </button>
                                            </td>

                                        </tr>
                                    @endforeach
                                @else
                                    <h4>No booking </h4>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- <nav aria-label="Page navigation example">
            <ul class="pagination common-pagination">
                <li class="page-item active">
                    <a class="page-link bg-white" href="#">1</a>
                </li>
                <li class="page-item">
                    <a class="page-link bg-white" href="#">2</a>
                </li>
                <li class="page-item">
                    <a class="page-link bg-white" href="#">3</a>
                </li>
                <li class="page-item">
                    <a class="page-link bg-white" href="#">4</a>
                </li>
            </ul>
        </nav> --}}
        </div>
    </div>
@endsection
