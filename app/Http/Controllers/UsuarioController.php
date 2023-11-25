<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function usuario()
    {

        // Pegando todos dados da tabela funcionario
        $usuarios = Funcionario::all();
        return view('administrador.gerenciamento', ['usuarios' => $usuarios]);
    }

    public function edit($id)
    {
        $usuario = Funcionario::findOrFail($id);
        $niveis_acesso = $usuario->getNivelAcessoNome();


       
        #$nivel_usuario = $niveis_acesso[$usuario->cd_nivel_acesso_funcionario];

        # $nivel_usuario = $niveis_acesso[$usuario->getNivelAcessoNome->nivel_usuario];
        
        

        #$nivel_usuario = $usuario->getNivelAcessoNome()['nivel_usuario'];

        # $niveis_acesso_outros = array_diff($niveis_acesso, [$nivel_usuario]);  ['nivel_usuario' => $nivel_usuario]
     
        if ($usuario) {
            return view('administrador.edit-usuario', ['usuario' => $usuario], ['niveis_acesso' => $niveis_acesso]
            #,['nivel_usuario' => $nivel_usuario]
        );
        } else {
            return redirect()->back();
        }

        # return view('administrador.edit-usuario', ['usuario'=> $usuario]);
    }

    public function update(Request $request)
    {

        # Funcionario::findOrFail($request->id)->update($request->all());

        /*$funcionario = Funcionario::findOrFail($request->id);
        $nivel_acesso = $request->input('nivel_acesso');
        $funcionario->cd_nivel_acesso_funcionario = $nivel_acesso;
        $funcionario->save();*/

        $usuario = Funcionario::findOrFail($request->id);

        $nivel_acesso = $request->input('nivel_acesso');

        $usuario->cd_nivel_acesso_funcionario = $nivel_acesso;


        switch ($nivel_acesso) {
            case 'Funcionário':
                $usuario->nivel_acesso = 0;
                break;
            case 'Técnico':
                $usuario->nivel_acesso = 1;
                break;
            case 'Coordenador':
                $usuario->nivel_acesso = 2;
                break;
            case 'Administrador':
                $usuario->nivel_acesso = 3;
                break;
        }
    
        Funcionario::findOrFail($request->id)->update($request->all());
        # $funcionario->update($request->all());

        
        # $funcionario->save();


        return redirect('/dashboard-administrador/gerenciamento')
            ->with('msg', 'Nível de acesso do funcionário Nº ' . $request->id . ' editado com sucesso!');

        /*return redirect('/dashboard-administrador/gerenciamento', ['nivel_acesso'  => $nivel_acesso])->with('msg', 'Nível de acesso do funcionário Nº ' . $request->id . ' editado com sucesso!');*/
    }

    public function destroy($id){

        Funcionario::findOrFail($id)->delete();

        return redirect('/dashboard-administrador/gerenciamento')
            ->with('msg', 'Usuário excluído com sucesso!');
    }
    
}
