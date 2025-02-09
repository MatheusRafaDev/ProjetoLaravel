<!DOCTYPE html>
<html>
<head>
    <title>Usuários</title>
</head>
<body>
    <h1>Usuários</h1>
    <a href="{{ route('usuarios.create') }}">Adicionar Usuário</a>
    <ul>
        @foreach ($usuarios as $usuario)
            <li>
                {{ $usuario->nome }} - {{ $usuario->email }}
                <a href="{{ route('usuarios.edit', $usuario->id_usuario) }}">Editar</a>
                <form action="{{ route('usuarios.destroy', $usuario->id_usuario) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Deletar</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>