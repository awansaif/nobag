<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function login_form()
    {
        return view('seller.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:sellers,email',
            'password' => 'required|min:6'
        ]);
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
        return view('seller.dashboard');
    }
}
