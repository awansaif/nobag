<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\SellerVerified;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class GuideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.seller.index', [
            'sellers' => Seller::with('profile')->orderBy('id', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.seller.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:sellers,user_name',
            'password'  => 'required|min:8',
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
        ], [], [
            'pob' => 'place of birth',
            'dob' => 'date of birth',
        ]);


        $seller =  Seller::Create([
            'user_name' => $request->username,
            'password' => Hash::make($request->password),
            'visible_password' => $request->password,
            'first_name' => $request->first_name,
            'surname' => $request->surname,
            'pob' => $request->pob,
            'dob' => $request->dob,
            'nationality' => $request->nationality,
            'phone' => $request->phone,
            'email' => $request->email,
            'fiscal_code' => $request->fiscal_code,
            'vat_number' => $request->vat_number,
            'iban' => $request->iban,
            'is_verified' => 1
        ]);

        Mail::to($seller->email)->send(new SellerVerified($seller));

        $request->session()->flash('message', 'Guide added successfully');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.pages.seller.edit', [
            'seller' => Seller::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|unique:sellers,user_name,' . $id,
            'password'  => 'required|min:8',
            'first_name' => 'required',
            'surname'   => 'required',
            'pob'       => 'required',
            'dob'       => 'required|date|before:today',
            'nationality' => 'required',
            'phone'       => 'required|unique:sellers,phone,' . $id,
            'email'       => 'required|unique:sellers,email,' . $id,
            'fiscal_code' => 'required',
            'vat_number'   => 'required',
            'iban'         => 'required',
        ], [], [
            'pob' => 'place of birth',
            'dob' => 'date of birth',
        ]);


        Seller::find($id)->update([
            'user_name' => $request->username,
            'password' => Hash::make($request->password),
            'visible_password' => $request->password,
            'first_name' => $request->first_name,
            'surname' => $request->surname,
            'pob' => $request->pob,
            'dob' => $request->dob,
            'nationality' => $request->nationality,
            'phone' => $request->phone,
            'email' => $request->email,
            'fiscal_code' => $request->fiscal_code,
            'vat_number' => $request->vat_number,
            'iban' => $request->iban,
            'is_verified' => 1
        ]);
        $seller = Seller::find($id);

        Mail::to($seller->email)->send(new SellerVerified($seller));

        $request->session()->flash('message', 'Guide updated successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $seller = Seller::Find($id);
        $seller->delete();
        $request->session()->flash('message', 'Guide removed successfully');
        return back();
    }

    public function active(Request $request, $id)
    {
        $seller = Seller::find($id);
        if ($seller->is_active == 1) {
            $seller->is_active =  0;
            $request->session()->flash('message', 'Guide deactivated successfully');
        } else {
            $seller->is_active =  1;
            $request->session()->flash('message', 'Guide activated successfully');
        }
        $seller->save();
        return back();
    }
}
