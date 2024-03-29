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
    return view('pages.home.home_customer');
})->name('home_customer');

Route::get('/pay', function () {
    return view('pages.checkout.checkout');
})->name('checkout_customer');

Route::get('/aboutus', function () {
    return view('pages.about_us.about_us');
})->name('aboutus_customer');

Route::get('/listroom', function () {
    return view('pages.list_room.list_room_customer');
})->name('listroom_customer');

Route::get('/customer/account', function () {
    return view('pages.account.account_home');
})->name('checkout_customer');

Route::get('/customer/profile', function () {
    return view('pages.account.account_profile');
})->name('profile');

Route::get('/customer/my-bookings', function () {
    return view('pages.account.my_booking');
})->name('my_booking');

Route::get('/customer/change-pass', function () {
    return view('pages.account.change_pass');
})->name('change_pass');

Route::get('/room-detail', function () {
    return view('pages.room_detail.room_detail');
})->name('rooom_detail');

//lễ tân
Route::get('/recep/room-diagram', function () {
    return view('pages.receptionist.room_diagram');
})->name('rooom_detail');

Route::get('/recep/history-booking', function () {
    return view('pages.receptionist.historybooking');
})->name('history-booking-recep');

Route::get('/recep/request-booking', function () {
    return view('pages.receptionist.request_booking');
})->name('request-booking-recep');

//nhà hàng
Route::get('/food_service/manation', function () {
    return view('pages.food_service.food_manation');
})->name('food_service');

Route::get('/food_service/order', function () {
    return view('pages.food_service.food_order');
})->name('food_service');

Route::get('/food_service/order/detail', function () {
    return view('pages.food_service.food_detail_order');
})->name('food_service');

//dịch vụ
Route::get('/outside_service/manation', function () {
    return view('pages.service_outside.outside_service_manation');
})->name('outside_service');

Route::get('/outside_service/order', function () {
    return view('pages.service_outside.outside_service_order');
})->name('outside_service');

Route::get('/outside_service/order/detail', function () {
    return view('pages.service_outside.outside_service_detail_order');
})->name('outside_service');
























// Router customer