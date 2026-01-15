<?php

namespace App\Http\Controllers\Tailwind;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\UserDepartment;

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
        Department::findOrFail($id)->delete();
        
        return redirect()->route('user-management-system.department.deptList')->with('alert', 'Department deleted successfully!');
    }
}
