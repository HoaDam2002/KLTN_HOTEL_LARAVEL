<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(Request $request)
    {
        $data = $request->all();
        if(Auth::attempt($data)) {
            return redirect("/");
        }else {
            $err = 'Email or password is incorrect.';
            return $err;
        }
    }

    /**
     * Show the form for creating a new resource.
     */

    public function check_email(Request $request) {
        $email = $request->email;
        $checkEmail = Account::where('email', $email)->get();
        $err = 'Email already exists';

        if($checkEmail) {
            return $err;
        }else {
            return '';
        }

    }


    public function logout() {
        Auth::logout();
        return redirect('/');
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
