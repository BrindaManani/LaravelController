<?php

namespace App\Http\Controllers\Tailwind;

use App\Http\Controllers\Controller;
use App\Models\Userdetail;

class HomeController extends Controller
{
    public function index()
    {
        $count = Userdetail::count();
        $activeUsersCount = Userdetail::where('status', 'active')->count();
        $inactiveUsersCount = Userdetail::where('status', 'inactive')->count();
        $blockUsersCount = Userdetail::where('status', 'block')->count();

        return view('user-management-system.dashboard', compact('count', 'activeUsersCount', 'inactiveUsersCount', 'blockUsersCount'));
    }

    public function userList()
    {
        $paginatedUsers = Userdetail::with('user_department')->paginate(8);
        return view('user-management-system.userList', ['users' => $paginatedUsers]);
    }

    public function userDetail($id)
    {
        $user = Userdetail::where('id', $id)->with('permissions', 'user_department')->first();
        return view('user-management-system.userDetail', compact('user'));
    }
}
