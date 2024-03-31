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

    .title_mng_service {
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
</style>
@endsection

@section('content')
<div class="container padding-y-60">
    <div class="row">
        <div class="col-12 title_mng_service">
            <h3 class="title">Management Service</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="card-body filter_booking d-flex mb-3" style="justify-content: center">

                <form action="" class="w-50 ms-3">
                    <input type="text" name="" id="" placeholder="Service Name" class="">
                    <button type="submit" class="btn_search_booking"><i
                            class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
            <div class="tab-content" id="v-pills-tabContent">
                <div class="overflow-auto">
                    <div class="card common-card min-w-maxContent">
                        <div class="card-body">
                            <table class="table style-two">
                                <thead>
                                    <tr>
                                        <th>{{ __('Service Information') }}</th>
                                        <th>{{ __('Price') }}</th>
                                        <th>{{ __('Handle') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th>{{ __('Action') }}</th>
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
                                            <button type="button"
                                                class="link text-main text-decoration-underline font-14 text-poppins"
                                                data-bs-toggle="modal" data-bs-target="#modal_editservice"
                                                data-bs-dismiss="modal" aria-label="Close"><i
                                                    class="fa-solid fa-pen"></i> </button>

                                            <button style="margin-left: 5px">
                                                <i class="fa-solid fa-trash-can"></i>

                                            </button>
                                        </td>
                                        <td>
                                            <span class="status cancel" id="checkout">Cancel</span>
                                        </td>
                                        {{-- <td>
                                            <button type="button"
                                                class="rounded-btn delete-btn text-danger bg-danger bg-opacity-10 flex-shrink-0">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </td> --}}
                                        <td class="" style="cursor: default;">
                                            <button type="button"
                                                class="rounded-btn text-danger bg-danger bg-opacity-10 flex-shrink-0"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-solid fa-gear"></i>
                                            </button>
                                            {{-- <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">Cancel</a></li>
                                                <li><a class="dropdown-item" href="#">Evaluate</a></li>
                                            </ul> --}}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <h3>ADD NEW SERVICE</h3>
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
                <button class="btn btn-primary mb-3" type="submit" style="background-color: rgb(255,165,0);">ADD
                    NEW</button>
            </form>
        </div>
    </div>
</div>
@endsection

@include('pages.service_outside.modal_edit_service')