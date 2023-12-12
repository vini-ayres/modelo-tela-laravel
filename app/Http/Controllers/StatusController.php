<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrdemServico;
use App\Models\Tecnico;
use Illuminate\Support\Facades\Session;

class StatusController extends Controller
{
    // Método para exibir o status das ordens de serviço
    public function status()
    {
        // Utilizando o model das ordens de serviço para obter todos os registros
        $dadosSolicitacao = OrdemServico::all();
        return view('status', ['dadosSolicitacao' => $dadosSolicitacao]);
    }

    // Método para exibir o status das ordens de serviço para o perfil de técnico
    public function tecnico()
    {
        // Obtém todas as ordens de serviço com informações relacionadas aos técnicos
        $ordens = OrdemServico::with('tecnico')->get();
        $layout = 'dashboard.tecnico';
        return view('status', ['ordens' => $ordens, 'layout' => $layout]);
    }

    // Método para exibir o status das ordens de serviço para o perfil de coordenador
    public function coordenador()
    {
        // Obtém todas as ordens de serviço
        $ordens = OrdemServico::all();
        $layout = 'dashboard.coordenador';
        return view('status-coordenador', ['ordens' => $ordens, 'layout' => $layout]);
    }
}
