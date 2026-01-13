<?php

namespace App\Http\Controllers\Tailwind;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidationRequest;
use App\Models\Department;
use App\Models\Permission;
use App\Models\UserDepartment;
use App\Models\Userdetail;
use Hash;

class UserController extends Controller
{
    public function addUser($id = null)
    {
        $departments = Department::get();
        if ($id != null) {

            $user = Userdetail::where('id', $id)->with('user_department')->first();

            return view('user-management-system.add', compact('user', 'departments'));
        }

        return view('user-management-system.add', compact('departments'));
    }

    public function createUser(ValidationRequest $request, $id = null)
    {
        $validateData = $request->validated();
        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $request->password,
            'phone' => $request->phone,
            'role' => $request->radioBtn,
            'status' => $request->statusBtn ?? 'active',
            'avatar' => $request->avatar ?? null,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'address' => $request->address,
            'city' => $request->city ?? null,
            'state' => $request->state ?? null,
            'country' => $request->country ?? null,
            'permissions' => $request->permission ?? 'view',
            'pincode' => $request->pincode ?? null,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }
        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }
        $user = Userdetail::updateOrCreate(
            ['id' => $id],
            $data
        );

        $user_dept = UserDepartment::updateOrCreate(
            ['userdetail_id' => $user->id],
            ['department_id' => $request->department],
        );

        Permission::where('userdetail_id', $user->id)->delete();
        $permissions = (array) $request->permission;
        foreach ($data['permissions'] as $permission) {
            Permission::create([
                'userdetail_id' => $user->id,
                'permission' => $permission,
            ]);
        }

        return redirect()->route('user-management-system.userList')->with('success', 'User saved successfully!');
    }

    public function userdelete(Userdetail $id)
    {
        $id->delete();

        return redirect()->route('user-management-system.userList')->with('alert', 'User deleted successfully!');
    }
}
