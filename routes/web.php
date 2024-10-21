<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\HoleriteController;

// Rota para a página inicial
Route::get('/', function () {
    return view('welcome'); 
});

// routes/web.php
Route::get('/opcoes', function () {
    return view('opcoes');
});

//routes/admin.php
Route::get('/admin', function (){
    return view('admin');
});

//routes/funcionarios.php
Route::get('/funcionarios', function(){
    return view('funcionarios');
});

//routes/cadastro.php
Route::get('/create', function(){
    return view('create');
});

// Rota Holerite
Route::get('/funcionarios/holerite', [HoleriteController::class, 'mostrarHolerite']);



