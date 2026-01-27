<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidationRequest;
use App\Models\Department;
use App\Models\User;
// use App\Models\Permission;
use App\Settings\GeneralSettings;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function add_user(GeneralSettings $settings, Request $request)
    {
        $departments = Department::get();
        $roles = Role::get();
        return view('role-permissions.create-user', compact('settings', 'departments', 'roles'));
    }

    public function create_user(Request $request, $id = null)
    {
        // $validateData = $request->validated();
        $user = User::where('id', $id)->first() ?? new User();
        $is_admin = null;
        $role = Role::where('id', $request->role)->first();
        if ($role == 'admin') {
            $is_admin = 1;
        };
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role_id' => $request->role,
            // 'is_admin' => $is_admin,
            'status' => $request->statusBtn ?? 'inactive',
            'gender' => $request->gender,
            'dob' => $request->dob,
            'address' => $request->address,
            'city' => $request->city ?? null,
            'state' => $request->state ?? null,
            'country' => $request->country ?? null,
            'pincode' => $request->pincode ?? null,
        ];
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }
        if ($role) {
            // dd($user);
            // sync role name if we found a role
            $user->syncRoles([$role->name]);

            $user->role_id = $role->id;
        } else {

            // no role provided -> remove existing roles and keep role_id null

            $user->roles()->detach();

            $user->role_id = null;
        }
        $user = User::updateOrCreate(
            ['id' => $id],
            $data
        );
        return redirect()->back()->with('success', 'Permission added successfully!');
    }

    public function role()
    {
        $roles = Role::paginate(8);
        return view('role-permissions.role', compact('roles'));
    }
    public function add_role(GeneralSettings $settings, $id = null)
    {
        $role = Role::where('id', $id)->first();
        return view('role-permissions.add-role', compact('role'));
    }

    public function create_role(Request $request)
    {
        try {
            $permissions = collect($request->permissions)->flatten()->toArray();

            $role = Role::findOrCreate($request->role, 'web');

            foreach ($permissions as $name) {
                $id = Permission::findOrCreate($name, 'web');
            }
            $role->syncPermissions($permissions);

            return redirect()->back()->with('success', 'Permission added successfully!');
        } catch (\Exception $e) {

            return back()->with('error', 'Error ' . $e->getMessage());
        }
    }

    public function delete_role($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->route('role')->with('alert', 'User deleted successfully!');
    }
}
