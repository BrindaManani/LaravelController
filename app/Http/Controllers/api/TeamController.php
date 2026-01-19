<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function teamList(){
        $team = Team::all();
        return response()->json($team);
    }
    public function teamDetail($id){
        $team = Team::where('id', $id)->get();
        return response()->json($team);
    }

    public function createTeam(Request $request){
    //    dd($request->name);
        $request->validate([
            'name' => 'required|max:20',
        ]);
        $team = Team::create([
            'name' => $request->name,
        ]);
        return response()->json([
            'message' => 'Team added successfully!!',
            $team,
        ]);
    }

    public function teamDelete($id)
    {
        $team = Team::findOrFail($id);
        $team->members()->delete();
        $team->delete();
        return response()->json([
            'message' => 'Team deleted successfully!!'
        ], 200);
    }

    public function memberList($id){
        $team = Team::findOrfail($id);
        $members = Member::where('memberable_id', $id)->get();
        return response()->json([
            $team,
            $members,
        ]);
    }
    public function addMember(Request $request, $id)
    {
        $team = Team::findOrFail($id);
        $member = Member::create([
            'member_name' => $request->name,
            'memberable_type' => Team::class,
            'memberable_id' => $id,
        ]);
        // $allUsers = Member::where('memberable_id', $id)->pluck('member_name')->toArray();
        // $users = Userdetail::select('id', 'first_name', 'last_name')
        // ->whereRaw("CONCAT(first_name, ' ', last_name) NOT IN ('" . implode("','", $allUsers) . "')")
        // ->get();
        return response()->json([
            'message' => 'Member added successfully!!',
            $team,
            $member,
        ]);
    }

    public function deleteMember($id)
    {
        $member = Member::findOrFail($id);
        $member->delete();
        return response()->json([
            'message' => 'Member deleted successfully!!',
        ]);
    }
}
