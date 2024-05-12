<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use App\Models\Account;
use App\Models\Customer;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home_admin()
    {
        if (Auth::check()) {
            $id_account = Auth::id();
            $id_user = Customer::where("id_account", $id_account)->value('id_user');
            $name_user = User::where('id', $id_user)->value('name');
            return view('pages.admin.admin_home', compact('name_user'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function get_list_users()
    {
        $data_users = User::with(['customer.account', 'staff.account'])->orderBy('created_at', 'desc')->paginate(20);

        return view('pages.admin.accountuser', compact('data_users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function delete_user(Request $request)
    {
        $id_customer = $request->user_id;
        $role = $request->role;
        if (!empty($id_customer)) {
            try {
                DB::beginTransaction();
                if ($role === 'customer') {
                    $id_account = Customer::where('id', $id_customer)->value('id_account');
                    $id_user = Customer::where('id', $id_customer)->value('id_user');
                    if (User::where('id', $id_user)->delete() && Account::where('id', $id_account)->delete() && Customer::where('id', $id_customer)->delete()) {
                        DB::commit();
                        return redirect()->back()->with('success', 'Delete User Success');
                    } else {
                        DB::rollBack();
                        return redirect()->back()->with('error', 'Delete User Fail');
                    }
                } else {
                    $id_account = Staff::where('id', $id_customer)->value('id_account');
                    $id_user = Staff::where('id', $id_customer)->value('id_user');
                    if (User::where('id', $id_user)->delete() && Account::where('id', $id_account)->delete() && Staff::where('id', $id_customer)->delete()) {
                        DB::commit();
                        return redirect()->back()->with('success', 'Delete User Success');
                    } else {
                        DB::rollBack();
                        return redirect()->back()->with('error', 'Delete User Fail');
                    }
                }
            } catch (\Throwable $th) {
                DB::rollBack();
                return redirect()->back()->with('error', 'Delete User Fail');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function search_user(Request $request)
    {
        $value_search = $request->value_search_user;
        $data_users = User::with('customer.account')
            ->where('id', $value_search)
            ->orWhereHas('customer.account', function ($query) use ($value_search) {
                $query->where('email', $value_search);
            })
            ->paginate(20);

        if ($data_users->isEmpty()) {
            return redirect()->back()->with('error', 'No user found');
        }

        return view('pages.admin.accountuser', compact('data_users'));
    }

    public function set_role_user(Request $request)
    {
        $role_user = $request->role_user;
        $id_user = $request->id_user;
        if (!empty($role_user) && !empty($id_user)) {
            $result = User::where('id', $id_user)->update(['role' => $role_user]);

            if ($result) {
                return redirect()->back()->with('success', 'Set Role User Success');
            } else {
                return redirect()->back()->with('error', 'Set Role User Fail');
            }
        } else {
            return redirect()->back()->with('error', 'Set Role User Fail');
        }
    }


    public function create_account_staff(Request $request)
    {
        $current_date = Carbon::now();
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\sàáạãảăắằẳẵặâấầẩẫậèéẹẽẻêềếểễệìíịĩỉòóọõỏôốồổỗộơớờởỡợùúụũủưứừửữựỳýỵỹỷđĐ]+$/'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . Account::class],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $request->name,
                'phone' => '',
                'birth_date' => '1999/01/01',
                'address' => '',
                'nationality' => $request->nationality,
                'role' => $request->role_staff,
            ]);

            $account = Account::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'email_verified_at' => $current_date
            ]);

            $user_id = $user->id;
            $account_id = $account->id;

            $staff = Staff::create([
                'position' => $request->role_staff,
                'id_user' => $user_id,
                'id_account' => $account_id,
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Create Account Staff Success');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Create Account Staff Fail');
        }
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function get_info_staff(Request $request)
    {
        $id_user = $request->id_user;
        $data_user = User::findOrFail($id_user);
        return $data_user;
    }

    public function edit_info_staff(Request $request)
    {
        $data_staff = $request->all();
        $date = $data_staff['staff_birthday'];
        $formattedDate = Carbon::createFromFormat('d/m/Y', $date)->format('Y/m/d');
        $result = User::where('id', $data_staff['id_user'])->update([
            'name' => $data_staff['staff_name'],
            'phone' => $data_staff['staff_phone'],
            'birth_date' => $formattedDate,
            'address' => $data_staff['staff_address'],
            'gender' => $data_staff['staff_gender'],
        ]);

        if ($result) {
            return redirect()->back()->with('success', 'Edit Info Staff Success');
        } else {
            return redirect()->back()->with('error', 'Edit Info Staff Fail');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function change_pass_staff(Request $request)
    {
        $data = $request->all();
        $password = bcrypt($data['staff_new_pass']);
        $result = Account::where('id', $data['staff_id_account'])->update(['password' => $password]);

        if ($result) {
            return redirect()->back()->with('success', 'Change Password Staff Success');
        } else {
            return redirect()->back()->with('error', 'Change Password Staff Fail');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
