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

    public function showHomeAccountView() {
        $id_account = Auth::id();
        $id_user = Customer::where('id_account', $id_account)->value('id_user');
        $name_user = User::where('id',$id_user) -> value('name');
        return view('pages.account.account_home', compact('name_user'));
    }
    
    public function edit(Request $request)
    {

        $id_user = Auth::id();

        $data = Customer::with('user','account')->where('id_user',$id_user)->get()->toArray();

        $data = $data[0];

        // dd($data);
    
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
            $image = $date.'_'.$file->getClientOriginalName();
        }else{
            $image = $imageOld;
        }

        if(!is_dir('customer/avatar/')){
            mkdir('customer/avatar/');
        }

        if($user->update($data) && $customer->update(['avatar' => $image])) {
            if(!empty($file)) {
                if(!empty($imageOld)) {
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

        $id_user = Auth::id();

        $data = Booking::with('room')->where('id_user',$id_user)->get()->toArray();

        return view('pages.account.my_booking',compact('data'));
    }
}
