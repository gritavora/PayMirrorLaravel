<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requerimentos - Funcionários</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000;
            color: white;
            margin: 0;
        }

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

        h1 {
            margin-bottom: 20px;
        }

        .form-container {
            background-color: #1a1a1a;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        label {
            display: block;
            margin: 10px 0 5px;
        }

        input, select, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #222;
            color: white;
        }

        button {
            padding: 10px 15px;
            color: white;
            background-color: #48b281;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #5a2d98;
        }

        .success-message, .error-message {
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 5px;
        }

        .success-message {
            color: green;
            background-color: #e6ffe6;
        }

        .error-message {
            color: red;
            background-color: #ffe6e6;
        }

        .requerimento-card {
            background-color: #1a1a1a;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .requerimento-card h3 {
            margin-bottom: 10px;
        }

        .requerimento-card p {
            margin: 5px 0;
        }

        .response-container {
            margin-top: 20px;
            background-color: #333;
            padding: 15px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="/colaboradores" class="voltar-btn">Perfil</a>
        <a href="{{ route('colaboradores.holerite') }}">Holerite</a>
        <a href="{{ route('colaboradores.calendario') }}">Calendário</a>
        <a href="{{ route('colaboradores.requerimentos') }}">Requerimentos</a>
        <a href="{{ route('colaboradores.pontos-hora') }}">Pontos de Hora</a>
        <a href="{{ route('colaboradores.avisos') }}">Avisos</a>
        <a href="{{ route('colaboradores.sobre-nos') }}">Sobre Nós</a>
    </div>

    <div class="content">
        <h1>Requerimentos</h1>

        @if (session('success'))
            <div class="success-message">{{ session('success') }}</div>
        @endif

        <!-- Formulário para envio de novo requerimento -->
        <div class="form-container">
            <form action="{{ route('colaboradores.requerimentos') }}" method="POST">
                @csrf
                <label for="tipo">Tipo de Requerimento:</label>
                <select name="tipo" id="tipo" required>
                    <option value="">Selecione</option>
                    <option value="declarações">Declarações</option>
                    <option value="ferias">Férias</option>
                    <option value="atestado">Justificativa de Pendências</option>
                    <option value="outro">Outro</option>
                    <option value="sug&rec">Sugestões/Reclamações</option>
                </select>

                <label for="descricao">Descrição:</label>
                <textarea name="descricao" id="descricao" rows="4" required></textarea>

                <button type="submit">Enviar Requerimento</button>
            </form>
        </div>

        <!-- Exibição dos requerimentos enviados -->
        <h2>Meus Requerimentos Enviados</h2>
        @foreach($requerimentos as $requerimento)
            <div class="requerimento-card">
                <h3>{{ $requerimento->tipo }}</h3>
                <p><strong>Descrição:</strong> {{ $requerimento->descricao }}</p>
                <p><strong>Status:</strong> 
                    @if ($requerimento->status == 'pendente')
                        Pendente
                    @elseif ($requerimento->status == 'respondido')
                        Respondido
                    @elseif ($requerimento->status == 'finalizado')
                        Finalizado
                    @endif
                </p>

                @if ($requerimento->status == 'respondido' || $requerimento->status == 'pendente')
                    <div class="response-container">
                        <h4>Resposta do Administrador:</h4>
                        <p>{{ $requerimento->resposta ?? 'Ainda sem resposta.' }}</p>
                    </div>

                    @if ($requerimento->status == 'respondido')
                        <form action="{{ route('colaboradores.requerimentos.finalizar', $requerimento->id) }}" method="POST">
                            @csrf
                            <button type="submit">Finalizar</button>
                        </form>
                    @endif
                @endif
            </div>
        @endforeach
    </div>
</body>
</html>
