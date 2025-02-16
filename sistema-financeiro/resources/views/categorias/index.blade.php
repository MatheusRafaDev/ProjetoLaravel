<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Categorias') }}
            <a href="{{ route('movimentacoes.index') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-300 underline">Movimentações</a>
            <a href="{{ route('contas.index') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-300 underline">Contas</a>
            <a href="{{ route('transferencias.index') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-300 underline">Transferências</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('categorias.create') }}" class="mt-4 py-2 px-4 bg-gray-600 text-white rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">
                        Adicionar Categoria
                    </a>
                    <div class="relative overflow-x-auto mt-6">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th class="px-4 py-2">ID</th>
                                    <th class="px-4 py-2">Nome</th>
                                    <th class="px-4 py-2">Tipo</th>
                                    <th class="px-4 py-2">Criado em</th>
                                    <th class="px-4 py-2">Atualizado em</th>
                                    <th class="px-4 py-2">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categorias as $categoria)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-4 py-2">{{ $categoria->id_categoria }}</td>
                                        <td class="px-4 py-2">{{ $categoria->nome_categoria }}</td>
                                        <td class="px-4 py-2">{{ $categoria->tipo }}</td>
                                        <td class="px-4 py-2">{{ $categoria->created_at }}</td>
                                        <td class="px-4 py-2">{{ $categoria->updated_at }}</td>
                                        <td class="px-4 py-2">
                                            <a href="{{ route('categorias.edit', $categoria->id_categoria) }}" class="text-blue-600 hover:text-blue-800">Editar</a>
                                            <form action="{{ route('categorias.destroy', $categoria->id_categoria) }}" method="POST" class="inline-block ml-4">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800">Deletar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if($categorias->isEmpty())
                            <p class="mt-4 text-center text-gray-500 dark:text-gray-400">Nenhuma categoria encontrada.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
