<style>
    span.status {
        color: #fff;
        padding: 5px 10px;
        border-radius: 40px;
    }

    .status.cancel {
        background-color: orange;
    }

    .status.confirm {
        background-color: green;
    }
</style>
@extends('pages.account.account')
@section('content_account')
    <div class="col-xl-9 col-lg-8">
        <div class="tab-content" id="v-pills-tabContent">
            <div class="overflow-auto">
                <div class="card common-card min-w-maxContent">
                    <div class="card-body">
                        <table class="table style-two">
                            <thead>
                                <tr>
                                    <th>{{ __('My Room Information') }}</th>
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
                                                <p class="property-item__location d-flex gap-2 font-14">
                                                    <span class="icon text-gradient">
                                                        <i class="fas fa-map-marker-alt"></i></span>
                                                    66 Broklyant, New York
                                                    America
                                                </p>
                                                <span class="cart-item__price">Price:
                                                    <span class="fw-500 text-heading">$85.00</span></span>
                                            </div>
                                        </div>
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
                                    <td>
                                        <button type="button"
                                            class="rounded-btn delete-btn text-danger bg-danger bg-opacity-10 flex-shrink-0">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
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
                                                <p class="property-item__location d-flex gap-2 font-14">
                                                    <span class="icon text-gradient">
                                                        <i class="fas fa-map-marker-alt"></i></span>
                                                    66 Broklyant, New York
                                                    America
                                                </p>
                                                <span class="cart-item__price">Price:
                                                    <span class="fw-500 text-heading">$85.00</span></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="date" id="checkin">17/02/2024</span>
                                    </td>
                                    <td>
                                        <span class="date" id="checkout">17/02/2024</span>
                                    </td>
                                    <td>
                                        <span class="status confirm" id="checkout">{{ __('Confirm') }}</span>
                                    </td>
                                    <td>
                                        <button type="button"
                                            class="rounded-btn delete-btn text-danger bg-danger bg-opacity-10 flex-shrink-0">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
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
                                                <p class="property-item__location d-flex gap-2 font-14">
                                                    <span class="icon text-gradient">
                                                        <i class="fas fa-map-marker-alt"></i></span>
                                                    66 Broklyant, New York
                                                    America
                                                </p>
                                                <span class="cart-item__price">Price:
                                                    <span class="fw-500 text-heading">$85.00</span></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="date" id="checkin">17/02/2024</span>
                                    </td>
                                    <td>
                                        <span class="date" id="checkout">17/02/2024</span>
                                    </td>
                                    <td>
                                        <span class="status" id="checkout">Pending</span>
                                    </td>
                                    <td>
                                        <button type="button"
                                            class="rounded-btn delete-btn text-danger bg-danger bg-opacity-10 flex-shrink-0">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
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
                                                <p class="property-item__location d-flex gap-2 font-14">
                                                    <span class="icon text-gradient">
                                                        <i class="fas fa-map-marker-alt"></i></span>
                                                    66 Broklyant, New York
                                                    America
                                                </p>
                                                <span class="cart-item__price">Price:
                                                    <span class="fw-500 text-heading">$85.00</span></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="date" id="checkin">17/02/2024</span>
                                    </td>
                                    <td>
                                        <span class="date" id="checkout">17/02/2024</span>
                                    </td>
                                    <td>
                                        <span class="status" id="checkout">Pending</span>
                                    </td>
                                    <td>
                                        <button type="button"
                                            class="rounded-btn delete-btn text-danger bg-danger bg-opacity-10 flex-shrink-0">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
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
@endsection
