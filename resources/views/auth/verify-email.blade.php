<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>DANA HOTEL</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/customer/images/logo/logohotel.jpg') }}">

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
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-primary-button>
                        {{ __('Resend Verification Email') }}
                    </x-primary-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </x-guest-layout>
</body>
</html>
