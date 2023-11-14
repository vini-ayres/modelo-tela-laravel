<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OSController;

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
    return view('welcome');
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

Route::get('/dashboard-administrador', function () {
    return view('dashboard.administrador');
});

//****************PÁGINAS DO FUNCIONARIO*****************//
Route::prefix('dashboard-funcionario')->group(function () {
    Route::get('form', function(){
        return view('form');
    });
    Route::get('lista', function(){
        return view('lista');
    });
    Route::get('status', function(){
        return view('status');
    });
    Route::get('gerenciamento', function(){
        return view('gerenciamento');
    });
});

//****************PÁGINAS DO TECNICO*****************//
Route::prefix('dashboard-tecnico')->group(function () {
    Route::get('form', function(){
        return view('form');
    });
    Route::get('lista', function(){
        return view('lista');
    });
    Route::get('status', function(){
        return view('status');
    });
    Route::get('gerenciamento', function(){
        return view('gerenciamento');
    });
});

//****************PÁGINAS DO ADMINISTRADOR*****************//
Route::prefix('dashboard-administrador')->group(function () {
    Route::get('form', function(){
        return view('form');
    });
    Route::get('lista', function(){
        return view('lista');
    });
    Route::get('status', function(){
        return view('status');
    });
    Route::get('gerenciamento', function(){
        return view('gerenciamento');
    });
});

