<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use App\Models\BuyerProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuyerProfileController extends Controller
{
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
        return view('buyer.pages.profile.index', [
            'profile' => Buyer::where('id', Auth::guard('buyer')->user()->id)->with('profile')->first()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $buyer = Buyer::findorFail($id);
        $buyer->first_name =  $request->first_name;
        $buyer->dob =  $request->dob;
        $buyer->save();

        $destinationImg = 'images/';

        if ($request->hasFile('personal_photo')) {
            $image  =  $request->file('personal_photo');
            $new_name =  time() . $image->getClientOriginalName();
            $image->move($destinationImg, $new_name);

            $buyer->profile()->updateOrCreate(['buyer_id' => $buyer->id], [
                'nickename' => $request->nick_name,
                'short_description' => $request->self_description,
                'tongue' => $request->spoken_language,
                'passions' => $request->passion,
                'fiscal_code' => $request->fiscal_code,
                'personal_photo' => $destinationImg . $new_name
            ]);
        } else {
            $buyer->profile()->updateOrCreate(['buyer_id' => $buyer->id], [
                'nickename' => $request->nick_name,
                'short_description' => $request->self_description,
                'tongue' => $request->spoken_language,
                'passions' => $request->passion,
                'fiscal_code' => $request->fiscal_code

            ]);
        }
        $request->session()->flash('message', 'Profile updated successfully');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BuyerProfile  $buyerProfile
     * @return \Illuminate\Http\Response
     */
    public function show(BuyerProfile $buyerProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BuyerProfile  $buyerProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(BuyerProfile $buyerProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BuyerProfile  $buyerProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BuyerProfile $buyerProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BuyerProfile  $buyerProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(BuyerProfile $buyerProfile)
    {
        //
    }
}
