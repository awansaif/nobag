<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use App\Models\ContactUs;
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

    // tourists
    public function tourists()
    {
        return view('admin.pages.buyer.index', [
            'tourists' => Buyer::where('email_verified_at', '!=', null)
                ->orderBy('id', 'DESC')
                ->get()
        ]);
    }

    // messages
    public function messages()
    {
        ContactUs::where('is_read', 0)->update([
            'is_read' => 1
        ]);
        return view('admin.pages.messages.index', [
            'messages' => ContactUs::orderBy('id', 'DESC')->get()
        ]);
    }
    // logout
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('welcome');
    }
}
