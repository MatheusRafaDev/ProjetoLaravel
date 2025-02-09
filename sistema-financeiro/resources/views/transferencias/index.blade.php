<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transferências') }}
            <a href="{{ route('movimentacoes.index') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-300 underline">Movimentações</a>
            <a href="{{ route('categorias.index') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-300 underline">Categorias</a>
            <a href="{{ route('contas.index') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-300 underline">Contas</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('transferencias.create') }}" class="mt-4 py-2 px-4 bg-gray-600 text-white rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">
                        Adicionar Transferência
                    </a>
                    <table class="min-w-full mt-6">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Conta de Origem') }}</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Conta de Destino') }}</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Valor') }}</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Data da Transferência') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transferencias as $transferencia)
                                <tr class="bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="border px-4 py-2 text-sm text-gray-900 dark:text-gray-100">
                                        @foreach($contas as $conta)
                                            @if($conta->id_conta == $transferencia->id_conta_origem)
                                                {{ $conta->nome_conta }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="border px-4 py-2 text-sm text-gray-900 dark:text-gray-100">
                                        @foreach($contas as $conta)
                                            @if($conta->id_conta == $transferencia->id_conta_destino)
                                                {{ $conta->nome_conta }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="border px-4 py-2 text-sm text-gray-900 dark:text-gray-100">{{ number_format($transferencia->valor, 2, ',', '.') }}</td>
                                    <td class="border px-4 py-2 text-sm text-gray-900 dark:text-gray-100">{{ $transferencia->data_transferencia->format('d/m/Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
