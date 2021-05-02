<?php

namespace App\Http\Controllers;

use App\Mail\ForgetPassword;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use App\Models\Buyer;
use App\Models\BookTrip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class BuyerController extends Controller
{
    public function login_form()
    {
        return view('buyer.auth.login');
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|exists:buyers,email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('buyer')->attempt(['email' => $request->email, 'password' => $request->password, 'is_active' => 1])) {
            return redirect()->route('tourist.dashboard');
        } else {
            $request->session()->flash('error', 'Your passsword is incorrect. Please try again.');
            return back();
        }
    }

    public function register_form()
    {
        return view('buyer.auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'surname'    => 'required',
            'dob'        => 'required|date|before:today',
            'email'      => 'required|unique:buyers,email',
            'password'   => 'required|min:6',
            'rule'       => 'required'
        ], [], [
            'dob' => 'date of birth'
        ]);

        $buyer = Buyer::create([
            'first_name' => $request->first_name,
            'surname'    => $request->surname,
            'dob'        => $request->dob,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
        ]);
        $buyer->sendEmailVerificationNotification();
        $request->session()->flash('message', 'Verification required: Please check your email for account verification,Thanks.');
        return back();
    }

    public function dashboard()
    {
        return view('buyer.dashboard', [
            'trips' => BookTrip::where('buyer_id', auth()->guard('buyer')->user()->id)->count(),
            'guides' =>
            BookTrip::where('buyer_id', auth()->guard('buyer')->user()->id)->count(),
            'cost' => BookTrip::where('buyer_id', auth()->guard('buyer')->user()->id)->sum('price')
        ]);
    }

    // Password Update
    public function setting()
    {
        return view('buyer.pages.setting.index');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8'
        ]);
        if (Hash::check($request->current_password, auth()->guard('buyer')->user()->password)) {
            Buyer::where('id', auth()->guard('buyer')->user()->id)->update([
                'password' => Hash::make($request->password),
            ]);
            $request->session()->flash('message', 'Password changes successfully.');
            return back();
        } else {
            $request->session()->flash('message', 'Your current Password not matched.');
            return back();
        }
    }

    // logout
    public function logout()
    {
        Auth::guard('buyer')->logout();
        return redirect()->route('tourist.login');
    }


    public function forget_password()
    {
        return view('buyer.auth.password.forget');
    }

    public function change_password(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:buyers,email'
        ]);
        $buyer = Buyer::where('email', $request->email)->first();

        Mail::to($request->email)->send(new ForgetPassword($buyer));

        $request->session()->flash('message', 'Please check your email to rest password');
        return back();
    }

    public function reset_password(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:buyers,email',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8'
        ]);
        Buyer::where('email', $request->email)->update([
            'password' => Hash::make($request->password),
        ]);
        $request->session()->flash('message', 'Please check your email to rest password');
        return back();
    }
}
