<?php

namespace App\Http\Controllers\Tailwind;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidationRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\Department;
use App\Models\Permission;
use App\Models\UserPermission;
use App\Models\UserDepartment;
use App\Models\User;
use App\Models\UserCode;

class UserController extends Controller
{
    public function addUser($id = null)
    {
        $departments = Department::get();
        $permissions = Permission::get();
        if ($id != null) {

            $user = User::where('id', $id)->with('user_department', 'user_code', 'image')->first();
            // dd($user->name);
            return view('user-management-system.add', compact('user', 'departments', 'permissions'));
        }

        return view('user-management-system.add', compact('departments', 'permissions'));
    }

    public function createUser(ValidationRequest $request, $id = null)
    {
        $validateData = $request->validated();
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->radioBtn,
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

        $user = User::updateOrCreate(
            ['id' => $id],
            $data
        );
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar')->store('avatars', 'public');
            $user_img = $user->image()->updateOrCreate(
                ['imageable_id' => $id],
                ['url' => $avatar],
            );
        }


        $user->user_department()->updateOrCreate(
            ['userdetail_id' => $user->id],
            ['department_id' => $request->department],
        );

        $user->user_code()->updateOrCreate(
            ['userdetail_id' => $user->id],
            ['code' => $request->user_code],
        );

        UserPermission::where('userdetail_id', $user->id)->delete();
        foreach ($request->permissions as $permission) {
            UserPermission::create([
                'userdetail_id' => $user->id,
                'permission_id' => $permission,
            ]);
        }

        return redirect()->route('user-management-system.userList')->with('success', 'User saved successfully!');
    }

    public function userDelete($id)
    {
        $user = User::findOrFail($id);
        $user->image()->delete();
        $user->user_permissions()->delete();
        $user->user_department()->delete();
        $user->user_code()->delete();
        return redirect()->route('user-management-system.userList')->with('alert', 'User deleted successfully!');
    }
}
