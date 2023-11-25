<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SolicitacaoController;
use App\Http\Controllers\ListaController;
use App\Http\Controllers\UsuarioController;


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
    Route::get('form', function () {
        return view('funcionario.form');
    });

    Route::post('form', [SolicitacaoController::class, 'processForm']);
    
    Route::get('status', function(){
        return view('funcionario.status');
    });
});

//****************PÁGINAS DO TÉCNICO*****************//
Route::prefix('dashboard-tecnico')->group(function () {
    Route::get('form', function () {
        return view('tecnico.form');
    });

    Route::post('form', [SolicitacaoController::class, 'processForm']);

    Route::get('lista', function(){
        return view('tecnico.lista');
    });
    Route::get('status', function(){
        return view('tecnico.status');
    });
});

//****************PÁGINAS DO COORDENADOR*****************//
Route::prefix('dashboard-coordenador')->group(function () {
    Route::get('form', function () {
        return view('coordenador.form');
    });

    Route::post('form', [SolicitacaoController::class, 'processForm']);

    Route::get('lista', function(){
        return view('coordenador.lista');
    });
    Route::get('status', function(){
        return view('coordenador.status');
    });
});

//****************PÁGINAS DO ADMINISTRADOR*****************//
Route::prefix('dashboard-administrador')->group(function () {
    Route::get('form', function () {
        return view('administrador.form');
    });
    
    Route::post('form', [SolicitacaoController::class, 'processForm']);

    Route::get('lista', [ListaController::class, 'list']);
    Route::get('administrador/edit/{id}',[ListaController::class,'edit']);
    Route::put('administrador/ordem/update/{id}',[ListaController::class,'update'])->name('ordem.update');
    Route::get('administrador/perfil/{id}',[ListaController::class,'perfil']);
    

    Route::get('status', function(){
        return view('administrador.status');
    });

    Route::get('gerenciamento', [UsuarioController::class, 'usuario']);
    Route::get('administrador/edit-usuario/{id}',[UsuarioController::class,'edit']);
    Route::put('administrador/usuario/update/{id}',[UsuarioController::class,'update'])->name('usuario.update');
    Route::delete('administrador/usuario/delete/{id}',[UsuarioController::class,'destroy']);
});

