<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Usuário</title>
</head>
<body>
    <h1>Adicionar Usuário</h1>
    <form method="POST" action="{{ route('usuarios.store') }}">
        @csrf
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha">
        <button type="submit">Salvar</button>
    </form>
</body>
</html>