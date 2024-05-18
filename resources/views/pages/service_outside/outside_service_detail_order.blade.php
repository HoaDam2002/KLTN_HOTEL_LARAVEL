@extends('pages.service_outside.service_outside')

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

        .title_mng_food {
            background-color: rgb(255, 165, 0);
            padding: 15px 0;
            margin-bottom: 40px;
        }

        .title {
            margin: auto;
            text-align: center;
            color: #fff;
        }

        .cart-item__title .link {
            width: 150px !important;
        }

        .title_order_form {
            text-align: center;
            margin: auto;
            padding: 20px 0;
        }

        td,
        th {
            text-align: center;
        }

        td {
            padding: 10px;
        }


        tr {
            margin-bottom: 10px;
        }
    </style>
@endsection

@section('content')
    <div class="col-xl-9 col-lg-9">
        <div class="tab-content" id="v-pills-tabContent">
            <div class="card card-body filter_booking d-flex mb-3" style="align-items: center;">
                <form action="" class="w-50 ms-3">
                    <input type="text" name="" id="" placeholder="{{ __('Service Name') }}" class="name_service">
                    {{-- <button type="submit" class="btn_search_booking"><i class="fa-solid fa-magnifying-glass"></i></button> --}}
                </form>
            </div>
            <div class="tab-content mb-3" id="v-pills-tabContent">
                <div class="overflow-auto">
                    <div class="card common-card min-w-maxContent">
                        <div class="card-body">
                            <table class="table style-two">
                                <thead>
                                    <tr>
                                        <th>{{ __('Service Information') }}</th>
                                        <th>{{ __('Price') }}</th>
                                        <th>{{ __('Handle') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="fill_service">
                                    @if ($service)
                                        @foreach ($service as $item)
                                            @php
                                                $image = $item['image'];
                                                $path = asset("service/$image");
                                            @endphp
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div class="cart-item__thumb">
                                                            <img src="{{ $path }}" alt="" />
                                                        </div>
                                                        <div class="cart-item__content">
                                                            <h6 class="cart-item__title fw-500 font-18">
                                                                <div class="link name_service">{{ $item['name'] }}</div>
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="price_service" id="">{{ $item['price'] }}$</span>
                                                </td>
                                                <td>
                                                    <button type="button" class="add_service" data-id="{{ $item['id'] }}"
                                                        style="margin-left: 5px">
                                                        <i class="fa-solid fa-plus"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif

                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="tab-content mb-3" id="v-pills-tabContent">
            <div class="card common-card min-w-maxContent">
                <h3 class="title_order_form">{{ __('INFORMATION ORDER') }}</h3>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="infor_customer" value="{{ $user[0]['name'] }}" disabled>
                    <label for="infor_customer">{{ __('Name Customer') }}</label>
                </div>

                <table class="table-primary" style="width: 100%; margin: 5px;">
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">{{ __('Service') }}</th>
                            <th scope="col">{{ __('Quantity') }}</th>
                            <th scope="col">{{ __('Price') }}</th>
                            <th scope="col">{{ __('Total') }}</th>
                            <th scope="col">{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody class="fill">

                    </tbody>
                </table>
                <div style="display: flex;">
                    <div scope="row"><strong>{{ __('Total') }}</strong></div>
                    <div style="margin-left: 20px;" class="table-primary total_final">0$</div>
                </div>
                <form id="orderForm" action="/outside_service/order" method="POST">
                    @csrf
                    <input type="text" name="id_user" value="{{ $user[0]['id'] }}" hidden>
                    <input type="text" name="id_booking_realtime" value="{{ $user[0]['booking_realtime'][0]['id'] }}"
                        hidden>
                    <input type="text" name="name_user" value="{{ $user[0]['name'] }}" hidden>
                    <input type="text" id="arr" name="arr" value="" hidden>
                    <input type="text" id="infor" name="infor" value="" hidden>


                    <button type="submit" class="btn btn-main w-10 mb-2 btn_order"
                        style="background-color: rgb(255,165,0);">{{ __('ORDER') }}</button>
                </form>
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

            let arr = [];
            let infor = [];

            $('.btn_order').prop('disabled', true);

            function allow_order() {
                $('.btn_order').prop('disabled', arr.length === 0);

                var jsonValue = JSON.stringify(arr);

                $('#arr').val(jsonValue);
            }

            $(document).on('click', 'button.add_service', function() {
                let id_service = $(this).attr('data-id');

                console.log(id_service);
                let name_service = $(this).closest('tr').find('.name_service').text();
                let price_service_text = $(this).closest('tr').find('.price_service').text();
                let price_service = parseFloat(price_service_text.replace('$', ''));

                let index_infor = infor.findIndex(item => item.hasOwnProperty(name_service));

                if (index_infor === -1) {
                    let newInfor = {};
                    newInfor[name_service] = price_service;
                    infor.push(newInfor);
                    index_infor = infor.length - 1;
                }

                let idExists = arr.some(item => item.hasOwnProperty(id_service));

                if (!idExists) {
                    let newItem = {};
                    newItem[id_service] = 1;
                    arr.push(newItem);
                }

                let html =
                    '<tr id="' + id_service + '">' +
                    '<td class="table-primary">' +
                    '<span class="name">' + name_service + '</span>' +
                    '</td>' +
                    '<td class="table-primary quantity">1</td>' +
                    '<td class="table-primary price_service">' + price_service_text + '</td>' +
                    '<td class="table-primary">' + price_service_text + '</td>' +
                    '<td class="table-primary">' +
                    '<div style="padding-right: 20px;">' +
                    '<button class="btn_minus" style="margin-left: 5px">' +
                    '<i class="fa-solid fa-minus"></i>' +
                    '</button>' +
                    '</div>' +
                    '</td>' +
                    '</tr>';

                // Xóa HTML cũ cùng id
                $('#' + id_service).remove();

                $('.fill').append(html);

                let finalTotal = calculateFinalTotal();
                $('.total_final').text(finalTotal + '$');
                $('input#infor').val(JSON.stringify(infor));
                allow_order();
            });

            $(document).on('click', 'button.btn_order', function() {
                arr = [];
                infor = [];
                $('tbody.fill').empty();
                $('.btn_order').prop('disabled', true);
                $('.total_final').text('0$');
                $('#orderForm').submit();
            });

            $(document).on('click', 'button.btn_minus', function() {
                let id_service = $(this).closest('tr').attr('id');
                let quantityElement = $(this).closest('tr').find('.quantity');
                let quantity = parseInt(quantityElement.text());
                let name_service = $(this).closest('tr').find('span.name').text();

                // Tìm index của id_food trong mảng arr
                let index = arr.findIndex(item => item.hasOwnProperty(id_service));
                let index_infor = infor.findIndex(item => item.hasOwnProperty(name_service));

                if (index !== -1) {
                    if (quantity === 1) {
                        // Xóa HTML của hàng có id_food tương ứng
                        $('#' + id_service).remove();
                        // Xóa id_food ra khỏi mảng arr
                        arr.splice(index, 1);
                        infor.splice(index_infor, 1);
                    }
                }
                let finalTotal = calculateFinalTotal();
                $('.total_final').text(finalTotal + '$');
                console.log(arr);
                console.log(infor);
                allow_order()
            });

            // Hàm tính tổng final
            function calculateFinalTotal() {
                let finalTotal = arr.reduce((acc, item) => {
                    let id_service = Object.keys(item)[0];
                    let price_service = parseFloat($('#' + id_service).find('.price_service').text()
                        .replace('$', ''));
                    return acc + price_service;
                }, 0);
                return finalTotal;
            }

            $(document).on('input', 'input.name_service', function() {
                let name_service = $(this).val();
                $.ajax({
                    type: "post",
                    url: "/order/detail/search_service",
                    data: {
                        name_service: name_service
                    },
                    dataType: "json",
                    success: function(response) {
                        let services = response.services;

                        let html = '';

                        services.map(function(value) {
                            let path = "{{ asset('service') }}" + '/' + value
                                .image;
                            html +=
                                '<tr>' +
                                '<td>' +
                                '<div class="d-flex align-items-center gap-3">' +
                                '<div class="cart-item__thumb">' +
                                '<img src="' + path + '" alt="" />' +
                                '</div>' +
                                '<div class="cart-item__content">' +
                                '<h6 class="cart-item__title fw-500 font-18">' +
                                '<div class="link name_service">' + value.name + '</div>' +
                                '</h6>' +
                                '</div>' +
                                '</div>' +
                                '</td>' +
                                '<td>' +
                                '<span class="price_service" id="">' + value.price +
                                '$</span>' +
                                '</td>' +
                                '<td>' +
                                '<button type="button" class="add_service" data-id="' +
                                value.id + '" style="margin-left: 5px">' +
                                '<i class="fa-solid fa-plus"></i>' +
                                '</button>' +
                                '</td>' +
                                '</tr>';
                        })

                        $('.fill_service').html(html);
                    }
                });
            });

        });
    </script>
@endsection
