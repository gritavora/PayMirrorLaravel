<?php

namespace App\Http\Controllers;

use App\Models\Requerimento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequerimentoController extends Controller
{
    // Método para exibir os requerimentos do colaborador
    public function indexColaboradores()
    {
        $requerimentos = Requerimento::where('user_id', Auth::id())->get(); // Pega os requerimentos do colaborador
        return view('colaboradores.requerimentos', compact('requerimentos'));
    }

    // Método para salvar um requerimento
    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required',
            'descricao' => 'required',
        ]);

        Requerimento::create([
            'user_id' => Auth::id(),
            'tipo' => $request->tipo,
            'descricao' => $request->descricao,
            'status' => 'pendente', // Status inicial
        ]);

        return redirect()->route('colaboradores.requerimentos')->with('success', 'Requerimento enviado com sucesso!');
    }

    // Método para o admin ver todos os requerimentos e responder
    public function indexAdmin()
    {
        $requerimentos = Requerimento::all();
        return view('admin.requerimentos', compact('requerimentos'));
    }

    // Método para responder ao requerimento
    public function responder(Request $request, $id)
    {
        $requerimento = Requerimento::findOrFail($id);
        $requerimento->resposta = $request->resposta;
        $requerimento->status = 'respondido';
        $requerimento->save();

        return redirect()->route('admin.requerimentos')->with('success', 'Resposta enviada!');
    }

    // Método para finalizar o requerimento pelo colaborador
    public function finalizar($id)
    {
        $requerimento = Requerimento::findOrFail($id);
        $requerimento->status = 'finalizado';
        $requerimento->save();

        return redirect()->route('colaboradores.requerimentos')->with('success', 'Requerimento finalizado com sucesso!');
    }
}
