<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\HoleriteController;
use App\Http\Controllers\AvisoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SobreNosController; // Certifique-se de importar o controlador
use App\Http\Controllers\RequerimentoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PontoHoraController;

Route::middleware(['web'])->group(function () {
    // suas rotas aqui
    
    
    // Rota para a página inicial
    Route::get('/', function () {
        return view('welcome'); 
    });

    
// Rota para admin
Route::get('/admin/index', [AdminController::class, 'index']);


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
Route::get('/admin/avisos', [AvisoController::class, 'index'])->name('admin.avisos');
Route::post('/admin/avisos', [AvisoController::class, 'store'])->name('avisos.store');

// Rota para página de administração
Route::get('/admin/indexAdm', function(){
    return view('indexAdmin');
});

// Rota de autenticação para login
Route::post('/login', [AuthController::class, 'login']);

Route::get('/admin/pontos-hora', [Usercontroller::class, 'pontos-hora'])->name('admin.pontos-hora');


// Rota para a página de requerimentos dos funcionários



Route::get('/admin/calendario', [UserController::class, 'calendario'])->name('calendario');

Route::get('/colaboradores/calendario', [UserController::class, 'calendarioColaboradores'])->name('colaboradores.calendario');


// Agrupando as rotas com o prefixo 'admin'
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.index'); // Página inicial da área de administração
    })->name('admin.index');
    
    Route::get('/avisos', [AvisoController::class, 'index'])->name('admin.avisos');
    Route::get('/pontos-hora', [PontoHoraController::class, 'index'])->name('admin.pontos-hora');
    Route::get('/requerimentos', [RequerimentoController::class, 'index'])->name('admin.requerimentos');
    Route::get('/sobre-nos', [SobreNosController::class, 'index'])->name('admin.sobre-nos');

});



Route::get('/colaboradores', function () {
    return view('colaboradores.index'); // Atualize o nome conforme necessário
})->name('colaboradores.index');


Route::get('/colaboradores/requerimentos', [RequerimentoController::class, 'indexColaboradores'])->name('colaboradores.requerimentos');
Route::post('/colaboradores/requerimentos', [RequerimentoController::class, 'store']);

Route::get('/colaboradores/holerite', [HoleriteController::class, 'index'])->name('colaboradores.holerite');
// Rota para a página de requerimentos


// Rota para a página de pontos de hora
Route::get('/colaboradores/pontos-hora', function () {
    return view('colaboradores.pontos-hora');
})->name('colaboradores.pontos-hora');

// Rota para a página de avisos
Route::get('/avisos', [AvisoController::class, 'indexColaboradores'])->name('colaboradores.avisos');
// Rota para a página "Sobre Nós"
Route::get('/colaboradores/sobre-nos', function () {
    return view('colaboradores.sobre-nos');
})->name('colaboradores.sobre-nos');

});