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
    $nome ="Hugo";//essa variavel tem de acessar o banco para mostrar o nome do usuario na hora de entrar
    return view('funcionarios',['nome'=> $nome]);// retorno da variavem dentro de um array de arrow function
});

//routes/cadastro.php
Route::get('/create', function(){
    return view('create');
});

// Rota Holerite
Route::get('/funcionarios/holerite', [HoleriteController::class, 'mostrarHolerite']);



