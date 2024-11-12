<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requerimento;

class RequerimentoController extends Controller
{
    public function index()
    {
        // Carrega todos os requerimentos com os dados dos usuários relacionados
        $requerimentos = Requerimento::with('user')->get();

        // Passa os requerimentos para a view da administração
        return view('admin.requerimentos', compact('requerimentos'));
    }

    public function indexColaboradores()
    {
        // Carrega os requerimentos do usuário logado
        $requerimentos = Requerimento::where('user_id', auth()->id())->get();

        // Passa os requerimentos para a view dos colaboradores
        return view('colaboradores.requerimentos', compact('requerimentos'));
    }

    public function enviarRequerimento(Request $request)
    {
        // Valida os dados do formulário
        $request->validate([
            'tipo' => 'required|string',
            'descricao' => 'required|string',
        ]);

        // Salva o requerimento no banco de dados
        Requerimento::create([
            'tipo' => $request->tipo,
            'descricao' => $request->descricao,
            'user_id' => auth()->id(), // Atribui o ID do usuário logado
        ]);

        return redirect()->route('colaboradores.requerimentos')->with('status', 'Requerimento enviado com sucesso!');
    }

    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'tipo' => 'required|string',
            'descricao' => 'required|string',
        ]);

        // Criação do requerimento
        Requerimento::create([
            'tipo' => $request->tipo,
            'descricao' => $request->descricao,
            'user_id' => auth()->id(), // Captura o ID do usuário logado
        ]);

        // Redireciona para a página de requerimentos com mensagem de sucesso
        return redirect()->route('colaboradores.requerimentos')->with('status', 'Requerimento criado com sucesso!');
    }
}
