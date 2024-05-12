@extends('layout.app')
<style>
    .verify_wrapper {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        padding: 50px 0;
    }
    .logo {
        margin: 0 0 20px; 
    }

    .logo img {
        max-width: 250px;
    }

    .content_verify {
        text-align: center;
        margin: 0 0 25px;
    }

    .btn_skip {
        margin: 0 0 25px;
    }

</style>
<div class="container">
    <div class="verify_wrapper">
        <div class="logo">
            <a href="/"><img src="{{ asset('assets/customer/images/logo/logohotel.jpg') }}" alt=""></a>
        </div>
        <h2>Verify Your Email</h2>
        <div class="content_verify">
            <span>We have sent an email to <span class="text-primary">max@keenthemes.com</span></span>
            <p>please follow a link to verify your email.</p>
        </div>
        <button class="btn btn-main btn_skip">Skip for now</button>
        <p>Did’t receive an email? <a href="{{ route('verification.send') }}">Resend</a></p>
    </div>
</div>