<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionário</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000;
            margin: 0;
            color: white;
        }

        .navbar {
            display: flex;
            justify-content: center; /* Centraliza sem espaços entre os botões */
            align-items: center; /* Centraliza verticalmente */
            background-color: #333; /* Paleta da página "welcome" */
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

        .content {
            padding: 80px 20px 20px;
        }

        .voltar-btn {
            background-color: #48b281;
            color: white;
            padding: 10px 15px;
            border: none;
            text-decoration: none;
        }

        .voltar-btn1:hover {
            background-color: #5a2d98;
        }

        .profile-container {
            display: flex;
            align-items: center;
            margin-top: 20px;
        }

        .profile-pic {
            margin-right: 20px;
            cursor: pointer; /* Muda o cursor para indicar que é clicável */
        }

        .profile-pic img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            transition: opacity 0.3s ease;
        }

        .profile-pic img:hover {
            opacity: 0.8; /* Efeito de hover para indicar que é clicável */
        }

        .info {
            flex: 1;
        }

        input[type="file"] {
            display: none; /* Esconde o input de arquivo */
        }
    </style>
</head>
<body>
<div class="navbar">
<a href="/colaboradores" class="voltar-btn1">Perfil</a>
    <a href="{{ route('colaboradores.holerite') }}">Holerite</a>
    <a href="{{ route('colaboradores.calendario') }}">Calendário</a>
    <a href="{{ route('colaboradores.requerimentos') }}">Requerimentos</a>
    <a href="{{ route('colaboradores.pontos-hora') }}">Pontos de Hora</a>
    <a href="{{ route('colaboradores.avisos') }}">Avisos</a>
    <a href="{{ route('colaboradores.sobre-nos') }}">Sobre Nós</a>
    <a href="/" class="voltar-btn">Logout</a>
</div>

    
    <form action="{{ route('upload.profile.picture') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="profile-container">
        <div class="profile-pic">
            <img id="profileImage" src="{{ asset('imgLogo/Agatha.png') }}" alt="Foto de Perfil" onclick="document.getElementById('fileUpload').click()">
        </div>
        <div class="info">
          
            <p><strong>Data de Nascimento:</strong> {{$dataNascimento ?? '---'}}</p>
            <p><strong>Endereço:</strong> {{$endereco ?? '---'}}</p>
            <p><strong>Data de Início de Contrato:</strong> {{$dataInicioContrato ?? '---'}}</p>
            <p><strong>Data de Término de Contrato:</strong> {{$dataTerminoContrato ?? '---'}}</p>
            <p><strong>Nome da Mãe:</strong> {{$nomeMae ?? '---'}}</p>
            <p><strong>Nome do Pai:</strong> {{$nomePai ?? '---'}}</p>
        </div>
        <input type="file" id="fileUpload" name="profile_picture" accept="image/*" onchange="previewImage(event)" style="display: none;">
        <button type="submit">Salvar Foto de Perfil</button> <!-- Botão para submeter o formulário -->
    </div>
</form>
<!-- Exibir mensagem de sucesso -->
@if(session('success'))
    <p>{{ session('success') }}</p>
@endif


<script>
    // Função para mostrar a pré-visualização da imagem
    function previewImage(event) {
        const file = event.target.files[0];
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = document.getElementById('profileImage');
            img.src = e.target.result; // Define a nova imagem de perfil
            // Armazenar a imagem no localStorage
            localStorage.setItem('profileImage', e.target.result);
        }
        reader.readAsDataURL(file); // Lê o arquivo como URL
    }

    // Restaura a imagem do localStorage ao carregar a página
    window.onload = function() {
        const savedImage = localStorage.getItem('profileImage');
        if (savedImage) {
            document.getElementById('profileImage').src = savedImage;
        }
    }
</script>

</body>
</html>
