<?php

namespace App\Http\Controllers;

use App\Models\Conta;
use App\Models\Usuario;
use App\Models\MovimentacaoFinanceira;
use App\Models\Transferencia;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $contas = Conta::all();
        $usuarios = Usuario::all();
        $movimentacoes = MovimentacaoFinanceira::all();
        $transferencias = Transferencia::all();

        return view('dashboard', compact('contas', 'usuarios', 'movimentacoes', 'transferencias'));
    }
}