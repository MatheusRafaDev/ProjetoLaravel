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
                    <div class="relative overflow-x-auto mt-6">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th class="px-4 py-2">Nome da Conta</th>
                                    <th class="px-4 py-2">Banco</th>
                                    <th class="px-4 py-2">Número da Agência</th>
                                    <th class="px-4 py-2">Número da Conta</th>
                                    <th class="px-4 py-2">Tipo de Conta</th>
                                    <th class="px-4 py-2">Descrição</th>
                                    <th class="px-4 py-2">Data de Abertura</th>
                                    <th class="px-4 py-2">Limite de Crédito</th>
                                    <th class="px-4 py-2">Taxa de Juros</th>
                                    <th class="px-4 py-2">Status</th>
                                    <th class="px-4 py-2">Saldo</th>
                                    <th class="px-4 py-2">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contas as $conta)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-4 py-2">{{ $conta->nome_conta }}</td>
                                        <td class="px-4 py-2">{{ $conta->banco }}</td>
                                        <td class="px-4 py-2">{{ $conta->numero_agencia }}</td>
                                        <td class="px-4 py-2">{{ $conta->numero_conta }}</td>
                                        <td class="px-4 py-2">{{ $conta->tipo_conta }}</td>
                                        <td class="px-4 py-2">{{ $conta->descricao }}</td>
                                        <td class="px-4 py-2">{{ $conta->data_abertura ? $conta->data_abertura->format('d/m/Y') : 'N/A' }}</td>
                                        <td class="px-4 py-2">{{ number_format($conta->limite_credito, 2, ',', '.') }}</td>
                                        <td class="px-4 py-2">{{ number_format($conta->taxa_juros, 2, ',', '.') }}%</td>
                                        <td class="px-4 py-2">{{ $conta->status ? 'Ativa' : 'Inativa' }}</td>
                                        <td class="px-4 py-2">{{ number_format($conta->saldo, 2, ',', '.') }}</td>
                                        <td class="px-4 py-2 flex space-x-2">

                                            <a href="{{ route('contas.edit', $conta->id_conta) }}" class="text-blue-600 hover:underline">Editar</a>
                                            
                                            <form action="{{ route('contas.destroy', $conta->id_conta) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta conta?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:underline">Excluir</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if($contas->isEmpty())
                            <p class="mt-4 text-center text-gray-500 dark:text-gray-400">Nenhuma conta encontrada.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
