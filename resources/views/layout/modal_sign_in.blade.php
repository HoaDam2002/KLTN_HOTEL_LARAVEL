<div class="modal fade" id="modal_signin" tabindex="-1" aria-labelledby="signin" aria-hidden="true" style="z-index: 9999">
    <div class="modal-dialog modal-md">
        <div class="modal-content" style="padding: 0 15px">
            <div class="modal-header">
                <h4 class="loginRegister__title text-poppins">Sign in to CityScape</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#">
                    <div class="row gy-lg-4 gy-3">

                        <div class="col-12">
                            <label for="Email" class="form-label">Email</label>
                            <input type="email" class="common-input" placeholder="Email" id="email-login">
                        </div>
                        <div class="col-12">
                            <label for="your-password" class="form-label">Password</label>
                            <div class="position-relative">
                                <input type="password" class="common-input" placeholder="Password" id="your-password-login">
                                <span class="password-show-hide fas fa-eye toggle-password la-eye-slash"
                                    id="#your-password-login"></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group py-2 flx-between">
                                <div class="common-check mb-0">
                                    <input class="form-check-input" type="checkbox" value="" id="remember">
                                    <label class="form-check-label" for="remember">Remember me </label>
                                </div>
                                <button type="button"
                                    class="link text-main text-decoration-underline font-14 text-poppins"
                                    data-bs-toggle="modal" data-bs-target="#modal_forgotpassword"
                                    data-bs-dismiss="modal" aria-label="Close">Forgot
                                    Password? </button>
                            </div>
                        </div>
                        <div class="error_wrapper container col-12">
                            <ul class="list_error_signin" style="list-style: outside; background-color: rgb(227,93,106); color: #fff; padding: 10px 50px; margin: 16px 0 0;">
                                
                            </ul>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-main w-100" id="btn_login">Login <span
                                    class="icon-right"> <i class="far fa-paper-plane"></i>
                                </span> </button>
                        </div>
                        <div class="col-sm-12 mb-0">
                            <div class="have-account text-center">
                                <p class="text">Don't Have An Account? <button type="button"
                                        class="link text-main text-decoration-underline font-14 text-poppins"
                                        data-bs-toggle="modal" data-bs-target="#modal_signup" data-bs-dismiss="modal"
                                        aria-label="Close">Sign up</button>
                                </p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            {{-- <div class="modal-footer" style="text-align: center">
                <div class="text-center" style="display: flex; flex-direction: column; margin: auto">

                    <a href="https://cribmed.com/facebook/login"><img class="mb-2 entered loaded" width="280"
                            data-src="https://cribmed.com/images/fb-login.png" data-ll-status="loaded"
                            src="https://cribmed.com/images/fb-login.png"></a>

                    <a href="https://cribmed.com/login/google"><img class="entered loaded" width="280"
                            data-src="https://cribmed.com/images/gl-login.png" data-ll-status="loaded"
                            src="https://cribmed.com/images/gl-login.png"></a>
                </div>
            </div> --}}
        </div>
    </div>
</div>

@section('js')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#btn_login').click(function(e) {
                e.preventDefault();
                var email = $('#email-login').val();
                var password = $('#your-password-login').val();
                console.log(email, password);

                var err = [];
                var count_err = 0;
                var html_error_login = '';

                if (email == '') {
                    err.push('Email cannot be empty.');
                    count_err = 1;
                }

                if (password == '') {
                    err.push('Password cannot be empty.');
                    count_err = 1;
                } else if (password.length < 8) {
                    err.push('Password must be longer than 8 characters.');
                    count_err = 1;
                }

                if (count_err != 0) {
                    err.forEach(element => {
                        html_error_login += `<li>${element}</li>`
                    });

                    $('.list_error_sigin').html(html_error_login);
                }else {
                    $.ajax({
                        type: "POST",
                        url: "/signin",
                        data: {
                            'email': email,
                            'password': password
                        },
                        success: function(data) {
                            $('.list_error_sigin').html(data);
                        }
                    })
                }
            })
        })
    </script>
@endsection
@include('layout.modal_forgot_password')
