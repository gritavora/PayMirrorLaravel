<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requerimentos - PayMirror</title>
    <style>
        /* Inclua aqui os mesmos estilos da página de administração */
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

        .content {
            padding: 80px 20px 20px;
        }

        /* Estilos adicionais para a página de requerimentos */
        .requerimento {
            background: #333;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 15px;
            color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
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
    </style>
</head>
<body class="dark-theme">
    <div class="navbar">
        <a href="/calendario">Calendário</a>
        <a href="/pontos-hora">Pontos de Hora</a>
        <a href="/avisos">Avisos</a>
        <a href="/sobre-nos">Sobre Nós</a>
        <a href="/" class="voltar-btn">Voltar</a>
        <button class="theme-toggle-btn" onclick="toggleTheme()">Trocar Tema</button>
    </div>

    <div class="content">
        <h1>Requerimentos</h1>
        <div class="requerimento">
            <strong>Tipo de Requerimento:</strong> Férias<br>
            <strong>Data de Solicitação:</strong> 01/11/2024<br>
            <strong>Status:</strong> Aguardando Aprovação<br>
        </div>

        <div class="requerimento">
            <strong>Tipo de Requerimento:</strong> Licença Médica<br>
            <strong>Data de Solicitação:</strong> 15/10/2024<br>
            <strong>Status:</strong> Aprovado<br>
        </div>
    </div>

    <script>
        function toggleTheme() {
            document.body.classList.toggle("light-theme");
            document.body.classList.toggle("dark-theme");
        }
    </script>
</body>
</html>
