<?php

namespace App\Http\Controllers;

use App\Models\Transferencia;
use App\Models\Conta;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TransferenciaController extends Controller
{
    public function index()
    {
        $transferencias = Transferencia::all();
        $contas = Conta::all();  
        return view('transferencias.index', compact('transferencias', 'contas'));
    }

    public function create()
    {
        $contas = Conta::all();
        return view('transferencias.create', compact('contas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_conta_origem' => 'required',
            'id_conta_destino' => 'required',
            'valor' => 'required|numeric',
            'data_transferencia' => 'required|date',
        ]);

        Transferencia::create($request->all());

        return redirect()->route('transferencias.index');
    }

    public function edit($id)
    {
        $transferencia = Transferencia::findOrFail($id);
        $contas = Conta::all();
        return view('transferencias.edit', compact('transferencia', 'contas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_conta_origem' => 'required',
            'id_conta_destino' => 'required',
            'valor' => 'required|numeric',
            'data_transferencia' => 'required|date',
        ]);

        $transferencia = Transferencia::findOrFail($id);
        $transferencia->update($request->all());

        return redirect()->route('transferencias.index');
    }

    public function destroy($id)
    {
        $transferencia = Transferencia::findOrFail($id);
        $transferencia->delete();

        return redirect()->route('transferencias.index');
    }
}