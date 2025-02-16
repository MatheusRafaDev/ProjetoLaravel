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
</x-app-layout>