<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conta;
use App\Models\Usuario;
use App\Models\MovimentacaoFinanceira;
use App\Models\Transferencia;

class DashboardController extends Controller
{
    public function index()
    {
        $contas = Conta::select('nome_conta', 'saldo')->get();
        $usuarios = Usuario::select('nome', 'created_at')->get();
        $movimentacoes = MovimentacaoFinanceira::select('descricao', 'valor', 'tipo_movimentacao', 'data_movimentacao')->get();
        $transferencias = Transferencia::select('id_conta_origem', 'id_conta_destino', 'valor', 'data_transferencia')->get();

        return view('dashboard', compact('contas', 'usuarios', 'movimentacoes', 'transferencias'));
    }
}