<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
            <a href="{{ route('movimentacoes.index') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-300 underline">Movimentações</a>
            <a href="{{ route('categorias.index') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-300 underline">Categorias</a>
            <a href="{{ route('transferencias.index') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-300 underline">Transferências</a>
            <a href="{{ route('contas.index') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-300 underline">Contas</a>
        </h2>
    </x-slot>



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