<canvas id="chart"></canvas>

<script>
const ctx = document.getElementById('chart').getContext('2d');
const chart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Receitas', 'Despesas'],
        datasets: [{
            data: [{{ $totalReceitas }}, {{ $totalDespesas }}],
            backgroundColor: ['#28a745', '#dc3545']
        }]
    }
});
</script>
