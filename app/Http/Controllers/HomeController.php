<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        if(session('users')){
            $users = session('users');
        }
        else{
        $users = $this->getUsers();
        }
        return view("dashboard", compact('users'));
    }

    public function detail($id){
        $users = session('users');
        $user = collect($users)->firstWhere('id', $id);
        return view("detail", compact('user'));

    }
}
