<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Adicionar Conta') }}
            <a href="{{ route('contas.index') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-300 underline">Contas</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('contas.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="nome_conta" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nome da Conta</label>
                            <input type="text" id="nome_conta" name="nome_conta" required
                                   class="mt-1 block w-full bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100 border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                        <div class="form-group mt-4">
                            <label for="saldo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Saldo</label>
                            <input type="number" id="saldo" name="saldo" step="0.01" required
                                   class="mt-1 block w-full bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100 border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                        <button type="submit" class="mt-6 py-2 px-4 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                            Salvar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
