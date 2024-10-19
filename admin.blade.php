<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionários - PayMirror</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
        }
        .navbar {
            display: flex;
            background-color: #A020F0;
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
        .search-bar {
            margin-bottom: 20px;
            width: 100%;
        }
        .search-bar input {
            padding: 15px;
            width: 100%;
            border-radius: 25px; /* Bordas arredondadas */
            border: 1px solid #ccc;
            font-size: 16px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: border 0.3s;
        }
        .search-bar input:focus {
            border: 1px solid #007bff; /* Cor ao focar */
            outline: none;
        }
        .funcionario {
            background: white;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
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
            background-color:#006400;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="/adicionar">Adicionar</a>
        <a href="/editar">Editar</a>
        <a href="excluir">Excluir</a>    
        <a href="/calendario">Calendário</a>
        <a href="/requerimentos">Requerimentos</a>
        <a href="/pontos-hora">Pontos de Hora</a>
        <a href="/avisos">Avisos</a>
        <a href="/sobre-nos">Sobre Nós</a>
        <a href="/opcoes" class="voltar-btn">Voltar</a>
    </div>
    <div class="content">
        <h1>Dados dos Funcionários</h1>
        <div class="search-bar">
            <input type="text" placeholder="Pesquisar Funcionário, Cargo..." id="searchInput">
        </div>
    <div class="content">
        <h1>Dados dos Funcionários</h1>
        <div class="funcionario">
            <strong>Nome:</strong> João Silva<br>
            <strong>Cargo:</strong> Desenvolvedor<br>
            <strong>Jornada de Trabalho:</strong> 40 horas semanais
        </div>
        <div class="funcionario">
            <strong>Nome:</strong> Maria Oliveira<br>
            <strong>Cargo:</strong> Gerente de Projetos<br>
            <strong>Jornada de Trabalho:</strong> 40 horas semanais
        </div>
       
</body>
</html>
