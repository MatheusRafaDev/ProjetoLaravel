<?php

namespace App\Http\Controllers;

use App\Models\MovimentacaoFinanceira;
use App\Models\Conta;
use App\Models\CategoriaTransacao;
use Illuminate\Http\Request;

class MovimentacaoFinanceiraController extends Controller
{
    public function index()
    {
        $movimentacoes = MovimentacaoFinanceira::all();
        return view('movimentacoes.index', compact('movimentacoes'));
    }

    public function create()
    {
        $contas = Conta::all();
        $categorias = CategoriaTransacao::all();
        return view('movimentacoes.create', compact('contas', 'categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_conta' => 'required',
            'id_categoria' => 'required',
            'descricao' => 'required|string|max:255',
            'valor' => 'required|numeric',
            'tipo_movimentacao' => 'required|string|max:20',
            'data_movimentacao' => 'required|date',
        ]);

        MovimentacaoFinanceira::create($request->all());

        return redirect()->route('movimentacoes.index');
    }

    public function edit($id)
    {
        $movimentacao = MovimentacaoFinanceira::findOrFail($id);
        $contas = Conta::all();
        $categorias = CategoriaTransacao::all();
        return view('movimentacoes.edit', compact('movimentacao', 'contas', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_conta' => 'required',
            'id_categoria' => 'required',
            'descricao' => 'required|string|max:255',
            'valor' => 'required|numeric',
            'tipo_movimentacao' => 'required|string|max:20',
            'data_movimentacao' => 'required|date',
        ]);

        $movimentacao = MovimentacaoFinanceira::findOrFail($id);
        $movimentacao->update($request->all());

        return redirect()->route('movimentacoes.index');
    }

    public function destroy($id)
    {
        $movimentacao = MovimentacaoFinanceira::findOrFail($id);
        $movimentacao->delete();

        return redirect()->route('movimentacoes.index');
    }
}