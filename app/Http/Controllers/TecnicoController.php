<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrdemServico;
use App\Models\Solicitacao;

class TecnicoController extends Controller
{
    // Método para atualizar uma ordem de serviço
    public function atualizarOrdemServico(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'cd_solicitacao' => 'required',
            'status' => 'required',
            'dt_entrega_ordem_servico' => 'nullable|date',
        ]);

        // Obtenção dos dados do formulário
        $solicitacao = $request->input('cd_solicitacao');
        $novoStatus = $request->input('status');
        $novaData = $request->input('dt_entrega_ordem_servico');

        // Encontrar a ordem de serviço com base no número de solicitação
        $ordemServico = OrdemServico::where('cd_solicitacao', $solicitacao)->first();

        // Verificação se a ordem de serviço foi encontrada
        if ($ordemServico) {
            // Atualização do status se o campo 'status' estiver presente
            if ($novoStatus) {
                $ordemServico->nm_status_ordem_servico = $novoStatus;
            }

            // Atualização da data se o campo 'dt_entrega_ordem_servico' estiver presente e for diferente da existente
            if ($novaData != null && $novaData != $ordemServico->dt_entrega_ordem_servico) {
                $ordemServico->dt_entrega_ordem_servico = $novaData;
            }

            // Salvar as alterações no banco de dados
            $ordemServico->save();

            // Redirecionar de volta com uma mensagem de sucesso
            return redirect()->back()->with('success', 'Ordem de serviço atualizada com sucesso!');
        } else {
            // Redirecionar de volta com uma mensagem de erro se a ordem de serviço não for encontrada
            return redirect()->back()->with('error', 'Ordem de serviço não encontrada.');
        }
    }    
}
