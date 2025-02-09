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
        <input type="text" name="nome" id="nome" required>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required>
        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" id="telefone">
        <label for="endereco">Endereço:</label>
        <input type="text" name="endereco" id="endereco">
        <button type="submit">Salvar</button>
    </form>
</body>
</html>