<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Holerite</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .btn {
            padding: 10px 15px;
            font-size: 1em;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Holerite</h1>

        <h2>Informações do Trabalhador</h2>
        <p><strong>Nome:</strong> {{ $trabalhador->nome }}</p>
        <p><strong>Cargo:</strong> {{ $trabalhador->cargo }}</p>
        <p><strong>Mês:</strong> {{ $mes }}</p>

        <h2>Detalhes do Holerite</h2>
        <table>
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Salário Bruto</td>
                    <td>R$ {{ number_format($salarioBruto, 2, ',', '.') }}</td>
                </tr>
                <tr>
                    <td>INSS</td>
                    <td>R$ {{ number_format($inss, 2, ',', '.') }}</td>
                </tr>
                <tr>
                    <td>IRRF</td>
                    <td>R$ {{ number_format($irrf, 2, ',', '.') }}</td>
                </tr>
                <tr>
                    <td>Descontos Totais</td>
                    <td>R$ {{ number_format($inss + $irrf, 2, ',', '.') }}</td>
                </tr>
                <tr>
                    <td>Salário Líquido</td>
                    <td>R$ {{ number_format($salarioBruto - ($inss + $irrf), 2, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>

        <h2>Explicação dos Descontos</h2>
        <p><strong>INSS:</strong> O desconto do INSS é feito para garantir a aposentadoria do trabalhador.</p>
        <p><strong>IRRF:</strong> O Imposto de Renda Retido na Fonte é um imposto federal que incide sobre os rendimentos.</p>

        <div class="buttons">
            <a href="/funcionarios" class="btn">Voltar</a>
            <button class="btn" onclick="alert('Holerite salvo com sucesso!')">Salvar</button>
        </div>
    </div>
</body>
</html>
