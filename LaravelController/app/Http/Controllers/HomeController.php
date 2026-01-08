<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function getUsers(){
        $users = parent::getUsers();
        return $users;
    }
    public function index(){
        // dd(session('users'));
        $users = $this->getUsers();
        // $users = session('users');
        // dd($users);
        return view("dashboard", compact('users'));
    }

    public function detail($id){
        $users = session('users');
        $user = collect($users)->firstWhere('id', $id);
        // $filter = array_filter($user);
        // if(!empty($filter)){
            
        // }
        return view("detail", compact('user'));

    }
}
