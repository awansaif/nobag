<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TutorialRequest;
use App\Models\Tutorial;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class TutorialController extends Controller
{

    public function index()
    {
        return view('admin.pages.tutorial.index', [
            'tutorials' => Tutorial::orderBy('id', 'DESC')->get()
        ]);
    }


    public function create()
    {
        return view('admin.pages.tutorial.create');
    }


    public function store(TutorialRequest $request)
    {
        Tutorial::create($request->validated());

        $request->session()->flash('message', 'Tutorial added successfully');
        return back();
    }

    public function show(Tutorial $tutorial)
    {
        return view('admin.pages.tutorial.edit', [
            'tutorial' => $tutorial
        ]);
    }


    public function edit(Tutorial $tutorial)
    {
        //
    }


    public function update(TutorialRequest $request, Tutorial $tutorial)
    {
        $tutorial->update($request->validated());

        $request->session()->flash('message', 'Tutorial updated successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tutorial  $tutorial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Tutorial $tutorial)
    {
        $tutorial->delete();

        $request->session()->flash('message', 'Tutorial removed successfully');
        return back();
    }
}
