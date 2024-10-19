<!-- resources/views/welcome.blade.php -->
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
        .btn-entrar {
            padding: 10px 20px;
            font-size: 1.2em;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn-entrar:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Bem-vindo ao PayMirror</h1>
    <a href="/opcoes">
        <button class="btn-entrar">Entrar</button>
    </a>
</body>
</html>
