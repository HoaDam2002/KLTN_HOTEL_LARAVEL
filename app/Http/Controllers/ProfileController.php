<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Booking;
use App\Models\Customer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use \Intervention\Image\Facades\Image;
use App\Models\User;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request)
    {
        $data = Customer::with('user','account')->get()->toArray();

        $data = $data[0];
    
        return view('pages.account.account_profile',compact('data'));
    }

    /**
     * Update the user's profile information.
     */

    public function update(ProfileRequest $request)
    {
    
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = strtotime(date('Y-m-d H:i:s'));

        $data = $request->all();

        $id = Auth::id();

        $user = User::findOrFail($id);

        $customer = Customer::where('id_user',$id);

        $a = $customer->get('avatar')->toArray();

        $imageOld = $a[0]['avatar'];

        $file = $request->avatar;

        if(empty($data['birth_date'])){
            $data['birth_date'] = $user->birth_date;
            // dd($user->birth_date);
        }

        if(!empty($file)){
            $image = $file->getClientOriginalName();
        }else{
            $image = $imageOld;
        }

        if(!is_dir('customer/avatar/')){
            mkdir('customer/avatar/');
        }

        if($user->update($data) && $customer->update(['avatar' => $date.'_'.$image])) {
            if(!empty($file)) {
                if($imageOld) {
                    unlink('customer/avatar/'.$imageOld);
                }
                $file->move('customer/avatar/', $date.'_'.$file->getClientOriginalName());
            }
            return redirect()->back()->with('success',__('Update Profile User Success'));
        }else {
            return redirect()->back()->withErrors('Update Profile User Fail');
        }
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function list_booking(){
        $data = Booking::with('room')->get()->toArray();

        return view('pages.account.my_booking',compact('data'));
    }
}