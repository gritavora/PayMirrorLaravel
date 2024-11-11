<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendário - PayMirror</title>
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

        /* Estilos do calendário */
        .calendar-container {
            max-width: 800px;
            margin: 80px auto 0; /* Espaço do navbar */
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #4a148c;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Grid do calendário */
        .calendar {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 10px;
            text-align: center;
        }

        /* Dias da semana */
        .calendar .day-header {
            font-weight: bold;
            padding: 10px;
            background-color: #4a148c;
            color: #fff;
            border-radius: 4px;
        }

        /* Dias do mês */
        .calendar .day {
            padding: 15px;
            background-color: #e1bee7;
            border-radius: 4px;
            transition: background-color 0.3s ease;
            cursor: pointer;
        }

        .calendar .day:hover {
            background-color: #d500f9;
            color: #fff;
        }

        /* Dia atual */
        .calendar .today {
            background-color: #4a148c;
            color: #fff;
            font-weight: bold;
        }

       

      
    </style>
</head>
<body class="dark-theme">
<div class="navbar">
<a href="/colaboradores" class="voltar-btn">Perfil</a>
    <a href="{{ route('colaboradores.holerite') }}">Holerite</a>
    <a href="{{ route('colaboradores.calendario') }}">Calendário</a>
    <a href="{{ route('colaboradores.requerimentos') }}">Requerimentos</a>
    <a href="{{ route('colaboradores.pontos-hora') }}">Pontos de Hora</a>
    <a href="{{ route('colaboradores.avisos') }}">Avisos</a>
    <a href="{{ route('colaboradores.sobre-nos') }}">Sobre Nós</a>
</div>


    <div class="content">
        <div class="calendar-container">
            <h1>Calendário</h1>

            <!-- Cabeçalho dos dias da semana -->
            <div class="calendar">
                <div class="day-header">Dom</div>
                <div class="day-header">Seg</div>
                <div class="day-header">Ter</div>
                <div class="day-header">Qua</div>
                <div class="day-header">Qui</div>
                <div class="day-header">Sex</div>
                <div class="day-header">Sáb</div>

                <!-- Exemplo de dias do mês (Substitua pelo loop de dias no backend) -->
                @for ($i = 1; $i <= 30; $i++)
                    <div class="day {{ $i == now()->day ? 'today' : '' }}">{{ $i }}</div>
                @endfor
            </div>

            <!-- Botão Voltar -->
            <a href="/" class="voltar-btn">Voltar</a>
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
