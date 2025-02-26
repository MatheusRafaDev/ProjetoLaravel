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
                        <div class="mb-4">
                            <label for="nome_conta" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nome da Conta</label>
                            <input type="text" id="nome_conta" name="nome_conta" value="{{ old('nome_conta') }}" maxlength="255" required
                                   class="mt-1 block w-full bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100 border @error('nome_conta') border-red-500 @else border-gray-300 dark:border-gray-600 @enderror rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            @error('nome_conta')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="saldo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Saldo</label>
                            <input type="text" id="saldo" name="saldo" value="{{ old('saldo') }}" required
                                   class="decimal-mask mt-1 block w-full bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100 border @error('saldo') border-red-500 @else border-gray-300 dark:border-gray-600 @enderror rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            @error('saldo')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="banco_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Banco</label>
                            <select id="banco_id" name="banco_id" required class="mt-1 block w-full bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100 border @error('banco_id') border-red-500 @else border-gray-300 dark:border-gray-600 @enderror rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="">{{ __('Selecione um banco') }}</option>
                                <option value="1" {{ old('banco_id') == '1' ? 'selected' : '' }}>Banco do Brasil</option>
                                <option value="2" {{ old('banco_id') == '2' ? 'selected' : '' }}>Caixa Econômica Federal</option>
                                <option value="3" {{ old('banco_id') == '3' ? 'selected' : '' }}>Bradesco</option>
                                <option value="4" {{ old('banco_id') == '4' ? 'selected' : '' }}>Itaú</option>
                                <option value="5" {{ old('banco_id') == '5' ? 'selected' : '' }}>Santander</option>
                            </select>
                            @error('banco_id')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="numero_agencia" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Número da Agência</label>
                            <input type="text" id="numero_agencia" name="numero_agencia" value="{{ old('numero_agencia') }}" maxlength="10"
                                   class="mt-1 block w-full bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100 border @error('numero_agencia') border-red-500 @else border-gray-300 dark:border-gray-600 @enderror rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            @error('numero_agencia')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="numero_conta" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Número da Conta</label>
                            <input type="text" id="numero_conta" name="numero_conta" value="{{ old('numero_conta') }}" maxlength="20"
                                   class="mt-1 block w-full bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100 border @error('numero_conta') border-red-500 @else border-gray-300 dark:border-gray-600 @enderror rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            @error('numero_conta')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="tipo_conta" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tipo de Conta</label>
                            <input type="text" id="tipo_conta" name="tipo_conta" value="{{ old('tipo_conta') }}" maxlength="50"
                                   class="mt-1 block w-full bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100 border @error('tipo_conta') border-red-500 @else border-gray-300 dark:border-gray-600 @enderror rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            @error('tipo_conta')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="descricao" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Descrição</label>
                            <textarea id="descricao" name="descricao" maxlength="500"
                                      class="mt-1 block w-full bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100 border @error('descricao') border-red-500 @else border-gray-300 dark:border-gray-600 @enderror rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('descricao') }}</textarea>
                            @error('descricao')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="data_abertura" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Data de Abertura</label>
                            <input type="date" id="data_abertura" name="data_abertura" value="{{ old('data_abertura') }}"
                                   class="mt-1 block w-full bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100 border @error('data_abertura') border-red-500 @else border-gray-300 dark:border-gray-600 @enderror rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            @error('data_abertura')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="limite_credito" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Limite de Crédito</label>
                            <input type="text" id="limite_credito" name="limite_credito" value="{{ old('limite_credito') }}"
                                   class="decimal-mask mt-1 block w-full bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100 border @error('limite_credito') border-red-500 @else border-gray-300 dark:border-gray-600 @enderror rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            @error('limite_credito')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="taxa_juros" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Taxa de Juros</label>
                            <input type="text" id="taxa_juros" name="taxa_juros" value="{{ old('taxa_juros') }}"
                                   class="percentage-mask mt-1 block w-full bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100 border @error('taxa_juros') border-red-500 @else border-gray-300 dark:border-gray-600 @enderror rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            @error('taxa_juros')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                            <select id="status" name="status" required
                                    class="mt-1 block w-full bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100 border @error('status') border-red-500 @else border-gray-300 dark:border-gray-600 @enderror rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Ativa</option>
                                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inativa</option>
                            </select>
                            @error('status')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="mt-4 py-2 px-4 bg-gray-600 text-white rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">
                            Salvar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>