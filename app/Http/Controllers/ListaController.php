<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
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

    return redirect('lista')-> with('msg', 'Ordem de Serviço Nº ' .$request->id . ' editada com sucesso!');

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
