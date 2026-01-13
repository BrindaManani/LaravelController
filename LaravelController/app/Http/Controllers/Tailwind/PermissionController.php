<?php

namespace App\Http\Controllers\Tailwind;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\UserPermission;

class PermissionController extends Controller
{
    public function permissionList()
    {
        $permissions = Permission::paginate(8);
        return view('user-management-system.permission.permissionList', compact('permissions'));
    }

    public function addPermission($id = null)
    {
        if($id != null){
            $permission = Permission::where('id', $id)->first();
            return view('user-management-system.permission.addPermission', compact('permission'));
        }
        return view('user-management-system.permission.addPermission');
    }

    public function createPermission(Request $request, $id = null){
        $request->validate([
            "permission" => 'required|max:20',
        ]);
        Permission::updateOrCreate(
            ['id' => $id],
            ['permission' => $request->permission],
        );
        return redirect()->route('user-management-system.permission.permissionList')->with('success', 'Permission saved successfully!');
    }

    public function deletePermission($id)
    {
        if(UserPermission::where('permission_id', $id)->exists()){
            return redirect()->route('user-management-system.permission.permissionList')->with('alert', 'Permission is in use');
        }
        Permission::findOrFail($id)->delete();
        return redirect()->route('user-management-system.permission.permissionList')->with('success', 'Permission saved successfully!');
    }

}
