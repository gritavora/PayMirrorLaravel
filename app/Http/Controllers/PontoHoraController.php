<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PontoHoraController extends Controller
{
    public function index()
    {
        // Retornar a view de pontos de hora
        return view('admin.pontos-hora'); // Verifique se a view existe
    }

    // Você pode adicionar outros métodos aqui para lidar com as operações necessárias
}
