<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Buyer;
use App\Models\Editior;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Admin Login Form
    public function login_form()
    {
        return view('admin.auth.login');
    }

    // admin login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:admins,email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin.dashboard');
        } else {
            $request->session()->flash('error', 'Password Incorrect: Please Try Again.');
            return back();
        }
    }

    // dahboard
    public function dashboard()
    {
        return view('admin.dashboard', [
            'editor' => Editior::count(),
            'seller' => Seller::where('is_verified', 1)->count(),
            'buyer'  => Buyer::where('email_verified_at', '!=', null)->count(),
        ]);
    }


    // logout
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('welcome');
    }
}
