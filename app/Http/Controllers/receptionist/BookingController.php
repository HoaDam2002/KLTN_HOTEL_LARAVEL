<?php

namespace App\Http\Controllers\receptionist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Booking_realtime;
use App\Models\Roomdetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showNewBooking()
    {
        $currentDate = Carbon::now()->toDateString();
        // $data_new_booking = \DB::table('booking')->join('rooms', 'booking.id_room', '=', 'rooms.id')
        //     ->select('booking.*', 'rooms.*')->where('booking.status', 'pending')->where('booking.created_at', '>' , $currentDate)->get()->toArray();
        $data_new_booking = Booking::with('room')->where('status', 'pending')->where('created_at', '>=', $currentDate)->get()->toArray();

        return view('pages.receptionist.request_booking', compact('data_new_booking'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function showInfoNewBooking(string $id)
    {
        $booking = Booking::with('room', 'user')->findOrFail($id)->toArray();

        $checkin = $booking['check_in'];
        $checkout = $booking['check_out'];

        $id_room = $booking['id_room'];

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

        return view('pages.receptionist.info_booking', compact('booking', 'list_empty_room_booking'));
    }

    public function confirmBooking(Request $request)
    {
        $data = $request->all();

        try {
            $allSuccess = true;
            foreach ($data['values'] as $value) {
                $booking = new Booking_realtime();
                $booking->id_booking = $data['id_booking'];
                $booking->id_room = $data['id_room'];
                $booking->id_roomDetail = $value; // Lưu giá trị cụ thể
                $booking->check_in = $data['check_in'];
                $booking->check_out = $data['check_out'];
                $booking->price = $data['price'];
                $booking->status = $data['status'];
                $booking->id_user = $data['id_user'];
                $booking->id_tour = $data['id_tour'];
                $booking->payment = 'in';
                $booking->payment_total = 'wait';

                $result = $booking->save();

                if (!$result) {
                    $allSuccess = false;
                    break;
                }
            }

            if ($allSuccess) {
                Booking::where('id', $data['id_booking'])->update(['status' => 'confirm']);
                return response()->json(['message' => 'All data inserted successfully']);
            } else {
                return response()->json(['message' => 'Some data failed to be inserted'], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }

    public function cancelBooking(Request $request)
    {
        $data = $request->all();

        if (!empty($data['id_booking'])) {
            Booking::where('id', $data['id_booking'])->update(['status' => 'cancel']);
            return response()->json(['message' => 'Cancel booking successfully']);
        } else {
            return response()->json(['message' => 'Cancel booking failed'], 500);
        }
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
