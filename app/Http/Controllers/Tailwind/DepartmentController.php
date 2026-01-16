<?php

namespace App\Http\Controllers\Tailwind;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\UserDepartment;
use App\Models\Userdetail;
use App\Models\Member;

class DepartmentController extends Controller
{
    public function deptList()
    {
        $departments = Department::paginate(8);
        return view('user-management-system.department.deptList', compact('departments'));
    }

    public function addDept($id = null)
    {
        if($id != null){
            $department = Department::where('id', $id)->first();
            return view('user-management-system.department.add', compact('department'));
        }
        return view('user-management-system.department.add');
    }

    public function createDept(Request $request, $id = null){
        $request->validate([
            "dept_name" => 'required|max:20',
        ]);

        Department::updateOrCreate(
            ['id' => $id],
            ['department' => $request->dept_name],
        );
        return redirect()->route('user-management-system.department.deptList')->with('success', 'Department saved successfully!');
    }

    public function deptDelete($id)
    {
        if(UserDepartment::where('department_id', $id)->exists()){
            return redirect()->route('user-management-system.department.deptList')->with('alert', 'Department is in use');
        }
        $department = Department::findOrFail($id);
        $department->members()->delete();
        $department->delete();

        return redirect()->route('user-management-system.department.deptList')->with('alert', 'Department deleted successfully!');
    }

    public function memberList($id){
        $department = Department::findOrfail($id);
        $members = Member::where('memberable_id', $id)->get();
        return view('user-management-system.department.memberList', compact('members', 'department'));
    }

    public function addMember($id)
    {
        $department = Department::findOrFail($id);
        $allUsers = Member::where('memberable_id', $id)->pluck('member_name')->toArray();
        $users = Userdetail::select('id', 'first_name', 'last_name')
        ->whereRaw("CONCAT(first_name, ' ', last_name) NOT IN ('" . implode("','", $allUsers) . "')")
        ->get();
        return view('user-management-system.department.addMember', compact('users', 'department'));
    }

    public function createMember(Request $request, $id) {

        $department = Department::findOrFail($id);
        $userdetail = Userdetail::findOrFail($request->member, ['first_name', 'last_name']);
        $fullName = "{$userdetail->first_name} {$userdetail->last_name}";
        $department->members()->create(
            ['member_name' => $fullName],
        );
        return redirect()->route('user-management-system.department.deptList')->with('success', 'Member added successfully!');
    }

    public function deleteMember($id)
    {
        $member = Member::findOrFail($id);
        $member->delete();
        return redirect()->route('user-management-system.department.deptList')->with('alert', 'Member deleted successfully!');
    }
}
