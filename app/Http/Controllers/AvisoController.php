<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AvisoController extends Controller
{
    // Método para exibir a página de criação de avisos
    public function index(Request $request)
    {
        // Recupera os avisos armazenados na sessão, ou um array vazio se não houver
        $avisos = $request->session()->get('avisos', []);
        return view('avisos.indexAdm', compact('avisos')); // Retorna a view com os avisos
    }

    // Método para armazenar um novo aviso
    public function store(Request $request)
    {
        // Valida os dados do formulário
        $request->validate([
            'titulo' => 'required|string|max:255', // Título é obrigatório e deve ter no máximo 255 caracteres
            'mensagem' => 'required|string', // Mensagem é obrigatória
        ]);

        // Recupera os avisos existentes da sessão
        $avisos = $request->session()->get('avisos', []);
        // Adiciona o novo aviso ao array
        $avisos[] = [
            'titulo' => $request->titulo,
            'mensagem' => $request->mensagem,
        ];
        // Atualiza a sessão com os novos avisos
        $request->session()->put('avisos', $avisos);

        // Redireciona de volta para a página de avisos com uma mensagem de sucesso
        return redirect()->route('avisos.index')->with('success', 'Aviso enviado!');
    }
}
