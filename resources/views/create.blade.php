<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Funcionário</title>
</head>
<body>
    <h1>Adicionar Funcionário</h1>

    <form action="{{ route('funcionarios.store') }}" method="POST">
        @csrf

        <label>Nome:</label>
        <input type="text" name="nome" required>
        @error('nome')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <label>Cargo:</label>
        <input type="text" name="cargo" required>
        @error('cargo')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <label>Jornada de Trabalho:</label>
        <input type="text" name="jornada_trabalho" required>
        @error('jornada_trabalho')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        
        <button type="submit">Adicionar Funcionário</button>
    </form>

    <a href="{{ route('funcionarios.index') }}">Voltar</a>
</body>
</html>
