<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\RoomModel;
use App\Models\TypeRoomModel;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = RoomModel::with('typeRoom')->Paginate(12);
        
        $type_room = TypeRoomModel::all();

        return view('pages.list_room.list_room_customer',compact('data','type_room'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function roomDetail(string $id)
    {
        $room = RoomModel::with('typeRoom')->where('id',$id)->get()->toArray();
   
        return view('pages.room_detail.room_detail',compact('room'));
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

        if(isset($type)){
            $item->where('room_type_id',$type);
        }

        if(isset($name)){
            $item->where('name','like','%'. $name .'%');
        }

        if(isset($price)){
            $item->whereBetween('price',[$price - 10, $price + 10]);
        }

        if(isset($bed)){
            $item->where('beds',$bed);
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
