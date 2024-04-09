<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

use App\Http\Controllers\customer\RoomController;
use App\Http\Controllers\StriperController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

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

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

//Router muilti_language
Route::get('setLocale/{locale}', function ($locale) {
    if (in_array($locale, Config::get('app.locales'))) {
        Session::put('locale', $locale);
    }
    return redirect()->back();
})->name('app.setLocale');

//Router customer

//room
Route::get('/listroom', [RoomController::class, 'index'])->name('listroom_customer');
Route::post('/room/search', [RoomController::class, 'search']);

Route::get('/room-detail/{id}', [RoomController::class, 'roomDetail'])->name('listroom_detail_customer');

Route::post('pay/session', [StriperController::class, 'checkout'])->name('session');
Route::get('/success', [StriperController::class, 'success'])->name('success');
Route::get('/cancel', [StriperController::class, 'cancel'])->name('cancel');

Route::post('/customer/find_room', [SearchController::class, 'find_available_room'])->name('find_available_room');



Route::get('/', function () {
    return view('pages.home.home_customer');
})->name('home_customer');

Route::get('/pay', function () {
    return view('pages.checkout.checkout');
})->name('checkout_customer');

Route::get('/aboutus', function () {
    return view('pages.about_us.about_us');
})->name('aboutus_customer');





Route::get('/customer/my-bookings', function () {
    return view('pages.account.my_booking');
})->name('my_booking_customer');




Route::post('/logout', [UserController::class, 'logout'])->name('logout');

//lễ tân
Route::get('/recep/room-diagram', function () {
    return view('pages.receptionist.room_diagram');
})->name('room_diagram_recep');

Route::get('/recep/history-booking', function () {
    return view('pages.receptionist.historybooking');
})->name('history-booking-recep');

Route::get('/recep/request-booking', function () {
    return view('pages.receptionist.request_booking');
})->name('request-booking-recep');

//nhà hàng
Route::get('/food_service', function () {
    return view('pages.food_service.food_home');
})->name('food_service');

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



Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/customer/profile', [ProfileController::class, 'edit'])->name('profile_customer');
    Route::post('/profile/profile/edit', [ProfileController::class, 'update'])->name('profile_customer_edit');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/customer/my-bookings', [ProfileController::class, 'list_booking'])->name('list_booking');

    Route::get('/customer/change-pass', [PasswordController::class, 'showChangePassView'])->name('change_pass_customer');
    Route::post('/customer/change-pass', [PasswordController::class, 'update'])->name('update_password');
    Route::get('/dashboard', [ProfileController::class, 'showHomeAccountView'])->name('account_home_customer');
});

require __DIR__.'/auth.php';



















// Router customer