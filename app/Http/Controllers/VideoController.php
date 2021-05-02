<?php

namespace App\Http\Controllers;

use App\Http\Requests\VideoRequest;
use App\Models\Videos;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('seller.pages.video.index', [
            'videos' => Videos::where('seller_id', auth()->guard('seller')->user()->id)->get()
        ]);
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
     * @param  \Illuminate\Http\VideoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoRequest $request)
    {
        Videos::Create([
            'seller_id' => auth()->guard('seller')->user()->id,
            'video'  => $request->video
        ]);
        $request->session()->flash('message', 'video added successfully');
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
    public function destroy(Request $request, $id)
    {
        $video = Videos::Find($id);
        $video->delete();
        $request->session()->flash('message', 'video removed successfully');
        return back();
    }
}
