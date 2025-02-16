<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conta;

class ContaController extends Controller
{
    public function index()
    {
        $contas = Conta::all();
        return view('contas.index', compact('contas'));
    }

    public function create()
    {
        return view('contas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome_conta' => 'required|string|max:255',
            'saldo' => 'required|numeric|min:0',
            'banco' => 'nullable|string|max:255',
            'numero_agencia' => 'nullable|string|max:50',
            'numero_conta' => 'nullable|string|max:50',
            'tipo_conta' => 'nullable|string|max:50',
            'descricao' => 'nullable|string',
            'data_abertura' => 'nullable|date',
            'limite_credito' => 'nullable|numeric|min:0',
            'taxa_juros' => 'nullable|numeric|min:0',
            'status' => 'required|boolean',
        ]);

        Conta::create($request->all());

        return redirect()->route('contas.index')->with('success', 'Conta adicionada com sucesso.');
    }

    public function edit($id)
    {
        $conta = Conta::findOrFail($id);
        return view('contas.edit', compact('conta'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome_conta' => 'required|string|max:255',
            'saldo' => 'required|numeric|min:0',
            'banco' => 'nullable|string|max:255',
            'numero_agencia' => 'nullable|string|max:50',
            'numero_conta' => 'nullable|string|max:50',
            'tipo_conta' => 'nullable|string|max:50',
            'descricao' => 'nullable|string',
            'data_abertura' => 'nullable|date',
            'limite_credito' => 'nullable|numeric|min:0',
            'taxa_juros' => 'nullable|numeric|min:0',
            'status' => 'required|boolean',
        ]);

        $conta = Conta::findOrFail($id);
        $conta->update($request->all());

        return redirect()->route('contas.index')->with('success', 'Conta atualizada com sucesso.');
    }
}