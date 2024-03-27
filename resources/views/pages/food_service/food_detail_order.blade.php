@extends('layout.app')

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
            top: 15px;
            right: 20px;
        }

        .title {
            text-align: center;
            background-color: rgb(255, 165, 0);
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
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="title">DANA HOTEL FOOD</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="card-body filter_booking d-flex" style="justify-content: center">
                    <form action="" class="w-50 ms-3">
                        <input type="text" name="" id="" placeholder="Food Name" class="">
                        <button type="submit" class="btn_search_booking"><i
                                class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
                <div style="margin:20px 0 200px 0; overflow: auto; height: 450px;">
                    <table class="table style-two">
                        <thead>
                            <tr>
                                <th>{{ __('Food Information') }}</th>
                                <th>{{ __('Price') }}</th>
                                <th>{{ __('Handle') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="cart-item__thumb">
                                            <img src="{{ asset('assets/customer/images/thumbs/property-1.png') }}"
                                                alt="" />
                                        </div>
                                        <div class="cart-item__content">
                                            <h6 class="cart-item__title fw-500 font-18">
                                                <a href="property.html" class="link">Fish</a>
                                            </h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="" id="">$5</span>
                                </td>
                                <td>
                                    <button style="margin-left: 5px">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                </td>
                            </tr>

                    </table>
                </div>
            </div>

            <div class="col-lg-6" style="background-color: #fff; height: 100%;">
                <h3 style="text-align: center;">INFORMATION ORDER</h3>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="infor_customer" value="Nguyen Van A" disabled>
                    <label for="infor_customer">Name Customer</label>
                </div>

                <table class="table-primary" style="width: 100%; margin: 5px;">
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">ID</th>
                            <th scope="col">Food</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Total</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>

                            <td class="table-primary">
                                <span>Fish</span>
                            </td>
                            <td class="table-primary">3</td>
                            <td class="table-primary">
                                $5
                            </td>
                            <td class="table-primary">
                                15$
                            </td>
                            <td class="table-primary">
                                <div style="padding-right: 20px;">
                                    <button style="margin-left: 5px">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                    <button style="margin-left: 5px">
                                        <i class="fa-solid fa-minus"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>

                            <td class="table-primary">
                                <span>Fish</span>
                            </td>
                            <td class="table-primary">3</td>
                            <td class="table-primary">
                                $5
                            </td>
                            <td class="table-primary">
                                15$
                            </td>
                            <td class="table-primary">
                                <div style="padding-right: 20px;">
                                    <button style="margin-left: 5px">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                    <button style="margin-left: 5px">
                                        <i class="fa-solid fa-minus"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>

                            <td class="table-primary">
                                <span>Fish</span>
                            </td>
                            <td class="table-primary">3</td>
                            <td class="table-primary">
                                $5
                            </td>
                            <td class="table-primary">
                                15$
                            </td>
                            <td class="table-primary">
                                <div style="padding-right: 20px;">
                                    <button style="margin-left: 5px">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                    <button style="margin-left: 5px">
                                        <i class="fa-solid fa-minus"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" colspan="4"s>Total</th>
                            <td class="table-primary">45$</td>
                        </tr>
                    </tbody>
                </table>
                <button class="btn btn-primary mb-3" type="submit" style="background-color: rgb(255,165,0);">ORDER</button>
            </div>
        </div>

    </div>
@endsection
