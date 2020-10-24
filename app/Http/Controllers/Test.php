<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Test extends Controller
{
    public function showlogin(){
           return view("admin.login");
       }
}
