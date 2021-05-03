<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegulationRequest;
use App\Models\Regulation;
use Illuminate\Http\Request;

class RegulationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.regulation.index', [
            'regulations' => Regulation::orderBy('id', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.regulation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegulationRequest $request)
    {
        Regulation::create([
            'title' => $request->title,
            'role'  => $request->role,
            'document' => $this->move_file('documents/', $request->file('document')),
            'description' => $request->description,
        ]);

        $request->session()->flash('message', 'Document added successfully');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Regulation  $regulation
     * @return \Illuminate\Http\Response
     */
    public function show(Regulation $regulation)
    {
        return view('admin.pages.regulation.edit', [
            'regulation' => $regulation
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Regulation  $regulation
     * @return \Illuminate\Http\Response
     */
    public function edit(Regulation $regulation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Regulation  $regulation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Regulation $regulation)
    {
        if ($request->hasFile('document')) {
            $regulation->update([
                'title' => $request->title,
                'role'  => $request->role,
                'document' => $this->move_file('documents/', $request->file('document')),
                'description' => $request->description,
            ]);
        } else {
            $regulation->update([
                'title' => $request->title,
                'role'  => $request->role,
                'description' => $request->description,
            ]);
        }


        $request->session()->flash('message', 'Document updated successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Regulation  $regulation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Regulation $regulation)
    {
        $regulation->delete();

        $request->session()->flash('message', 'Document removed successfully');
        return back();
    }

    public function move_file($destination, $file)
    {
        $file_new = time() . $file->getClientOriginalName();
        $file->move($destination, $file_new);
        return $destination . $file_new;
    }
}
