<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use App\Models\SellerProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(Seller::With('profile')->first());
        return view('seller.pages.profile.index', [
            'profile' => Seller::where('id', Auth::guard('seller')->user()->id)->With('profile')->first()
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
        $seller = Seller::findorFail($id);
        $seller->first_name =  $request->first_name;
        $seller->pob  = $request->pob;
        $seller->dob = $request->dob;
        $seller->save();

        $destinationImg = 'images/';
        $destinationVideo = 'videos/';

        if ($request->hasFile('personal_photo')) {
            $image  =  $request->file('personal_photo');
            $new_name =  time() . $image->getClientOriginalName();
            $image->move($destinationImg, $new_name);

            $seller->profile()->updateOrCreate(['seller_id' => $seller->id], [
                'slogan' => $request->slogan,
                'self_description' => $request->self_description,
                'spoken_language' => $request->spoken_language,
                'qualifiaction'   => $request->qualification,
                'personal_photo' => $destinationImg . $new_name,
            ]);
        } elseif ($request->hasFile('personal_video')) {
            $video  =  $request->file('personal_video');
            $new_name =  time() . $video->getClientOriginalName();
            $video->move($destinationVideo, $new_name);

            $seller->profile()->updateOrCreate(['seller_id' => $seller->id], [
                'slogan' => $request->slogan,
                'self_description' => $request->self_description,
                'spoken_language' => $request->spoken_language,
                'qualifiaction'   => $request->qualification,
                'personal_video' => $destinationVideo . $new_name,
            ]);
        } elseif ($request->hasFile('personal_photo') && $request->hasFile('personal_video')) {

            $image  =  $request->file('personal_photo');
            $new_name =  time() . $image->getClientOriginalName();
            $image->move($destinationImg, $new_name);


            $video  =  $request->file('personal_video');
            $new_name_vid =  time() . $video->getClientOriginalName();
            $video->move($destinationVideo, $new_name_vid);

            $seller->profile()->updateOrCreate(['seller_id' => $seller->id], [
                'slogan' => $request->slogan,
                'self_description' => $request->self_description,
                'spoken_language' => $request->spoken_language,
                'qualifiaction'   => $request->qualification,
                'personal_photo' => $destinationVideo . $new_name,
                'personal_video'   => $destinationVideo . $new_name_vid,
            ]);
        } else {
            $seller->profile()->updateOrCreate(['seller_id' => $seller->id], [
                'slogan' => $request->slogan,
                'self_description' => $request->self_description,
                'spoken_language' => $request->spoken_language,
                'qualifiaction'   => $request->qualification,
            ]);
        }
        $request->session()->flash('message', 'Profile updated successfully');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SellerProfile  $sellerProfile
     * @return \Illuminate\Http\Response
     */
    public function show(SellerProfile $sellerProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SellerProfile  $sellerProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(SellerProfile $sellerProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SellerProfile  $sellerProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SellerProfile $sellerProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SellerProfile  $sellerProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(SellerProfile $sellerProfile)
    {
        //
    }
}
