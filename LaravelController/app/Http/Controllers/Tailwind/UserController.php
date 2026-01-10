<?php

namespace App\Http\Controllers\Tailwind;

use App\Http\Controllers\Controller;
use App\Models\Userlist;
use App\Rules\dateRule;
use Hash;
use Illuminate\Http\Request;

// use App\Http\Requests\ValidationRequest;

class UserController extends Controller
{
    public function addUser($id = null)
    {
        if ($id != null) {

            $user = userlist::where('id', $id)->first();

            return view('user-management-system.add', compact('user'));
        }

        return view('user-management-system.add');
    }

    public function createUser(Request $request, $id = null)
    {
        // dd($id);
        $request->validate([
            'first_name' => 'required|regex:/^[a-zA-Z\s]/',
            'last_name' => 'required|regex:/^[a-zA-Z\s]/',
            'email' => 'required|email|unique:userlists,email,'.$id,
            'password' => 'required|string|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/',
            // 'confirm_password' => 'required|same:password',
            'phone' => 'required|numeric|regex:/^[0-9+]/',
            'address' => 'required',
            'dob' => ['date', new dateRule],
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);
        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $request->password,
            'phone' => $request->phone,
            'role' => $request->radioBtn,
            'status' => $request->statusBtn,
            'avatar' => $request->avatar ?? null,
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
        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }
        Userlist::updateOrCreate(
            ['id' => $id], // Unique identifier to find the record
            $data          // Values to update or create
        );

        return redirect()->route('user-management-system.userList')->with('success', 'User saved successfully!');
    }

    public function userdelete(Userlist $id)
    {
        $id->delete();

        return redirect()->route('user-management-system.userList')->with('alert', 'User deleted successfully!');
    }
}
