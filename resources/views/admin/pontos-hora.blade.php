<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pontos de Hora - PayMirror</title>
    <style>
        /* Aqui você pode adicionar o CSS que você já tem ou referenciar um arquivo CSS externo */
        /* Incluindo o estilo da página de administração */

        /* Tema escuro (padrão) */
        body.dark-theme {
            font-family: Arial, sans-serif;
            background-color: #000;
            color: white;
            margin: 0;
        }

        .navbar {
            display: flex;
            justify-content: center; /* Centraliza os elementos */
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
            display: flex;
            align-items: center;
            justify-content: center;
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

        /* Cartão de funcionário */
        .funcionario {
            background: #333;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 15px;
            color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s ease;
        }

        .light-theme .funcionario {
            background: white;
            color: black;
        }

        /* Botão de voltar */
        .voltar-btn {
            background-color: #6f42c1;
            color: white;
            padding: 10px 20px;
            border: none;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .voltar-btn:hover {
            background-color: #48b281;
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

        /* Estilo da tabela */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }

        th {
            background-color: #48b281;
            color: white;
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
        <h1>Pontos de Hora</h1>
        <p>Aqui você pode gerenciar os pontos de hora dos funcionários.</p>

        <div class="search-bar">
            <input type="text" placeholder="Pesquisar Funcionário, Cargo..." id="searchInput">
        </div>

        <table>
            <thead>
                <tr>
                    <th>Funcionário</th>
                    <th>Cargo</th>
                    <th>Pontos de Hora</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>João Silva</td>
                    <td>Desenvolvedor</td>
                    <td>40</td>
                    <td><button>Editar</button> <button>Excluir</button></td>
                </tr>
                <tr>
                    <td>Maria Oliveira</td>
                    <td>Gerente de Projetos</td>
                    <td>35</td>
                    <td><button>Editar</button> <button>Excluir</button></td>
                </tr>
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
