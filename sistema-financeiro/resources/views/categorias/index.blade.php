<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Categorias de Transações') }}
            <a href="{{ route('movimentacoes.index') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-300 underline">Movimentações</a>
            <a href="{{ route('transferencias.index') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-300 underline">Transferências</a>
            <a href="{{ route('contas.index') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-300 underline">Contas</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('categorias.create') }}" class="inline-block py-2 px-4 bg-gray-600 text-white rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">
                        Adicionar Categoria
                    </a>
                    <table class="min-w-full mt-6">
                        <thead>
                            <tr class="bg-gray-600 text-left text-white">
                                <th class="px-6 py-3 text-sm font-medium">{{ __('Nome da Categoria') }}</th>
                                <th class="px-6 py-3 text-sm font-medium">{{ __('Tipo') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categorias as $categoria)
                                <tr class="bg-gray-100 dark:bg-gray-700 border-b dark:border-gray-600">
                                    <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-100">{{ $categoria->nome_categoria }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-100">{{ $categoria->tipo }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
