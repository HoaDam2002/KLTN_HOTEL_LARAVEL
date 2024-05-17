<?php

namespace App\Http\Controllers\manager;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Booking_realtime;
use App\Models\BookingRealtiemNoAcc;
use App\Models\InvoiceFoodDetail;
use App\Models\InvoiceServiceDetail;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $date;

    public function __construct()
    {
        $this->date = Carbon::now()->format('Y/m/d');
    }

    public function index()
    {
        $currentDate = Carbon::now()->format('Y/m/d');
        $statisticalData = $this->getAllStatistical($currentDate, $currentDate);

        return view('pages.manager.manager_statistical', compact('statisticalData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function getAllStatistical($start_day = null, $end_day = null)
    {
        $start_day = $start_day ?? $this->date;
        $end_day = $end_day ?? $this->date;

        $quantity_food = 0;
        $total_price_food = 0;

        $quantity_service = 0;
        $total_price_service = 0;

        $quantity_bookings_onl = 0;
        $quantity_bookings_in_place = 0;

        $total_bookings = 0;
        $total_deposit_bookings_onl = 0;
        $total_price_bookings_checkout = 0;
        $total_deposit_customer = 0;

        $total_users_booking = 0;
        $revenue = 0;

        // quantity food and total price food
        $list_food = InvoiceFoodDetail::with('food')
            ->where('created_at', '>=', $start_day . ' 00:00:00')
            ->where('created_at', '<=', $end_day . ' 23:59:59')
            ->get();

        if ($list_food) {
            foreach ($list_food as $food) {
                $quantity_food += $food->quantity;
                if (!empty($food->food)) {
                    $total_price_food += $food->food->price * $food->quantity;
                }
            }
        }

        // quantity service and total price service
        $list_service = InvoiceServiceDetail::with('service')
            ->where('created_at', '>=', $start_day . ' 00:00:00')
            ->where('created_at', '<=', $end_day . ' 23:59:59')
            ->get();

        if ($list_service) {
            $quantity_service = count($list_service);
            foreach ($list_service as $service) {
                if (!empty($service->service)) {
                    $total_price_service += $service->service->price;
                }
            }
        }

        // quantity booking onl and total deposit booking onl
        $list_bookings_onl = Booking::whereIn('status', ['pending', 'confirm'])
            ->where('created_at', '>=', $start_day . ' 00:00:00')
            ->where('created_at', '<=', $end_day . ' 23:59:59')
            ->get();

        if ($list_bookings_onl) {
            foreach ($list_bookings_onl as $booking) {
                $quantity_bookings_onl += $booking->quantity;
                $total_deposit_bookings_onl += $booking->deposits;
            }
        }

        // quantity booking in place
        $list_bookings_in_place = Booking_realtime::with('deposit_customer')
            ->where('id_booking', 0)
            ->where('created_at', '>=', $start_day . ' 00:00:00')
            ->where('created_at', '<=', $end_day . ' 23:59:59')
            ->get();

        if ($list_bookings_in_place) {
            foreach ($list_bookings_in_place as $booking) {
                $quantity_bookings_in_place += 1;
                if (!empty($booking->deposit_customer)) {
                    $total_deposit_customer += $booking->deposit_customer->deposit;
                }
            }
        }

        // total price booking in booking_realtime with status checkout and checkout_soon
        $list_booking_checkout = Booking_realtime::with(['deposit_customer', 'booking'])->whereIn('status', ['checkout_soon', 'checkout'])
            ->where('check_out', '>=', $start_day . ' 00:00:00')
            ->where('check_out', '<=', $end_day . ' 23:59:59')
            ->whereRaw('DATE(check_out) != DATE(created_at)')
            ->get();
        if ($list_booking_checkout) {
            foreach ($list_booking_checkout as $booking) {
                $checkIn = new DateTime($booking->check_in);
                $checkOut = new DateTime($booking->check_out);
                $interval = $checkIn->diff($checkOut);
                $diffInDays = $interval->days + 1;
                if ($booking->id_booking == 0) {
                    if ($booking->payment == 'in') {
                        $total_price_bookings_checkout += $booking->price * $diffInDays;
                    } else {
                        if (!empty($booking->deposit_customer)) {
                            $total_price_bookings_checkout += ($booking->price * $diffInDays) - $booking->deposit_customer->deposit;
                        }
                    }
                } else {
                    if (!empty($booking->booking)) {
                        $total_price_bookings_checkout += ($booking->price * $diffInDays) - $booking->booking->deposits;
                    }
                }
            }
        }

        $list_users_booking_onl = Booking::whereIn('status', ['pending', 'confirm'])
            ->where('created_at', '>=', $start_day . ' 00:00:00')
            ->where('created_at', '<=', $end_day . ' 23:59:59')
            ->groupBy('id_user')
            ->get(['id_user', DB::raw('COUNT(*) as user_count')]);

        $list_users_booking_in_place = Booking_realtime::with('deposit_customer')
            ->where('id_booking', 0)
            ->where('created_at', '>=', $start_day . ' 00:00:00')
            ->where('created_at', '<=', $end_day . ' 23:59:59')
            ->groupBy('id_user')
            ->get(['id_user', DB::raw('COUNT(*) as user_count')]);

        $total_users_booking = count($list_users_booking_onl) + count($list_users_booking_in_place);
        $total_bookings = $quantity_bookings_onl + $quantity_bookings_in_place;
        $revenue = $total_price_bookings_checkout + $total_deposit_customer + $total_deposit_bookings_onl + $total_price_food + $total_price_service;

        return [
            'total_bookings' => $total_bookings,
            'revenue' => $revenue,
            'quantity_service' => $quantity_service,
            'quantity_food' => $quantity_food,
            'quantity_user' => $total_users_booking
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function searchStatistical(Request $request)
    {
        $searchDate = $request->search_date;
        $searchDate = explode('-', $searchDate);

        $start_date = trim($searchDate[0]);
        $end_date = trim($searchDate[1]);

        $start_date_formatted = Carbon::createFromFormat('d/m/Y', $start_date)->format('Y/m/d');
        $end_date_formatted = Carbon::createFromFormat('d/m/Y', $end_date)->format('Y/m/d');

        $statisticalData = $this->getAllStatistical($start_date_formatted, $end_date_formatted);

        return view('pages.manager.manager_statistical', compact('statisticalData', 'start_date', 'end_date'));
    }

    /**
     * Display the specified resource.
     */
    public function reportService(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $start_date_format = Carbon::createFromFormat('d/m/Y', $request->start_date)->format('Y/m/d');
        $end_date_format = Carbon::createFromFormat('d/m/Y', $request->end_date)->format('Y/m/d');

        $list_service = InvoiceServiceDetail::with('service')
            ->where('created_at', '>=', $start_date_format . ' 00:00:00')
            ->where('created_at', '<=', $end_date_format . ' 23:59:59')
            ->get();


        return view('pages.manager.report_service', compact('list_service', 'start_date', 'end_date'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function reportFood(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $start_date_format = Carbon::createFromFormat('d/m/Y', $request->start_date)->format('Y/m/d');
        $end_date_format = Carbon::createFromFormat('d/m/Y', $request->end_date)->format('Y/m/d');

        $list_food = InvoiceFoodDetail::with('food')
            ->where('created_at', '>=', $start_date_format . ' 00:00:00')
            ->where('created_at', '<=', $end_date_format . ' 23:59:59')
            ->get();

        return view('pages.manager.report_food', compact('list_food', 'start_date', 'end_date'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function reportUserBooking(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $start_date_format = Carbon::createFromFormat('d/m/Y', $request->start_date)->format('Y/m/d');
        $end_date_format = Carbon::createFromFormat('d/m/Y', $request->end_date)->format('Y/m/d');

        $list_users_booking_onl = Booking::with('user', 'room')->whereIn('status', ['pending', 'confirm'])
            ->where('created_at', '>=', $start_date_format . ' 00:00:00')
            ->where('created_at', '<=', $end_date_format . ' 23:59:59')
            ->get();

        $list_users_booking_in_place = Booking_realtime::with('user', 'room')
            ->where('id_booking', 0)
            ->where('created_at', '>=', $start_date_format . ' 00:00:00')
            ->where('created_at', '<=', $end_date_format . ' 23:59:59')
            ->get();

        $list_users_booking_onl_grouped = $list_users_booking_onl->groupBy('id_user');
        $list_users_booking_in_place_grouped = $list_users_booking_in_place->groupBy('id_user');

        $merged_grouped_users_booking = $list_users_booking_onl_grouped->mergeRecursive($list_users_booking_in_place_grouped);


        return view('pages.manager.report_user', compact('merged_grouped_users_booking', 'start_date', 'end_date'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function reporBooking(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $start_date_format = Carbon::createFromFormat('d/m/Y', $request->start_date)->format('Y/m/d');
        $end_date_format = Carbon::createFromFormat('d/m/Y', $request->end_date)->format('Y/m/d');


        $list_bookings_onl = Booking::with('user', 'room')->whereIn('status', ['pending', 'confirm'])
            ->where('created_at', '>=', $start_date_format . ' 00:00:00')
            ->where('created_at', '<=', $end_date_format . ' 23:59:59')
            ->get();

        $list_bookings_in_place = Booking_realtime::with('deposit_customer', 'user', 'room')
            ->where('id_booking', 0)
            ->where('created_at', '>=', $start_date_format . ' 00:00:00')
            ->where('created_at', '<=', $end_date_format . ' 23:59:59')
            ->get();

        $merged_list_booking = $list_bookings_onl->mergeRecursive($list_bookings_in_place);

        return view('pages.manager.report_booking', compact('merged_list_booking', 'start_date', 'end_date'));
    }
}
