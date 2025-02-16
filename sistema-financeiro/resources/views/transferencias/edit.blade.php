<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Transferência') }}
            <a href="{{ route('transferencias.index') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-300 underline">Transferências</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('transferencias.update', $transferencia->id_transferencia) }}">
                        @csrf
                        @method('PUT') <!-- Método PUT para indicar que é uma atualização -->
                        
                        <div class="form-group">
                            <label for="id_conta_origem" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Conta de Origem</label>
                            <select id="id_conta_origem" name="id_conta_origem" class="form-control bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100 border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 py-3 text-lg w-full" required>
                                <option value="" disabled selected>Selecione a Conta de Origem</option>
                                @foreach($contas as $conta)
                                    <option value="{{ $conta->id_conta }}" {{ $conta->id_conta == $transferencia->id_conta_origem ? 'selected' : '' }}>
                                        {{ $conta->nome_conta }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mt-4">
                            <label for="id_conta_destino" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Conta de Destino</label>
                            <select id="id_conta_destino" name="id_conta_destino" class="form-control bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100 border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 py-3 text-lg w-full" required>
                                <option value="" disabled selected>Selecione a Conta de Destino</option>
                                @foreach($contas as $conta)
                                    <option value="{{ $conta->id_conta }}" {{ $conta->id_conta == $transferencia->id_conta_destino ? 'selected' : '' }}>
                                        {{ $conta->nome_conta }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mt-4">
                            <label for="valor" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Valor</label>
                            <input type="number" step="0.01" class="form-control bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100 border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 py-3 text-lg w-full" id="valor" name="valor" value="{{ old('valor', $transferencia->valor) }}" required>
                        </div>

                        <div class="form-group mt-4">
                            <label for="data_transferencia" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Data da Transferência</label>
                            <input type="date" class="form-control bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100 border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 py-3 text-lg w-full" id="data_transferencia" name="data_transferencia" value="{{ old('data_transferencia', $transferencia->data_transferencia->toDateString()) }}" required>
                        </div>

                        <button type="submit" class="mt-4 py-2 px-4 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
