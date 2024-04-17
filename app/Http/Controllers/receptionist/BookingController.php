<?php

namespace App\Http\Controllers\receptionist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Booking_realtime;
use Carbon\Carbon;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showNewBooking()
    {
        $currentDate = Carbon::now();
        $data_new_booking = \DB::table('booking')->join('rooms', 'booking.id_room', '=', 'rooms.id')
            ->select('booking.*', 'rooms.*')->where('booking.status', 'pending')->where('booking.created_at', '>', $currentDate)->get()->toArray();
        return view('pages.receptionist.request_booking', compact('data_new_booking'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function showInfoNewBooking($id)
    {
        $booking = Booking::with('room', 'user')->findOrFail($id)->toArray();
        $list_empty_room = search_available_room($booking['check_in'], $booking['check_out'], 'search');
        
        $list_empty_room_booking = [];
        foreach ($list_empty_room as $key => $value) {
            foreach ($value as $id_room_empty) {
                if($id_room_empty->id_room == $booking['id_room']) {
                    $list_empty_room_booking[] = $id_room_empty;
                }
            }
        }
        return view('pages.receptionist.info_booking', compact('booking', 'list_empty_room_booking'));

    }

    public function confirmBooking(Request $request) {
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
                $booking->identity_card = null;

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
