<!DOCTYPE html>
<html>
<head>
    <title>Editar Funcionário</title>
</head>
<body>
    <h1>Editar Funcionário</h1>

    <form action="{{ route('funcionarios.update', $funcionario->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Nome:</label>
        <input type="text" name="nome" value="{{ $funcionario->nome }}" required>
        <label>Cargo:</label>
        <input type="text" name="cargo" value="{{ $funcionario->cargo }}" required>
        <label>Jornada de Trabalho:</label>
        <input type="text" name="jornada_trabalho" value="{{ $funcionario->jornada_trabalho }}" required>
        <button type="submit">Atualizar Funcionário</button>
    </form>

    <a href="{{ route('funcionarios.index') }}">Voltar</a>
</body>
</html>
