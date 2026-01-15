<?php

namespace App\Http\Controllers\Tailwind;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    public function teamList()
    {
        $teams = Team::paginate(8);
        return view('user-management-system.team.teamList', compact('teams'));
    }

    public function addTeam()
    {
        return view('user-management-system.team.add');
    }

    public function createTeam(Request $request){
        $request->validate([
            "team_name" => 'required|max:20',
        ]);

        Team::create([
            'name' => $request->team_name,
        ]);
        return redirect()->route('user-management-system.team.teamList')->with('success', 'Team saved successfully!');
    }
    public function teamDelete($id)
    {
        Team::findOrFail($id)->delete();

        return redirect()->route('user-management-system.team.teamList')->with('alert', 'Team deleted successfully!');
    }

    public function addMember()
    {
        $user = UserDetail::with('')
        return view('user-management-system.team.addMember');
    }
}
