<?php

namespace App\Http\Controllers\Tailwind;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidationRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\Department;
use App\Models\Permission;
use App\Models\UserPermission;
use App\Models\UserDepartment;
use App\Models\Userdetail;
use App\Models\UserCode;

class UserController extends Controller
{
    public function addUser($id = null)
    {
        $departments = Department::get();
        $permissions = Permission::get();
        if ($id != null) {

            $user = Userdetail::where('id', $id)->with('user_department', 'user_permission_userdetail', 'user_code')->first();
            // dd($user->user_department->department->id);
            return view('user-management-system.add', compact('user', 'departments', 'permissions'));
        }

        return view('user-management-system.add', compact('departments', 'permissions'));
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

        $user = Userdetail::updateOrCreate(
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


        $user_dept = UserDepartment::updateOrCreate(
            ['userdetail_id' => $user->id],
            ['department_id' => $request->department],
        );

        $user_code = UserCode::updateOrCreate(
            ['userdetail_id' => $user->id],
            ['code' => $request->user_code],
        );

        UserPermission::where('userdetail_id', $user->id)->delete();
        $permissions = (array) $request->permission;
        foreach ($request->permissions as $permission) {
            UserPermission::create([
                'userdetail_id' => $user->id,
                'permission_id' => $permission,
            ]);
        }

        return redirect()->route('user-management-system.userList')->with('success', 'User saved successfully!');
    }

    public function userdelete(Userdetail $id)
    {
        $user = Userdetail::findOrFail($id);
        $user->image()->delete();
        $user->user_permissions()->delete();
        $user->user_department()->delete();
        $user->user_code()->delete();

        return redirect()->route('user-management-system.userList')->with('alert', 'User deleted successfully!');
    }
}
