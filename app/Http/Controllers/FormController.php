<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    // Método para exibir o formulário para o tipo de funcionário
    public function funcionario()
    {
        // Define o layout específico para o tipo de funcionário
        $layout = 'dashboard.funcionario';

        // Retorna a view 'form', passando o layout como parâmetro
        return view('form', ['layout' => $layout]);
    }

    // Método para exibir o formulário para o tipo de técnico
    public function tecnico()
    {
        // Define o layout específico para o tipo de técnico
        $layout = 'dashboard.tecnico';

        // Retorna a view 'form', passando o layout como parâmetro
        return view('form', ['layout' => $layout]);
    }

    // Método para exibir o formulário para o tipo de coordenador
    public function coordenador()
    {
        // Define o layout específico para o tipo de coordenador
        $layout = 'dashboard.coordenador';

        // Retorna a view 'form', passando o layout como parâmetro
        return view('form', ['layout' => $layout]);
    }

    // Método para exibir o formulário para o tipo de administrador
    public function administrador()
    {
        // Define o layout específico para o tipo de administrador
        $layout = 'dashboard.administrador';

        // Retorna a view 'form', passando o layout como parâmetro
        return view('form', ['layout' => $layout]);
    }
}
