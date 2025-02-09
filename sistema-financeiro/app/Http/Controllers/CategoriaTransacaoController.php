<?php

namespace App\Http\Controllers;

use App\Models\CategoriaTransacao;
use Illuminate\Http\Request;

class CategoriaTransacaoController extends Controller
{
    public function index()
    {
        $categorias = CategoriaTransacao::all();
        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome_categoria' => 'required|string|max:50',
            'tipo' => 'required|string|max:20',
        ]);

        CategoriaTransacao::create($request->all());

        return redirect()->route('categorias.index');
    }

    public function edit($id)
    {
        $categoria = CategoriaTransacao::findOrFail($id);
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome_categoria' => 'required|string|max:50',
            'tipo' => 'required|string|max:20',
        ]);

        $categoria = CategoriaTransacao::findOrFail($id);
        $categoria->update($request->all());

        return redirect()->route('categorias.index');
    }

    public function destroy($id)
    {
        $categoria = CategoriaTransacao::findOrFail($id);
        $categoria->delete();

        return redirect()->route('categorias.index');
    }
}