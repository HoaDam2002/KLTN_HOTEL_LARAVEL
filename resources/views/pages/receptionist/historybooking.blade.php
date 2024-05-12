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

    .text {
        font-size: 13px;
    }
</style>

@section('content')
    <div class="col-xl-9 col-lg-8">
        <div style="margin: 0 0 100px 0;">
            <div class="card common-card min-w-maxContent" style="margin-bottom: 20px">
                <div class="card-body filter_booking d-flex" style="justify-content: center">

                    <form action="" class="w-50 ms-3">
                        <input type="text" name="" id="" placeholder="Name or Phone Customer"
                            class="name_room">
                        <button type="submit" class="btn_search_booking"><i
                                class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
            </div>
            <div class="tab-content overflow-auto" id="v-pills-tabContent">
                <div>
                    <div class="card common-card min-w-maxContent">
                        <div class="card-body">
                            <table class="table style-two">
                                <thead>
                                    <tr>
                                        <th>{{ __('Room') }}</th>
                                        <th>{{ __('Name Customer') }}</th>
                                        <th>{{ __('Check in') }}</th>
                                        <th>{{ __('Check out') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($item))
                                        @foreach ($item as $value)
                                            @php

                                                if (!empty($value['user']['customer'])) {
                                                    $avatar =
                                                        '/customer/avatar/' . $value['user']['customer']['avatar'];
                                                } else {
                                                    $avatar = 'assets/customer/images/thumbs/property-1.png';
                                                }

                                                $startDate = new DateTime($value['check_in']);
                                                $endDate = new DateTime($value['check_out']);
                                                $interval = $startDate->diff($endDate);

                                                $diffInDays = $interval->days;

                                                if ($diffInDays == 0) {
                                                    $diffInDays = 1;
                                                }

                                                $total = $value['room_detail']['type_room']['price'] * $diffInDays;
                                            @endphp
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center gap-3" style="max-width: 316px">
                                                        <div class="cart-item__thumb">
                                                            <img src='{{ asset($avatar) }}' alt="" />
                                                        </div>
                                                        <div class="cart-item__content" style="max-width: 200px">
                                                            <h6 class="cart-item__title fw-500 font-18">
                                                                <div class="link text">
                                                                    {{ $value['room_detail']['type_room']['name'] }}</div>
                                                            </h6>

                                                            <span class="cart-item__price text">Price:
                                                                <span
                                                                    class="fw-500 text-heading text">{{ $value['room_detail']['type_room']['price'] }}</span></span>
                                                            <span class="cart-item__price text">Total:
                                                                <span
                                                                    class="fw-500 text-heading text">{{ $total }}</span></span>

                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="name_cus text">{{ $value['user']['name'] }}</span>
                                                </td>
                                                <td>
                                                    <span class="date text"
                                                        id="checkin">{{ explode(' ', $value['check_in'])[0] }}</span>
                                                </td>
                                                <td>
                                                    <span class="date text"
                                                        id="checkout">{{ explode(' ', $value['check_out'])[0] }}</span>
                                                </td>
                                                <td>
                                                    <span class="status cancel text"
                                                        id="checkout">{{ $value['status'] }}</span>
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
    </div>
@endsection

@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            $(document).on('input', 'input.name_room', function() {
                let infor = $(this).val();

                console.log(infor);
                $.ajax({
                    type: "post",
                    url: "/recep/history-booking/search",
                    data: {
                        infor: infor
                    },
                    dataType: "json",
                    success: function(response) {
                        let item = response.item;

                        let html = '';

                        console.log(item);

                        item.map(function(value) {

                            if (value.booking_realtime) {

                                value.booking_realtime.map(function(item) {
                                    var checkin = item.check_in.split(' ')[0];
                                    var checkout = item.check_out.split(' ')[0];


                                    let total = cul_total(checkin, checkout,
                                        item.price);

                                    let avatar =
                                        'http://127.0.0.1:8000/assets/customer/images/thumbs/property-1.png';

                                    if (value.customer) {
                                        avatar =
                                            "{{ asset('/customer/avatar') }}/" +
                                            value.customer.avatar;
                                    }

                                    html +=
                                        '<tr>' +
                                        '<td>' +
                                        '<div class="d-flex align-items-center gap-3">' +
                                        '<div class="cart-item__thumb">' +
                                        '<img src=' + avatar + ' alt="" />' +
                                        '</div>' +
                                        '<div class="cart-item__content">' +
                                        '<h6 class="cart-item__title fw-500 font-18">' +
                                        '<a href="property.html" class="link text">' +
                                        item.room_detail.type_room.name +
                                        '</a>' +
                                        '</h6>' +
                                        '<span class="cart-item__price text">Price: ' +
                                        '<span class="fw-500 text-heading text">' +
                                        item.room_detail.type_room.price +
                                        '</span>' +
                                        '</span>' +
                                        '<span class="cart-item__price text"> Total: ' +
                                        '<span class="fw-500 text-heading text">' +
                                        total + '</span>' +
                                        '</span>' +
                                        '</div>' +
                                        '</div>' +
                                        '</td>' +
                                        '<td>' +
                                        '<span class="name_cus text">' + value
                                        .name + '</span>' +
                                        '</td>' +
                                        '<td>' +
                                        '<span class="date text" id="checkin">' +
                                        item.check_in + '</span>' +
                                        '</td>' +
                                        '<td>' +
                                        '<span class="date text" id="checkout">' +
                                        item.check_out + '</span>' +
                                        '</td>' +
                                        '<td>' +
                                        '<span class="status cancel text" id="checkout">' +
                                        item.status + '</span>' +
                                        '</td>' +
                                        '</tr>';


                                })
                            }
                        })
                        $('tbody').html(html);
                    }
                });
            })

            function cul_total(a, b, c) {
                var date1 = new Date(a);
                var date2 = new Date(b);

                var difference = date2.getTime() - date1.getTime();

                var daysDifference = Math.floor(difference / (1000 * 60 * 60 * 24));

                if (daysDifference == 0) {
                    daysDifference = 1;
                }

                let total = (daysDifference * c);

                return total;
            }

        });
    </script>
@endsection
