<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerenciador de Tarefas</title>
</head>
<body>
    <h1>Tarefas</h1>
    <a href="{{ route('tarefas.create') }}">Adicionar Tarefa</a>
    <ul>
        @foreach($tarefas as $tarefa)
            <li>
                {{ $tarefa->titulo }} - {{ $tarefa->completa ? 'Completa' : 'Pendente' }}
                <a href="{{ route('tarefas.edit', $tarefa->id) }}">Editar</a>
                <form action="{{ route('tarefas.destroy', $tarefa->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Excluir</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
