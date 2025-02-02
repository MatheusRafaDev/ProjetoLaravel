<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Tarefa</title>
</head>
<body>
    <h1>Adicionar Tarefa</h1>
    <form action="{{ route('tarefas.store') }}" method="POST">
        @csrf
        <label for="titulo">Título</label>
        <input type="text" name="titulo" id="titulo" required><br>
        <label for="descricao">Descrição</label>
        <textarea name="descricao" id="descricao" required></textarea><br>
        <label for="completa">Completa</label>
        <input type="checkbox" name="completa" id="completa"><br>
        <button type="submit">Salvar</button>
    </form>
</body>
</html>
