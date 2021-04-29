<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamMemberRequest;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.team.index', [
            'members' => Team::orderBy('id', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\TeamMemberRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamMemberRequest $request)
    {
        $image = $this->file_upload('images/', $request->file('image'));
        Team::create([
            'name' => $request->name,
            'image' => $image,
            'position' => $request->position,
        ]);
        $request->session()->flash('message', $request->name . ' saved as nobag team member');
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
     * @param  Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        return view('admin.pages.team.edit', [
            'member' => $team
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\TeamMemberRequest  $request
     * @param  Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(TeamMemberRequest $request, Team $team)
    {
        if ($request->hasFile('image')) {
            $image = $this->file_upload('images/', $request->file('image'));
            $team->update([
                'name' => $request->name,
                'image' => $image,
                'position' => $request->position,
            ]);
        } else {
            $team->update($request->validated());
        }
        $request->session()->flash('message', $request->name . ' updated as nobag team member');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Team $team)
    {
        $team->delete();
        $request->session()->flash('message', $team->name . ' removed from nobag team members');
        return back();
    }

    protected function file_upload($destination, $file)
    {
        $file_new_name = time() . $file->getClientOriginalName();
        $file->move($destination, $file_new_name);
        return $destination . $file_new_name;
    }
}
