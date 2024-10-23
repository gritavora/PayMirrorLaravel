<!DOCTYPE html>
<html>
<head>
    <title>Editar Funcionário</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            padding: 10px 15px;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
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
    </style>
</head>
<body>
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

        <button type="submit">Atualizar Funcionário</button>
    </form>

    <a href="{{ route('funcionarios.index') }}" class="button">Voltar</a>
</body>
</html>
