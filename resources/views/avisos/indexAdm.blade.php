<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Avisos - Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        textarea {
            width: 100%; /* Largura total */
            height: 150px; /* Altura maior */
            border-radius: 8px; /* Bordas arredondadas */
            padding: 10px; /* Espaçamento interno */
            border: 1px solid #ccc; /* Bordas padrão */
            resize: none; /* Impede redimensionamento */
        }
        button, .btn-voltar {
            background-color: #006400; /* Cor do botão */
            color: white; /* Cor do texto */
            border: none; /* Sem bordas */
            border-radius: 5px; /* Bordas arredondadas */
            padding: 10px 15px; /* Espaçamento interno */
            cursor: pointer; /* Cursor de mão ao passar o mouse */
            text-decoration: none; /* Remove o sublinhado do link */
            display: inline-block; /* Para o link ser um botão */
            margin-top: 10px; /* Margem superior */
        }
        button:hover, .btn-voltar:hover {
            background-color: #004d00; /* Cor do botão ao passar o mouse */
        }
    </style>
</head>
<body>
    <h1>Criar Aviso</h1>
    
    {{-- Exibe uma mensagem de sucesso se existir --}}
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    {{-- Formulário para criar um novo aviso --}}
    <form action="{{ route('avisos.store') }}" method="POST">
        @csrf {{-- Protege contra CSRF (Cross-Site Request Forgery) --}}
        
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" required><br><br>

        <label for="mensagem">Mensagem:</label><br>
        <textarea name="mensagem" required></textarea><br><br>

        <button type="submit">Enviar Aviso</button>
    </form>

    {{-- Botão de Voltar --}}
    <a href="{{ url('admin') }}" class="btn-voltar">Voltar</a>

    <h2>Avisos Enviados</h2>
    {{-- Exibe todos os avisos enviados --}}
    @foreach($avisos as $aviso)
        <div>
            <h3>{{ $aviso['titulo'] }}</h3>
            <p>{{ $aviso['mensagem'] }}</p>
            <hr>
        </div>
    @endforeach
</body>
</html>
