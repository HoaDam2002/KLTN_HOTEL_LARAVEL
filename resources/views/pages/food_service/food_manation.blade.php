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
            top: 22px;
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

        .btn_add_food {
            background: var(--main-gradient);
            color: hsl(var(--white));
        }
    </style>
@endsection

@section('content')
    <div class="col-xl-9 col-lg-9">
        <div class="tab-content" id="v-pills-tabContent">
            <div class="card card-body filter_booking mb-3">
                <div style="display: flex; justify-content: space-between">
                    <form action="" class="w-50 ms-3">
                        <input type="text" name="" id="" placeholder="Food Name" class=""
                            style="height: 100%">
                        <button type="submit" class="btn_search_booking"><i
                                class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                    <button class="btn btn_add_food" data-bs-toggle="modal" data-bs-target="#modal_add_food">Add
                        food</button>
                </div>
            </div>
            <div class="tab-content" id="v-pills-tabContent">
                <div class="overflow-auto">
                    <div class="card common-card min-w-maxContent">
                        <div class="card-body">
                            <table class="table style-two">
                                <thead>
                                    <tr>
                                        <th>{{ __('Food Information') }}</th>
                                        <th>{{ __('Price') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th>{{ __('Action') }}</th>
                                        <th></th>
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
                                                    <h6 class="cart-item__title">
                                                        <a href="property.html" class="link">Fish</a>
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="" id="">$5</span>
                                        </td>
                                        <td>
                                            <div class="form-check form-switch d-flex justify-content-center">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="flexSwitchCheckChecked" checked>
                                            </div>
                                        </td>
                                        <td>
                                            <button type="button"
                                                class="link text-main text-decoration-underline font-14 text-poppins"
                                                data-bs-toggle="modal" data-bs-target="#modal_editfood"
                                                data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-pen"></i>
                                            </button>

                                            <button style="margin-left: 5px">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="cart-item__thumb">
                                                    <img src="{{ asset('assets/customer/images/thumbs/property-1.png') }}"
                                                        alt="" />
                                                </div>
                                                <div class="cart-item__content">
                                                    <h6 class="cart-item__title">
                                                        <a href="property.html" class="link">Fish</a>
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="" id="">$5</span>
                                        </td>
                                        <td>
                                            <div class="form-check form-switch d-flex justify-content-center">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="flexSwitchCheckChecked" checked>
                                            </div>
                                        </td>
                                        <td>
                                            <button type="button"
                                                class="link text-main text-decoration-underline font-14 text-poppins"
                                                data-bs-toggle="modal" data-bs-target="#modal_editfood"
                                                data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-pen"></i>
                                            </button>

                                            <button style="margin-left: 5px">
                                                <i class="fa-solid fa-trash-can"></i>

                                            </button>
                                        </td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- start modal add food --}}
    <div class="modal fade" id="modal_add_food" tabindex="-1" aria-labelledby="modal_add_food" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title fs-5" id="exampleModalLabel">
                        Add New Food</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="#">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="add_foodname" placeholder="Food Name">
                            <label for="add_foodname">Food Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="add_price" placeholder="Price">
                            <label for="add_price">Price</label>
                        </div>
                        <div class="mb-3">
                            <input class="form-control form-control-lg" type="file" id="formFileMultiple" multiple>
                        </div>
                        <button class="btn btn-main mb-3 w-100" type="submit">Add
                            New Food</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal add food --}}
@endsection

@include('pages.food_service.modal_edit_food')
