<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opções - PayMirror</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .container {
            display: flex;
            justify-content: space-around;
            width: 100%;
            max-width: 800px;
        }
        .opcao {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: white;
            width: 200px;
            text-align: center;
            cursor: pointer;
            transition: transform 0.2s;
        }
        .opcao:hover {
            transform: scale(1.05);
        }
        .icone {
            font-size: 50px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Escolha uma Opção</h1>
    <div class="container">
        <div class="opcao" onclick="location.href='/admin'">
            <div class="icone"><i class="fas fa-user-shield"></i></div>
            <span>Admin</span>
        </div>
        <div class="opcao" onclick="location.href='/funcionarios'">
            <div class="icone"><i class="fas fa-users"></i></div>
            <span>Funcionários</span>
        </div>
    </div>
</body>
</html>
