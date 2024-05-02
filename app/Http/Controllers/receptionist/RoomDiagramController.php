<?php

namespace App\Http\Controllers\receptionist;

use App\Http\Controllers\Controller;
use App\Models\Booking_realtime;
use App\Models\BookingRealtiemNoAcc;
use App\Models\CustommerNoAccModel;
use App\Models\Roomdetail;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\booking_rep;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\RoomModel;

use function Laravel\Prompts\search;

class RoomDiagramController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function search($time)
    {
        $time_checkin = Carbon::parse($time)->setTime(14, 0, 0)->toDateTimeString();
        $time_checkout = Carbon::parse($time)->setTime(12, 0, 0)->toDateTimeString();

        $roomDetails = Roomdetail::with(['typeRoom', 'Booking_realtime.user', 'Booking_realtime' => function ($query) use ($time_checkin, $time_checkout) {
            $query->where('check_out', '>=', $time_checkout)
                ->where('check_in', '<=', $time_checkin)->where('status', '!=', 'checkout')->where('status', '!=', 'checkout_soon')->where('status', '!=', 'cancel');
        }]);

        return $roomDetails;
    }

    public function index()
    {
        $time = Carbon::now();

        $roomDetails = $this->search($time)->get()->toArray();

        $a = $time->toDateString();

        return view('pages.receptionist.room_diagram', compact('roomDetails', 'a'));
    }

    public function search_date(Request $request)
    {
        $data = $request->all();

        $time = $data['birthday'];

        $roomDetails = $this->search($time)->get()->toArray();

        $a = Carbon::parse($time)->format('Y-m-d');

        return view('pages.receptionist.room_diagram', compact('roomDetails', 'a'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function filter(Request $request)
    {
        $data = $request->all();
        $time = $data['time'];
        $status = $data['status'];

        $roomDetails = $this->search($time)->get()->toArray();

        // dd($roomDetails);

        $arr = [];

        if ($status == 'Null') {
            foreach ($roomDetails as $item) {
                if (empty($item['booking_realtime'])) {
                    $arr[] = $item;
                } else {
                    if (count($item['booking_realtime']) == 1) {
                        if ($item['booking_realtime'][0]['check_out'] == $time . " 12:00:00") {
                            $arr[] = $item;
                        } else if ($item['booking_realtime'][0]['status'] == "checkout" || $item['booking_realtime'][0]['status'] == "checkout_soon" || $item['booking_realtime'][0]['status'] == "cancel") {
                            $arr[] = $item;
                        }
                    } else {
                        foreach ($item['booking_realtime'] as $value) {
                            if ($value['status'] == "checkout" || $value['status'] == "checkout_soon" || $value['status'] == "cancel") {
                                $arr[] = $item;
                                break;
                            }
                        }
                    }
                }
            }
        } else if ($status == "Occupied") {
            foreach ($roomDetails as $item) {
                if (!empty($item['booking_realtime'])) {
                    foreach ($item['booking_realtime'] as $value) {
                        if ($value['status'] == 'pending') {
                            $arr[] = $item;
                            break;
                        }
                    }
                }
            }
        } else if ($status == "Check in") {
            foreach ($roomDetails as $item) {
                if (!empty($item['booking_realtime'])) {
                    foreach ($item['booking_realtime'] as $value) {
                        if ($value['status'] == 'checkin') {
                            $arr[] = $item;
                            break;
                        }
                    }
                }
            }
        } else if ($status == "Check out") {
            foreach ($roomDetails as $item) {
                if (!empty($item['booking_realtime'])) {
                    foreach ($item['booking_realtime'] as $value) {
                        if ($value['status'] == 'checkin' && $value['check_out'] == $time . " 12:00:00") {
                            $arr[] = $item;
                            break;
                        }
                    }
                }
            }
        } else {
            return response()->json(['item' => $roomDetails, 'status' => $status]);
        }

        // dd($roomDetails);

        return response()->json(['item' => $arr, 'status' => $status]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function search_infor(Request $request)
    {
        $data = $request->all();

        $time = $data['time'];
        $infor = $data['infor'];

        if (empty($infor)) {
            $roomDetails = $this->search($time)->get()->toArray();
            return response()->json(['item' => $roomDetails, 'check' => 'true']);
        }

        $time_checkin = Carbon::parse($time)->setTime(14, 0, 0)->toDateTimeString();
        $time_checkout = Carbon::parse($time)->setTime(12, 0, 0)->toDateTimeString();

        $roomDetails = Roomdetail::with(['typeRoom', 'Booking_realtime.user' => function ($query) use ($infor) {
            $query->where('name', 'like', '%' . $infor . '%')->orWhere('phone', 'like', '%' . $infor . '%');
        }, 'Booking_realtime' => function ($query) use ($time_checkin, $time_checkout) {
            $query->where('check_out', '>=', $time_checkout)
                ->where('check_in', '<=', $time_checkin);
        }])->get()->toArray();

        $arr = [];

        foreach ($roomDetails as $value) {
            foreach ($value['booking_realtime'] as $item) {
                if (!empty($item['user'])) {
                    $arr[] = $value;
                }
            }
        }

        return response()->json(['item' => $arr, 'check' => 'false']);
    }

    /**
     * Display the specified resource.
     */
    public function fill_modal(Request $request)
    {
        $id_roomDetail = $request->all()['id_room'];

        $room_detail = Roomdetail::with('typeRoom', 'Booking_realtime.user', 'Booking_realtime.booking.booking_realtime.room_detail')->where('id', $id_roomDetail)->get()->toArray();

        if (!empty($room_detail[0]['booking_realtime'])) {
            $checkin = $room_detail[0]['booking_realtime']['0']['check_in'];
            $checkout = $room_detail[0]['booking_realtime']['0']['check_out'];

            $id_room = Roomdetail::where('id', $room_detail)->first()->toArray()['id_room'];

            $list_empty_room_booking = DB::table('room_detail')
                ->whereNotExists(function ($query) use ($checkin, $checkout) {
                    $query->select(DB::raw(1))
                        ->from('booking_realtime')
                        ->whereRaw('room_detail.id = booking_realtime.id_roomDetail')
                        ->where(function ($query) use ($checkin, $checkout) {
                            $query->where('check_in', '<', $checkout)
                                ->where('check_out', '>', $checkin);
                        });
                })
                ->where('room_detail.id_room', '=', $id_room)
                ->select('room_detail.*')
                ->get()->toArray();

            return response()->json(['item' => $room_detail, 'list_room' => $list_empty_room_booking]);
        }else{
            return response()->json(['item' => $room_detail]);
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function booking_cus_no_acc(booking_rep $request)
    {
        $data = $request->all();

        $checkin = Carbon::parse($data['check_in'])->setTime(14, 0, 0)->toDateTimeString();
        $checkout = Carbon::parse($data['check_out'])->setTime(12, 0, 0)->toDateTimeString();

        $check_available_room = search_available_room($checkin, $checkout);

        $id_roomDetail = $data['id_roomDetail'];

        $check_available = false;

        foreach ($check_available_room as $value) {
            if ($value->id == $id_roomDetail) {
                $check_available = true;
            }
        }

        if ($check_available) {
            ///create user no acc
            $data['birth_date'] = '2024/01/01';
            $data['address'] = 'null';
            $data['nationality'] = 'null';
            $data['role'] = 'null';
            $data['gender'] = 'null';

            if ($user = User::create($data)) {

                $id_user = $user->id;

                $customer_no_acc = CustommerNoAccModel::create(['count_booking' => 1, 'id_user' => $id_user]);

                //book
                $time = Carbon::now()->toDateString();
                $time_fill = $data['time'];

                if ($time == $data['check_in']) {
                    $data['status'] = 'checkin';
                } else {
                    $data['status'] = 'pending';
                }

                $data['check_in'] = $checkin;
                $data['check_out'] = $checkout;
                $data['id_user'] = $id_user;
                $data['id_tour'] = $data['phone'];
                $data['id_booking'] = '0';
                $data['payment_total'] = 'wait';



                if ($ss = Booking_realtime::create($data)) {

                    if ($data['deposit'] != '0') {
                        $data['id_booking_realtime'] = $ss->id;
                        BookingRealtiemNoAcc::create($data);
                    }

                    $room = $this->search($time_fill)->get()->toArray();
                    return response()->json(['room' => $room]);
                }
            }
        } else {
            return response()->json(['mess' => 'Room not available on this time !!!']);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function search_customer(Request $request)
    {
        $data = $request->all()['information'];

        $customer = User::with('customer', 'customer_no_acc')->where('name', 'like', '%' . $data . '%')->orwhere('phone', 'like', '%' . $data . '%')->get()->toArray();

        return response()->json(['customer' => $customer]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function booking_available_cus(Request $request)
    {
        $data = $request->all();

        $checkin = Carbon::parse($data['check_in'])->setTime(14, 0, 0)->toDateTimeString();
        $checkout = Carbon::parse($data['check_out'])->setTime(12, 0, 0)->toDateTimeString();

        //book
        $check_available_room = search_available_room($checkin, $checkout);

        $id_roomDetail = $data['id_roomDetail'];

        $check_available = false;


        foreach ($check_available_room as $value) {
            if ($value->id == $id_roomDetail) {
                $check_available = true;
            }
        }


        if ($check_available) {
            $time_reload = $data['time'];

            $time = Carbon::now()->toDateString();

            if ($time == $data['check_in']) {
                $data['status'] = 'checkin';
            } else {
                $data['status'] = 'pending';
            }

            $data['check_in'] = $checkin;
            $data['check_out'] = $checkout;
            $data['id_tour'] = $data['phone'];
            $data['payment_total'] = 'wait';

            $id_user = $data['id_user'];

            // dd($data);

            if ($ss = Booking_realtime::create($data)) {
                $user = User::with('customer', 'customer_no_acc')->where('id', $id_user)->first();

                if ($user) {
                    if ($user->customer_no_acc) {
                        $update_countbooking = CustommerNoAccModel::where('id_user', $id_user)->first();
                        if ($update_countbooking) {
                            $update_countbooking->count_booking += 1;
                            $update_countbooking->save();
                        }
                    } else {
                        $update_countbooking = Customer::where('id_user', $id_user)->first();
                        if ($update_countbooking) {
                            $update_countbooking->count_booking += 1;
                            $update_countbooking->save();
                        }
                    }
                }

                if ($data['deposit'] != '0') {
                    $data['id_booking_realtime'] = $ss->id;
                    BookingRealtiemNoAcc::create($data);
                }
                $room = $this->search($time_reload)->get()->toArray();
                return response()->json(['room' => $room]);
            }
        } else {
            return response()->json(['mess' => 'Room not available on this time !!!']);
        }
    }

    public function change_status_booking_realtime(Request $request)
    {
        $data = $request->all()['id_booking_realtime'];

        $update = Booking_realtime::where('id', $data)->first();

        $update->status = 'checkin';

        $update->save();

        if ($update) {
            $time = $request->all()['time'];

            $room = $this->search($time)->get()->toArray();
            return response()->json(['room' => $room]);
        }
    }

    public function checkout(Request $request)
    {
        $data = $request->all();

        // dd($data);
        $id_booking_realtime = $data['id_booking_realtime'];

        if (!empty($data['id_booking'])) {
            $id_booking = $data['id_booking'];

            $booking_realtime = Booking_realtime::where('id_booking', $id_booking)->update(['status' => 'checkout', 'payment_total' => $data['payment']]);

            $booking = Booking::where('id', $id_booking)->update(['status' => 'checkout']);
        } else {
            $booking_realtime = Booking_realtime::where('id', $id_booking_realtime)->first();

            $booking_realtime->status = 'checkout';
            $booking_realtime->payment_total = $data['payment'];


            $booking_realtime->save();
        }
        if ($booking_realtime) {
            $time = $data['time'];

            $room = $this->search($time)->get()->toArray();
            return response()->json(['room' => $room]);
        }
    }

    public function checkout_soon(Request $request)
    {
        $data = $request->all();

        $id_booking_realtime = $data['id_booking_realtime'];

        $booking_realtime = Booking_realtime::where('id', $id_booking_realtime)->first();

        $booking_realtime->status = 'checkout_soon';
        $booking_realtime->payment_total = $data['payment'];
        $booking_realtime->check_out = $data['checkout'] . " 12:00:00";

        $booking_realtime->save();

        if ($booking_realtime) {
            $time = $data['time'];

            $room = $this->search($time)->get()->toArray();
            return response()->json(['room' => $room]);
        }
    }

    public function cancel(Request $request)
    {
        $data = $request->all();

        $id_booking_realtime = $data['id_booking_realtime'];

        $booking_realtime = Booking_realtime::where('id', $id_booking_realtime)->first();

        $booking_realtime->status = 'cancel';

        $booking_realtime->save();

        if ($booking_realtime) {
            $time = $data['time'];

            $room = $this->search($time)->get()->toArray();
            return response()->json(['room' => $room]);
        }
    }

    public function change_room(Request $request)
    {
        $data = $request->all();

        $booking_realtime = Booking_realtime::where('id', $data['id_booking_realtime'])->first();

        $booking_realtime->id_roomDetail = $data['id_room_change'];

        $booking_realtime->save();

        if ($booking_realtime) {
            $time = $data['time'];

            $room = $this->search($time)->get()->toArray();
            return response()->json(['room' => $room]);
        }
    }
}
