<?php

namespace App\Http\Controllers\Tailwind;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class HomeController extends Controller
{
    //
    // public function getUsers(){

    //     if (session()->has('users')) {
    //         return session('users');
    //     }
    //     $defaultUsers = parent::defaultUsers();
    //     session(['users' => $defaultUsers]);
    //     return $defaultUsers;
    // }
    public function index(){

        $users = session('users');
        // dd($users);
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
        return view("tailwind.dashboard", compact('count', 'activeUsersCount', 'inactiveUsersCount','blockUsersCount'));
    }

    public function userList(){
        
        // $users = session('users');
        $users = collect(session('users'));
        $perPage = 5;
        $page = request()->get('page', 1);
        // dd($page);
        $paginatedUsers = new LengthAwarePaginator(
            $users->forPage($page, $perPage), 
            $users->count(),                  
            $perPage,                        
            $page,                           
            [
                'path' => request()->url(),   
                'query' => request()->query() 
            ]
        );
        // dd($paginatedUsers);
        return view("tailwind.userList", ['users' => $paginatedUsers]);
    }

    public function userDetail($id){
        $users = session('users');
        $user = collect($users)->firstWhere('id', $id);
        // dd($user);
        return view("tailwind.userDetail", compact('user'));

    }
}
