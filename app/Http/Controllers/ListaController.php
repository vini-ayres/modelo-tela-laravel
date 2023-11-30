<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\Solicitacao;
use App\Models\OrdemServico;
use App\Models\Tecnico;
use Illuminate\Http\Request;

class ListaController extends Controller
{
  public function list()
  {
    // Utilizando o model das solicitações para mostrar na lista de ordens
    $ordens = Solicitacao::with('tecnico')->get();
    return view('lista', ['ordens' => $ordens]);
  }

  public function edit($id)
  {
    $ordem = Solicitacao::findOrFail($id);
    
    // Obtenha a lista de todos os técnicos
    $tecnicos = Funcionario::where('cd_nivel_acesso_funcionario', 1)->get(); // Assumindo que o nível de acesso 1 corresponde a técnicos

    return view('edit', ['ordem' => $ordem, 'tecnicos' => $tecnicos]);
  }

  public function exportView($id)
  {
    $ordem = Solicitacao::findOrFail($id);
    
    // Obtenha a lista de todos os técnicos
    $tecnicos = Tecnico::all(); // Assumindo que o nível de acesso 1 corresponde a técnicos

    return view('export', ['ordem' => $ordem, 'tecnicos' => $tecnicos]);
  }

  public function export($id)
  {
    $pedido = Solicitacao::findOrFail($id);

    $ordem = new OrdemServico;
    $ordem->cd_solicitacao = $pedido->cd_solicitacao;
    $ordem->ds_material_utilizado_ordem_servico = request('ds_material_utilizado_ordem_servico');
    $ordem->cd_responsavel = request('responsavelOrdem');
    $ordem->dt_entrega_ordem_servico = $pedido->dt_emissao_solicitacao; 
    $ordem->nm_status_ordem_servico = ' ';  
    $ordem->nm_tecnico_agregado = ' ';  

    $ordem->save();

    // Redirecione para uma página de sucesso ou faça algo mais
    return redirect()->back()->with('success', 'Ordem Nº ' . $ordem->cd_solicitacao . ' enviada com sucesso!');
  }

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


  public function perfil($id)
  {

    $registro = Funcionario::findOrFail($id);

    return redirect('administrador.perfil');

  }
    /*public function show($id){
      
      $ordem = Solicitacao::findOrFail($id);

      return view('administrador.perfil', ['ordem' => $ordem]);

    }*/
}