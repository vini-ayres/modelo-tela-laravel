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

        return view('gerenciamento', ['usuarios' => $usuarios]);
    }

    public function edit($id)
    {
        $usuario = Funcionario::findOrFail($id);
        $niveis_acesso = $usuario->getNivelAcessoNome();

        if ($usuario) {
            return view('edit-usuario', ['usuario' => $usuario], ['niveis_acesso' => $niveis_acesso]
            #,['nivel_usuario' => $nivel_usuario]
        );
        } else {
            return redirect()->back();
        }
    }

    public function update(Request $request)
    {
        $usuario = Funcionario::findOrFail($request->id);
    
        // Extract nivel_acesso from the request
        $nivel_acesso = $request->input('nivel_acesso');
    
        // Convert nivel_acesso to the corresponding numerical value
        switch ($nivel_acesso) {
            case 'Funcionário':
                $usuario->cd_nivel_acesso_funcionario = 0;
                break;
            case 'Técnico':
                $usuario->cd_nivel_acesso_funcionario = 1;
                break;
            case 'Coordenador':
                $usuario->cd_nivel_acesso_funcionario = 2;
                break;
            case 'Administrador':
                $usuario->cd_nivel_acesso_funcionario = 3;
                break;
            default:
                // Handle any other cases or set a default value if needed
                break;
        }
    
        // Update other fields
        $usuario->fill($request->except('nivel_acesso'));
    
        // Save the changes
        $usuario->save();
    
        return redirect('/dashboard-administrador/gerenciamento')
            ->with('msg', 'Nível de acesso do funcionário Nº ' . $request->id . ' editado com sucesso!');
    }

    public function destroy($id){

        Funcionario::findOrFail($id)->delete();

        return redirect('/dashboard-administrador/gerenciamento')
            ->with('msg', 'Usuário excluído com sucesso!');
    }
}
