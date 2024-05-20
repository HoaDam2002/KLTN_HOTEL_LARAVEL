<?php

namespace App\Http\Controllers;

use App\Models\Roomdetail;
use Illuminate\Http\Request;

class RoomStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Roomdetail::all();
        return view('pages.room_status_management.diagram_room_status', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function update_status(Request $request)
    {
        $data = $request->all();

        $room = Roomdetail::where('id', $data['id_room'])->first();

        if ($room) {
            $room->status = $data['status_change'];
            $room->save(); 

            return response()->json(['room' => $room]);
        }
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
