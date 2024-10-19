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
    </style>
</head>
<body>
    <h1>Lista de Funcionários</h1>

    @if (session('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif

    <!-- Barra de pesquisa -->
    <form method="GET" action="{{ route('funcionarios.index') }}" class="search-bar">
        <input type="text" name="query" value="{{ old('query', $query) }}" placeholder="Pesquisar funcionários...">
        <button type="submit">Pesquisar</button>
    </form>

    <a href="{{ route('funcionarios.create') }}">Adicionar Funcionário</a>

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
            @foreach ($funcionarios as $funcionario)
                <tr>
                    <td>{{ $funcionario->nome }}</td>
                    <td>{{ $funcionario->cargo }}</td>
                    <td>{{ $funcionario->jornada_trabalho }}</td>
                    <td>
                        <a href="{{ route('funcionarios.edit', $funcionario->id) }}">Editar</a>
                        <form action="{{ route('funcionarios.destroy', $funcionario->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
