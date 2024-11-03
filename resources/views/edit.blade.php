<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Funcionário - PayMirror</title>
    <style>
        /* Tema escuro (padrão) */
        body.dark-theme {
            font-family: Arial, sans-serif;
            background-color: #000;
            color: white;
            margin: 0;
            padding: 0;
        }

        .content {
            padding: 80px 20px 20px;
            max-width: 600px;
            margin: auto;
        }

        /* Título */
        h1 {
            text-align: center;
            color: #48b281;
        }

        /* Estilos do formulário */
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            background-color: #333;
        }

        label {
            font-weight: bold;
            color: #48b281;
        }

        input[type="text"] {
            padding: 10px;
            border: 1px solid #555;
            border-radius: 5px;
            background-color: #222;
            color: white;
        }

        input[type="text"]:focus {
            border-color: #48b281;
            outline: none;
        }

        /* Mensagens de sucesso e erro */
        .success-message, .error-message {
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .success-message {
            color: #48b281;
            background-color: #e6ffe6;
        }

        .error-message {
            color: red;
            background-color: #ffe6e6;
        }

        /* Botão de envio */
        .button-submit {
            padding: 10px 20px;
            color: white;
            background-color: purple;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 20px;
        }

        .button-submit:hover {
            background-color: darkviolet;
        }

        /* Botão de voltar */
        .button-back {
            padding: 10px 20px;
            color: white;
            background-color: green;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            transition: background-color 0.3s;
            margin-top: 20px;
        }

        .button-back:hover {
            background-color: darkgreen;
        }

        /* Tema claro */
        body.light-theme {
            background-color: #f4f4f4;
            color: black;
        }

        .light-theme form {
            background-color: white;
        }

        .light-theme input[type="text"] {
            background-color: #f4f4f4;
            color: black;
            border-color: #ccc;
        }

        .light-theme input[type="text"]:focus {
            border-color: #5a2d98;
        }

        .light-theme label {
            color: #5a2d98;
        }
    </style>
</head>
<body class="dark-theme">
    <div class="content">
        <h1>Editar Funcionário</h1>

        @if (session('success'))
            <div class="success-message">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('funcionarios.update', $funcionario->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Nome:</label>
            <input type="text" name="nome" value="{{ old('nome', $funcionario->nome) }}" required>

            <label>Cargo:</label>
            <input type="text" name="cargo" value="{{ old('cargo', $funcionario->cargo) }}" required>

            <label>Jornada de Trabalho:</label>
            <input type="text" name="jornada_trabalho" value="{{ old('jornada_trabalho', $funcionario->jornada_trabalho) }}" required>

            <label>Salário:</label>
            <input type="text" name="Salario" value="{{ old('Salario', $funcionario->Salario) }}" required>

            <button type="submit" class="button-submit">Atualizar Funcionário</button>
        </form>

        <a href="{{ route('funcionarios.index') }}" class="button-back">Voltar</a>
    </div>

    <script>
        function toggleTheme() {
            document.body.classList.toggle("light-theme");
            document.body.classList.toggle("dark-theme");
        }
    </script>
</body>
</html>
