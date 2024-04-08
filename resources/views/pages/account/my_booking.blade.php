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
</style>
@extends('pages.account.account')
@section('content_account')
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
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($data))
                                    @foreach ($data as $data)
                                        @php
                                            $image = $data['room']['images'];
                                            $checkin = new DateTime($data['check_in']);
                                            $checkout = new DateTime($data['check_out']);

                                            $interval = $checkout->diff($checkin);
                                            $numberOfDays = $interval->days;

                                            $total = $data['price'] * $data['quantity'] * $numberOfDays - $data['deposits'];
                                        @endphp
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center gap-3">
                                                    <div class="cart-item__thumb">
                                                        <img src="{{ asset("customer/image_room/$image") }}"
                                                            alt="" />
                                                    </div>
                                                    <div class="cart-item__content">
                                                        <h6 class="cart-item__title fw-500 font-18">
                                                            <a href="property.html"
                                                                class="link">{{ $data['room']['name'] }}</a>
                                                        </h6>
                                                        <p class="property-item__location d-flex gap-2 font-14">
                                                            <span class="icon text-gradient">
                                                                <i class="fas fa-map-marker-alt"></i></span>
                                                            Da Nang, Viet Nam
                                                        </p>
                                                        <span class="cart-item__price">Total:
                                                            <span
                                                                class="fw-500 text-heading">${{ $total }}</span></span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="date" id="checkin">17/02/2024</span>
                                            </td>
                                            <td>
                                                <span class="date" id="checkout">17/02/2024</span>
                                            </td>
                                            <td>
                                                <span class="status" style="background-color: rgb(255,165,0)"
                                                    id="">{{ $data['status'] }}</span>
                                            </td>

                                            <td class="" style="cursor: default;">
                                                <button type="button"
                                                    class="rounded-btn text-danger bg-danger bg-opacity-10 flex-shrink-0"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa-solid fa-gear"></i>
                                                </button>

                                            </td>
                                        </tr>
                                    @endforeach
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
    @include('layout.modal_evaluate')
@endsection
