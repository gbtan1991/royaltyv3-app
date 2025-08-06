<?php

namespace App\Http\Controllers\admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    /** LOGIN MODULE **/

    //show login
    public function showLogin()
    {
        return view("admin.auth.login");
    }

    public function login(Request $request)
    {
        $credentials = $request->validate(
            [
                'username' => 'required',
                'password' => 'required'
            ]);

        if(Auth::guard('admin')->attempt($credentials)){
            $admin = Auth::guard('admin')->user();

            if($admin->account_status !== 'active'){
                Auth::guard('admin')->logout();
                return redirect()->route('admin.login')->withErrors(['account' => 'Your account is not active. Please contact the Super Admin for Approval.']);
            }

            //Update last login
            $admin->update(['last_login' => now()]);

            //Redirect to dashboard
            return redirect()->route('dashboard');
        }

        //If authentication fails
        return back()->withErrors(['login'=> 'Invalid Username or Password.']);

    }




    /** REGISTRATION MODULE **/

    public function showRegistration()
    {
        return view("admin.auth.register");
    }

    public function register(Request $request)
    {
        $request->validate(
            [
            'username' => 'required|string|max:255|unique:admins',
            'password' => 'required|string|min:8',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
    ]);

        $admin = Admin::create(
            [
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'admin_type' => 'admin', // Default admin type
            'account_status' => 'pending', // Default account status
    ]);

    return redirect()->route('admin.auth.confirmation', ['username' => $admin->username]);
    }
}
