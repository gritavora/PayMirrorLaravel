<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requerimentos - PayMirror</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000; /* Cor de fundo escura */
            color: white; /* Texto em branco */
            margin: 0;
        }

        .navbar {
            display: flex;
            justify-content: center; /* Centraliza sem espaços entre os botões */
            align-items: center; /* Centraliza verticalmente */
            background-color: #333; /* Paleta da página "welcome" */
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
            padding: 80px 20px 20px; /* Espaço para a navbar fixa */
        }

        h1 {
            margin-bottom: 20px;
        }

        .search-bar input {
            padding: 10px;
            width: 100%;
            border-radius: 25px;
            border: 1px solid #ccc;
            font-size: 16px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: border 0.5s, background-color 0.2s;
        }

        .search-bar input {
            width: 100%;
            padding: 10px;
            background-color: #222; /* Cor de fundo escura */
            color: white; /* Texto em branco */
            border: 2px solid #48b281; /* Borda verde */
            border-radius: 25px;
        }

        .search-bar input:focus {
            outline: none;
            background-color: #333; /* Foco mais escuro para o input */
        }

        .form-container {
            background-color: #1a1a1a; /* Fundo escuro para o formulário */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        label {
            display: block;
            margin: 10px 0 5px;
        }

        input, select, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #222; /* Fundo do input escuro */
            color: white; /* Texto do input em branco */
        }

        button {
            padding: 10px 15px;
            color: white;
            background-color: #48b281;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #5a2d98;
        }

        .success-message, .error-message {
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 5px;
        }

        .success-message {
            color: green;
            background-color: #e6ffe6;
        }

        .error-message {
            color: red;
            background-color: #ffe6e6;
        }

        /* Estilo para os requerimentos em box */
        .requerimento {
            background-color: #222; /* Fundo escuro */
            border: 2px solid #48b281; /* Bordas verdes */
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 15px;
        }

        .requerimento strong {
            color: #48b281; /* Cor verde para os títulos */
        }

        .empty-message {
            color: white;
            text-align: center;
            font-size: 18px;
            margin-top: 20px;
        }

        /* Estilos para tema claro */
        .light-theme {
            background-color: #f8f8f8; /* Fundo claro */
            color: black; /* Texto escuro */
        }

        .light-theme .navbar {
            background-color: #f0f0f0; /* Navbar clara */
            border-bottom: 2px solid #48b281;
        }

        .light-theme .navbar a {
            color: black;
            border-right: 1px solid #48b281;
        }

        .light-theme .navbar a:hover {
            background-color: #48b281;
            color: white;
        }

        .light-theme .requerimento {
            background-color: #e6e6e6; /* Fundo claro para requerimentos */
            border: 2px solid #48b281;
        }

        .light-theme button {
            background-color: #48b281;
            color: white;
        }

        .light-theme button:hover {
            background-color: #5a2d98;
        }
    </style>
</head>
<body class="dark-theme">
    <div class="navbar">
        <div class="opcao" onclick="location.href='/funcionarios'">
            <div class="icone"><i class="fas fa-users"></i></div>
        </div>
        <a href="/funcionarios">Gerenciar Colaboradores</a>
        <a href="/admin/calendario">Calendário</a>
        <a href="/admin/requerimentos">Requerimentos</a>
        <a href="/admin/pontos-hora">Pontos de Hora</a>
        <a href="/avisos">Avisos</a>
        <a href="/admin/sobre-nos">Sobre Nós</a>
        <a href="/admin" class="voltar-btn">Voltar</a>
        <button class="theme-toggle-btn" onclick="toggleTheme()">Alterar Tema</button>
    </div>

    <div class="content">
        <h1>Requerimentos</h1>
        
        <!-- Barra de Pesquisa -->
        <div class="search-bar">
            <input type="text" id="search" placeholder="Pesquisar por tipo ou descrição..." oninput="filterRequerimentos()" />
        </div>

        <h2>Lista de Requerimentos</h2>
        
        <!-- Loop para exibir requerimentos -->
        <div id="requerimentos-list">
            @foreach ($requerimentos as $requerimento)
            <div class="requerimento" data-tipo="{{ strtolower($requerimento->tipo) }}" data-descricao="{{ strtolower($requerimento->descricao) }}">
                <strong>Tipo:</strong> {{ $requerimento->tipo }} <br>
                <strong>Descrição:</strong> {{ $requerimento->descricao }} <br>
                <strong>Data de envio:</strong> {{ $requerimento->created_at->format('d/m/Y') }} <br>
                <strong>Usuário:</strong> {{ $requerimento->user->name ?? 'Desconhecido' }} <br>
            </div>
            @endforeach
        </div>

        <!-- Mensagem caso não haja requerimentos -->
        @if ($requerimentos->isEmpty())
        <p class="empty-message">Nenhum requerimento encontrado.</p>
        @endif
    </div>

    <script>
        function toggleTheme() {
            document.body.classList.toggle('light-theme');
            document.body.classList.toggle('dark-theme');
            updateSearchBarBackground(); // Atualiza a cor da barra de pesquisa ao trocar o tema
        }

        function updateSearchBarBackground() {
            const searchInput = document.querySelector('.search-bar input');
            if (document.body.classList.contains('light-theme')) {
                // Se o tema for claro, define o fundo claro
                searchInput.style.backgroundColor = '#f4f4f4';
                searchInput.style.color = 'black';
                searchInput.style.border = '1px solid #ccc'; // Borda mais clara no tema claro
            } else {
                // Se o tema for escuro, define o fundo escuro
                searchInput.style.backgroundColor = '#222';
                searchInput.style.color = 'white';
                searchInput.style.border = '1px solid #48b281'; // Borda mais escura no tema escuro
            }
        }

        function filterRequerimentos() {
            let searchTerm = document.getElementById("search").value.toLowerCase();
            let requerimentos = document.querySelectorAll(".requerimento");

            requerimentos.forEach(function(requerimento) {
                let tipo = requerimento.getAttribute("data-tipo");
                let descricao = requerimento.getAttribute("data-descricao");

                if (tipo.includes(searchTerm) || descricao.includes(searchTerm)) {
                    requerimento.style.display = "block"; // Exibe o requerimento
                } else {
                    requerimento.style.display = "none"; // Oculta o requerimento
                }
            });
        }
    </script>
</body>
</html>
