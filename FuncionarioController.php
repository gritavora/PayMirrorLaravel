<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    // Método para listar todos os funcionários com pesquisa
    public function index(Request $request)
    {
        $query = $request->input('query'); // Obtém a consulta de pesquisa

        // Filtra os funcionários com base na consulta
        $funcionarios = Funcionario::when($query, function($queryBuilder) use ($query) {
            return $queryBuilder->where('nome', 'like', "%{$query}%")
                                 ->orWhere('cargo', 'like', "%{$query}%");
        })->get(); 

        return view('cadastro', compact('funcionarios', 'query')); // Retorna a view com a lista filtrada
    }

    // Método para mostrar o formulário de criação
    public function create()
    {
        return view('funcionario.create'); // Retorna a view para criar um funcionário
    }

    // Método para armazenar um novo funcionário
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'nome' => 'required',
            'cargo' => 'required',
            'jornada_trabalho' => 'required',
        ]);

        // Criação do funcionário
        Funcionario::create($request->all());

        // Redirecionamento com mensagem de sucesso
        return redirect()->route('funcionarios.index')->with('success', 'Funcionário adicionado com sucesso!');
    }

    // Método para mostrar o formulário de edição
    public function edit($id)
    {
        $funcionario = Funcionario::findOrFail($id); // Busca o funcionário pelo ID
        return view('funcionario.edit', compact('funcionario')); // Retorna a view de edição
    }

    // Método para atualizar um funcionário
    public function update(Request $request, $id)
    {
        // Validação dos dados
        $request->validate([
            'nome' => 'required',
            'cargo' => 'required',
            'jornada_trabalho' => 'required',
        ]);

        $funcionario = Funcionario::findOrFail($id); // Busca o funcionário
        $funcionario->update($request->all()); // Atualiza os dados

        // Redirecionamento com mensagem de sucesso
        return redirect()->route('funcionarios.index')->with('success', 'Funcionário atualizado com sucesso!');
    }

    // Método para excluir um funcionário
    public function destroy($id)
    {
        $funcionario = Funcionario::findOrFail($id); // Busca o funcionário
        $funcionario->delete(); // Exclui o funcionário

        // Redirecionamento com mensagem de sucesso
        return redirect()->route('funcionarios.index')->with('success', 'Funcionário excluído com sucesso!');
    }
}
