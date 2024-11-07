<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requerimento;

class RequerimentoController extends Controller
{
   
public function index()
{
 // Carregar os requerimentos com os usuários

    return view('admin.requerimentos');
}

public function indexColaboradores()
{
     // Carregar os requerimentos com os usuários

    return view('colaboradores.requerimentos');
}

public function mostrarRequerimentos()
    {
        // Retorna a view do formulário de requerimento
        return view('colaboradores.requerimentos');
    }

    public function enviarRequerimento(Request $request)
    {
        // Processa os dados do formulário
        $request->validate([
            'tipo' => 'required|string',
            'descricao' => 'required|string',
        ]);

        // Aqui você pode salvar o requerimento no banco de dados, enviar notificações, etc.

        return redirect()->route('colaboradores.requerimentos')->with('status', 'Requerimento enviado com sucesso!');
    }
    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required|string',
            'descricao' => 'required|string',
        ]);

        // Salva o novo requerimento
        Requerimento::create([
            'tipo' => $request->tipo,
            'descricao' => $request->descricao,
        ]);

        // Redireciona para a mesma página para atualizar a lista de requerimentos
        return redirect()->route('colaboradores.requerimentos');
    }
    
}
