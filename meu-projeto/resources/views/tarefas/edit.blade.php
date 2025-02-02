<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Tarefa</title>
</head>
<body>
    <h1>Editar Tarefa</h1>
    <form action="{{ route('tarefas.update', $tarefa->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="titulo">Título</label>
        <input type="text" name="titulo" id="titulo" value="{{ $tarefa->titulo }}" required><br>
        <label for="descricao">Descrição</label>
        <textarea name="descricao" id="descricao" required>{{ $tarefa->descricao }}</textarea><br>
        <label for="completa">Completa</label>
        <input type="checkbox" name="completa" id="completa" {{ $tarefa->completa ? 'checked' : '' }}><br>
        <button type="submit">Salvar</button>
    </form>
</body>
</html>
