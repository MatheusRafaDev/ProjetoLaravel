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
                    <div class="relative overflow-x-auto mt-6">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th class="px-4 py-2">Conta de Origem</th>
                                    <th class="px-4 py-2">Conta de Destino</th>
                                    <th class="px-4 py-2">Valor</th>
                                    <th class="px-4 py-2">Data da Transferência</th>
                                    <th class="px-4 py-2">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transferencias as $transferencia)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-4 py-2">{{ optional($contas->firstWhere('id_conta', $transferencia->id_conta_origem))->nome_conta ?? 'N/A' }}</td>
                                        <td class="px-4 py-2">{{ optional($contas->firstWhere('id_conta', $transferencia->id_conta_destino))->nome_conta ?? 'N/A' }}</td>
                                        <td class="px-4 py-2">{{ number_format($transferencia->valor, 2, ',', '.') }}</td>
                                        <td class="px-4 py-2">{{ $transferencia->data_transferencia->format('d/m/Y') }}</td>
                                        <td class="px-4 py-2 flex space-x-2">
                                            <a href="{{ route('transferencias.edit', $transferencia->id_transferencia) }}" class="text-blue-600 hover:underline">Editar</a>
                                            <form action="{{ route('transferencias.destroy', $transferencia->id_transferencia) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta transferência?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:underline">Excluir</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if($transferencias->isEmpty())
                            <p class="mt-4 text-center text-gray-500 dark:text-gray-400">Nenhuma transferência encontrada.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
