<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Avisos - Admin</title>
    <style>
        /* Tema escuro (padrão) */
        body.dark-theme {
            font-family: Arial, sans-serif;
            background-color: #000;
            color: white;
            margin: 0;
        }

        /* Tema claro */
        body.light-theme {
            background-color: #f4f4f4;
            color: black;
        }

        /* Estilo do título */
        h1, h2 {
            color: #48b281;
        }

        /* Navbar */
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

        /* Campo de título e mensagem */
        input[type="text"], textarea {
            width: 100%;
            border-radius: 8px;
            padding: 10px;
            border: 1px solid #ccc;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Botões */
        button, .btn-voltar {
            background-color: #48b281;
            color: white;
            border: none;
           
            padding: 10px 15px;
            cursor: pointer;
            text-decoration: none;
            margin-top: 10px;
          
        }

        button:hover, .btn-voltar:hover {
            background-color: #5a2d98;
        }

        .content {
            padding: 80px 20px 20px; /* Espaçamento para não sobrepor a navbar */
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
        <h1>Criar Aviso</h1>
        
        {{-- Exibe uma mensagem de sucesso se existir --}}
        @if(session('success'))
            <p>{{ session('success') }}</p>
        @endif

        {{-- Formulário para criar um novo aviso --}}
        <form action="{{ route('avisos.store') }}" method="POST">
            @csrf {{-- Protege contra CSRF (Cross-Site Request Forgery) --}}
            
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" required><br><br>

            <label for="mensagem">Mensagem:</label><br>
            <textarea name="mensagem" required></textarea><br><br>

            <button type="submit">Enviar Aviso</button>
        </form>

        <h2>Avisos Enviados</h2>
        {{-- Exibe todos os avisos enviados --}}
        @foreach($avisos as $aviso)
            <div>
                <h3>{{ $aviso['titulo'] }}</h3>
                <p>{{ $aviso['mensagem'] }}</p>
                <hr>
            </div>
        @endforeach
    </div>

    <script>
        // Função para alternar entre tema claro e escuro
        function toggleTheme() {
            document.body.classList.toggle("light-theme");
            document.body.classList.toggle("dark-theme");
        }
    </script>
</body>
</html>
