<?php

namespace App\Http\Controllers;

use App\Models\BookTrip;
use App\Models\Trip;
use Illuminate\Http\Request;

class BookTripController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $trip = Trip::FindorFail($id);
        BookTrip::create([
            'buyer_id' => auth()->guard('buyer')->user()->id,
            'trip_id'  => $trip->id,
            'seller_id' => $trip->seller_id,
            'price'    => $trip->cost,
        ]);

        return view('public.booktrip.confirm', [
            'message' => 'Congragulation for booking trip.',
            'trip'   => $trip
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $trip = Trip::FindorFail($id);
        if ($trip->available_places != 0) {
            $trip->update([
                'available_places' => $trip->available_places - 1
            ]);
            BookTrip::create([
                'buyer_id' => auth()->guard('buyer')->user()->id,
                'trip_id'  => $trip->id,
                'seller_id' => $trip->seller_id,
                'price'    => $trip->cost,
            ]);

            return view('buyer.pages.trip.confirm', [
                'message' => 'Congragulation for booking trip.',
                'trip'   => $trip
            ]);
        } else {
            $request->session()->flash('message', 'This trip seats are already fulled');
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
