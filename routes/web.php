<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SolicitacaoController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\ListaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\TecnicoController;
use App\Http\Controllers\FormController;
use App\Models\Solicitacao;
use App\Models\OrdemServico;
use App\Models\Tecnico;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::get('/definir-senha', [AuthController::class, 'showPasswordForm']);
Route::post('/definir-senha', [AuthController::class, 'setPassword'])->name('definir-senha');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class,'logout']);

//****************PÁGINAS DO FUNCIONARIO*****************//
Route::prefix('dashboard-funcionario')->group(function () {
    Route::get('form', [FormController::class, 'funcionario']);
    Route::post('form', [SolicitacaoController::class, 'processForm']);
    Route::get('minhas-solicitacoes', [SolicitacaoController::class, 'funcionario']);
});

//****************PÁGINAS DO TÉCNICO*****************//
Route::prefix('dashboard-tecnico')->group(function () {
    Route::get('form', [FormController::class, 'tecnico']);
    Route::post('form', [SolicitacaoController::class, 'processForm']);
    Route::get('minhas-solicitacoes', [SolicitacaoController::class, 'tecnico']);
    Route::get('status', [StatusController::class, 'tecnico']);
    Route::post('/dashboard-tecnico/atualizar-status', [TecnicoController::class, 'atualizarOrdemServico'])->name('atualizar-ordem');
    Route::get('solicitacoes', function(){
        $ordens = Solicitacao::all();
        return view('solicitacoes', ['ordens' => $ordens]);
    });
});

//****************PÁGINAS DO COORDENADOR*****************//
Route::prefix('dashboard-coordenador')->group(function () {
    Route::get('form', [FormController::class, 'coordenador']);
    Route::post('form', [SolicitacaoController::class, 'processForm']);
    Route::get('minhas-solicitacoes', [SolicitacaoController::class, 'coordenador']);
    Route::get('lista', [ListaController::class, 'list']);
    Route::get('edit/{id}',[ListaController::class,'edit']);
    Route::get('export/{id}',[ListaController::class,'exportView']);
    Route::post('export/{id}',[ListaController::class,'export'])->name('export');;
    Route::put('ordem/update/{id}', [ListaController::class, 'update'])->name('ordem.update');
    Route::get('tecnicos', function(){
        $tecnicos = Tecnico::with('funcionario')->get();
        return view('tabela-tecnicos', ['tecnicos' => $tecnicos]);
    });
    Route::get('status', [StatusController::class, 'coordenador']);
});

//****************PÁGINAS DO ADMINISTRADOR*****************//
Route::prefix('dashboard-administrador')->group(function () {
    Route::get('form', [FormController::class, 'administrador']);
    Route::post('form', [SolicitacaoController::class, 'processForm']);
    Route::get('minhas-solicitacoes', [SolicitacaoController::class, 'administrador']);
    Route::get('administrador/perfil/{id}',[ListaController::class,'perfil']);
    Route::get('gerenciamento', [UsuarioController::class, 'usuario']);
    Route::get('administrador/edit-usuario/{id}',[UsuarioController::class,'edit']);
    Route::put('administrador/usuario/update/{id}',[UsuarioController::class,'update'])->name('usuario.update');
    Route::delete('administrador/usuario/delete/{id}',[UsuarioController::class,'destroy']);
});