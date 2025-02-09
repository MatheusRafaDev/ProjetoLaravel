<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Contas') }}
            <a href="{{ route('movimentacoes.index') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-300 underline">Movimentações</a>
            <a href="{{ route('categorias.index') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-300 underline">Categorias</a>
            <a href="{{ route('transferencias.index') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-300 underline">Transferências</a>
           
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <a href="{{ route('contas.create') }}" class="mt-4 py-2 px-4 bg-gray-600 text-white rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">
                        Adicionar Conta
                    </a>
                    <table class="table-auto w-full mt-4">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-left">{{ __('Nome da Conta') }}</th>
                                <th class="px-4 py-2 text-left">{{ __('Saldo') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contas as $conta)
                                <tr>
                                    <td class="border px-4 py-2">{{ $conta->nome_conta }}</td>
                                    <td class="border px-4 py-2">{{ number_format($conta->saldo, 2, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
