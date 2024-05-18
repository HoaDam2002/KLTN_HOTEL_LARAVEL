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
                    <input type="text" name="" id="" placeholder="{{ __('Food Name') }}" class="name_food">
                    {{-- <button type="button" class="btn_search_booking"><i class="fa-solid fa-magnifying-glass"></i></button> --}}
                </form>
            </div>
            <div class="tab-content mb-3" id="v-pills-tabContent">
                <div class="overflow-auto">
                    <div class="card common-card min-w-maxContent">
                        <div class="card-body" style="height: 400px; overflow-y: auto;">
                            <table class="table style-two">
                                <thead>
                                    <tr>
                                        <th>{{ __('Food Information') }}</th>
                                        <th>{{ __('Price') }}</th>
                                        <th>{{ __('Handle') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="fill_food">
                                    @if ($food)
                                        @foreach ($food as $item)
                                            @php
                                                $image = $item['image'];
                                                $path = asset("restaurant/food/$image");
                                            @endphp
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div class="cart-item__thumb">
                                                            <img src="{{ $path }}" alt="" />
                                                        </div>
                                                        <div class="cart-item__content">
                                                            <h6 class="cart-item__title fw-500 font-18">
                                                                <div class="link name_food">{{ $item['name'] }}</div>
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="price_food" id="">{{ $item['price'] }}$</span>
                                                </td>
                                                <td>
                                                    <button type="button" class="add_food" data-id="{{ $item['id'] }}"
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
                {{-- {{ dd($user) }} --}}
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="infor_customer" value="{{ $user[0]['name'] }}" disabled>
                    <label for="infor_customer">{{ __('Name Customer') }}</label>
                </div>

                <table class="table-primary" style="width: 100%; margin: 5px;">
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">{{ __('Food') }}</th>
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
                <form id="orderForm" action="/food/order" method="POST">
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
                if (arr.length == 0) {
                    $('.btn_order').prop('disabled', true);
                } else {
                    $('.btn_order').prop('disabled', false);

                }

                var jsonValue = JSON.stringify(arr);

                $('#arr').val(jsonValue);
            }

            $(document).on('click', 'button.add_food', function() {
                let id_food = $(this).attr('data-id');
                let name_food = $(this).closest('tr').find('.name_food').text();
                let price_food_text = $(this).closest('tr').find('.price_food').text();
                let price_food = parseFloat(price_food_text.replace('$', ''));

                let index = arr.findIndex(item => item.hasOwnProperty(id_food));

                let index_infor = infor.findIndex(item => item.hasOwnProperty(name_food));

                if (index_infor === -1) {
                    let newInfor = {};
                    newInfor[name_food] = price_food;
                    infor.push(newInfor);
                    index_infor = infor.length - 1;
                }

                if (index === -1) {
                    let newItem = {};
                    newItem[id_food] = 1;
                    arr.push(newItem);
                    index = arr.length - 1;
                } else {
                    arr[index][id_food]++;
                }

                let total = 0;
                if (index >= 0) {
                    total = arr[index][id_food] * price_food;
                }
                let html =
                    '<tr id="' + id_food + '">' +
                    '<td class="table-primary">' +
                    '<span class="name">' + name_food + '</span>' +
                    '</td>' +
                    '<td class="table-primary quantity">' + (index >= 0 ? arr[index][id_food] : 0) +
                    '</td>' +
                    '<td class="table-primary price_food">' + price_food_text + '</td>' +
                    '<td class="table-primary">' + total + '</td>' +
                    '<td class="table-primary">' +
                    '<div style="padding-right: 20px;">' +
                    '<button class="btn_plus" style="margin-left: 5px">' +
                    '<i class="fa-solid fa-plus"></i>' +
                    '</button>' +
                    '<button class="btn_minus" style="margin-left: 5px">' +
                    '<i class="fa-solid fa-minus"></i>' +
                    '</button>' +
                    '</div>' +
                    '</td>' +
                    '</tr>';

                // Xóa HTML cũ cùng id
                $('#' + id_food).remove();

                $('.fill').append(html);

                let finalTotal = calculateFinalTotal();
                $('.total_final').text(finalTotal + '$');
                $('input.name_food').val(name_food);
                $('input.price').val(price_food);
                $('input#infor').val(JSON.stringify(infor));
                allow_order()
            });


            $(document).on('click', 'button.btn_order', function() {
                arr = [];
                infor = [];
                $('tbody.fill').empty();
                $('.btn_order').prop('disabled', true);
                $('.total_final').text('0$');
                $('#orderForm').submit();
            });


            $(document).on('click', 'button.btn_plus', function() {
                let id_food = $(this).closest('tr').attr('id');
                let quantityElement = $(this).closest('tr').find('.quantity');
                let quantity = parseInt(quantityElement.text());

                let index = arr.findIndex(item => item.hasOwnProperty(id_food));

                if (index !== -1) {
                    arr[index][id_food]++; // Tăng quantity lên 1
                    quantityElement.text(arr[index][id_food]); // Cập nhật quantity trên giao diện
                }

                let finalTotal = calculateFinalTotal();
                $('.total_final').text(finalTotal + '$');
                allow_order()
            });

            $(document).on('click', 'button.btn_minus', function() {
                let id_food = $(this).closest('tr').attr('id');
                let quantityElement = $(this).closest('tr').find('.quantity');
                let quantity = parseInt(quantityElement.text());
                let name_food = $(this).closest('tr').find('span.name').text();

                // Tìm index của id_food trong mảng arr
                let index = arr.findIndex(item => item.hasOwnProperty(id_food));
                let index_infor = infor.findIndex(item => item.hasOwnProperty(name_food));

                if (index !== -1) {
                    if (quantity === 1) {
                        // Xóa HTML của hàng có id_food tương ứng
                        $('#' + id_food).remove();
                        // Xóa id_food ra khỏi mảng arr
                        arr.splice(index, 1);
                        infor.splice(index_infor, 1);
                    } else {
                        // Giảm quantity đi 1
                        arr[index][id_food]--;
                        quantityElement.text(arr[index][id_food]); // Cập nhật quantity trên giao diện
                    }
                }
                let finalTotal = calculateFinalTotal();
                $('.total_final').text(finalTotal + '$');
                console.log(arr);
                allow_order()
            });

            function calculateFinalTotal() {
                let finalTotal = arr.reduce((acc, item) => {
                    let id_food = Object.keys(item)[0];
                    let quantity = Object.values(item)[0];
                    let price_food = parseFloat($('#' + id_food).find('.price_food').text().replace('$',
                        ''));
                    let foodTotal = quantity * price_food;
                    return acc + foodTotal;
                }, 0);
                return finalTotal;
            }

            $(document).on('input', 'input.name_food', function() {
                let name_food = $(this).val();
                $.ajax({
                    type: "post",
                    url: "/order/detail/search_food",
                    data: {
                        name_food: name_food
                    },
                    dataType: "json",
                    success: function(response) {
                        let foods = response.foods;

                        let html = '';

                        foods.map(function(value) {
                            let path = "{{ asset('restaurant/food') }}" + '/' + value.image;
                            html +=
                                '<tr>' +
                                '<td>' +
                                '<div class="d-flex align-items-center gap-3">' +
                                '<div class="cart-item__thumb">' +
                                '<img src="' + path +'" alt="" />' +
                                '</div>' +
                                '<div class="cart-item__content">' +
                                '<h6 class="cart-item__title fw-500 font-18">' +
                                '<div class="link name_food">' + value.name + '</div>' +
                                '</h6>' +
                                '</div>' +
                                '</div>' +
                                '</td>' +
                                '<td>' +
                                '<span class="price_food" id="">' + value.price + '$</span>' +
                                '</td>' +
                                '<td>' +
                                '<button type="button" class="add_food" data-id="' + value.id + '" style="margin-left: 5px">' +
                                '<i class="fa-solid fa-plus"></i>' +
                                '</button>' +
                                '</td>' +
                                '</tr>';
                        })

                        $('.fill_food').html(html);
                    }
                });
            });


        });
    </script>
@endsection
