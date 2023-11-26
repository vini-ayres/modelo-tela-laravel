<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SolicitacaoController;
use App\Http\Controllers\ListaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\TecnicoController;

use App\Http\Controllers\FormController;
use App\Models\Solicitacao;
use App\Models\OrdemServico;

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
//*************** VISAO GERAL DE TODAS VIEWS *****************/
        Route::get('/dashboard-visaogeral', function () {
            return view('dashboard.visaogeral');
        });
        Route::prefix('dashboard-visaogeral')->group(function () {
            Route::get('form', [FormController::class, 'visaogeral']);
            Route::post('form', [SolicitacaoController::class, 'processForm']);

            Route::get('status', [StatusController::class,'status']);

            Route::get('lista', [ListaController::class, 'list']);
            Route::get('edit/{id}',[ListaController::class,'edit']);
            Route::put('ordem/update/{id}',[ListaController::class,'update'])->name('ordem.update');
            Route::get('administrador/perfil/{id}',[ListaController::class,'perfil']);
            

            Route::get('gerenciamento', [UsuarioController::class, 'usuario']);
            Route::get('administrador/edit-usuario/{id}',[UsuarioController::class,'edit']);
            Route::put('administrador/usuario/update/{id}',[UsuarioController::class,'update'])->name('usuario.update');
            Route::delete('administrador/usuario/delete/{id}',[UsuarioController::class,'destroy']);
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
    Route::get('lista', [ListaController::class, 'list']);
    Route::get('edit/{id}',[ListaController::class,'edit']);
    Route::get('export/{id}',[ListaController::class,'exportView']);
    Route::post('export/{id}',[ListaController::class,'export'])->name('export');;
    Route::put('ordem/update/{id}', [ListaController::class, 'update'])->name('ordem.update');
});

//****************PÁGINAS DO ADMINISTRADOR*****************//
Route::prefix('dashboard-administrador')->group(function () {
    Route::get('form', [FormController::class, 'administrador']);
    Route::post('form', [SolicitacaoController::class, 'processForm']);
    Route::get('administrador/perfil/{id}',[ListaController::class,'perfil']);
    Route::get('gerenciamento', [UsuarioController::class, 'usuario']);
    Route::get('administrador/edit-usuario/{id}',[UsuarioController::class,'edit']);
    Route::put('administrador/usuario/update/{id}',[UsuarioController::class,'update'])->name('usuario.update');
    Route::delete('administrador/usuario/delete/{id}',[UsuarioController::class,'destroy']);
});

