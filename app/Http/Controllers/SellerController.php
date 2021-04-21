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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function show(Seller $seller)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function edit(Seller $seller)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seller $seller)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seller $seller)
    {
        //
    }
}
