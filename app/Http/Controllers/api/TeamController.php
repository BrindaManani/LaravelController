<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Team;
use App\Models\Userdetail;
use Exception;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function teamList()
    {
        $team = Team::get();
        return response()->json($team);
    }
    public function teamDetail($id)
    {
        try {
            $team = Team::findOrFail($id);
            return response()->json($team);
        } catch (Exception $e) {
            return response()->json([
                'Error' => 'Data not found'
            ], 404);
        }
    }

    public function createTeam(Request $request)
    {
        $request->validate([
            'name' => 'required|max:20',
        ]);
        try {
            $team = Team::create([
                'name' => $request->name,
            ]);
            return response()->json([
                'message' => 'Team added successfully!!',
                $team,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'Error' => 'Something went wrong !!'
            ], 500);
        }
    }

    public function teamDelete($id)
    {
        try {
            $team = Team::findOrFail($id);
            $team->members()->delete();
            $team->delete();
            return response()->json([
                'message' => 'Team deleted successfully!!'
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'Error' => 'Data not found'
            ], 404);
        }
    }

    public function memberList($id)
    {
        try {
            $team = Team::findOrfail($id);
            $members = Member::where('memberable_id', $id)->get();
            return response()->json([
                $team,
                $members,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'Error' => 'Data not found'
            ], 404);
        }
    }
    public function addMember(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:20',
        ]);
        try {
            $team = Team::findOrFail($id);
            $exists = Member::where('member_name', $request->name)->where('memberable_id', $id)->get();
            if ($exists) {
                return response()->json([
                    'Error' => 'Member already exists !!'
                ]);
            }
            $member = Member::create([
                'member_name' => $request->name,
                'memberable_type' => Team::class,
                'memberable_id' => $id,
            ]);
            return response()->json([
                'message' => 'Member added successfully!!',
                $team,
                $member,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'Error' => 'Something went wrong !!'
            ], 500);
        }
    }

    public function deleteMember($id)
    {
        try {
            $member = Member::findOrFail($id);
            $member->delete();
            return response()->json([
                'message' => 'Member deleted successfully!!',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'Error' => 'Data not found'
            ], 404);
        }
    }
}
