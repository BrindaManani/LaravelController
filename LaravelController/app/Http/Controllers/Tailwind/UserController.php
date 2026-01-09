<?php

namespace App\Http\Controllers\Tailwind;

use App\Http\Controllers\Controller;
use App\Rules\dateRule;
use App\Rules\uniqueEmail;
use Illuminate\Http\Request;

// use App\Http\Requests\ValidationRequest;

class UserController extends Controller
{
    public function addUser($id = null)
    {
        if ($id != null) {
            $users = session('usersList');
            $user = collect($users)->firstWhere('id', $id);

            return view('user-management-system.add', compact('user'));
        }

        return view('user-management-system.add');
    }

    public function createUser(Request $request)
    {
        $users = session()->get('usersList', []);
        $request->validate([
            'first_name' => 'required|regex:/^[a-zA-Z\s]/',
            'last_name' => 'required|regex:/^[a-zA-Z\s]/',
            'email' => ['required','email'],
            'password' => 'required|string|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/',
            'confirm_password' => 'required|same:password',
            'phone' => 'required|numeric|regex:/^[0-9+]/',
            'address.address' => 'required',
            'profile.dob' => ['date', new dateRule],
            'profile.avatar' => 'image|mimes:jpg,jpeg,png,webp',
        ]);
        $newUser = [
            'id' => $request->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $request->password,
            'confirm_password' => $request->confirm_password,
            'phone' => $request->phone ?? null,
            'role' => $request->radioBtn ?? null,
            'status' => $request->statusBtn ?? null,
            'profile' => [
                'avatar' => $request->avatar ?? null,
                'gender' => $request->profile['gender'] ?? null,
                'dob' => $request->profile['dob'] ?? null,
            ],
            'address' => [
                'address' => $request->address['address'],
                'city' => $request->address['city'] ?? null,
                'state' => $request->address['state'] ?? null,
                'country' => $request->address['country'] ?? null,
                'pincode' => $request->address['pincode'] ?? null,
            ],
            'permissions' => [
                'view' => $request->permission['view'] ?? null,
                'read' => $request->permission['read'] ?? null,
                'write' => $request->permission['write'] ?? null,
            ],
        ];
        $index = collect($users)->search(function ($item) use ($request) {
            return $item['id'] == $request->id;
        });
        if ($index !== false) {
            $users[$index] = $newUser;
        } else {
            $users[] = $newUser;
        }
        session()->put('usersList', $users);

        return redirect()->route('user-management-system.userList')->with('success', 'User saved successfully!');
    }

    public function userdelete($id)
    {
        $users = session('usersList', []);
        $index = collect($users)->search(function ($item) use ($id) {
            return $item['id'] == (int) $id;
        });
        if ($index !== false) {
            unset($users[$index]);
            session(['usersList' => array_values($users)]);
        }

        return redirect()->route('user-management-system.userList')->with('alert', 'User deleted successfully!');
    }
}
