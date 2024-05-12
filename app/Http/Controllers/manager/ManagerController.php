<?php

namespace App\Http\Controllers\manager;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home_manager()
    {
        if (Auth::check()) {
            $id_account = Auth::id();
            $id_user = Customer::where("id_account", $id_account)->value('id_user');
            $name_user = User::where('id', $id_user)->value('name');
            return view('pages.manager.manager_home', compact('name_user'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function statistical()
    {
        return view('pages.manager.manager_statistical');
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
