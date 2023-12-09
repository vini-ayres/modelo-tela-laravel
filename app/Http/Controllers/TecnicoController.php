<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrdemServico;
use App\Models\Solicitacao;

class TecnicoController extends Controller
{
    public function atualizarOrdemServico(Request $request)
    {
        $request->validate([
            'cd_solicitacao' => 'required',
            'status' => 'required',
            'dt_entrega_ordem_servico' => 'nullable|date',
        ]);
    
        $solicitacao = $request->input('cd_solicitacao');
        $novoStatus = $request->input('status');
        $novaData = $request->input('dt_entrega_ordem_servico');
    
        // Encontrar a ordem de serviço
        $ordemServico = OrdemServico::where('cd_solicitacao', $solicitacao)->first();
    
        if ($ordemServico) {
            // Atualizar o status se o campo 'status' estiver presente
            if ($novoStatus) {
                $ordemServico->nm_status_ordem_servico = $novoStatus;
            }
    
            // Atualizar a data se o campo 'dt_entrega_ordem_servico' estiver presente e for diferente da existente
            if ($novaData != null && $novaData != $ordemServico->dt_entrega_ordem_servico) {
                $ordemServico->dt_entrega_ordem_servico = $novaData;
            }
    
            // Salvar as alterações
            $ordemServico->save();
    
            // Redirecionar de volta com uma mensagem de sucesso
            return redirect()->back()->with('success', 'Ordem de serviço atualizada com sucesso!');
        } else {
            // Redirecionar de volta com uma mensagem de erro
            return redirect()->back()->with('error', 'Ordem de serviço não encontrada.');
        }
    }    
}
