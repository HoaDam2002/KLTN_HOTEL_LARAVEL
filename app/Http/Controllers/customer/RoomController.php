<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\RoomModel;
use App\Models\TypeRoomModel;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Mockery\Undefined;
use \DateTime;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = RoomModel::all();

        return view('pages.list_room.list_room_customer', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function roomDetail(string $id, Request $time)
    {
        $room = RoomModel::where('id', $id)->get()->toArray();

        $imageString = $room[0]['images'];

        $imageArray = explode(', ', $imageString);

        $room[0]['images'] = $imageArray;

        $timeData = explode(" ", $time->data);

        $checkin = $timeData[0];
        $checkout = $timeData[1];

        $diffInDays = null;

        if ($checkin != 'null' && $checkout != 'null') {
            $startDate = new DateTime($checkin);
            $endDate = new DateTime($checkout);
            $interval = $startDate->diff($endDate);

            $diffInDays = $interval->days;
        }

        if (isset($timeData[2])) {
            $count_available = $timeData[2];
        } else {
            $count_available = 10;
        }

        $comment = Comment::with('user.customer')->where('id_room',$id)->where('status', 'show')->get()->toArray();


        return view('pages.room_detail.room_detail', compact('room', 'checkin', 'checkout', 'count_available', 'diffInDays','comment'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function search(Request $request)
    {
        $data = $request->all();

        $type = $data['type'];
        $name = $data['name'];
        $price = $data['price'];
        $bed = $data['bed'];

        $item = RoomModel::query();

        if (isset($type)) {
            $item->where('room_type_id', $type);
        }

        if (isset($name)) {
            $item->where('name', 'like', '%' . $name . '%');
        }

        if (isset($price)) {
            $item->whereBetween('price', [$price - 10, $price + 10]);
        }

        if (isset($bed)) {
            $item->where('beds', $bed);
        }

        $arrItem = $item->with('typeRoom')->get();

        return response()->json(['item' => $arrItem]);
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
