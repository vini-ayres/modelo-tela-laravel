<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function funcionario()
    {
        $layout = 'dashboard.funcionario';
        return view('form', ['layout' => $layout]);
    }

    public function tecnico()
    {
        $layout = 'dashboard.tecnico';
        return view('form', ['layout' => $layout]);
    }

    public function coordenador()
    {
        $layout = 'dashboard.coordenador';
        return view('form', ['layout' => $layout]);
    }

    public function administrador()
    {
        $layout = 'dashboard.administrador';
        return view('form', ['layout' => $layout]);
    }

    
    public function visaogeral()
    {
        $layout = 'dashboard.visaogeral';
        return view('form', ['layout' => $layout]);
    }
}
