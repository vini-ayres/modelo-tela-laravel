<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Método para exibir o formulário de login
    public function showLoginForm()
    {
        return view('login');
    }

    // Método para exibir o formulário de definição de senha
    public function showPasswordForm()
    {
        return view('definir-senha');
    }

    // Método para processar o login do usuário
    public function login(Request $request)
    {
        // Obtenha as credenciais do formulário
        $matricula = $request->input('cd_matricula_funcionario');
        $senha = $request->input('nm_senha_funcionario');

        // Busque o funcionário pelo número de matrícula
        $funcionario = Funcionario::where('cd_matricula_funcionario', $matricula)->first();

        if ($funcionario) {
            // Verifica se a senha está no formato antigo (não hasheada usando bcrypt)
            if (Hash::needsRehash($funcionario->nm_senha_funcionario)) {
                $funcionario->nm_senha_funcionario = bcrypt($senha);
                $funcionario->save();
            }

            // Verifica a senha usando Hash::check()
            if (Hash::check($senha, $funcionario->nm_senha_funcionario)) {
                // Autenticação bem-sucedida

                // Configura algumas informações na sessão
                Session::put('nomeDoUsuario', $funcionario->nm_funcionario);
                Session::put('codigoDoUsuario', $matricula);

                // Redireciona com base no nível de acesso do funcionário
                switch ($funcionario->cd_nivel_acesso_funcionario) {
                    case 0:
                        return redirect("/dashboard-funcionario");
                    case 1:
                        return redirect("/dashboard-tecnico");
                    case 2:
                        return redirect("/dashboard-coordenador");
                    case 3:
                        return redirect("/dashboard-administrador");
                    default:
                        // Nível de acesso inválido
                        return redirect('/login')->with('error', 'Nível de acesso inválido');
                }
            }
        }

        // Autenticação falhou
        return redirect('/login')->with('error', 'Número de matrícula ou senha inválidos');
    }

    // Método para definir a senha do usuário
    public function setPassword(Request $request)
    {
        // Obtenha a matrícula e senha do formulário
        $matricula = $request->input('cd_matricula_funcionario');
        $senha = $request->input('nm_senha_funcionario');
    
        // Verifique se o usuário existe
        $funcionario = Funcionario::where('cd_matricula_funcionario', $matricula)->first();
    
        if ($funcionario) {
            // Verifique se a senha ainda não foi definida
            if (is_null($funcionario->nm_senha_funcionario)) {
                // Defina a senha e salve no banco de dados
                $funcionario->nm_senha_funcionario = bcrypt($senha);
                $funcionario->save();
    
                // Opcional: Autentique o usuário após definir a senha
                Auth::login($funcionario);
    
                // Redirecione para a página desejada após definir a senha
                switch ($funcionario->cd_nivel_acesso_funcionario) {
                    case 0:
                        return redirect("/dashboard-funcionario");
                    case 1:
                        return redirect("/dashboard-tecnico");
                    case 2:
                        return redirect("/dashboard-coordenador");
                    case 3:
                        return redirect("/dashboard-administrador");
                    default:
                        // Nível de acesso inválido
                        return redirect('/login')->with('error', 'Nível de acesso inválido');
                }
            } else {
                // A senha já foi definida para este usuário
                return redirect('/login')->with('error', 'A senha já foi definida para este usuário');
            }
        }
    
        // Usuário não encontrado
        return redirect('/sistema-ordem-servico/login')->with('error', 'Número de matrícula inválido');
    }

    // Método para fazer logout do usuário
    public function logout(Request $request)
    {      
        Auth::logout();
        return view('login');
    }
}