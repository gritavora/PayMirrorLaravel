<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HoleriteController extends Controller
{
    public function index()
    {
        // Exemplo de dados do trabalhador
        $trabalhador = (object) [
            'nome' => 'João Silva',
            'cargo' => 'Desenvolvedor'
        ];

        $mes = 'Outubro';
        $salarioBruto = 5000.00; // Exemplo de salário bruto
        $inss = 550.00; // Exemplo de desconto do INSS
        $irrf = 250.00; // Exemplo de desconto do IRRF

        // Retornar a view com os dados
        return view('colaboradores.holerite', compact('trabalhador', 'mes', 'salarioBruto', 'inss', 'irrf'));
    }
}
