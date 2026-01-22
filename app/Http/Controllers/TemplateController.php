<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function dashboard(){
        return view("template.dashboard");
    }
    public function general_settings(){
        return view("template.general");
    }
    public function lemon_squzy_settings(){
        return view("template.lemon-squzy");
    }
}
