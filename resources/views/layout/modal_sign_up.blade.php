<div class="modal fade" id="modal_signup" tabindex="-1" aria-labelledby="signup" aria-hidden="true" style="z-index: 9999">
    <div class="modal-dialog modal-md">
        <div class="modal-content" style="padding: 0 15px">
            <div class="modal-header">

                <h4 class="loginRegister__title text-poppins">Sign up to CityScape</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row gy-lg-4 gy-3">
                    <div class="col-sm-12 col-xs-12">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="common-input" placeholder="Name" id="name">
                    </div>
                    <div class="col-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="common-input" placeholder="Email" id="email">
                    </div>
                    @include('layout.validation_form')
                    <div class="col-12">
                        <button class="btn btn-main w-100" id="next_signup">Sign
                            Up <span class="icon-right"> <i class="far fa-paper-plane"></i> </span> </button>
                    </div>
                    <div class="col-sm-12 mb-0">
                        <div class="have-account text-center">
                            <p class="text">Don't Have An Account? <button type="button"
                                    class="link text-main text-decoration-underline font-14 text-poppins"
                                    data-bs-toggle="modal" data-bs-target="#modal_signin" data-bs-dismiss="modal"
                                    aria-label="Close">Sign in</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="text-align: center">
                <div class="text-center" style="display: flex; flex-direction: column; margin: auto">

                    <a href="https://cribmed.com/facebook/login"><img class="mb-2 entered loaded" width="280"
                            data-src="https://cribmed.com/images/fb-login.png" data-ll-status="loaded"
                            src="https://cribmed.com/images/fb-login.png"></a>

                    <a href="https://cribmed.com/login/google"><img class="entered loaded" width="280"
                            data-src="https://cribmed.com/images/gl-login.png" data-ll-status="loaded"
                            src="https://cribmed.com/images/gl-login.png"></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_signup_addinfo" tabindex="-1" aria-labelledby="signup" aria-hidden="true"
    style="z-index: 9999">
    <div class="modal-dialog modal-md">
        <div class="modal-content" style="padding: 0 15px">
            <div class="modal-header">

                <h4 class="loginRegister__title text-poppins">Sign up to CityScape</h4>
                <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#modal_signup"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row gy-lg-4 gy-3">
                    <div class="col-sm-12 col-xs-12">
                        <label for="name" class="form-label">Nationality</label>
                        <select class="common-input" id="nationality" aria-label="Default select example">
                            <option selected value="0">Select nationlity</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="common-input " id="phone" placeholder="Phone number">
                    </div>
                    <div class="col-12">
                        <label for="birthday" class="form-label">Birthday</label>
                        <input type="text" class="common-input" id="birthday" placeholder="12/12/2000">
                    </div>
                    <div class="col-12">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="common-input" id="address" placeholder="Address">
                    </div>
                    <div class="col-12">
                        <label for="your-password" class="form-label">Password</label>
                        <div class="position-relative">
                            <input type="password" class="common-input" placeholder="Password" id="password">
                            <span class="password-show-hide fas fa-eye toggle-password la-eye-slash"
                                id="#password"></span>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="r-password" class="form-label">Re-Password</label>
                        <div class="position-relative">
                            <input type="password" class="common-input" placeholder="Re-Password" id="re-password">
                            <span class="password-show-hide fas fa-eye toggle-password la-eye-slash"
                                id="#re-password"></span>
                        </div>
                    </div>
                    @include('layout.validation_form')
                    <div class="col-12">
                        <button id="submit_form_signup" class="btn btn-main w-100">Sign Up<span class="icon-right">
                                <i class="far fa-paper-plane"></i> </span> </button>
                    </div>
                    <div class="col-sm-12 mb-0">
                        <div class="have-account text-center">
                            <p class="text">Don't Have An Account? <button type="button"
                                    class="link text-main text-decoration-underline font-14 text-poppins"
                                    data-bs-toggle="modal" data-bs-target="#modal_signin" data-bs-dismiss="modal"
                                    aria-label="Close">Sign Up</button>
                        </div>
                    </div>
                </div>
            </div>
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

            fetch('https://restcountries.com/v3.1/all')
                .then(response => response.json())
                .then(data => {
                    const select = document.getElementById("nationality");
                    data.forEach(country => {
                        const option = document.createElement("option");
                        option.value = country.name.common;
                        option.text = country.name.common;
                        select.appendChild(option);
                    });
                })
                .catch(error => console.error('Error fetching countries:', error));

            $('form#start_signup').submit(function(e) {
                e.preventDefault();
            })


            $('#next_signup').click(function() {
                var name = $('#name').val();
                var email = $('#email').val();
                var err = [];
                var count_err = 0;
                var html_error = '';

                if (name == '') {
                    err.push('Name cannot be empty.');
                    count_err = 1;
                }
                var regex = /^[\w\.-]+@[a-zA-Z\d\.-]+\.[a-zA-Z]{2,}$/;
                if (email == '') {
                    err.push('Email cannot be empty.');
                    count_err = 1;
                } else if (!regex.test(email)) {
                    err.push('Email is in the wrong format.');
                    count_err = 1;
                } else {
                    $.ajax({
                        type: "POST",
                        url: "/check-email",
                        data: {
                            'email': email
                        },
                        success: function(data) {
                            if (data != '') {
                                err.push(data);
                            }
                        }
                    })
                }

                if (count_err != 0) {
                    err.forEach(element => {
                        html_error += `<li>${element}</li>`
                    });

                    $('.list_error').html(html_error);
                } else {
                    $('#modal_signup').modal('hide');
                    $('#modal_signup_addinfo').modal('show');
                }


            })

            $('#submit_form_signup').click(function(e) {
                e.preventDefault();

                var nationality = $('#nationality').val();
                var phone = $('#phone').val();
                var birthday = $('#birthday').val();
                var address = $('#address').val();
                var password = $('#password').val();
                var re_password = $('#re-password').val();
                var err = [];
                var count_err = 0;
                var html_error = '';

                if (nationality == 0) {
                    err.push('Nationality cannot be empty.');
                    count_err = 1;
                }

                if (phone == '') {
                    err.push('Phone cannot be empty.');
                    count_err = 1;
                }

                if (birthday == '') {
                    err.push('Birthday cannot be empty.');
                    count_err = 1;
                } else {
                    var regex = /^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/(19|20)\d{2}$/;
                    if (!regex.test(birthday)) {
                        err.push('Date of birth is in the wrong format.');
                        count_err = 1;
                    }
                }

                if (address == '') {
                    err.push('Address cannot be empty.');
                    count_err = 1;
                }

                if(password == '') {
                    err.push('Password cannot be empty.');
                    count_err = 1;
                }else if(password.length < 8) {
                    err.push('Password must be longer than 8 characters.');
                    count_err = 1;
                }

                if (re_password == '') {
                    err.push('Re-password cannot be empty.');
                    count_err = 1;
                } else if (re_password !== password) {
                    err.push('Re-password must be a valid password.');
                    count_err = 1;
                }

                if (count_err != 0) {
                    err.forEach(element => {
                        html_error += `<li>${element}</li>`
                    });

                    $('.list_error').html(html_error);
                } else if (count_err == 0) {
                    var name = $('#name').val();
                    var email = $('#email').val();
                    var nationality = $('#nationality').val();
                    var phone = $('#phone').val();
                    var birthday = $('#birthday').val();
                    var address = $('#address').val();
                    var password = $('#password').val();
                    var re_password = $('#re-password').val();
                    var formData = new FormData();
                    formData.append('name', name);
                    formData.append('email', email);
                    formData.append('phone', phone);
                    formData.append('identity_card', '12121212121212121');
                    formData.append('birth_date', birthday);
                    formData.append('address', address);
                    formData.append('nationality', nationality);
                    formData.append('password', password);
                    formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
                    $.ajax({
                        type: "POST",
                        url: "/signup",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(data) {
                            window.location.href = "/";
                        },
                        error: function(error) {
                            console.log(error);
                        }

                    })
                }

            })

            function checkEmail() {

            }
        })
    </script>
@endsection

@include('layout.modal_sign_in')

@include('layout.modal_forgot_password')
