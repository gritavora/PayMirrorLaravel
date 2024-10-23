<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PayMirror</title>
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
        h1 {
            font-size: 3em;
            margin-bottom: 20px;
        }
        img {
            width: 500px; /* Ajuste o tamanho da imagem aqui */
            height: auto; /* Mantém a proporção da imagem */
            margin-bottom: 40px; /* Espaçamento entre a imagem e o botão */
        }
        .btn-entrar {
            padding: 10px 20px;
            font-size: 1.2em;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-align: center; /* Centraliza o texto no botão */
        }
        .btn-entrar:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h3>Bem-vindo ao PayMirror</h3>
    <img src="{{ asset('imgLogo/PayMirror3.png') }}" alt="PayMirror">
    <a href="/opcoes">
        <button class="btn-entrar">Entrar</button>
    </a>
</body>
</html>
