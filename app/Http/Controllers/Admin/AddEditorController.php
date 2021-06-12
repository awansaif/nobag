<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Editior;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AddEditorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.editor.index', [
            'editors' => Editior::select('id', 'first_name', 'surname', 'email')
                ->where('is_active', 1)
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
        return view('admin.pages.editor.create');
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
            'username' => 'required|unique:editiors,username',
            'password' => 'required|min:6',
            'name' => 'required',
            'surname' => 'required',
            'email'   => 'required|unique:editiors,email',
            'phone'   => 'required|unique:editiors,phone'
        ]);
        $password = $request->surname[0] . uniqid();
        Editior::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'visible_password' => $request->password,
            'first_name' => $request->name,
            'surname'    => $request->surname,
            'email'    => $request->email,
            'phone'  => $request->phone,
        ]);
        $request->session()->flash('message', 'Editor added successfully');
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
        return view('admin.pages.editor.edit', [
            'editor' => Editior::find($id)
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
            'username' => 'required|unique:editiors,username,' . $id,
            'password' => 'required|min:8',
            'name' => 'required',
            'surname' => 'required',
            'email'   => 'required|unique:editiors,email,' . $id,
            'phone'   => 'required|unique:editiors,phone,' . $id
        ]);
        Editior::find($id)->update([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'visible_password' => $request->password,
            'first_name' => $request->name,
            'surname'    => $request->surname,
            'email'    => $request->email,
            'phone'  => $request->phone,
        ]);

        $request->session()->flash('message', 'Editor updated successfully');
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
        $editor = Editior::find($id);
        $editor->delete();

        $request->session()->flash('message', 'Editor removed successfully');
        return back();
    }
    public function active(Request $request, $id)
    {
        $editor = Editior::find($id);
        if ($editor->is_active == 1) {
            $editor->is_active =  0;
            $request->session()->flash('message', 'Editor deactivated successfully');
        } else {
            $editor->is_active =  1;
            $request->session()->flash('message', 'Editor activated successfully');
        }
        $editor->save();
        return back();
    }
}
