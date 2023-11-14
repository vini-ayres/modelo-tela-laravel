<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OSController extends Controller
{
    public function login(){
        return view('login');
    }

    public function lista(){
        return view('lista');
    }

    public function status(){
        return view('status');
    }

    public function gerenciamento(){
        return view('gerenciamento');
    }
}
