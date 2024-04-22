<?php

namespace App\Http\Controllers\receptionist;

use App\Http\Controllers\Controller;
use App\Models\Roomdetail;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
                ->where('check_in', '<=', $time_checkin);
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

    public function search_date(Request $request){
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


        $arr = [];

        if ($status == 'Null') {
            foreach ($roomDetails as $item) {
                if (empty($item['booking_realtime'])) {
                    $arr[] = $item;
                }
            }
        } else if ($status == "Occupied") {
            foreach ($roomDetails as $item) {
                if (!empty($item['booking_realtime'])) {
                    if ($item['booking_realtime'][0]['status'] == 'pending') {
                        $arr[] = $item;
                    }
                }
            }
        } else if ($status == "Check in") {
            foreach ($roomDetails as $item) {
                if (!empty($item['booking_realtime'])) {
                    if ($item['booking_realtime'][0]['status'] == 'checkin') {
                        $arr[] = $item;
                    }
                }
            }
        } else {
            return response()->json(['item' => $roomDetails, 'status' => $status]);
        }

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
            if (!empty($value['booking_realtime'][0]['user'])) {
                $arr[] = $value;
            }
        }

        return response()->json(['item' => $arr]);
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
