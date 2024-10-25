<!DOCTYPE html>
<html>
<head>
    <title>Funcionários</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .search-bar {
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }
        .search-bar input[type="text"] {
            padding: 10px;
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 25px;
            margin-right: 10px;
            font-size: 16px;
        }
        .success-message {
            color: green;
            margin-bottom: 20px;
        }
        .button {
            padding: 10px 15px;
            margin: 5px;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .button:hover {
            background-color: #0056b3;
        }
        .button-add {
            margin-bottom: 20px;
            background-color: purple;
        }
        .button-add:hover {
            background-color: darkviolet;
        }
    </style>
</head>
<body>
    <h1>Lista de Funcionários</h1>

    @if (session('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif

    <!-- Botão Adicionar Funcionário no canto esquerdo -->
    <a href="{{ route('funcionarios.create') }}" class="button button-add">Admitir</a>

    <!-- Barra de pesquisa -->
    <form method="GET" action="{{ route('funcionarios.index') }}" class="search-bar">
        <input type="text" name="query" value="{{ old('query', $query) }}" placeholder="Pesquisar funcionários..." required>
        <button type="submit" class="button" style="background-color: green;">Pesquisar</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Cargo</th>
                <th>Jornada de Trabalho</th>
                <th>Salário</th>
                <th>Ações</th>
            </tr>
        </thead>
        <a href="/opcoes" class="voltar-btn">Voltar</a>
        <tbody>
            @forelse ($funcionarios as $funcionario)
                <tr>
                    <td>{{ $funcionario->nome }}</td>
                    <td>{{ $funcionario->cargo }}</td>
                    <td>{{ $funcionario->jornada_trabalho }}</td>
                    <td>{{ $funcionario->Salario }}</td>
                    <td>
                        <a href="{{ route('funcionarios.edit', $funcionario->id) }}" class="button">Atualizar</a>
                        <form action="{{ route('funcionarios.destroy', $funcionario->id) }}" 
                        method="POST" style="display:inline;" 
                        onsubmit="return confirm('Ao dispensar este funcionário os dados correpondentes serão excluidos.Deseja continuar? ');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button" style="background-color: red;">Demitir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center;">Nenhum funcionário encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
</body>
</html>
