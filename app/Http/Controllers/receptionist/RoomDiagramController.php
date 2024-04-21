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
    public function index()
    {
        $time = Carbon::now();

        $time_checkin = Carbon::parse($time)->setTime(14, 0, 0)->toDateTimeString();
        $time_checkout = Carbon::parse($time)->setTime(12, 0, 0)->toDateTimeString();

        $roomDetails = Roomdetail::with(['typeRoom','Booking_realtime.user' ,'Booking_realtime' => function ($query) use ($time_checkin, $time_checkout) {
            $query->where('check_out', '>=', $time_checkout)
                ->where('check_in', '<=', $time_checkin);
        }])->get()->toArray();

        return view('pages.receptionist.room_diagram', compact('roomDetails'));
    }

    /**
     * Show the form for creating a new resource.
     */
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
