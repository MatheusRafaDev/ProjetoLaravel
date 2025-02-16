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
                    <div class="relative overflow-x-auto mt-6">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th class="px-4 py-2">Descrição</th>
                                    <th class="px-4 py-2">Valor</th>
                                    <th class="px-4 py-2">Tipo</th>
                                    <th class="px-4 py-2">Data</th>
                                    <th class="px-4 py-2">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($movimentacoes as $movimentacao)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-4 py-2">{{ $movimentacao->descricao }}</td>
                                        <td class="px-4 py-2">{{ number_format($movimentacao->valor, 2, ',', '.') }}</td>
                                        <td class="px-4 py-2">{{ $movimentacao->tipo_movimentacao }}</td>
                                        <td class="px-4 py-2">{{ $movimentacao->data_movimentacao->format('d/m/Y') }}</td>
                                        <td class="px-4 py-2 flex space-x-2">
                                            <a href="{{ route('movimentacoes.edit', $movimentacao->id_movimentacao) }}" class="text-blue-600 hover:underline">Editar</a>
                                            
                                            <form action="{{ route('movimentacoes.destroy', $movimentacao->id_movimentacao) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta movimentação?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:underline">Deletar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if($movimentacoes->isEmpty())
                            <p class="mt-4 text-center text-gray-500 dark:text-gray-400">Nenhuma movimentação encontrada.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
