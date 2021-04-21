<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        if (Auth::guard('buyer')->attempt(['email' => $request->email, 'password' => $request->password])) {
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

        Buyer::create([
            'first_name' => $request->first_name,
            'surname'    => $request->surname,
            'dob'        => $request->dob,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
        ]);

        $request->session()->flash('message', 'Verification required: Please check your email for account verification,Thanks.');
        return back();
    }

    public function dashboard()
    {
        echo "cdalmlfdas";
    }
}
