<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Adicionar Movimentação Financeira') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('movimentacoes.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="id_conta">Conta</label>
                            <select id="id_conta" name="id_conta" class="form-control" required>
                                @foreach($contas as $conta)
                                    <option value="{{ $conta->id_conta }}">{{ $conta->nome_conta }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-4">
                            <label for="id_categoria">Categoria</label>
                            <select id="id_categoria" name="id_categoria" class="form-control" required>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id_categoria }}">{{ $categoria->nome_categoria }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-4">
                            <label for="descricao">Descrição</label>
                            <input type="text" class="form-control" id="descricao" name="descricao" required>
                        </div>
                        <div class="form-group mt-4">
                            <label for="valor">Valor</label>
                            <input type="number" step="0.01" class="form-control" id="valor" name="valor" required>
                        </div>
                        <div class="form-group mt-4">
                            <label for="tipo_movimentacao">Tipo de Movimentação</label>
                            <select id="tipo_movimentacao" name="tipo_movimentacao" class="form-control" required>
                                <option value="entrada">Entrada</option>
                                <option value="saida">Saída</option>
                            </select>
                        </div>
                        <div class="form-group mt-4">
                            <label for="data_movimentacao">Data da Movimentação</label>
                            <input type="date" class="form-control" id="data_movimentacao" name="data_movimentacao" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>