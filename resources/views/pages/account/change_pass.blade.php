@extends('pages.account.account')

@section('content_account')
    <div class="col-xl-9 col-lg-8">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="tab-content" id="v-pills-tabContent">
            <form action="/customer/change-pass" method="POST">
                @csrf

                <div class="card common-card">
                    <div class="card-body">
                        <h6 class="loginRegister__title text-poppins">
                            {{__("Password Change")}}
                        </h6>

                        <div class="row gy-lg-4 gy-3">
                            <div class="col-12">
                                <label for="current_password" class="form-label">{{__("Current Password")}}</label>
                                <div class="position-relative">
                                    <input type="password" class="common-input" placeholder="{{__("Password")}}" id="current_password"
                                        name="current_password" />
                                    <span class="password-show-hide fas fa-eye toggle-password la-eye-slash"
                                        id="#current_password"></span>
                                </div>
                                @error('current_password', 'updatePassword')
                                    <div class="mt-2 text-danger">
                                        <small>{{ $message }}</small><br>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="password" class="form-label">{{__("New Password")}}</label>
                                <div class="position-relative">
                                    <input type="password" class="common-input" placeholder="{{__("New Password")}}" id="password"
                                        name="password" />
                                    <span class="password-show-hide fas fa-eye toggle-password la-eye-slash"
                                        id="#password"></span>
                                </div>
                                @error('password', 'updatePassword')
                                    <div class="mt-2 text-danger">
                                        <small>{{ $message }}</small><br>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="password_confirmation" class="form-label">{{__("Confirm Password")}}</label>
                                <div class="position-relative">
                                    <input type="password" class="common-input" placeholder="{{__("Confirm Password")}}"
                                        id="password_confirmation" name="password_confirmation" />
                                    <span class="password-show-hide fas fa-eye toggle-password la-eye-slash"
                                        id="#password_confirmation"></span>
                                </div>
                                @error('password_confirmation', 'updatePassword')
                                    <div class="mt-2 text-danger">
                                        <small>{{ $message }}</small><br>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-main w-100">
                                    {{__("Save Changes")}}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
