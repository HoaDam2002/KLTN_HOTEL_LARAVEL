@extends('pages.account.account')

@section('content_account')
    {{-- start home account --}}
    <div class="col-xl-9 col-lg-8">
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"
                tabindex="0">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <p class="account-alert">
                        Hello
                        <strong class="text-heading fw-500 text-poppins">{{ $name_user }}</strong>
                        (not
                        <strong class="text-heading fw-500 text-poppins">{{ $name_user }}</strong>? <button type="submit" style="color: blue">Log out</button> )
                    </p>
                </form>
                <p class="account-alert">
                    From your account dashboard you can view your recent orders,
                    manage your shipping and billing addresses, and edit your
                    password and account details.
                </p>
            </div>
        </div>
    </div>
    {{-- end home account --}}
@endsection
