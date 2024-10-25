<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Funcionário</title>
</head>
<body>
    <h1>Gerenciar Colaboradores</h1>

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

        <label>Salário:</label>
        <input type="number" name="Salario" required>
        @error('Salario')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        
        <!-- Botão roxo com espaçamento inferior -->
        <button type="submit" style="background-color: purple; color: white; margin-top: 20px;">Adicionar Funcionário</button>
    </form>

    <!-- Botão verde -->
    <a href="{{ route('funcionarios.index') }}">
        <button type="button" style="background-color: green; color: white; margin-top: 20px;">Voltar</button>
    </a>
</body>
</html>
