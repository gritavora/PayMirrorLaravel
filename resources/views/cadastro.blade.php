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
    </style>
</head>
<body>
    <h1>Lista de Funcionários</h1>

    @if (session('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif

    <!-- Barra de pesquisa -->
    <form method="GET" action="{{ route('funcionarios.index') }}" class="search-bar">
        <input type="text" name="query" value="{{ old('query', $query) }}" placeholder="Pesquisar funcionários..." required>
        <button type="submit" class="button">Pesquisar</button>
    </form>

    <a href="{{ route('funcionarios.create') }}" class="button">Adicionar Funcionário</a>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Cargo</th>
                <th>Jornada de Trabalho</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($funcionarios as $funcionario)
                <tr>
                    <td>{{ $funcionario->nome }}</td>
                    <td>{{ $funcionario->cargo }}</td>
                    <td>{{ $funcionario->jornada_trabalho }}</td>
                    <td>
                        <a href="{{ route('funcionarios.edit', $funcionario->id) }}" class="button">Editar</a>
                        <form action="{{ route('funcionarios.destroy', $funcionario->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir este funcionário?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button" style="background-color: red;">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align: center;">Nenhum funcionário encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
