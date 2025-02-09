<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3>{{ __('Contas') }}</h3>
                    <table class="table-auto w-full mt-4">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">{{ __('Nome da Conta') }}</th>
                                <th class="px-4 py-2">{{ __('Saldo') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contas as $conta)
                                <tr>
                                    <td class="border px-4 py-2">{{ $conta->nome_conta }}</td>
                                    <td class="border px-4 py-2">{{ $conta->saldo }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3>{{ __('Usuários') }}</h3>
                    <table class="table-auto w-full mt-4">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">{{ __('Nome') }}</th>
                                <th class="px-4 py-2">{{ __('Email') }}</th>
                                <th class="px-4 py-2">{{ __('Data de Registro') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $usuario)
                                <tr>
                                    <td class="border px-4 py-2">{{ $usuario->nome }}</td>
                                    <td class="border px-4 py-2">{{ $usuario->email }}</td>
                                    <td class="border px-4 py-2">{{ $usuario->created_at->format('d/m/Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3>{{ __('Movimentações Financeiras') }}</h3>
                    <table class="table-auto w-full mt-4">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">{{ __('Descrição') }}</th>
                                <th class="px-4 py-2">{{ __('Valor') }}</th>
                                <th class="px-4 py-2">{{ __('Tipo de Movimentação') }}</th>
                                <th class="px-4 py-2">{{ __('Data da Movimentação') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($movimentacoes as $movimentacao)
                                <tr>
                                    <td class="border px-4 py-2">{{ $movimentacao->descricao }}</td>
                                    <td class="border px-4 py-2">{{ $movimentacao->valor }}</td>
                                    <td class="border px-4 py-2">{{ $movimentacao->tipo_movimentacao }}</td>
                                    <td class="border px-4 py-2">{{ $movimentacao->data_movimentacao->format('d/m/Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3>{{ __('Transferências') }}</h3>
                    <table class="table-auto w-full mt-4">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">{{ __('Conta de Origem') }}</th>
                                <th class="px-4 py-2">{{ __('Conta de Destino') }}</th>
                                <th class="px-4 py-2">{{ __('Valor') }}</th>
                                <th class="px-4 py-2">{{ __('Data da Transferência') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transferencias as $transferencia)
                                <tr>
                                    <td class="border px-4 py-2">{{ $transferencia->id_conta_origem }}</td>
                                    <td class="border px-4 py-2">{{ $transferencia->id_conta_destino }}</td>
                                    <td class="border px-4 py-2">{{ $transferencia->valor }}</td>
                                    <td class="border px-4 py-2">{{ $transferencia->data_transferencia->format('d/m/Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const contas = @json($contas);
        const usuarios = @json($usuarios);
        const movimentacoes = @json($movimentacoes);
        const transferencias = @json($transferencias);

        const contasChartCtx = document.getElementById('contasChart').getContext('2d');
        const usuariosChartCtx = document.getElementById('usuariosChart').getContext('2d');
        const movimentacoesChartCtx = document.getElementById('movimentacoesChart').getContext('2d');
        const transferenciasChartCtx = document.getElementById('transferenciasChart').getContext('2d');

        const contasData = {
            labels: contas.map(conta => conta.nome_conta),
            datasets: [{
                label: 'Saldo das Contas',
                data: contas.map(conta => conta.saldo),
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        };

        const usuariosData = {
            labels: usuarios.map(usuario => usuario.nome),
            datasets: [{
                label: 'Usuários Registrados',
                data: usuarios.map(usuario => new Date(usuario.created_at).toLocaleDateString()),
                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                borderColor: 'rgba(153, 102, 255, 1)',
                borderWidth: 1
            }]
        };

        const movimentacoesData = {
            labels: movimentacoes.map(movimentacao => movimentacao.descricao),
            datasets: [{
                label: 'Movimentações Financeiras',
                data: movimentacoes.map(movimentacao => movimentacao.valor),
                backgroundColor: movimentacoes.map(movimentacao => movimentacao.tipo_movimentacao === 'entrada' ? 'rgba(75, 192, 192, 0.2)' : 'rgba(255, 99, 132, 0.2)'),
                borderColor: movimentacoes.map(movimentacao => movimentacao.tipo_movimentacao === 'entrada' ? 'rgba(75, 192, 192, 1)' : 'rgba(255, 99, 132, 1)'),
                borderWidth: 1
            }]
        };

        const transferenciasData = {
            labels: transferencias.map(transferencia => `De ${transferencia.id_conta_origem} para ${transferencia.id_conta_destino}`),
            datasets: [{
                label: 'Transferências',
                data: transferencias.map(transferencia => transferencia.valor),
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        };

        new Chart(contasChartCtx, {
            type: 'bar',
            data: contasData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        new Chart(usuariosChartCtx, {
            type: 'line',
            data: usuariosData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        new Chart(movimentacoesChartCtx, {
            type: 'bar',
            data: movimentacoesData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        new Chart(transferenciasChartCtx, {
            type: 'bar',
            data: transferenciasData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</x-app-layout>