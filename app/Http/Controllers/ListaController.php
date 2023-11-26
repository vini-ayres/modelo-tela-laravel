<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\ordemServico;
use App\Models\Solicitacao;
use Illuminate\Http\Request;

class ListaController extends Controller
{
    public function list(){

        # Utilizando o model das solicitações para mostrar na lista de ordens
        $ordens = Solicitacao::all();
        return view('lista', ['ordens' => $ordens]);

    }

    public function edit($id){

      $ordem = Solicitacao::findOrFail($id);

      return view('edit', ['ordem' => $ordem]);
  }

  public function update(Request $request){

    Solicitacao::findOrFail($request->id)->update($request->all());

    return redirect()->back()-> with('msg', 'Ordem de Serviço Nº ' .$request->id . ' editada com sucesso!');

  }

  public function status($id)
  {
    // Obtenha os dados da solicitação
    $dadosSolicitacao = Solicitacao::findOrFail($id);

    // Crie uma nova instância da tabela de destino (substitua 'tabela_destino' pelo nome real da sua tabela)
    $ordemServico = new ordemServico();

    // Copie os dados relevantes da solicitação para a nova tabela
      $ordemServico->cd_ordem = $dadosSolicitacao->cd_solicitacao;
      $ordemServico->ds_ordem = $dadosSolicitacao->ds_solicitacao;
      $ordemServico->cd_responsavel = $dadosSolicitacao->cd_matricula_funcionario;
      $ordemServico->dt_entrega_ordem = $dadosSolicitacao->dt_entrega_solicitacao;
      $ordemServico->nm_servico_solicitado = $dadosSolicitacao->nm_servico_solicitado;
      $ordemServico->nm_status_ordem = "oi";

    // Salve os dados na nova tabela
    $ordemServico->save();

    // Redirecione de volta com uma mensagem de sucesso (você pode ajustar conforme necessário)
    return redirect()->back()->with(['mensagem' => 'Exportação bem-sucedida', 'ordemServico' => $ordemServico] );
}

  public function perfil($id){

    $registro = Funcionario::findOrFail($id);

    return redirect('administrador.perfil');

  }




    /*public function show($id){
      
      $ordem = Solicitacao::findOrFail($id);

      return view('administrador.perfil', ['ordem' => $ordem]);

    }*/
}
