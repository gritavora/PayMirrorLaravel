<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\HoleriteController;
use App\Http\Controllers\AvisoController;
use App\Http\Controllers\AuthController;

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

// Rota para colaboradores com proteção de autenticação
Route::middleware('auth')->group(function () {
    Route::get('/colaboradores', function() {
        $nome = Auth::user()->name;
        return view('colaboradores', ['nome' => $nome]);
    });

    // Rota para upload da foto de perfil com proteção de autenticação
    Route::post('/upload-profile-picture', [UserController::class, 'uploadProfilePicture'])
        ->name('upload.profile.picture');

    // Rota Holerite
    Route::get('/colaboradores/holerite', [HoleriteController::class, 'mostrarHolerite'])
        ->name('colaboradores.holerite');
});

// Rota para a lista de funcionários
Route::resource('funcionarios', FuncionarioController::class);

// Rota para exibir a página de avisos
Route::get('/avisos', [AvisoController::class, 'index'])->name('avisos.index');
Route::post('/avisos', [AvisoController::class, 'store'])->name('avisos.store');

// Rota para página de administração
Route::get('/admin/indexAdm', function(){
    return view('indexAdmin');
});

// Rota de autenticação para login
Route::post('/login', [AuthController::class, 'login']);

Route::get('/pontos-hora', function(){
    return view('pontos-hora');
});

Route::get('/requerimentos', function(){
    return view('requerimentos');
});
