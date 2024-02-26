<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('customer.pages.home.home_customer');
})->name('home_customer');

Route::get('/pay', function () {
    return view('customer.pages.checkout.checkout');
})->name('checkout_customer');

// Router admin




























// Router customer
