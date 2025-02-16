<?php

namespace App\Http\Controllers;

use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use App\Models\Conta;
use App\Models\Usuario;
use App\Models\MovimentacaoFinanceira;
use App\Models\Transferencia;

class DashboardController extends Controller
{
    public function index()
    {
        // Defina as opções do gráfico
        $chart_options = [
            'chart_title' => 'Movimentações por Mês',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\MovimentacaoFinanceira',
            'group_by_field' => 'data_movimentacao',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
        ];

        // Crie uma nova instância de LaravelChart com as opções definidas
        $chart = new LaravelChart($chart_options);

        // Obtenha os dados necessários para a view
        $contas = Conta::all();
        $usuarios = Usuario::all();
        $movimentacoes = MovimentacaoFinanceira::all();
        $transferencias = Transferencia::all();

        // Retorne a view com os dados e o gráfico
        return view('dashboard', compact('contas', 'usuarios', 'movimentacoes', 'transferencias', 'chart'));
    }
}
