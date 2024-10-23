<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    // Método para listar todos os funcionários com pesquisa
    public function index(Request $request)
    {
        $query = $request->input('query');

        $funcionarios = Funcionario::when($query, function($queryBuilder) use ($query) {
            return $queryBuilder->where('nome', 'like', "%{$query}%")
                                 ->orWhere('cargo', 'like', "%{$query}%");
        })->get(); 

        return view('cadastro', compact('funcionarios', 'query'));
    }

    // Método para mostrar o formulário de criação
    public function create()
    {
        return view('funcionario.create');
    }

    // Método para armazenar um novo funcionário
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'cargo' => 'required',
            'jornada_trabalho' => 'required',
        ]);

        Funcionario::create($request->all());

        return redirect()->route('funcionarios.index')->with('success', 'Funcionário adicionado com sucesso!');
    }

    // Método para mostrar o formulário de edição
    public function edit($id)
    {
        $funcionario = Funcionario::findOrFail($id);
        return view('funcionario.edit', compact('funcionario'));
    }

    // Método para atualizar um funcionário
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'cargo' => 'required',
            'jornada_trabalho' => 'required',
        ]);

        $funcionario = Funcionario::findOrFail($id);
        $funcionario->update($request->only(['nome', 'cargo', 'jornada_trabalho']));

        return redirect()->route('funcionarios.index')->with('success', 'Funcionário atualizado com sucesso!');
    }

    // Método para excluir um funcionário
    public function destroy($id)
    {
        $funcionario = Funcionario::findOrFail($id);
        $funcionario->delete();

        return redirect()->route('funcionarios.index')->with('success', 'Funcionário excluído com sucesso!');
    }
}
