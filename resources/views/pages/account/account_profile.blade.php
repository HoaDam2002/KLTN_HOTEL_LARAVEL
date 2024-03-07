@extends('pages.account.account')
@section('content_account')
    <div class="col-xl-9 col-lg-8">
        <div class="tab-content" id="v-pills-tabContent">
            <div class="card common-card mb-4">
                <div class="card-body">
                    <div class="profile-info d-flex gap-4 align-items-center">
                        <div class="profile-info__thumb">
                            <img src="{{ asset('assets/customer/images/thumbs/team1.png') }}" alt="" />
                        </div>
                        <div class="profile-info__content">
                            {{-- <span
                                class="mb-1 fw-semibold text-main text-poppins font-13">{{ _('Agent of Property') }}</span> --}}
                            <h4 class="profile-info__title text-poppins mb-4">
                                Rosalina D. William
                            </h4>
                            <div class="contact-info d-flex gap-3 align-items-center mb-2">
                                <span class="contact-info__icon text-gradient"><i class="fas fa-map-marker-alt"></i></span>
                                <div class="contact-info__content">
                                    <span class="contact-info__address">66 Broklyant, New York India</span>
                                </div>
                            </div>
                            <div class="contact-info d-flex gap-3 align-items-center mb-2">
                                <span class="contact-info__icon text-gradient"><i class="fas fa-phone"></i></span>
                                <div class="contact-info__content">
                                    <span class="contact-info__address">012 345 678 9101</span>
                                </div>
                            </div>
                            <div class="contact-info d-flex gap-3 align-items-center">
                                <span class="contact-info__icon text-gradient"><i class="fas fa-envelope"></i></span>
                                <div class="contact-info__content">
                                    <span class="contact-info__address">example@gmail.com</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card common-card">
                <div class="card-body">
                    <form action="#">
                        <h6 class="loginRegister__title text-poppins">
                            {{ __('Get A Quote') }}
                        </h6>

                        <div class="row gy-lg-4 gy-3">
                            <div class="col-sm-6 col-xs-6">
                                <label for="name" class="form-label">{{ __('Name') }}</label>
                                <input type="text" class="common-input" placeholder="Enter Your Name" id="name" />
                            </div>
                            <div class="col-sm-6 col-xs-6">
                                <label for="email" class="form-label">{{ __('Email') }}</label>
                                <input type="email" class="common-input" placeholder="Enter Your Email" id="email" />
                            </div>
                            <div class="col-sm-6 col-xs-6">
                                <label for="phone" class="form-label">{{ __('Phone') }}</label>
                                <input type="tel" class="common-input" placeholder="Enter Your Phone" id="phone" />
                            </div>
                            <div class="col-sm-6 col-xs-6">
                                <label for="gender" class="form-label">{{ __('Gender') }}</label>
                                <div class="select-has-icon">
                                    <select class="form-select common-input text-gray-800">
                                        <option value="Type" disabled="">
                                            {{ __('Select Your Gender') }}
                                        </option>
                                        <option value="male">
                                            Male
                                        </option>
                                        <option value="female">
                                            Female
                                        </option>
                                        <option value="other">
                                            Other
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label for="address" class="form-label">{{ __('Address') }}</label>
                                <textarea class="common-input" placeholder="Your Address" id="address"></textarea>
                            </div>
                            <div class="col-12">
                                <div class="common-check mb-0">
                                    <input class="form-check-input" type="checkbox" value="" id="remember" />
                                    <label class="form-check-label" for="remember">
                                        {{ __('Save my name, email, and website in
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        this browser for the next time I
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        comment.') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-main w-100">
                                    {{ __('Get a free service') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- end home account --}}
@endsection
