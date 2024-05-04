<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\RoomModel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = RoomModel::all();

        if (Auth::check()) {
            $id_account = Auth::id();
            $customer = Customer::where('id', $id_account)->first();

            $id_user = $customer->id_user;

            $user = User::where('id', $id_user)->first();

            $role = $user->role;

            if ($role == 'customer') {
                return view('pages.home.home_customer', compact('data'));
            } else {
                Auth::logout();
                return redirect('/');
            }
        }

        return view('pages.home.home_customer', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function show_TypeRoom()
    {
        $data = RoomModel::all();

        return view('pages.home.home_customer', compact('data'));
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
