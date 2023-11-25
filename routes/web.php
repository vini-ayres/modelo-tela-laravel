<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SolicitacaoController;
use App\Http\Controllers\TecnicoController;
use App\Http\Controllers\FormController;
use App\Models\OrdemServico;
use App\Models\Solicitacao;

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
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class,'logout']);

Route::get('/dashboard-funcionario', function () {
    return view('dashboard.funcionario');
});

Route::get('/dashboard-tecnico', function () {
    return view('dashboard.tecnico');
});

Route::get('/dashboard-coordenador', function () {
    return view('dashboard.coordenador');
});

Route::get('/dashboard-administrador', function () {
    return view('dashboard.administrador');
});

//****************PÁGINAS DO FUNCIONARIO*****************//
Route::prefix('dashboard-funcionario')->group(function () {
    Route::get('form', [FormController::class, 'funcionario']);
    Route::post('form', [SolicitacaoController::class, 'processForm']);
});

//****************PÁGINAS DO TÉCNICO*****************//
Route::prefix('dashboard-tecnico')->group(function () {
    Route::get('form', [FormController::class, 'tecnico']);
    Route::post('form', [SolicitacaoController::class, 'processForm']);
    Route::get('status', function(){
        $dadosOrdem = OrdemServico::all();
        return view('status', ['dadosOrdem' => $dadosOrdem]);
    });
    Route::post('/dashboard-tecnico/status', [TecnicoController::class, 'atualizarStatus'])->name('atualizar-status');
});

//****************PÁGINAS DO COORDENADOR*****************//
Route::prefix('dashboard-coordenador')->group(function () {
    Route::get('form', [FormController::class, 'coordenador']);
    Route::post('form', [SolicitacaoController::class, 'processForm']);
    Route::get('lista', function(){
        return view('lista');
    });
});

//****************PÁGINAS DO ADMINISTRADOR*****************//
Route::prefix('dashboard-administrador')->group(function () {
    Route::get('form', [FormController::class, 'administrador']);
    Route::post('form', [SolicitacaoController::class, 'processForm']);
    Route::get('gerenciamento', function(){
        return view('gerenciamento');
    });
});

