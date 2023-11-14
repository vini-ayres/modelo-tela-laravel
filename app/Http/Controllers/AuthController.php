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
        $senha = $request->input('ds_senha_funcionario');

        $funcionario = Funcionario::where('cd_matricula_funcionario', $matricula)->first();

        if ($funcionario) {
            // Verifica se a senha está no formato antigo (não hasheada usando bcrypt)
            if (Hash::needsRehash($funcionario->ds_senha_funcionario)) {
                $funcionario->ds_senha_funcionario = bcrypt($senha);
                $funcionario->save();
            }

            // Verifica a senha usando Hash::check()
            if (Hash::check($senha, $funcionario->ds_senha_funcionario)) {
                // Autenticação bem-sucedida

                Session::put('nomeDoUsuario', $funcionario->nm_funcionario);

                switch ($funcionario->cd_nivel_acesso_funcionario) {
                    case 0:
                        return redirect("/dashboard-funcionario");
                    case 1:
                        return redirect("/dashboard-tecnico");
                    case 2:
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
        $request->session()->flush();
        Auth::logout();
        return redirect('/login');
    }
}
