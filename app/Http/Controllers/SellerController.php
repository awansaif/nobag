<?php

namespace App\Http\Controllers;

use App\Models\BookTrip;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Trip;

class SellerController extends Controller
{
    public function login_form()
    {
        return view('seller.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|exists:sellers,user_name',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('seller')->attempt(['user_name' => $request->username, 'password' => $request->password, 'is_active' => 1])) {
            return redirect()->route('guide.dashboard');
        } else {
            $request->session()->flash('error', 'Your passsword is incorrect. Please try again.');
            return back();
        }
    }

    // show register form
    public function register_form()
    {
        return view('seller.auth.register');
    }
    // register
    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'surname'   => 'required',
            'pob'       => 'required',
            'dob'       => 'required|date|before:today',
            'nationality' => 'required',
            'phone'       => 'required|unique:sellers',
            'email'       => 'required|unique:sellers',
            'fiscal_code' => 'required',
            'vat_number'   => 'required',
            'iban'         => 'required',
            'rule'         => 'required',
        ], [], [
            'pob' => 'place of birth',
            'dob' => 'date of birth',
        ]);

        Seller::Create([
            'first_name' => $request->first_name,
            'surname' => $request->surname,
            'pob' => $request->pob,
            'dob' => $request->dob,
            'nationality' => $request->nationality,
            'phone' => $request->phone,
            'email' => $request->email,
            'fiscal_code' => $request->fiscal_code,
            'vat_number' => $request->vat_number,
            'iban' => $request->iban
        ]);

        $request->session()->flash('message', 'Verification required: After verification you recive email with credientials, Thanks');
        return back();
    }


    public function dashboard()
    {
        return view('seller.dashboard', [
            'trips' => Trip::where('seller_id', auth()->guard('seller')->user()->id)->count(),
            'ticketSales' => BookTrip::where('seller_id', auth()->guard('seller')->user()->id)->count(),
            'toruists' =>
            BookTrip::where('seller_id', auth()->guard('seller')->user()->id)->count(),
        ]);
    }

    // Password Update
    public function setting()
    {
        return view('seller.pages.setting.index');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8'
        ]);
        if (Hash::check($request->current_password, auth()->guard('seller')->user()->password)) {
            Seller::where('id', auth()->guard('seller')->user()->id)->update([
                'password' => Hash::make($request->password),
            ]);
            $request->session()->flash('message', 'Password changes successfully.');
            return back();
        } else {
            $request->session()->flash('message', 'Your current Password not matched.');
            return back();
        }
    }


    // logout functioon
    public function logout()
    {
        Auth::guard('seller')->logout();
        return redirect()->route('guide.loginForm');
    }
}
