<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Customer;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        if (Auth::check()) {
            $id_account = Auth::id();
            $customer = Customer::where('id_account', $id_account)->first();

            $id_user = $customer->id_user;

            $user = User::where('id', $id_user)->first();

            $role = $user->role;
            if ($role == 'customer') {
                return redirect()->intended(RouteServiceProvider::HOME);
            } else if ($role == 'receptionist') {
                return redirect()->intended(RouteServiceProvider::HOME_RECEPTIONIST);
            } else if ($role == 'restaurant') {
                return redirect()->intended(RouteServiceProvider::HOME_RESTAURANT);
            } else if ($role == 'service') {
                return redirect()->intended(RouteServiceProvider::HOME_SERVICE);
            } else if ($role == 'status_manager') {
                return redirect()->intended(RouteServiceProvider::HOME_STATUS_MANAGER);
            } else if ($role == 'admin') {
                return redirect()->intended(RouteServiceProvider::HOME_ADMIN);
            } else if ($role == 'manager') {
                return redirect()->intended(RouteServiceProvider::HOME_MANAGER);
            }
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
