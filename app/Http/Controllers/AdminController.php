<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Buyer;
use App\Models\ContactUs;
use App\Models\Editior;
use App\Models\Seller;
use App\Models\Trip;
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
            return back()->withInput(['email' => $request->email]);
        }
    }

    // dahboard
    public function dashboard()
    {
        return view('admin.dashboard', [
            'articless' => Article::count(),
            'editor' => Editior::count(),
            'seller' => Seller::where('is_verified', 1)->count(),
            'buyer'  => Buyer::where('email_verified_at', '!=', null)->count(),
            'trips'  => Trip::count(),
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

    public function delete_messages(Request $request, $id)
    {
        ContactUs::find($id)->delete();
        $request->session()->flash('message', 'Message deleted successfully');
        return back();
    }
    // logout
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('welcome');
    }
}
