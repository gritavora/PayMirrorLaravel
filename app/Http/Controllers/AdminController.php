<?php namespace App\Http\Controllers;

use App\Models\Requerimento; // Certifique-se de importar seu modelo
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function showRequerimentos()
    {
        // Supondo que você tenha um modelo Requerimento
        $requerimentos = Requerimento::all(); // Buscando todos os requerimentos

        return view('requerimentos.admin', compact('requerimentos'));
    }
}
