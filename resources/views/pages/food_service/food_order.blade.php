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
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="tab-content" id="v-pills-tabContent">
            <div class="overflow-auto">
                <div class="card common-card min-w-maxContent" style="margin-bottom: 20px; margin-top: 20px;">
                    <div class="card-body filter_booking d-flex" style="justify-content: center;">
                        {{-- <button class="btn_filter dropdown-toggle" data-bs-toggle="dropdown"
                            aria-expanded="false">Filter</button>
                        <ul class="dropdown-menu" style="">
                            <li><a class="dropdown-item" href="#">Cancel</a></li>
                            <li><a class="dropdown-item" href="#">Check in</a></li>
                            <li><a class="dropdown-item" href="#">Confirm</a></li>
                            <li><a class="dropdown-item" href="#">Pending</a></li>
                            <li><a class="dropdown-item" href="#">Finish</a></li>
                        </ul> --}}
                        <form action="" class="w-50 ms-3">
                            <input type="text" name="" id="" placeholder="Customer Name" class="">
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
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="cart-item__thumb">
                                                <img src="http://127.0.0.1:8000/assets/customer/images/thumbs/property-1.png"
                                                    alt="">
                                            </div>
                                            <div class="cart-item__content">
                                                <h6 class="cart-item__title fw-500 font-18">
                                                    <a href="/food_service/order/detail" class="link">Nguyen Van A</a>
                                                </h6>
                                                
                                                
                                            </div>
                                        </div>
                                    </td>
                                    
                                    <td>
                                        <span class="date" id="checkin">17/02/2024</span>
                                    </td>
                                    <td>
                                        <span class="date" id="checkout">17/02/2024</span>
                                    </td>
                                    {{-- <td>
                                        <span class="status cancel" id="checkout">Cancel</span>
                                    </td> --}}

                                    {{-- <td class="" style="cursor: default;">
                                        <button type="button"
                                            class="rounded-btn text-danger bg-danger bg-opacity-10 flex-shrink-0"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-solid fa-gear"></i>
                                        </button>

                                    </td> --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <nav aria-label="Page navigation example" style="padding-bottom: 50px;">
                <ul class="pagination common-pagination">
                    <li class="page-item">
                        <a class="page-link bg-white" href="#">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link bg-white" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link bg-white" href="#">3</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
