<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamMemberRequest;
use App\Models\Team;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TeamController extends Controller
{

    public function index(): View
    {
        return view('admin.pages.team.index', [
            'members' => Team::orderBy('id', 'DESC')->get()
        ]);
    }

    public function create(): View
    {
        return view('admin.pages.team.create');
    }

    public function store(TeamMemberRequest $request): RedirectResponse
    {
        $image = $this->file_upload('images/', $request->file('image'));
        Team::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
            'position' => $request->position,
        ]);
        $request->session()->flash('message', $request->name . ' saved as nobag team member');
        return back();
    }

    public function show($id)
    {
        //
    }

    public function edit(Team $team): View
    {
        return view('admin.pages.team.edit', [
            'member' => $team
        ]);
    }

    public function update(TeamMemberRequest $request, Team $team): RedirectResponse
    {
        if ($request->hasFile('image')) {
            $image = $this->file_upload('images/', $request->file('image'));
            $team->update([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $image,
                'position' => $request->position,
            ]);
        } else {
            $team->update($request->validated());
        }
        $request->session()->flash('message', $request->name . ' updated as nobag team member');
        return back();
    }

    public function destroy(Request $request, Team $team): RedirectResponse
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
