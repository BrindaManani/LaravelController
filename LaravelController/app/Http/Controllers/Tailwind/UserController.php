<?php

namespace App\Http\Controllers\Tailwind;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Http\Requests\validationRequest;

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
        $users = session()->get('users', []);
        $newUser = [
            'id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->radioBtn,
            'status' => $request->statusBtn,
            'profile' => [
                'gender' => $request->profile['gender'],
                'dob' => $request->profile['dob'],
            ],
            'address' => [
                'city' => $request->address['city'],
                'state' => $request->address['state'],
                'country' => $request->address['country'],
                'pincode' => $request->address['pincode'],
            ],
            'permissions' => [
                'view' => $request->permission['view'] ?? "null",
                'read' => $request->permission['read'] ?? "null",
                'write' => $request->permission['write'] ?? "null", 
            ]
        ];

        $index = collect($users)->search(function ($item) use ($request) {
            return $item['id'] == $request->id;
        });
    
        if ($index !== false) {
            $users[$index] = $newUser;
        } else {
            $users[] = $newUser;
        }
        session()->put('users', $users);
        return redirect()->route('tailwind.userList');
    }

    public function userdelete($id)
    {
        $users = session('users', []);
        $index = collect($users)->search(function ($item) use ($id) {
            return $item['id'] == (int) $id;
        });
        if ($index !== false) {
            unset($users[$index]);
            session(['users' => array_values($users)]);
        }

        return redirect()->route('tailwind.index');
    }
}
