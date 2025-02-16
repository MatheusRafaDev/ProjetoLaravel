<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Movimentação Financeira') }}
            <a href="{{ route('movimentacoes.index') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-300 underline">Movimentações</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('movimentacoes.update', $movimentacao->id_movimentacao) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="id_conta" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Conta</label>
                            <select id="id_conta" name="id_conta" class="form-control mt-2 block w-full rounded-md bg-gray-200 dark:bg-gray-600 text-gray-900 dark:text-gray-100 border-gray-300 dark:border-gray-500 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                                @foreach($contas as $conta)
                                    <option value="{{ $conta->id_conta }}" {{ $movimentacao->id_conta == $conta->id_conta ? 'selected' : '' }}>{{ $conta->nome_conta }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mt-4">
                            <label for="id_categoria" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Categoria</label>
                            <select id="id_categoria" name="id_categoria" class="form-control mt-2 block w-full rounded-md bg-gray-200 dark:bg-gray-600 text-gray-900 dark:text-gray-100 border-gray-300 dark:border-gray-500 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id_categoria }}" {{ $movimentacao->id_categoria == $categoria->id_categoria ? 'selected' : '' }}>{{ $categoria->nome_categoria }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mt-4">
                            <label for="descricao" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Descrição</label>
                            <input type="text" class="form-control mt-2 block w-full rounded-md bg-gray-200 dark:bg-gray-600 text-gray-900 dark:text-gray-100 border-gray-300 dark:border-gray-500 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="descricao" name="descricao" value="{{ $movimentacao->descricao }}" required>
                        </div>

                        <div class="form-group mt-4">
                            <label for="valor" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Valor</label>
                            <input type="number" step="0.01" class="form-control mt-2 block w-full rounded-md bg-gray-200 dark:bg-gray-600 text-gray-900 dark:text-gray-100 border-gray-300 dark:border-gray-500 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="valor" name="valor" value="{{ $movimentacao->valor }}" required>
                        </div>

                        <div class="form-group mt-4">
                            <label for="tipo_movimentacao" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tipo de Movimentação</label>
                            <select id="tipo_movimentacao" name="tipo_movimentacao" class="form-control mt-2 block w-full rounded-md bg-gray-200 dark:bg-gray-600 text-gray-900 dark:text-gray-100 border-gray-300 dark:border-gray-500 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                                <option value="entrada" {{ $movimentacao->tipo_movimentacao == 'entrada' ? 'selected' : '' }}>Entrada</option>
                                <option value="saida" {{ $movimentacao->tipo_movimentacao == 'saida' ? 'selected' : '' }}>Saída</option>
                            </select>
                        </div>

                        <div class="form-group mt-4">
                            <label for="data_movimentacao" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Data da Movimentação</label>
                        
                            <input type="date" class="form-control mt-2 block w-full rounded-md bg-gray-200 dark:bg-gray-600 text-gray-900 dark:text-gray-100 border-gray-300 dark:border-gray-500 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="data_movimentacao" name="data_movimentacao" value="{{ $movimentacao->data_movimentacao ? $movimentacao->data_movimentacao->format('Y-m-d') : '' }}" required>


                        </div>

                        <button type="submit" class="mt-4 py-2 px-4 bg-gray-600 text-white rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">
                            Atualizar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
