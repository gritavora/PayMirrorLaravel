<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionário</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
        }
        .navbar {
            display: flex;
            background-color: #006400;
            padding: 10px;
            color: white;
        }
        .navbar a {
            margin: 0 15px;
            color: white;
            text-decoration: none;
        }
        .content {
            padding: 20px;
        }
        h1 {
            margin-bottom: 20px;
        }
        .voltar-btn {
            background-color: #6f42c1;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            margin-bottom: 20px;
            display: inline-block;
        }
        .voltar-btn:hover {
            background-color: #5a2d98;
        }
        .profile-container {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .profile-pic {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-color: #ccc;
            margin-right: 20px;
        }
        .info {
            background-color: white;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
<div class="navbar">
    <a href="{{ route('colaboradores.holerite') }}">Holerite</a>
    <a href="/#funcionarios/calendario">Calendário</a>
    <a href="/funcionarios/requerimentos">Requerimentos</a>
    <a href="/funcionarios/pontos-hora">Pontos de Hora</a>
    <a href="/funcionarios/avisos">Avisos</a>
    <a href="/funcionarios/sobre-nos">Sobre Nós</a>
    <a href="/opcoes" class="voltar-btn">Voltar</a>
</div>

    <div class="content">
        <h1>Olá {{$nome}}, no que posso ajudar hoje?</h1>

        <div class="profile-container">
            <div class="profile-pic">
                <img src="{{ asset('imgLogo/Agatha.png') }}" alt="Foto de Perfil" style="width: 100%; height: 100%; border-radius: 50%;">
            </div>
            <div class="info">
                <p><strong>Nome:</strong> {{$nome}}</p>
                <p><strong>Data de Nascimento:</strong> {{$dataNascimento ?? '---'}}</p>
                <p><strong>Endereço:</strong> {{$endereco ?? '---'}}</p>
                <p><strong>Data de Início de Contrato:</strong> {{$dataInicioContrato ?? '---'}}</p>
                <p><strong>Data de Término de Contrato:</strong> {{$dataTerminoContrato ?? '---'}}</p>
                <p><strong>Nome da Mãe:</strong> {{$nomeMae ?? '---'}}</p>
                <p><strong>Nome do Pai:</strong> {{$nomePai ?? '---'}}</p>
            </div>
        </div>
    </div>
</body>
</html>
