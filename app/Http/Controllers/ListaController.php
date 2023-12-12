<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\Solicitacao;
use App\Models\OrdemServico;
use App\Models\Tecnico;
use Illuminate\Http\Request;

class ListaController extends Controller
{
    // Método para exibir uma lista de ordens de serviço
    public function list()
    {
        // Utilizando o model das solicitações para mostrar na lista de ordens
        $ordens = Solicitacao::with('funcionario', 'ordem')->get();
        return view('lista', ['ordens' => $ordens]);
    }

    // Método para exibir o formulário de edição de uma ordem de serviço
    public function edit($id)
    {
        $ordem = Solicitacao::findOrFail($id);

        // Obtenha a lista de todos os técnicos
        $tecnicos = Funcionario::where('cd_nivel_acesso_funcionario', 1)->get(); // Assumindo que o nível de acesso 1 corresponde a técnicos

        return view('edit', ['ordem' => $ordem, 'tecnicos' => $tecnicos]);
    }

    // Método para exibir a view de exportação de uma ordem de serviço
    public function exportView($id)
    {
        $ordem = Solicitacao::findOrFail($id);

        // Obtenha a lista de todos os técnicos
        $tecnicos = Tecnico::with('funcionario')->get(); // Assumindo que o nível de acesso 1 corresponde a técnicos

        return view('export', ['ordem' => $ordem, 'tecnicos' => $tecnicos]);
    }

    // Método para criar uma ordem de serviço
    public function export($id)
    {
        $pedido = Solicitacao::findOrFail($id);
        // Nova instância da classe OrdemServico
        $ordem = new OrdemServico;
        $ordem->cd_solicitacao = $pedido->cd_solicitacao;
        $ordem->ds_material_utilizado_ordem_servico = request('ds_material_utilizado_ordem_servico');
        $ordem->cd_responsavel = request('responsavelOrdem');
        $ordem->dt_entrega_ordem_servico = $pedido->dt_emissao_solicitacao; 
        $ordem->nm_status_ordem_servico = 'Aberto';  

        $ordem->save();

        // Redirecione para uma página de sucesso ou faça algo mais
        return redirect()->back()->with('success', 'Ordem Nº ' . $ordem->cd_solicitacao . ' enviada com sucesso!');
    }

    // Método para atualizar uma ordem de serviço
    public function update($id)
    {
        // Encontre a solicitação pelo ID
        $solicitacao = Solicitacao::findOrFail($id);

        // Atualize os campos da solicitação com os dados do formulário
        $solicitacao->ds_solicitacao = request('ds_solicitacao');

        // Salve as alterações no banco de dados
        $solicitacao->save();

        // Redirecione de volta com uma mensagem de sucesso
        return redirect()->back()->with('success', 'Ordem de Serviço Nº ' . $id . ' editada com sucesso!');
    }

    // Método para redirecionar para o perfil de um funcionário
    public function perfil($id)
    {
        $registro = Funcionario::findOrFail($id);
        return redirect('administrador.perfil');
    }
}
