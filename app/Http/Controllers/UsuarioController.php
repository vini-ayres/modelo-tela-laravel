<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    // Método para exibir todos os usuários
    public function usuario()
    {
        // Pegando todos os dados da tabela funcionario
        $usuarios = Funcionario::all();

        return view('gerenciamento', ['usuarios' => $usuarios]);
    }

    // Método para exibir o formulário de edição de um usuário
    public function edit($id)
    {
        // Encontra o usuário pelo ID
        $usuario = Funcionario::findOrFail($id);
        
        // Obtém os níveis de acesso disponíveis
        $niveis_acesso = $usuario->getNivelAcessoNome();

        // Verifica se o usuário foi encontrado
        if ($usuario) {
            // Retorna a view de edição com os dados do usuário e os níveis de acesso disponíveis
            return view('edit-usuario', ['usuario' => $usuario, 'niveis_acesso' => $niveis_acesso]);
        } else {
            // Redireciona de volta se o usuário não for encontrado
            return redirect()->back();
        }
    }

    // Método para atualizar as informações de um usuário
    public function update(Request $request)
    {
        // Encontra o usuário pelo ID
        $usuario = Funcionario::findOrFail($request->id);
    
        // Puxa o campo nivel_acesso do request
        $nivel_acesso = $request->input('nivel_acesso');
    
        // Converte nivel_acesso para o valor numérico correspondente
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
                // Lidar com outros casos ou definir um valor padrão, se necessário
                break;
        }
    
        // Atualiza outros campos
        $usuario->fill($request->except('nivel_acesso'));
    
        // Salva as alterações
        $usuario->save();
    
        return redirect('/dashboard-administrador/gerenciamento')
            ->with('msg', 'Nível de acesso do funcionário Nº ' . $request->id . ' editado com sucesso!');
    }

    // Método para excluir um usuário
    public function destroy($id)
    {
        // Encontra o usuário pelo ID e o exclui
        Funcionario::findOrFail($id)->delete();

        return redirect('/dashboard-administrador/gerenciamento')
            ->with('msg', 'Usuário excluído com sucesso!');
    }
}