<?php

namespace App\Http\Controllers\Tailwind;

use App\Http\Controllers\Controller;
use App\Models\Userlist;

class HomeController extends Controller
{
    public function index()
    {
        $count = Userlist::count();
        $activeUsersCount = userlist::where('status', 'active')->count();
        $inactiveUsersCount = userlist::where('status', 'inactive')->count();
        $blockUsersCount = userlist::where('status', 'block')->count();

        return view('user-management-system.dashboard', compact('count', 'activeUsersCount', 'inactiveUsersCount', 'blockUsersCount'));
    }

    public function userList()
    {
        $paginatedUsers = Userlist::paginate(8);

        return view('user-management-system.userList', ['users' => $paginatedUsers]);
    }

    public function userDetail($id)
    {
        $user = Userlist::where('id', $id)->first();

        return view('user-management-system.userDetail', compact('user'));
    }
}
