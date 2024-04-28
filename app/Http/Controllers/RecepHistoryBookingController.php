<?php

namespace App\Http\Controllers;

use App\Models\Booking_realtime;
use App\Models\User;
use GuzzleHttp\Psr7\Query;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecepHistoryBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $item = Booking_realtime::with('user.customer', 'user.customer_no_acc', 'room_detail.typeRoom')->where('status', 'checkout')->orwhere('status', 'checkout_soon')->orwhere('status', 'cancel')->orderBy('check_out','desc')
        ->get()->toArray();

        return view('pages.receptionist.historybooking', compact('item'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function search(Request $request)
    {
        $infor = $request->all()['infor'];

        $item = User::with(['customer','customer_no_acc','booking_realtime.room_detail.typeRoom','booking_realtime' => function ($query) use ($infor) {
            $query->where('status', 'checkout')->orwhere('status', 'checkout_soon')->orwhere('status', 'cancel')->orderBy('check_out','desc');
        }])->where('name','like','%' . $infor . '%')->orwhere('phone','like','%' . $infor . '%')->get()->toArray();

        return response()->json(['item' => $item]);
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
