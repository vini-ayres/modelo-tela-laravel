<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OSController extends Controller
{
    public function dashboard() {
        $rotaAtual = Route::currentRouteName();
    
        if ($rotaAtual == 'dashboard-funcionario') {
            return view('dashboard.funcionario');
        } elseif ($rotaAtual == 'dashboard-tecnico') {
            return view('dashboard.tecnico');
        } else {
            return view('dashboard.administrador');
        }
    }
}
