<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrdemServico;
use App\Models\Tecnico;
use Illuminate\Support\Facades\Session;

class StatusController extends Controller
{
    public function status(){

        # Utilizando o model das solicitações para mostrar na lista de ordens
        $dadosSolicitacao = OrdemServico::all();
        return view('status', ['dadosSolicitacao' => $dadosSolicitacao]);
    }

    public function tecnico()
    {

        $ordens = OrdemServico::with('tecnico')->get();
        $layout = 'dashboard.tecnico';
        return view('status', ['ordens' => $ordens, 'layout' => $layout]);
    }    
    
    public function coordenador()
    {
        $ordens = OrdemServico::all();
        $layout = 'dashboard.coordenador';
        return view('status-coordenador', ['ordens' => $ordens, 'layout' => $layout]);
    }
}
