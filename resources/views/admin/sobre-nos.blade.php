<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nós - PayMirror</title>
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

        /* Botão de volta */
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
        <a href="/funcionarios">Gerenciar Colaboradores</a>
        <a href="/admin/calendario">Calendário</a>
        <a href="/admin/requerimentos">Requerimentos</a>
        <a href="/admin/pontos-hora">Pontos de Hora</a>
        <a href="/admin/avisos">Avisos</a>
        <a href="/admin/sobre-nos">Sobre Nós</a>

        <a href="/" class="voltar-btn">Voltar</a>
        <button class="theme-toggle-btn" onclick="toggleTheme()">Trocar Tema</button>
    </div>

    <div class="content">
        <h1>Sobre Nós</h1>
        <p>Bem-vindo à PayMirror! Nossa missão é fornecer soluções inovadoras e eficientes para gestão de pagamentos e recursos humanos.</p>
        <p>Acreditamos que a tecnologia pode transformar a maneira como as empresas gerenciam suas operações. Com uma equipe dedicada e apaixonada, trabalhamos todos os dias para oferecer as melhores ferramentas e serviços para nossos clientes.</p>
        <p>Obrigado por escolher a PayMirror!</p>
    </div>

    <script>
        function toggleTheme() {
            document.body.classList.toggle("light-theme");
            document.body.classList.toggle("dark-theme");
        }
    </script>
</body>
</html>
