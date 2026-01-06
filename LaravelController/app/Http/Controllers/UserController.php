<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function addUser(){
        return view("add");
    }

    public function createUser(Request $request){
        // dd($request);
        $users = session()->get('users', []);
        $newUser = [
            'id' => count($users)+1,
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
                'view' => $request->permission['view'] ?: "null",
                'read' => $request->permission['read'] ?: "null",
                'write' => $request->permission['write'] ?: "null", 
            ]
        ];

        
        $users[] = $newUser;
        session()->put('users', $users);
        return redirect()->route('index');
        // dd(session('user'));
    }
    public function editUser($id){
        $users = session('users');
        $user = collect($users)->firstWhere('id', $id);
        return view("edit", compact('user'));
    }
    public function updateUser(Request $request){
        // dd($request);
        $users = session()->get('users', []);
        $newUser = [
            'id' => count($users)+1,
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
                'view' => $request->permission['view'] ?: "null",
                'read' => $request->permission['read'] ?: "null",
                'write' => $request->permission['write'] ?: "null", 
            ]
        ];

        
        $users[] = $newUser;
        session()->put('users', $users);
        return redirect()->route('index');
        // dd(session('user'));
    }
}
