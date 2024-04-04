<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">
<style>
    #logo_hotel {
        width: 70%;
        margin: auto;
    }

    .wrapper_remember {
        display: flex !important;
        justify-content: space-between;
    }

    .wrapper_remember a {
        color: blue;
    }

    .err {
        --tw-text-opacity: 1;
        font-size: 14px;
        color: rgb(220 38 38 / var(--tw-text-opacity));
    }

    #nationality {
        --tw-border-opacity: 1;
        border-color: rgb(209 213 219 / var(--tw-border-opacity));
        border-radius: .375rem;
    }
</style>
<x-guest-layout>
    <div class="mb-4">
        <a href="/">
            <img src="{{ asset('assets/customer/images/logo/logohotel.jpg') }}" alt="Your Logo" id="logo_hotel">
        </a>
    </div>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />

        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        {{-- phone --}}
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')"
                required />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        {{-- birthday --}}
        <div class="mt-4">
            <x-input-label for="birth_date" :value="__('Birthday')" />
            <x-text-input id="birth_date" class="block mt-1 w-full" type="text" name="birth_date" :value="old('birth_date')"
                required />
            <x-input-error :messages="$errors->get('birth_date')" class="mt-2" />
        </div>

        {{-- address --}}
        <div class="mt-4">
            <x-input-label for="address" :value="__('Address')" />
            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')"
                required />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        {{-- Nationality --}}
        <div class="mt-4">
            <x-input-label for="nationality" :value="__('Nationality')" />
            <select name="nationality" id="nationality" class="block mt-1 w-full" :value="old('nationality')">
                <option value="">Please choose nationlity</option>
            </select>
            <x-input-error :messages="$errors->get('nationality')" class="mt-2" />
        </div>
        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4 btn_signup">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
<script src="{{ asset('assets/customer/js/jquery-3.7.1.min.js') }}"></script>

<script>
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
    $(document).ready(function() {
        $('#birth_date').on('keyup', function() {
            var val = this.value.replace(/\D/g, '');
            var newval = '';
            if (val.length > 2) {
                newval += val.substr(0, 2) + '/';
                if (val.length > 4) {
                    newval += val.substr(2, 2) + '/';
                    newval += val.substr(4, 4);
                } else {
                    newval += val.substr(2);
                }
            } else {
                newval = val;
            }
            $(this).val(newval);
        })
        $('.btn_signup').click(function(e) {
            $('.err').remove();
            var name = $('#name').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var birth_date = $('#birth_date').val();
            var address = $('#address').val();
            var nationality = $('#nationality').val();
            var password = $('#password').val();
            var password_confirmation = $('#password_confirmation').val();

            var count_err = 0;

            if (name == '') {
                $('#name').closest('div').append(
                    '<span class="err">Name cannot be empty <i class="fa-solid fa-circle-exclamation"></i></span>'
                );
                count_err = 1;

            }

            if (email == '') {
                $('#email').closest('div').append(
                    '<span class="err">Email cannot be empty <i class="fa-solid fa-circle-exclamation"></i></span>'
                );
                count_err = 1;

            }

            if (phone == '') {
                $('#phone').closest('div').append(
                    '<span class="err">Phone cannot be empty <i class="fa-solid fa-circle-exclamation"></i></span>'
                );
                count_err = 1;

            }

            if (birth_date == '') {
                $('#birth_date').closest('div').append(
                    '<span class="err">Birthdate cannot be empty <i class="fa-solid fa-circle-exclamation"></i></span>'
                );
                count_err = 1;

            } else {
                var regex = /^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/(19|20)\d{2}$/;
                if (!regex.test(birth_date)) {
                    $('#birth_date').closest('div').append(
                        '<span class="err">Birthdate is in the wrong format <i class="fa-solid fa-circle-exclamation"></i></span>'
                    );
                    count_err = 1;
                }
            }

            if (address == '') {
                $('#address').closest('div').append(
                    '<span class="err">Address cannot be empty <i class="fa-solid fa-circle-exclamation"></i></span>'
                );
                count_err = 1;

            }

            if (nationality == '') {
                $('#nationality').closest('div').append(
                    '<span class="err">Nationality cannot be empty <i class="fa-solid fa-circle-exclamation"></i></span>'
                );
                count_err = 1;
            }

            if (password == '') {
                $('#password').closest('div').append(
                    '<span class="err">Password cannot be empty <i class="fa-solid fa-circle-exclamation"></i></span>'
                );
                count_err = 1;
            } else if (password.length < 8) {
                $('#password').closest('div').append(
                    '<span class="err">Password must be longer than 8 characters <i class="fa-solid fa-circle-exclamation"></i></span>'
                );
                count_err = 1;
            }

            if (password_confirmation == '') {
                $('#password_confirmation').closest('div').append(
                    '<span class="err">Password confirmation cannot be empty <i class="fa-solid fa-circle-exclamation"></i></span>'
                );
                count_err = 1;
            } else if (password_confirmation !== password) {
                $('#password_confirmation').closest('div').append(
                    '<span class="err">Password confirmation must be a valid password <i class="fa-solid fa-circle-exclamation"></i></span>'
                );
                count_err = 1;
            }

            if (count_err !== 0) {
                e.preventDefault();
            }
        })

        $('input').keydown(function() {
            $(this).closest('div').find('.err').remove();
        });

        $('select').change(function() {
            $(this).closest('div').find('.err').remove();
        });
    })
</script>
