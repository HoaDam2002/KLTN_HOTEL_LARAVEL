<div class="modal fade" id="modal_forgotpassword" tabindex="-1" aria-labelledby="forgotpassword" aria-hidden="true"
    style="z-index: 9999">
    <div class="modal-dialog modal-md">
        <div class="modal-content" style="padding: 0 15px">
            <div class="modal-header">
                <h4 class="loginRegister__title text-poppins">{{__('Forgot Password')}}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" class="send_verification">
                    <div class="row gy-lg-4 gy-3">

                        <div class="col-12">
                            <label for="Email" class="form-label">Email</label>
                            <input type="email" class="common-input" placeholder="Email" id="Email">
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-main w-100">{{__('Send Verification Code')}} <span
                                    class="icon-right"> <i class="far fa-paper-plane"></i>
                                </span> </button>
                        </div>
                        <div class="col-sm-12 mb-0">
                            <div class="have-account text-center">
                                <p class="text">{{__("Don't Have An Account?")}} <button type="button"
                                        class="link text-main text-decoration-underline font-14 text-poppins"
                                        data-bs-toggle="modal" data-bs-target="#modal_signup" data-bs-dismiss="modal"
                                        aria-label="Close">{{__('Sign up')}}</button>
                                </p>
                            </div>
                        </div>
                    </div>
                </form>

                <form action="#" class="change_password">
                    <div class="row gy-lg-4 gy-3">

                        <div class="col-12">
                            <label for="verification_code" class="form-label">{{__('Enter Verification Code')}}</label>
                            <input type="text" class="common-input" placeholder="Verification Code" id="verification_code">
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-main w-100">{{__('Send')}} <span
                                    class="icon-right"> <i class="far fa-paper-plane"></i>
                                </span> </button>
                        </div>
                        <div class="col-sm-12 mb-0">
                            <div class="have-account text-center">
                                <p class="text">{{__("Don't Have An Account?")}} <button type="button"
                                        class="link text-main text-decoration-underline font-14 text-poppins"
                                        data-bs-toggle="modal" data-bs-target="#modal_signup" data-bs-dismiss="modal"
                                        aria-label="Close">{{__('Sign up')}}</button>
                                </p>
                            </div>
                        </div>
                    </div>
                </form>

                <form action="#" class="change_password">
                    <div class="row gy-lg-4 gy-3">

                        <div class="col-12">
                            <label for="new_password" class="form-label">{{__('New Password')}}</label>
                            <input type="password" class="common-input" placeholder="New Password" id="new_password">
                        </div>

                        <div class="col-12">
                            <label for="password_confirm" class="form-label">{{__('Password Confirm')}}</label>
                            <input type="password" class="common-input" placeholder="Password Confirm" id="password_confirm">
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-main w-100">{{__('Change Password')}} <span
                                    class="icon-right"> <i class="far fa-paper-plane"></i>
                                </span> </button>
                        </div>
                        <div class="col-sm-12 mb-0">
                            <div class="have-account text-center">
                                <p class="text">{{__("Don't Have An Account?")}} <button type="button"
                                        class="link text-main text-decoration-underline font-14 text-poppins"
                                        data-bs-toggle="modal" data-bs-target="#modal_signup" data-bs-dismiss="modal"
                                        aria-label="Close">{{__('Sign up')}}</button>
                                </p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
