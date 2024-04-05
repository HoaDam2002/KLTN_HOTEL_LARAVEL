<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>DANA HOTEL</title>
    <!-- Favicon -->
    <link rel="shortcut icon"
        href="{{ asset('assets/customer/images/logo/z5175648554199_ccc2baf0a7ac356050aa28149405a89d.jpg') }}">

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

        #nationality {
            --tw-border-opacity: 1;
            border-color: rgb(209 213 219 / var(--tw-border-opacity));
            border-radius: .375rem;
        }
    </style>
</head>

<body>
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
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />

            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            {{-- phone --}}
            <div class="mt-4">
                <x-input-label for="phone" :value="__('Phone')" />
                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            {{-- birthday --}}
            <div class="mt-4">
                <x-input-label for="birth_date" :value="__('Birthday')" />
                <x-text-input id="birth_date" class="block mt-1 w-full" type="text" name="birth_date"
                    :value="old('birth_date')" />
                <x-input-error :messages="$errors->get('birth_date')" class="mt-2" />
            </div>

            {{-- address --}}
            <div class="mt-4">
                <x-input-label for="address" :value="__('Address')" />
                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address"
                    :value="old('address')" />
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

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" />

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
</body>

</html>

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

        $('input').keydown(function() {
            $(this).closest('div').find('.err').remove();
        });

        $('select').change(function() {
            $(this).closest('div').find('.err').remove();
        });
    
</script>