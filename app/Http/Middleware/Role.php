<?php

namespace App\Http\Middleware;

use App\Models\Account;
use App\Models\Customer;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
            $id_account = Auth::id();
            $customer = Customer::where('id', $id_account)->first();
    
            $id_user = $customer->id_user;
    
            $user = User::where('id', $id_user)->first();
    
            $role = $user->role;
    
            if ($role == 'customer') {
                return $next($request);
            } else {
                Auth::logout();
                return redirect('/login');
            }
        }else{
            return redirect('/login');
        }
    }
}
