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
        /* Estilo geral do corpo */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            position: relative; /* Necessário para o posicionamento do pseudo-elemento */
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center; /* Centraliza o conteúdo na tela */
            padding: 20px;
            overflow: hidden; /* Para evitar que o conteúdo transborde */
        }
        /* Imagem de fundo */
        body::before {
            content: ""; /* Necessário para exibir o pseudo-elemento */
            position: absolute; /* Posiciona o pseudo-elemento */
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('{{ asset('/img/fotografia-corporativa.jpg') }}'); /* Substitua pela imagem desejada */
            background-size: cover;
            background-position: center;
            z-index: -2; /* Coloca a imagem de fundo atrás do conteúdo */
        }
        /* Camada de escurecimento */
        body::after {
            content: ""; /* Necessário para exibir o pseudo-elemento */
            position: absolute; /* Posiciona o pseudo-elemento */
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5); /* Cor preta com 50% de opacidade */
            z-index: -1; /* Coloca a camada de escurecimento atrás do conteúdo */
        }
        /* Estilo do contêiner esquerdo */
        .left-container {
            color: #ffffff;
            text-align: left; /* Alinha o texto à esquerda */
            margin-right: 50px; /* Espaço entre o texto e o formulário */
        }
        /* Estilo do título */
        h1 {
            margin: 0;
            font-family: "Bebas Neue", sans-serif;
            font-size: 40px;
            animation: fadein 3s forwards;
        }
        /* Estilo do parágrafo */
        p {
            margin-top: 10px;
            font-size: 18px;
        }
        /* Centralização e estilo do contêiner principal */
        .main-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: rgba(255, 255, 251, 0.9); /* Fundo semi-transparente */
            padding: 20px;
            border-radius: 8px;
            width: 400px; /* Largura fixa do formulário */
            box-shadow: 0 0 10px rgba(140, 80, 255, 0.3);
            position: relative; /* Necessário para o z-index dos elementos filhos */
            z-index: 1; /* Coloca o contêiner principal à frente da imagem de fundo */
        }
        /* Estilo dos inputs e botão */
        .login-container .full-width {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #8c52ff;
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
            from { opacity: 0; }
            to { opacity: 1; }
        }
        /* Estilo responsivo para dispositivos móveis */
        @media (max-width: 600px) {
            h1 { font-size: 30px; }
            .main-container {
                width: 80vw; /* Reduz a largura do formulário em dispositivos móveis */
            }
        }
    </style>
</head>
<body>
    <div class="left-container">
        <h1>Transforme seu Futuro!</h1>
        <p>A única maneira de fazer um ótimo trabalho é amar o que você faz.</p>
    </div>
    
    <div class="main-container">
        <img src="{{ asset('imgLogo/PayMirror4.png') }}" alt="PayMirror" style="max-width: 100%; height: auto; margin-bottom: 20px;">
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
