<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function index()
    {
        $tarefas = Tarefa::all();
        return view('tarefas.index', compact('tarefas'));
    }

    public function create()
    {
        return view('tarefas.create');
    }

    public function store(Request $request)
    {
        Tarefa::create($request->all());
        return redirect()->route('tarefas.index');
    }

    public function edit($id)
    {
        $tarefa = Tarefa::find($id);
        return view('tarefas.edit', compact('tarefa'));
    }

    public function update(Request $request, $id)
    {
        $tarefa = Tarefa::find($id);
        $tarefa->update($request->all());
        return redirect()->route('tarefas.index');
    }

    public function destroy($id)
    {
        Tarefa::find($id)->delete();
        return redirect()->route('tarefas.index');
    }
}
