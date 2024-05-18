@extends('pages.food_service.food_service')

@section('content')
    <div class="col-xl-9 col-lg-8">
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"
                tabindex="0">
                <p class="account-alert">
                    {{__("Hello")}}
                    <strong class="text-heading fw-500 text-poppins">{{ isset($name_user) ? $name_user : "UserName" }}</strong>
                    (
                    <strong class="text-heading fw-500 text-poppins">{{ isset($name_user) ? $name_user : "UserName" }}</strong>{{__("Log out")}} )
                </p>
                <p class="account-alert">
                    {{__("From your account dashboard you can view your recent orders, manage your shipping and billing addresses, and edit your password and account details.")}}
                </p>
            </div>
        </div>
    </div>
@endsection
