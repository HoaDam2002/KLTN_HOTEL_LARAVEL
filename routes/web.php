<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\EvaluateAdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\receptionist\BookingController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

use App\Http\Controllers\customer\RoomController;
use App\Http\Controllers\StriperController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\manager\ManagerController;
use App\Http\Controllers\RecepHistoryBookingController;
use App\Http\Controllers\receptionist\RoomDiagramController;
use App\Http\Controllers\Restaurant\FoodController;
use App\Http\Controllers\RoomStatusController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ServiceController;
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
Route::get('/invoice', function () {
    return view('pages.invoice.last_invoice');
});


Route::middleware(['auth', 'verified', 'customer'])->group(function () {
    Route::get('/customer/profile', [ProfileController::class, 'edit'])->name('profile_customer');
    Route::post('/profile/edit', [ProfileController::class, 'update'])->name('profile_customer_edit');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/customer/my-bookings', [ProfileController::class, 'list_booking'])->name('my_booking_customer');
    Route::post('/customer/my-bookings/rating', [ProfileController::class, 'rating'])->name('my_booking_customer_rating');
    Route::post('/customer/my-bookings/cancel', [ProfileController::class, 'cancel'])->name('my_booking_customer_cancel');


    Route::get('/customer/change-pass', [PasswordController::class, 'showChangePassView'])->name('change_pass_customer');
    Route::post('/customer/change-pass', [PasswordController::class, 'update'])->name('update_password');
    Route::get('/dashboard', [ProfileController::class, 'showHomeAccountView'])->name('account_home_customer');

    Route::post('pay/session', [StriperController::class, 'checkout'])->name('session');
    Route::get('/success', [StriperController::class, 'success'])->name('success');
    Route::get('/cancel', [StriperController::class, 'cancel'])->name('cancel');
});


//room
Route::get('/listroom', [RoomController::class, 'index'])->name('listroom_customer');
Route::post('/room/search', [RoomController::class, 'search']);

Route::get('/room-detail/{id}/{data}', [RoomController::class, 'roomDetail'])->name('listroom_detail_customer');

Route::post('/customer/find_room', [SearchController::class, 'find_available_room'])->name('find_available_room');
Route::post('/customer/find_room/ajax', [SearchController::class, 'find_available_room_ajax'])->name('find_available_room_ajax');


Route::get('/', [HomeController::class, 'index'])->name('home_customer');

Route::get('/pay', function () {
    return view('pages.invoice.invoice_checkout');
})->name('checkout_customer');

Route::get('/aboutus', function () {
    return view('pages.about_us.about_us');
})->name('aboutus_customer');

Route::middleware(['status_manager'])->group(function () {
    Route::get('/room_status_management', [RoomStatusController::class, 'index'])->name('room_status_management');
    Route::post('/room_status_management', [RoomStatusController::class, 'update_status'])->name('room_status_management_post');
});


Route::post('/logout', [UserController::class, 'logout'])->name('logout');

//lễ tân

Route::middleware(['receptionist'])->group(function () {
    Route::get('/recep/room_diagram', [RoomDiagramController::class, 'index'])->name('room_diagram_recep');
    Route::post('/recep/diagram/filter', [RoomDiagramController::class, 'filter'])->name('filter_room_diagram_recep');
    Route::post('/recep/diagram/search_infor', [RoomDiagramController::class, 'search_infor'])->name('search_infor_diagram_recep');
    Route::post('/recep/diagram/search_date', [RoomDiagramController::class, 'search_date'])->name('room_diagram_recep');
    Route::post('/recep/diagram/fill_modal', [RoomDiagramController::class, 'fill_modal'])->name('fill_modal_diagram_recep');
    Route::post('/recep/diagram/booking_modal/cus_no_acc', [RoomDiagramController::class, 'booking_cus_no_acc'])->name('booking_cus_no_acc_diagram_recep');
    Route::post('/recep/diagram/search_customer', [RoomDiagramController::class, 'search_customer'])->name('search_customer_diagram_recep');
    Route::post('/recep/diagram/booking_available_cus', [RoomDiagramController::class, 'booking_available_cus'])->name('booking_available_cus_diagram_recep');
    Route::post('/recep/diagram/change_status_booking_realtime', [RoomDiagramController::class, 'change_status_booking_realtime'])->name('change_status_booking_realtime_diagram_recep');
    Route::post('/recep/diagram/checkout', [RoomDiagramController::class, 'checkout'])->name('checkout_diagram_recep');
    Route::post('/recep/diagram/checkout_soon', [RoomDiagramController::class, 'checkout_soon'])->name('checkout_soon_diagram_recep');
    Route::post('/recep/diagram/cancel', [RoomDiagramController::class, 'cancel'])->name('cancel_diagram_recep');
    Route::post('/recep/diagram/change_room', [RoomDiagramController::class, 'change_room'])->name('change_room_diagram_recep');
    Route::post('/recep/diagram/fill_checkout', [RoomDiagramController::class, 'fill_checkout'])->name('fill_checkout_diagram_recep');

    Route::get('/recep/request-booking', [BookingController::class, 'showNewBooking'])->name('request-booking-recep');

    Route::get('/recep/info-booking/{id}', [BookingController::class, 'showInfoNewBooking'])->name('request-booking-recep');
    Route::post('/recep/info-booking/{id}', [BookingController::class, 'confirmBooking'])->name('request-booking-recep');
    Route::post('/recep/info-booking/cancel/{id}', [BookingController::class, 'cancelBooking'])->name('request-booking-recep');


    Route::get('/recep/history-booking', [RecepHistoryBookingController::class, 'index'])->name('history-booking_recep');
    Route::post('/recep/history-booking/search', [RecepHistoryBookingController::class, 'search'])->name('search-history-booking_recep');
});


//nhà hàng

Route::middleware(['restaurant'])->group(function () {
    Route::get('/food_service', [FoodController::class, 'index'])->name('home_food_service');

    Route::get('/food/manation', [FoodController::class, 'food_manager'])->name('food_service_manation');
    Route::post('/food/manation/add_food', [FoodController::class, 'add_food'])->name('add_food_food_service');
    Route::post('/food/manation/delete_food', [FoodController::class, 'delete_food'])->name('delete_food_food_service');
    Route::post('/food/manation/fill_modal', [FoodController::class, 'fill_modal'])->name('fill_modal_food_service');
    Route::post('/food/manation/edit_food/{id}', [FoodController::class, 'edit_food'])->name('edit_food_service');
    Route::post('/food/manation/search_food', [FoodController::class, 'search_food'])->name('search_food_service');

    Route::get('/food/ordered_list', [FoodController::class, 'ordered_list'])->name('food_ordered_list');
    Route::post('/food/ordered_list/search', [FoodController::class, 'ordered_list_search'])->name('food_ordered_list');
    Route::post('/food/ordered_list/printpdf', [FoodController::class, 'printpdf'])->name('food_ordered_list');

    Route::post('/food/manation/change_status', [FoodController::class, 'change_status'])->name('change_status_food_service');

    Route::get('/food/order', [FoodController::class, 'food_order'])->name('food_service_order');
    Route::post('/food/order', [FoodController::class, 'food_order_post'])->name('food_service_order');

    Route::post('/food/manation/search_customer', [FoodController::class, 'search_customer'])->name('food_service_order');


    Route::get('/food/order/detail/{id}', [FoodController::class, 'food_detail'])->name('food_service_order');
});


Route::middleware(['service'])->group(function () {
    Route::get('/outside_service', [ServiceController::class, 'index'])->name('home_service');

    Route::get('/outside_service/manation', [ServiceController::class, 'service_manager'])->name('service_manation');
    Route::post('/service/manation/add_service', [ServiceController::class, 'add_service'])->name('add_service');

    Route::post('/service/manation/delete_service', [ServiceController::class, 'delete_service'])->name('delete_service');
    Route::post('/service/manation/fill_modal', [ServiceController::class, 'fill_modal'])->name('fill_modal_service');
    Route::post('/service/manation/edit_service/{id}', [ServiceController::class, 'edit_service'])->name('edit_service');
    Route::post('/service/manation/search_service', [ServiceController::class, 'search_service'])->name('home_service');

    Route::post('/service/manation/change_status', [ServiceController::class, 'change_status'])->name('change_status_service');

    Route::get('/outside_service/order', [ServiceController::class, 'service_order'])->name('service_order');
    Route::post('/outside_service/order', [ServiceController::class, 'service_order_post'])->name('service_order');


    Route::post('/service/manation/search_customer', [ServiceController::class, 'search_customer'])->name('service_order');

    Route::get('/service/order/detail/{id}', [ServiceController::class, 'service_detail'])->name('service_order');

    Route::get('/service/ordered_list', [ServiceController::class, 'ordered_list'])->name('service_ordered_list');
    Route::post('/service/ordered_list/search', [ServiceController::class, 'ordered_list_search'])->name('service_ordered_list');
    Route::post('/service/ordered_list/printpdf', [ServiceController::class, 'printpdf'])->name('service_ordered_list');

});

Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::get('/home', [AdminController::class, 'home_admin'])->name('home_admin');
    Route::get('/list_users', [AdminController::class, 'get_list_users'])->name('users_admin');
    Route::post('/list_users/delete', [AdminController::class, 'delete_user'])->name('delete_users_admin');
    Route::get('/search/user', [AdminController::class, 'search_user'])->name('users_admin');
    Route::post('/set_role_user', [AdminController::class, 'set_role_user'])->name('set_role_users_admin');
    Route::post('/add_staff', [AdminController::class, 'create_account_staff'])->name('create_account_staff');
    Route::post('/info_staff', [AdminController::class, 'get_info_staff'])->name('info_staff_admin');
    Route::post('/edit/info_staff', [AdminController::class, 'edit_info_staff'])->name('edit_info_staff');
    Route::post('/change_pass_staff', [AdminController::class, 'change_pass_staff'])->name('change_pass_staff_admin');
    Route::get('/list_evaluate', [EvaluateAdminController::class, 'index'])->name('list_evaluate_admin');
    Route::post('/update/status_comment', [EvaluateAdminController::class, 'update_status'])->name('update_status_comment_admin');
    Route::post('/delete_comment', [EvaluateAdminController::class, 'delete_comment'])->name('delete_comment_admin');
    Route::get('/search/comment', [EvaluateAdminController::class, 'search_comment'])->name('search_rate_admin');
});


Route::middleware(['manager'])->prefix('manager')->group(function () {
    Route::get('/home', [ManagerController::class, 'home_manager'])->name('home_manager');
    Route::get('/statistical', [ManagerController::class, 'statistical'])->name('statistical_manager');
});


require __DIR__ . '/auth.php';



















// Router customer
