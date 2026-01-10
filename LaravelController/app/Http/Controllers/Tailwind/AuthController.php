<?php

namespace App\Http\Controllers\Tailwind;

use App\Http\Controllers\Controller;
use App\Models\Loginuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function registerForm()
    {
        return view('user-management-system.register');
    }

    public function register(Request $request)
    {
        // dd($request);
        $request->validate([
            'first_name' => 'required|max:10',
            'last_name' => 'required|max:10',
            'email' => 'required|email|unique:userlists,email',
            'password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/|confirmed',
        ]);

        Loginuser::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('user-management-system.loginForm');
    }

    public function loginForm()
    {
        return view('user-management-system.login');
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/',
        ]);

        $user = Loginuser::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            return redirect()->route('user-management-system.index');
        } else {
            return redirect()->route('user-management-system.loginForm')->with('error', 'Register your detail first.');
        }
    }
}
