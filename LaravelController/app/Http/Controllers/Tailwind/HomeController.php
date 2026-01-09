<?php

namespace App\Http\Controllers\Tailwind;

use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;

class HomeController extends Controller
{
    public function index()
    {
        $users = session('usersList');
        $count = count($users);
        $activeUsersCount = count(array_filter($users, function ($user) {
            return $user['status'] === 'active';
        }));
        $inactiveUsersCount = count(array_filter($users, function ($user) {
            return $user['status'] === 'inactive';
        }));
        $blockUsersCount = count(array_filter($users, function ($user) {
            return $user['status'] === 'blocked';
        }));

        return view('user-management-system.dashboard', compact('count', 'activeUsersCount', 'inactiveUsersCount', 'blockUsersCount'));
    }

    public function userList()
    {
        $users = collect(session('usersList'));
        $perPage = 5;
        $page = request()->get('page', 1);
        $paginatedUsers = new LengthAwarePaginator(
            $users->forPage($page, $perPage),
            $users->count(),
            $perPage,
            $page,
            [
                'path' => request()->url(),
                'query' => request()->query(),
            ]
        );

        return view('user-management-system.userList', ['users' => $paginatedUsers]);
    }

    public function userDetail($id)
    {
        $users = session('usersList');
        $user = collect($users)->firstWhere('id', $id);
        return view('user-management-system.userDetail', compact('user'));

    }
}
