<?php

namespace App\Http\Controllers;

use App\Http\Requests\TripRequest;
use App\Models\Trip;
use App\Models\TripTag;
use Illuminate\Http\Request;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('seller.pages.trip.index', [
            'trips' => Trip::where('seller_id', auth()->guard('seller')->user()->id)->orderBy('id', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('seller.pages.trip.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\TripRequesr  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TripRequest $request)
    {
        $trip = Trip::create([
            'seller_id' => auth()->guard('seller')->user()->id,
            'event_title' => $request->title,
            'place' => $request->place,
            'description' => $request->description,
            'short_description'  => $request->short_description,
            'date' => $request->date,
            'time' => $request->time,
            'frequency' => $request->frequency,
            'tongue' => $request->tongue,
            'cost' => '100',
            'video_trailer' => $request->video,
            'photos' => $this->mulit_file_upload('image/', $request->file('photos')),
            'google_map' => $request->map,
            'max_seats' => $request->max_seats,
            'min_seats' => $request->min_seats,
            'available_places' => $request->max_seats,
            'closing_date_of_the_sale' => $request->closing_date,
            'digital_guide' => $this->file_upload('guides/', $request->file('guide')),
            'virtual_connection_link' => $request->link,
        ]);
        foreach ($request->tags as $tag) {
            TripTag::create([
                'trip_id' => $trip->id,
                'tag'   => $tag
            ]);
        }
        $request->session()->flash('message', 'Trip added successfully');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function show(Trip $trip)
    {
        return view('seller.pages.trip.show', [
            'trip' => $trip
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function edit(Trip $trip)
    {
        return view('seller.pages.trip.edit', [
            'trip' => $trip
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trip $trip)
    {
        if ($request->hasFile('photos')) {
            $trip->update([
                'event_title' => $request->title,
                'place' => $request->place,
                'description' => $request->description,
                'short_description'  => $request->short_description,
                'date' => $request->date,
                'time' => $request->time,
                'frequency' => $request->frequency,
                'tongue' => $request->tongue,
                'cost' => '100',
                'video_trailer' => $request->video,
                'photos' => $this->mulit_file_upload('image/', $request->file('photos')),
                'google_map' => $request->map,
                'max_seats' => $request->max_seats,
                'min_seats' => $request->min_seats,
                'closing_date_of_the_sale' => $request->closing_date,
                'virtual_connection_link' => $request->link,
            ]);
        } elseif ($request->hasFile('guide')) {
            $trip->update([
                'event_title' => $request->title,
                'place' => $request->place,
                'description' => $request->description,
                'short_description'  => $request->short_description,
                'date' => $request->date,
                'time' => $request->time,
                'frequency' => $request->frequency,
                'tongue' => $request->tongue,
                'cost' => '100',
                'video_trailer' => $request->video,
                'google_map' => $request->map,
                'max_seats' => $request->max_seats,
                'min_seats' => $request->min_seats,
                'closing_date_of_the_sale' => $request->closing_date,
                'digital_guide' => $this->file_upload('guides/', $request->file('guide')),
                'virtual_connection_link' => $request->link,
            ]);
        } elseif ($request->hasFile('photos') && $request->hasFile('guide')) {
            $trip->update([
                'event_title' => $request->title,
                'place' => $request->place,
                'description' => $request->description,
                'short_description'  => $request->short_description,
                'date' => $request->date,
                'time' => $request->time,
                'frequency' => $request->frequency,
                'tongue' => $request->tongue,
                'cost' => '100',
                'video_trailer' => $request->video,
                'photos' => $this->mulit_file_upload('image/', $request->file('photos')),
                'google_map' => $request->map,
                'max_seats' => $request->max_seats,
                'min_seats' => $request->min_seats,
                'closing_date_of_the_sale' => $request->closing_date,
                'digital_guide' => $this->file_upload('guides/', $request->file('guide')),
                'virtual_connection_link' => $request->link,
            ]);
        } else {
            $trip->update([
                'event_title' => $request->title,
                'place' => $request->place,
                'description' => $request->description,
                'short_description'  => $request->short_description,
                'date' => $request->date,
                'time' => $request->time,
                'frequency' => $request->frequency,
                'tongue' => $request->tongue,
                'cost' => '100',
                'video_trailer' => $request->video,
                'google_map' => $request->map,
                'max_seats' => $request->max_seats,
                'min_seats' => $request->min_seats,
                'closing_date_of_the_sale' => $request->closing_date,
                'virtual_connection_link' => $request->link,
            ]);
        }
        TripTag::Where('trip_id', $trip->id)->delete();
        foreach ($request->tags as $tag) {
            TripTag::create([
                'trip_id' => $trip->id,
                'tag'   => $tag
            ]);
        }
        $request->session()->flash('message', 'Trip updated successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Trip $trip)
    {
        $trip->delete();
        TripTag::where('trip_id', $trip->id)->delete();
        $request->session()->flash('message', 'Trip removed successfully');
        return back();
    }

    public function file_upload($destination, $file)
    {
        $file_new = time() . '.' . $file->getClientOriginalExtension();
        $file->move($destination, $file_new);
        return $destination . $file_new;
    }
    public function mulit_file_upload($destination, $files)
    {
        foreach ($files as $file) {
            $file_new = time() . '.' . $file->getClientOriginalExtension();
            $file->move($destination, $file_new);
            $img[] = $destination . $file_new;
        }

        return json_encode($img);
    }
}
