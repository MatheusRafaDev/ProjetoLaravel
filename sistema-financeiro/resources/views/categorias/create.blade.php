<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Adicionar Categoria de Transação') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('categorias.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="nome_categoria" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nome da Categoria</label>
                            <input type="text" class="form-control mt-2 block w-full rounded-md bg-gray-200 dark:bg-gray-600 text-gray-900 dark:text-gray-100 border-gray-300 dark:border-gray-500 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="nome_categoria" name="nome_categoria" required>
                        </div>
                        <div class="form-group mt-4">
                            <label for="tipo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tipo</label>
                            <select id="tipo" name="tipo" class="form-control mt-2 block w-full rounded-md bg-gray-200 dark:bg-gray-600 text-gray-900 dark:text-gray-100 border-gray-300 dark:border-gray-500 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                                <option value="receita">Receita</option>
                                <option value="despesa">Despesa</option>
                            </select>
                        </div>
                        <button type="submit" class="mt-4 py-2 px-4 bg-gray-600 text-white rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">
                            Salvar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
