<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requerimentos - PayMirror</title>
    <style>
        /* Estilos existentes */
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

        .requerimento {
            background: #333;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 15px;
            color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s ease;
        }

        .light-theme .requerimento {
            background: white;
            color: black;
        }

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
        <a href="/avisos">Avisos</a>
        <a href="/admin/sobre-nos">Sobre Nós</a>

        <a href="/admin" class="voltar-btn">Voltar</a>
        <button class="theme-toggle-btn" onclick="toggleTheme()">Trocar Tema</button>
    </div>

    <div class="content">
        <h1>Requerimentos</h1>
        <div class="search-bar">
            <input type="text" placeholder="Pesquisar Requerimento..." id="searchInput">
        </div>

        <!-- Exemplo de requerimentos -->
        <div class="requerimento">
            <strong>ID:</strong> 1<br>
            <strong>Tipo:</strong> Solicitação de Férias<br>
            <strong>Descrição:</strong> Requerimento para férias de 15 dias.<br>
            <strong>Usuário:</strong> João Silva<br>
            <strong>Criado em:</strong> 01/11/2024 10:00<br>
        </div>

        <div class="requerimento">
            <strong>ID:</strong> 2<br>
            <strong>Tipo:</strong> Solicitação de Afastamento<br>
            <strong>Descrição:</strong> Afastamento para tratamento médico.<br>
            <strong>Usuário:</strong> Maria Oliveira<br>
            <strong>Criado em:</strong> 02/11/2024 14:30<br>
        </div>

        <a href="/admin" class="voltar-btn">Voltar para o Admin</a>
    </div>

    <script>
        function toggleTheme() {
            document.body.classList.toggle("light-theme");
            document.body.classList.toggle("dark-theme");
        }
    </script>
</body>
</html>
