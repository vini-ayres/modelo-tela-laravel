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
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $matricula = $request->input('cd_matricula_funcionario');
        $senha = $request->input('nm_senha_funcionario');

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
                
                // Define o tempo de vida da sessão para 60 minutos (ou o valor desejado em minutos)
                $tempoDeVidaEmMinutos = 60;
                config(['session.lifetime' => $tempoDeVidaEmMinutos]);

                Session::put('nomeDoUsuario', $funcionario->nm_funcionario);
                Session::put('codigoDoUsuario', $matricula);

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


    public function logout(Request $request)
    {      
        Auth::logout();
        return redirect('/login');
    }
}
