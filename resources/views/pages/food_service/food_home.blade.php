@extends('layout.app')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-9 m-auto">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                    aria-labelledby="v-pills-home-tab" tabindex="0">
                    <p class="account-alert">
                        Hello
                        <strong class="text-heading fw-500 text-poppins">UserName</strong>
                        (not
                        <strong class="text-heading fw-500 text-poppins">UserName</strong>? Log out )
                    </p>
                    <p class="account-alert">
                        From your account dashboard you can view your recent orders,
                        manage your shipping and billing addresses, and edit your
                        password and account details.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection