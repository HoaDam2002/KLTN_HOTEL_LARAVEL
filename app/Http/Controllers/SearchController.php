<?php

namespace App\Http\Controllers;

use App\Models\RoomModel;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function find_available_room(Request $request)
    {
        $data_search = $request->all();
        $dateRange = $data_search['daterange'];
        $dateParts = explode(" - ", $dateRange);
        $dateParts = array_map('trim', $dateParts);

        $checkin = Carbon::createFromFormat('d/m/Y', $dateParts[0])->toDateString();
        $checkout = Carbon::createFromFormat('d/m/Y', $dateParts[1])->toDateString();

        $a = search_available_room($checkin, $checkout, 'search');

        $List_room = RoomModel::query();

        $count_quantity = [];

        $data = [];

        // dd($a);

        $arr = [];

        if (isset($data_search['room_type'])) {
            $type = $data_search['room_type'];
         
            foreach ($a as $id_room => $quantity) {
                if ($type == $id_room) {
                    $data = $List_room->where('id', $type)->get();
                    $count_quantity[] = $quantity->quantity;
                }
            }
        } else {
            foreach ($a as $id_room => $quantity) {
                $List_room->orwhere('id', $id_room);
                $count_quantity[] = $quantity->quantity;
            }

            $data = $List_room->get();
        }

        return view('pages.list_room.list_room_customer', compact('data', 'count_quantity'));
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
