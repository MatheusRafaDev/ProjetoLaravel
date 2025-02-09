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
                            <label for="nome_categoria">Nome da Categoria</label>
                            <input type="text" class="form-control" id="nome_categoria" name="nome_categoria" required>
                        </div>
                        <div class="form-group mt-4">
                            <label for="tipo">Tipo</label>
                            <select id="tipo" name="tipo" class="form-control" required>
                                <option value="receita">Receita</option>
                                <option value="despesa">Despesa</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>