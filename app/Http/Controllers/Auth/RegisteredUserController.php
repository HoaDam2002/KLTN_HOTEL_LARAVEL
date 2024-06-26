<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Account;
use App\Models\Customer;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\sàáạãảăắằẳẵặâấầẩẫậèéẹẽẻêềếểễệìíịĩỉòóọõỏôốồổỗộơớờởỡợùúụũủưứừửữựỳýỵỹỷđĐ]+$/'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . Account::class],
            'password' => ['required', Rules\Password::defaults()],
            'phone' => ['required', 'numeric'],
            'birth_date' => ['required', 'date_format:d/m/Y', 'before:today'],
            'address' => ['required', 'string'],
            'nationality' => ['required'],
            'password_confirmation' => ['required', 'same:password']
        ]);
        DB::beginTransaction();

        try {

            $birth_day = \Carbon\Carbon::createFromFormat('d/m/Y', $request->birth_date)->format('Y-m-d');

            $user = User::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'birth_date' => $birth_day,
                'address' => $request->address,
                'nationality' => $request->nationality,
                'role' => 'customer',
            ]);

            $account = Account::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $user_id = $user->id;
            $account_id = $account->id;
            $avatar = '';
            $count_booking = 0;

            $customer = Customer::create([
                'avatar' => $avatar,
                'count_booking' => $count_booking,
                'id_user' => $user_id,
                'id_account' => $account_id,
            ]);

            event(new Registered($account));

            Auth::login($account);
            DB::commit();

            return redirect(RouteServiceProvider::HOME);
        } catch (\Throwable $th) {
            DB::rollback();
            return back()->withInput()->withErrors(['error' => $th->getMessage()]);
        }
    }
}
