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
    </style>
</head>

<body>
    <x-guest-layout>
        <div class="mb-4">
            <a href="/">
                <img src="{{ asset('assets/customer/images/logo/logohotel.jpg') }}" alt="Your Logo" id="logo_hotel">
            </a>
        </div>
        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a
            password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    {{ __('Email Password Reset Link') }}
                </x-primary-button>
            </div>
        </form>
    </x-guest-layout>
</body>

</html>