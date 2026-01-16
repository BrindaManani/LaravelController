<?php

namespace App\Http\Controllers\Tailwind;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Userdetail;
use App\Models\Member;

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

    public function createTeam(Request $request)
    {
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
        $team = Team::findOrFail($id);
        $team->members()->delete();
        $team->delete();
        return redirect()->route('user-management-system.team.teamList')->with('alert', 'Team deleted successfully!');
    }
    
    public function memberList($id){
        $team = Team::findOrfail($id);
        $members = Member::where('memberable_id', $id)->get();
        return view('user-management-system.team.memberList', compact('members', 'team'));
    }

    public function addMember($id)
    {
        $team = Team::findOrFail($id);
        $allUsers = Member::where('memberable_id', $id)->pluck('member_name')->toArray();
        $users = Userdetail::select('id', 'first_name', 'last_name')
        ->whereRaw("CONCAT(first_name, ' ', last_name) NOT IN ('" . implode("','", $allUsers) . "')")
        ->get();
        return view('user-management-system.team.addMember', compact('users', 'team'));
    }

    public function createMember(Request $request, $id) {

        $team = Team::findOrFail($id);
        $userdetail = Userdetail::findOrFail($request->member, ['first_name', 'last_name']);
        $fullName = "{$userdetail->first_name} {$userdetail->last_name}";
        $team->members()->create(
            ['member_name' => $fullName],
        );
        return redirect()->route('user-management-system.team.teamList')->with('success', 'Member added successfully!');
    }
    public function deleteMember($id)
    {
        $member = Member::findOrFail($id);
        $member->delete();
        return redirect()->route('user-management-system.team.teamList')->with('alert', 'Member deleted successfully!');
    }
}
