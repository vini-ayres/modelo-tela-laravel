<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ordemServico;

class StatusController extends Controller
{
    public function status(){

        # Utilizando o model das solicitações para mostrar na lista de ordens
        $dadosSolicitacao = ordemServico::all();
        return view('status', ['dadosSolicitacao' => $dadosSolicitacao]);
    }
}
