<?php

namespace App\Http\Controllers;

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

        search_available_room($checkin, $checkout);
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
