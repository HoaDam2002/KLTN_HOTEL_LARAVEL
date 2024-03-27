@extends('layout.app')

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

@section('content')
    <div class="container">
        <div style="margin: 100px 0 100px 0;">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="overflow-auto">
                    <div class="card common-card min-w-maxContent" style="margin-bottom: 20px">
                        <div class="card-body filter_booking d-flex" style="justify-content: center">

                            <form action="" class="w-50 ms-3">
                                <input type="text" name="" id="" placeholder="Name or Phone Customer"
                                    class="">
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
                                        <th>{{ __('Room') }}</th>
                                        <th>{{ __('Name Customer') }}</th>
                                        <th>{{ __('Check in') }}</th>
                                        <th>{{ __('Check out') }}</th>
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
                                                        <a href="property.html" class="link">3 Rooms
                                                            Manhattan</a>
                                                    </h6>

                                                    <span class="cart-item__price">Price:
                                                        <span class="fw-500 text-heading">$85.00</span></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span>Nguyen Van A</span>
                                        </td>
                                        <td>
                                            <span class="date" id="checkin">17/02/2024</span>
                                        </td>
                                        <td>
                                            <span class="date" id="checkout">17/02/2024</span>
                                        </td>
                                        <td>
                                            <span class="status cancel" id="checkout">Cancel</span>
                                        </td>

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
                <nav aria-label="Page navigation example">
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
                </nav>
            </div>
        </div>
    </div>
@endsection
