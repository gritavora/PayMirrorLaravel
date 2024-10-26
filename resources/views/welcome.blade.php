<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PayMirror</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Centralização do corpo */
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #000;
            flex-direction: column;
        }
        /* Estilo do título */
        h1 {
            margin-top: 20px;
            color: #ffffff;
            font-family: "Bebas Neue", sans-serif;
            font-size: 40px;
            animation: fadein 3s forwards;
            text-align: center;
        }
        /* Estilo da imagem */
        img {
            width: 100%;
            height: auto;
            max-width: 300px;
            margin-bottom: 20px;
        }
        /* Centralização e estilo do contêiner principal */
        .main-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: #333;
            padding: 20px;
            border-radius: 8px;
            width: 80vw;
            max-width: 400px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.2);
        }
        /* Centralização e estilo do contêiner de login */
        .login-container {
            display: flex;
            flex-direction: column;
            width: 100%;
        }
        /* Estilo dos inputs e botão */
        .login-container .full-width {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        /* Estilo específico dos inputs */
        .login-container input.full-width {
            background-color: #444;
            color: #fff;
        }
        .login-container input::placeholder {
            color: #bbb;
        }
        /* Estilo específico do botão */
        .btn-login {
            background-color: #48b281;
            color: #fff;
            font-weight: bold;
            border: none;
            transition: background-color 0.3s, transform 0.3s;
        }
        .btn-login:hover {
            background-color: #fff;
            color: #8c52ff;
            transform: scale(1.05);
        }
        /* Animação de opacidade */
        @keyframes fadein {
            from { opacity: 1; }
            to { opacity: 0; }
        }
        /* Estilo responsivo para dispositivos móveis */
        @media (max-width: 600px) {
            h1 { font-size: 30px; }
            img { width: 70vw; }
        }
    </style>
</head>
<body>
    <div class="main-container">
        <img src="{{ asset('imgLogo/PayMirror4.png') }}" alt="PayMirror">
        <h1>Bem-vindo ao PayMirror</h1>
        <div class="login-container">
            <form action="/login" method="POST">
                @csrf
                <!-- Campo de E-mail -->
                <input type="email" name="email" class="full-width" placeholder="E-mail" required>
                
                <!-- Campo de Senha -->
                <input type="password" name="password" class="full-width" placeholder="Senha" required>

                <!-- Botão de Login -->
                <button type="submit" class="btn-login full-width">Entrar</button>
            </form>
        </div>
    </div>
</body>
</html>
