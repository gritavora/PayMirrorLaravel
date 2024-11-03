<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Holerite</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
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

        /* Container principal */
        .container {
            padding: 80px 20px 20px; /* Espaço para não sobrepor a navbar */
            max-width: 800px;
            margin: auto;
        }

        /* Tabela de detalhes */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #333;
            color: #48b281;
        }

        /* Botões */
        .btn {
            padding: 10px 15px;
            font-size: 1em;
            color: white;
            background-color: #48b281;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
            margin-right: 10px;
            text-decoration: none;
            transition: background-color 0.3s;
            display: inline-block;
        }

        .btn:hover {
            background-color: #5a2d98;
        }

        /* Navbar */
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

        .navbar a, .navbar button {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            border-right: 1px solid #48b281;
            transition: background-color 0.3s ease;
        }

        .navbar a:last-child {
            border-right: none;
        }

        .navbar a:hover, .navbar button:hover {
            background-color: #48b281;
            color: white;
        }
    </style>
</head>
<body class="dark-theme">
    <!-- Navbar -->
    <div class="navbar">
        <a href="/calendario">Calendário</a>
        <a href="/requerimentos">Requerimentos</a>
        <a href="/pontos-hora">Pontos de Hora</a>
        <a href="/avisos">Avisos</a>
        <a href="/sobre-nos">Sobre Nós</a>
        <a href="/colaboradores" class="btn">Voltar</a>
        <button class="theme-toggle-btn" onclick="toggleTheme()">Trocar Tema</button>
    </div>

    <!-- Conteúdo Principal -->
    <div class="container">
        <h1>Holerite</h1>

        <h2>Informações do Trabalhador</h2>
        <p><strong>Nome:</strong> {{ $trabalhador->nome }}</p>
        <p><strong>Cargo:</strong> {{ $trabalhador->cargo }}</p>
        <p><strong>Mês:</strong> {{ $mes }}</p>

        <h2>Detalhes do Holerite</h2>
        <table>
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Salário Bruto ou Salário Base</td>
                    <td>R$ {{ number_format($salarioBruto, 2, ',', '.') }}</td>
                </tr>
                <tr>
                    <td>INSS</td>
                    <td>R$ {{ number_format($inss, 2, ',', '.') }}</td>
                </tr>
                <tr>
                    <td>IRRF</td>
                    <td>R$ {{ number_format($irrf, 2, ',', '.') }}</td>
                </tr>
                <tr>
                    <td>Descontos Totais</td>
                    <td>R$ {{ number_format($inss + $irrf, 2, ',', '.') }}</td>
                </tr>
                <tr>
                    <td>Salário Líquido</td>
                    <td>R$ {{ number_format($salarioBruto - ($inss + $irrf), 2, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>

        <h2>Explicação dos Descontos</h2>
        <p><strong>INSS:</strong> O desconto do INSS é feito para garantir a aposentadoria do trabalhador.</p>
        <p><strong>IRRF:</strong> O Imposto de Renda Retido na Fonte é um imposto federal que incide sobre os rendimentos.</p>
        
        <!-- Botões -->
        <div class="buttons">
            <a href="/colaboradores" class="btn">Voltar</a>
            <button class="btn" onclick="alert('Holerite salvo com sucesso!')">Salvar</button>
        </div>
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
