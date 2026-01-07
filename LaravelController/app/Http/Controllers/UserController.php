<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function addUser($id=null){
        if($id != null){
            $users = session('users');
        $user = collect($users)->firstWhere('id', $id);
        return view("edit", compact('user'));
        }
        return view("edit");
    }

    // public function createUser(Request $request){
    //     $users = session()->get('users', []);
    //     $newUser = [
    //         'id' => $request->id,
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'phone' => $request->phone,
    //         'role' => $request->radioBtn,
    //         'status' => $request->statusBtn,
    //         'profile' => [
    //             'gender' => $request->profile['gender'],
    //             'dob' => $request->profile['dob'],
    //         ],
    //         'address' => [
    //             'city' => $request->address['city'],
    //             'state' => $request->address['state'],
    //             'country' => $request->address['country'],
    //             'pincode' => $request->address['pincode'],
    //         ],
    //         'permissions' => [
    //             'view' => $request->permission['view'] ?? "null",
    //             'read' => $request->permission['read'] ?? "null",
    //             'write' => $request->permission['write'] ?? "null", 
    //         ]
    //     ];

        
    //     $users[] = $newUser;
    //     session()->put('users', $users);
    //     return redirect()->route('index');
        // dd(session('user'));
    // }
    // public function editUser($id){
    //     $users = session('users');
    //     $user = collect($users)->firstWhere('id', $id);
    //     return view("edit", compact('user'));
    // }
    public function createUser(Request $request){
        // dd("sdjnfjn");
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
    
            // dd($index);
        if ($index !== false) {
            $users[$index] = $newUser;
        } else {
            $users[] = $newUser;
        }
        // $users[] = $newUser;
        // session(['users' => $users]);
        session()->put('users', $users);
        return redirect()->route('index');
        // dd(session('user'));
    }

    public function userdelete($id)
    {
        $users = session('users', []);
        $index = collect($users)->search(function ($item) use ($id) {
            return $item['id'] == (int) $id;
        });
        // dd($index);
        if ($index !== false) {
            unset($users[$index]);
            session(['users' => array_values($users)]);
        }

        return redirect()->route('index');
    }
}
