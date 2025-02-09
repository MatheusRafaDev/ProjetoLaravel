<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Adicionar Transferência') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('transferencias.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="id_conta_origem">Conta de Origem</label>
                            <select id="id_conta_origem" name="id_conta_origem" class="form-control" required>
                                @foreach($contas as $conta)
                                    <option value="{{ $conta->id_conta }}">{{ $conta->nome_conta }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-4">
                            <label for="id_conta_destino">Conta de Destino</label>
                            <select id="id_conta_destino" name="id_conta_destino" class="form-control" required>
                                @foreach($contas as $conta)
                                    <option value="{{ $conta->id_conta }}">{{ $conta->nome_conta }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-4">
                            <label for="valor">Valor</label>
                            <input type="number" step="0.01" class="form-control" id="valor" name="valor" required>
                        </div>
                        <div class="form-group mt-4">
                            <label for="data_transferencia">Data da Transferência</label>
                            <input type="date" class="form-control" id="data_transferencia" name="data_transferencia" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>