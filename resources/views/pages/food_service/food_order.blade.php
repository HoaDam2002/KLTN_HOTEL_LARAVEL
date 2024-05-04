@extends('pages.food_service.food_service')
@section('css')
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
            top: 11px;
            right: 20px;
        }
    </style>
@endsection

@section('content')
    <div class="col-xl-9 col-lg-9">
        <div class="tab-content" id="v-pills-tabContent">
            <div class="overflow-auto">
                <div class="card common-card min-w-maxContent" style="margin-bottom: 20px;">
                    <div class="card-body filter_booking d-flex" style="justify-content: center;">
                        <form action="/food/manation/search_customer" class="w-50 ms-3" method="POST">
                            @csrf
                            <input type="text" name="infor" id="" placeholder="Customer Name" class="">
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
                                    <th>Information</th>
                                    <th>Check in</th>
                                    <th>Check out</th>
                                    {{-- <th>Status</th> --}}
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($customer))
                                    @foreach ($customer as $item)
                                        @php
                                            $avatar = "http://127.0.0.1:8000/assets/customer/images/thumbs/property-1.png";

                                            if (!empty($item['customer'])) {
                                                $avatar = asset("customer/avatar/" . $item['customer']['avatar']);
                                            }

                                        @endphp
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center gap-3">
                                                    <div class="cart-item__thumb">
                                                        <img src="{{ $avatar }}"
                                                            alt="">
                                                    </div>
                                                    <div class="cart-item__content">
                                                        <h6 class="cart-item__title fw-500 font-18">
                                                            <a href="/food/order/detail/{{ $item['id'] }}" class="link">{{ $item['name'] }}</a>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <span class="date" id="checkin">{{ explode(' ',$item['booking_realtime'][0]['check_in'])[0] }}</span>
                                            </td>
                                            <td>
                                                <span class="date" id="checkout">{{ explode(' ',$item['booking_realtime'][0]['check_out'])[0] }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <nav aria-label="Page navigation example" style="padding-bottom: 50px;">
                <ul class="pagination common-pagination">
                    {{ $customer->links() }}
                </ul>
            </nav>
        </div>
    </div>
@endsection
