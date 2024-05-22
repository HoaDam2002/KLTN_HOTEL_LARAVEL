<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Customer;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RoleStatusManager
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
            $staff = Staff::where('id_account', $id_account)->first();

            $id_user = $staff->id_user;

            $user = User::where('id', $id_user)->first();

            $role = $user->role;

            if ($role == 'status_manager') {
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
