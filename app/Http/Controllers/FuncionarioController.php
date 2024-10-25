<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public function holerite(Request $request)
    {
        // Aqui você pode buscar os dados do trabalhador
        $trabalhador = Funcionario::findOrFail($request->user()->id); // Exemplo
        $mes = 'Outubro'; // Defina o mês como necessário
        $salarioBruto = 5000; // Exemplo
        $inss = $salarioBruto * 0.08; // Exemplo
        $irrf = ($salarioBruto - $inss) * 0.15; // Exemplo

        return view('holerite', compact('trabalhador', 'mes', 'salarioBruto', 'inss', 'irrf'));
    }

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
        return view('create');
    }

    // Método para armazenar um novo funcionário
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'cargo' => 'required',
            'jornada_trabalho' => 'required',
            'Salario' => 'required',
        ]);

        Funcionario::create($request->all());

        return redirect()->route('funcionarios.index')->with('success', 'Funcionário adicionado com sucesso!');
    }

    // Método para mostrar o formulário de edição
    public function edit($id)
    {
        $funcionario = Funcionario::findOrFail($id);
        return view('edit', compact('funcionario'));
    }

    // Método para atualizar um funcionário
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'cargo' => 'required',
            'jornada_trabalho' => 'required',
            'Salario' => 'required',
        ]);

        $funcionario = Funcionario::findOrFail($id);
        $funcionario->update($request->only(['nome', 'cargo', 'jornada_trabalho', 'Salario']));

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
