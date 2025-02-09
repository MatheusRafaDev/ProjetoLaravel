<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Adicionar Movimentação Financeira') }}
            <a href="{{ route('movimentacoes.index') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-300 underline">Movimentações</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-100 dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('movimentacoes.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="id_conta" class="block text-sm font-medium text-gray-600">Conta</label>
                            <select id="id_conta" name="id_conta" class="mt-1 block w-full bg-gray-200 dark:bg-gray-600 border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500 sm:text-sm" required>
                                @foreach($contas as $conta)
                                    <option value="{{ $conta->id_conta }}">{{ $conta->nome_conta }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-4">
                            <label for="id_categoria" class="block text-sm font-medium text-gray-600">Categoria</label>
                            <select id="id_categoria" name="id_categoria" class="mt-1 block w-full bg-gray-200 dark:bg-gray-600 border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500 sm:text-sm" required>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id_categoria }}">{{ $categoria->nome_categoria }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-4">
                            <label for="descricao" class="block text-sm font-medium text-gray-600">Descrição</label>
                            <input type="text" class="mt-1 block w-full bg-gray-200 dark:bg-gray-600 border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500 sm:text-sm" id="descricao" name="descricao" required>
                        </div>
                        <div class="form-group mt-4">
                            <label for="valor" class="block text-sm font-medium text-gray-600">Valor</label>
                            <input type="number" step="0.01" class="mt-1 block w-full bg-gray-200 dark:bg-gray-600 border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500 sm:text-sm" id="valor" name="valor" required>
                        </div>
                        <div class="form-group mt-4">
                            <label for="tipo_movimentacao" class="block text-sm font-medium text-gray-600">Tipo de Movimentação</label>
                            <select id="tipo_movimentacao" name="tipo_movimentacao" class="mt-1 block w-full bg-gray-200 dark:bg-gray-600 border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500 sm:text-sm" required>
                                <option value="entrada">Entrada</option>
                                <option value="saida">Saída</option>
                            </select>
                        </div>
                        <div class="form-group mt-4">
                            <label for="data_movimentacao" class="block text-sm font-medium text-gray-600">Data da Movimentação</label>
                            <input type="date" class="mt-1 block w-full bg-gray-200 dark:bg-gray-600 border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500 sm:text-sm" id="data_movimentacao" name="data_movimentacao" required>
                        </div>
                        <button type="submit" class="w-full mt-4 py-2 px-4 bg-gray-600 text-white rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
