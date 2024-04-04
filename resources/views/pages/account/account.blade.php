@extends('layout.app')

<!-- ========================== Account Page Start ==================== -->
@section('content')
    <section class="account padding-y-60">
        <div class="container container-two">
            <div class="row gy-4">
                {{-- start menu account customer --}}
                <div class="col-xl-3 col-lg-4">
                    <div class="account-sidebar search-sidebar">
                        <div class="nav side-tab flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                            <a href="/customer/account"
                                class="nav-link {{ Route::currentRouteName() == 'account_customer' ? 'active' : '' }}"
                                id="home_account" onclick="menu_account_customer(this.id)">
                                <span class="icon"><i class="fas fa-home"></i></span>Home
                            </a>
                            <a href="/customer/profile"
                                class="nav-link {{ Route::currentRouteName() == 'profile_customer' ? 'active' : '' }}"
                                id="profile_account" onclick="menu_account_customer(this.id)">
                                <span class="icon"> <i class="fas fa-user"></i></span>
                                Profile
                            </a>
                            <a href="/customer/my-bookings"
                                class="nav-link {{ Route::currentRouteName() == 'my_booking_customer' ? 'active' : '' }}"
                                id="my_bookings" onclick="menu_account_customer(this.id)">
                                <span class="icon"> <i class="fas fa-list"></i></span>
                                {{ __('My Bookings') }}
                            </a>
                            <a href="/customer/payment"
                                class="nav-link {{ Route::currentRouteName() == 'payment_customer' ? 'active' : '' }}"
                                id="acc_payment" onclick="menu_account_customer(this.id)">
                                <span class="icon">
                                    <i class="fas fa-money-check"></i></span>
                                Payments
                            </a>
                            <a href="/customer/change-pass"
                                class="nav-link {{ Route::currentRouteName() == 'change_pass_customer' ? 'active' : '' }}"
                                id="change_pass" onclick="menu_account_customer(this.id)">
                                <span class="icon"> <i class="fas fa-lock"></i></span>
                                Change Password
                            </a>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="nav-link" id=""
                                    onclick="menu_account_customer(this.id)"><span class="icon">
                                        <i class="fas fa-sign-out-alt"></i></span>
                                    Logout</a></button>
                            </form>

                        </div>
                    </div>
                </div>
                {{-- end menu accout customer --}}

                {{-- start menu account receptionist --}}
                @yield('content_account')

            </div>
        </div>
    </section>
@endsection

@section('js')
    <script></script>
@endsection
