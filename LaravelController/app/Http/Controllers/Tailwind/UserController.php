<?php

namespace App\Http\Controllers\Tailwind;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ValidationRequest;

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
    public function createUser(ValidationRequest $request){
        // dd("sdjnjn");
        $users = session()->get('users', []);
        $newUser = [
            'id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone ? '+91'.$request->phone : null,
            'role' => $request->radioBtn ?? null,
            'status' => $request->statusBtn ?? null,
            'profile' => [
                'gender' => $request->profile['gender'] ?? null,
                'dob' => $request->profile['dob'] ?? null,
            ],
            'address' => [
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
        dd($id);
        $users = session('users', []);
        $index = collect($users)->search(function ($item) use ($id) {
            return $item['id'] == (int) $id;
        });
        if ($index !== false) {
            unset($users[$index]);
            session(['users' => array_values($users)]);
        }

        redirect()->back()->with('alert', 'User deleted successfully!');
    }
}
