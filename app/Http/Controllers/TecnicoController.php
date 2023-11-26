<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrdemServico;
use App\Models\Solicitacao;

class TecnicoController extends Controller
{
    public function atualizarStatus(Request $request)
    {
        $request->validate([
            'cd_solicitacao' => 'required',
            'status' => 'required',
        ]);

        $solicitacao = $request->input('cd_solicitacao');
        $novoStatus = $request->input('status');

        // Atualiza o status no banco de dados
        $ordemServico = OrdemServico::where('cd_solicitacao', $solicitacao)->first();

        if ($ordemServico) {
            $ordemServico->nm_status_ordem_servico = $novoStatus;
            $ordemServico->save();

            return redirect()->back()->with('success', 'Status atualizado com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Ordem de serviço não encontrada.');
        }
    }
}
