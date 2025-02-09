<?php

namespace App\Http\Controllers;

use App\Models\Conta;
use Illuminate\Http\Request;

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
        $conta = Conta::create($request->all());
        return redirect()->route('contas.index');
    }

    public function edit($id)
    {
        $conta = Conta::findOrFail($id);
        return view('contas.edit', compact('conta'));
    }

    public function update(Request $request, $id)
    {
        $conta = Conta::findOrFail($id);
        $conta->update($request->all());
        return redirect()->route('contas.index');
    }

    public function destroy($id)
    {
        $conta = Conta::findOrFail($id);
        $conta->delete();
        return redirect()->route('contas.index');
    }
}