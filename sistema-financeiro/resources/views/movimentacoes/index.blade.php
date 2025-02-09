<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Movimentações Financeiras') }}
            <a href="{{ route('categorias.index') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-300 underline">Categorias</a>
            <a href="{{ route('transferencias.index') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-300 underline">Transferências</a>
            <a href="{{ route('contas.index') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-300 underline">Contas</a>
        </h2>



    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('movimentacoes.create') }}" class="mt-4 py-2 px-4 bg-gray-600 text-white rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">
                        Adicionar Movimentação
                    </a>
                    <table class="table-auto w-full mt-6">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Descrição') }}</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Valor') }}</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Tipo de Movimentação') }}</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Data da Movimentação') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($movimentacoes as $movimentacao)
                                <tr class="border-t border-gray-300 dark:border-gray-700">
                                    <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">{{ $movimentacao->descricao }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">{{ number_format($movimentacao->valor, 2, ',', '.') }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">{{ $movimentacao->tipo_movimentacao }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">{{ $movimentacao->data_movimentacao->format('d/m/Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
