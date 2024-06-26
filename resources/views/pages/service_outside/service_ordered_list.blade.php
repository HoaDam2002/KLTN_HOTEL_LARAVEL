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
                <form action="/service/ordered_list/search" method="POST" class="w-50 ms-3">
                    @csrf
                    <input type="text" name="infor" id="" placeholder="{{ __('Name or phone Customer') }}"
                        class="">
                    <button type="submit" class="btn_search_booking"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
            <div class="tab-content mb-3" id="v-pills-tabContent">
                <div class="overflow-auto">
                    <div class="card common-card min-w-maxContent">
                        <div class="card-body">
                            <table class="table style-two">
                                <thead>
                                    <tr>
                                        <th>{{ __('Name Customer') }}</th>
                                        <th>{{ __('Phone') }}</th>
                                        <th>{{ __('Room') }}</th>
                                        <th>{{ __('Ordered At') }}</th>
                                        <th>{{ __('Price') }}</th>
                                        <th>{{ __('Handle') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($data))
                                        @foreach ($data as $item)
                                            @foreach ($item['invoices'] as $invoice)
                                                @php
                                                    $Total = 0;
                                                    foreach ($invoice->invoice_detail as $value) {
                                                        $Total += $value->price;
                                                    }
                                                @endphp
                                                <tr>
                                                    <td>
                                                        <h6 class="cart-item__title fw-500 font-18">
                                                            <div class="link name">{{ $item['user']['name'] }}</div>
                                                        </h6>
                                                    </td>
                                                    <td>
                                                        <span class="name" id="">{{ $item['user']['phone'] }}</span>
                                                    </td>
                                                    <td>
                                                        <span class="room" id="">{{ $item['room_detail']['type_name'] }}</span>
                                                    </td>
                                                    <td>
                                                        <span class="room" id="">{{ $invoice['created_at'] }}</span>
                                                    </td>
                                                    <td>
                                                        <span class="price_food" id="">{{ $Total }}$</span>
                                                    </td>   
                                                    <td>
                                                        <form action="/service/ordered_list/printpdf" method="post">
                                                            @csrf
                                                            <input type="text" name="id_invoice"
                                                                value="{{ $invoice->id }}" hidden>
                                                            <input type="text" name="name_user"
                                                                value="{{ $item['user']['name'] }}" hidden>

                                                            <button type="submit" class="add_food"
                                                                style="margin-left: 5px">
                                                                <i class="fa-solid fa-print" style="font-size: 25px"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    @endif
                            </table>
                        </div>
                    </div>
                    {{-- <nav aria-label="Page navigation example" style="padding-bottom: 50px;">
                        <ul class="pagination common-pagination">
                            {{ $data->links() }}
                        </ul>
                    </nav> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
