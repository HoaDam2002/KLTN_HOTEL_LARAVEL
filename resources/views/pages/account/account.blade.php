@extends('layout.app')

<!-- ========================== Account Page Start ==================== -->
@section('content')
    <section class="account padding-y-60">
        <div class="container container-two">
            <div class="row gy-4">
                {{-- start menu account --}}
                <div class="col-xl-3 col-lg-4">
                    <div class="account-sidebar search-sidebar">
                        <div class="nav side-tab flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                            <a href="/customer/account" class="nav-link active" id="home_account"
                                onclick="menu_account_customer(this.id)">
                                <span class="icon"><i class="fas fa-home"></i></span>Home
                            </a>
                            <a href="/customer/profile" class="nav-link" id="profile_account"
                                onclick="menu_account_customer(this.id)">
                                <span class="icon"> <i class="fas fa-user"></i></span>
                                Profile
                            </a>
                            <a href="/customer/my-bookings" class="nav-link" id="my_bookings"
                                onclick="menu_account_customer(this.id)">
                                <span class="icon"> <i class="fas fa-list"></i></span>
                                {{ __('My Bookings') }}
                            </a>
                            <a href="/customer/payment" class="nav-link" id="acc_payment"
                                onclick="menu_account_customer(this.id)">
                                <span class="icon">
                                    <i class="fas fa-money-check"></i></span>
                                Payments
                            </a>
                            <a href="/customer/change-pass" class="nav-link" id="change_pass"
                                onclick="menu_account_customer(this.id)">
                                <span class="icon"> <i class="fas fa-lock"></i></span>
                                Change Password
                            </a>
                            <a href="/customer/logout" class="nav-link" id=""
                                onclick="menu_account_customer(this.id)">
                                <span class="icon">
                                    <i class="fas fa-sign-out-alt"></i></span>
                                Logout</a>
                        </div>
                    </div>
                </div>
                {{-- end menu accout --}}

                @yield('content_account')

            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let current_url = window.location.href;
            let parts_url = current_url.split('/');
            let last_parts = parts_url[parts_url.length - 1];
            let list_menu = document.querySelectorAll('.nav-link');
            list_menu.forEach(function(item) {
                item.classList.remove('active');
                let href_element = item.getAttribute('href');
                if (href_element.includes(last_parts)) {
                    item.classList.add('active');
                }
            });

        })
    </script>
@endsection
