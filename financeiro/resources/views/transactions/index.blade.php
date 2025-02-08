@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Controle Financeiro</h2>
    <a href="{{ route('transactions.create') }}" class="btn btn-primary mb-3">Nova Transação</a>

    <table class="table">
        <thead>
            <tr>
                <th>Data</th>
                <th>Tipo</th>
                <th>Categoria</th>
                <th>Valor</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ date('d/m/Y', strtotime($transaction->date)) }}</td>
                    <td>{{ ucfirst($transaction->type) }}</td>
                    <td>{{ $transaction->category }}</td>
                    <td>R$ {{ number_format($transaction->amount, 2, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('transactions.edit', $transaction) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('transactions.destroy', $transaction) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
