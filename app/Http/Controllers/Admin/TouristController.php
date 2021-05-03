<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buyer;
use Illuminate\Support\Facades\Hash;

class TouristController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.buyer.index', [
            'tourists' => Buyer::with('profile', 'trips')->withCount('trips')->where('email_verified_at', '!=', null)
                ->orderBy('id', 'DESC')
                ->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.buyer.create');
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
            'first_name' => 'required',
            'surname'    => 'required',
            'dob'        => 'required|date|before:today',
            'email'      => 'required|unique:buyers,email',
            'password'   => 'required|min:6',
        ], [], [
            'dob' => 'date of birth'
        ]);

        Buyer::create([
            'first_name' => $request->first_name,
            'surname'    => $request->surname,
            'dob'        => $request->dob,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
            'email_verified_at' => now()
        ]);
        $request->session()->flash('message', 'Tourist added successfully.');
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
        return view('admin.pages.buyer.edit', [
            'tourist' => Buyer::Find($id)
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
            'first_name' => 'required',
            'surname'    => 'required',
            'dob'        => 'required|date|before:today',
            'email'      => 'required|unique:buyers,email,' . $id,
            'password'   => 'nullable|min:6',
        ], [], [
            'dob' => 'date of birth'
        ]);

        $tourist = Buyer::Find($id);
        if ($request->password) {
            $tourist->update([
                'first_name' => $request->first_name,
                'surname'    => $request->surname,
                'dob'        => $request->dob,
                'email'      => $request->email,
                'password'   => Hash::make($request->password),
            ]);
        } else {
            $tourist->update([
                'first_name' => $request->first_name,
                'surname'    => $request->surname,
                'dob'        => $request->dob,
                'email'      => $request->email,
            ]);
        }
        $request->session()->flash('message', 'Tourist updated successfully.');
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
        $tourist = Buyer::Find($id);
        $tourist->delete();
        $request->session()->flash('message', 'Tourist removed successfully.');
        return back();
    }

    public function active(Request $request, $id)
    {
        $seller = Buyer::find($id);
        if ($seller->is_active == 1) {
            $seller->is_active =  0;
            $request->session()->flash('message', 'Tourist deactivated successfully');
        } else {
            $seller->is_active =  1;
            $request->session()->flash('message', 'Tourist activated successfully');
        }
        $seller->save();
        return back();
    }
}
