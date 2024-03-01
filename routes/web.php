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
//Router muilti_language
Route::get('setLocale/{locale}', function ($locale) {
    if (in_array($locale, Config::get('app.locales'))) {
      Session::put('locale', $locale);
    }
    return redirect()->back();
})->name('app.setLocale');

//Router customer
Route::get('/', function () {
    return view('customer.pages.home.home_customer');
})->name('home_customer');

Route::get('/pay', function () {
    return view('customer.pages.checkout.checkout');
})->name('checkout_customer');




























// Router customer