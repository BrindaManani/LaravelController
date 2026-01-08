<?php

namespace App\Http\Controllers\Tailwind;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rules\dateRule;
// use App\Http\Requests\ValidationRequest;

class UserController extends Controller
{
    //
    public function addUser($id=null){
        if($id != null){
            $users = session('users');
        $user = collect($users)->firstWhere('id', $id);
        return view("tailwind.add", compact('user'));
        }
        return view("tailwind.add");
    }
    public function createUser(Request $request){
        // dd($request);
        $users = session()->get('users', []);
        // dd($users);
        $request->validate([
            'first_name' => 'required|regex:/^[a-zA-Z\s]/',
            'last_name' => 'required|regex:/^[a-zA-Z\s]/',
            'email' => 'required|email',
            'password' => 'required|string|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/',
            'confirm_password' => 'required|same:password',
            'phone' => 'required|numeric|regex:/^[0-9+]/',
            'address.address' => 'required',
            'profile.dob' => ['date',new dateRule()],
            'profile.avatar' => 'image|mimes:jpg,jpeg,png,webp',
        ]);
        $newUser = [
            'id' => $request->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $request->password,
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
            ]
        ];
        // dd($newUser);
        $index = collect($users)->search(function ($item) use ($request) {
            return $item['id'] == $request->id;
        });
        // dd($index);
        if ($index !== false) {
            $users[$index] = $newUser;
        } else {
            $users[] = $newUser;
        }
        session()->put('users', $users);
        return redirect()->route('tailwind.userList')->with('success', 'User saved successfully!');
    }

    public function userdelete($id)
    {
        // dd($id);
        $users = session('users', []);
        $index = collect($users)->search(function ($item) use ($id) {
            return $item['id'] == (int) $id;
        });
        if ($index !== false) {
            unset($users[$index]);
            session(['users' => array_values($users)]);
        }

        return redirect()->route('tailwind.userList')->with('alert', 'User deleted successfully!');
    }
}
