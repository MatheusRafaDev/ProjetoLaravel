<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('patch')

                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100 border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="nome" name="nome" value="{{ old('nome', Auth::user()->nome) }}" required>
                        </div>

                        <div class="form-group mt-4">
                            <label for="email">Email</label>
                            <input type="email" class="form-control bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100 border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="email" name="email" value="{{ old('email', Auth::user()->email) }}" required>
                        </div>

                        <div class="form-group mt-4">
                            <label for="telefone">Telefone</label>
                            <input type="text" class="form-control bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100 border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="telefone" name="telefone" value="{{ old('telefone', Auth::user()->telefone) }}">
                        </div>

                        <div class="form-group mt-4">
                            <label for="endereco">Endereço</label>
                            <input type="text" class="form-control bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100 border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="endereco" name="endereco" value="{{ old('endereco', Auth::user()->endereco) }}">
                        </div>

                        <div class="form-group mt-4">
                            <label for="password">Nova Senha</label>
                            <input type="password" class="form-control bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100 border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="password" name="password">
                        </div>

                        <div class="form-group mt-4">
                            <label for="password_confirmation">Confirme a Nova Senha</label>
                            <input type="password" class="form-control bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100 border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="password_confirmation" name="password_confirmation">
                        </div>

                        <button type="submit" class="btn btn-primary mt-4">Salvar</button>
                    </form>

                    <form method="POST" action="{{ route('profile.destroy') }}" class="mt-4">
                        @csrf
                        @method('delete')

                        <button type="submit" class="btn btn-danger">
                            {{ __('Delete Account') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>