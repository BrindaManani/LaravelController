<?php

namespace App\Http\Controllers\Tailwind;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function getUsers(){
        $users = parent::getUsers();
        return $users;
    }
    public function index(){

        $users = session('users');
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
        
        $users = session('users');
        return view("tailwind.userList", compact('users'));
    }

    public function userDetail($id){
        $users = session('users');
        $user = collect($users)->firstWhere('id', $id);
        return view("tailwind.userDetail", compact('user'));

    }
}
