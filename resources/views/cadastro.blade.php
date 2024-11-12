<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionários - PayMirror</title>
    <style>
        /* Tema escuro (padrão) */
        body.dark-theme {
            font-family: Arial, sans-serif;
            background-color: #000;
            color: white;
            margin: 0;
        }

        .navbar {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #333;
            color: white;
            padding: 10px;
            position: fixed;
            top: 0;
            width: 100%;
            border-bottom: 2px solid #48b281;
            z-index: 1000;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            border-right: 1px solid #48b281;
            transition: background-color 0.3s ease;
        }

        .navbar a:last-child {
            border-right: none;
        }

        .navbar a:hover {
            background-color: #48b281;
            color: white;
        }

        /* Botão de troca de tema */
        .theme-toggle-btn {
            padding: 10px;
            background-color: #48b281;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-left: 15px;
        }

        .theme-toggle-btn:hover {
            background-color: #5a2d98;
        }

        .content {
            padding: 80px 20px 20px;
        }

        /* Tema claro */
        body.light-theme {
            background-color: #f4f4f4;
            color: black;
        }

        .light-theme .navbar {
            background-color: #ddd;
            color: black;
            border-bottom: 2px solid #5a2d98;
        }

        .light-theme .navbar a {
            color: black;
        }

        .light-theme .navbar a:hover {
            background-color: #5a2d98;
            color: white;
        }

        .light-theme .theme-toggle-btn {
            background-color: #5a2d98;
        }

        /* Estilos da barra de pesquisa */
        .search-bar input {
            padding: 10px;
            width: 100%;
            border-radius: 25px;
            border: 1px solid #ccc;
            font-size: 16px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: border 0.3s;
        }

        .search-bar input:focus {
            border: 1px solid #48b281;
            outline: none;
        }

        /* Estilo do botão */
        .button, .voltar-btn {
            padding: 10px 15px;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }

        .button:hover, .voltar-btn:hover {
            background-color: #0056b3;
        }

        .button-add {
            background-color: #6f42c1;
        }

        .button-add:hover {
            background-color: darkviolet;
        }

        /* Tabela */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #333;
            color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s ease;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #555;
        }

        th {
            background-color: #444;
        }

        .light-theme table {
            background-color: white;
            color: black;
        }

        .light-theme th {
            background-color: #ddd;
        }

        .light-theme td {
            border-bottom: 1px solid #ccc;
        }

        /* Mensagem de sucesso */
        .success-message {
            color: #48b281;
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>
</head>
<body class="dark-theme">
<div class="navbar">
        <div class="opcao" onclick="location.href='/funcionarios'">
            <div class="icone"><i class="fas fa-users"></i></div>
            <span>Gerenciar Colaboradores</span>
        </div>
        <a href="/admin/calendario">Calendário</a>
        <a href="/admin/requerimentos">Requerimentos</a>
        <a href="/admin/pontos-hora">Pontos de Hora</a>
        <a href="/admin/avisos">Avisos</a>
        <a href="/admin/sobre-nos">Sobre Nós</a>

        <a href="/admin" class="voltar-btn">Voltar</a>
        <button class="theme-toggle-btn" onclick="toggleTheme()">Trocar Tema</button>
    </div>

    <div class="content">
        <h1>Lista de Funcionários</h1>

        @if (session('success'))
            <p class="success-message">{{ session('success') }}</p>
        @endif

        <a href="{{ route('funcionarios.create') }}" class="button button-add">Admitir</a>

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
            <tbody>
                @forelse ($funcionarios as $funcionario)
                    <tr>
                        <td>{{ $funcionario->nome }}</td>
                        <td>{{ $funcionario->cargo }}</td>
                        <td>{{ $funcionario->jornada_trabalho }}</td>
                        <td>{{ $funcionario->salario }}</td>
                        <td>
                            <a href="{{ route('funcionarios.edit', $funcionario->id) }}" class="button">Atualizar</a>
                            <form action="{{ route('funcionarios.destroy', $funcionario->id) }}" 
                            method="POST" style="display:inline;" 
                            onsubmit="return confirm('Ao dispensar este funcionário os dados correspondentes serão excluídos. Deseja continuar?');">
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
    </div>

    <script>
        function toggleTheme() {
            document.body.classList.toggle("light-theme");
            document.body.classList.toggle("dark-theme");
        }
    </script>
</body>
</html>
