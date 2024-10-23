<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\HoleriteController;
use App\Http\Controllers\AvisoController;

// Rota para a página inicial
Route::get('/', function () {
    return view('welcome'); 
});

// Rota para opções
Route::get('/opcoes', function () {
    return view('opcoes');
});

// Rota para admin
Route::get('/admin', function () {
    return view('admin');
});

// Rota para a lista de funcionários
Route::resource('funcionarios', FuncionarioController::class);

// Rota Holerite
Route::get('/funcionarios/holerite', [HoleriteController::class, 'mostrarHolerite']);

// Rota para exibir a página de avisos
Route::get('/avisos', [AvisoController::class, 'index'])->name('avisos.index');

// Rota para processar o envio de novos avisos
Route::post('/avisos', [AvisoController::class, 'store'])->name('avisos.store');
