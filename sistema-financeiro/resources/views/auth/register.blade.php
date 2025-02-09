<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="nome" :value="__('Name')" />
                <x-input id="nome" class="block mt-1 w-full" type="text" name="nome" :value="old('nome')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="senha" :value="__('Password')" />
                <x-input id="senha" class="block mt-1 w-full"
                                type="password"
                                name="senha"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="senha_confirmation" :value="__('Confirm Password')" />
                <x-input id="senha_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="senha_confirmation" required />
            </div>

            <!-- Phone -->
            <div class="mt-4">
                <x-label for="telefone" :value="__('Phone')" />
                <x-input id="telefone" class="block mt-1 w-full" type="text" name="telefone" :value="old('telefone')" />
            </div>

            <!-- Address -->
            <div class="mt-4">
                <x-label for="endereco" :value="__('Address')" />
                <x-input id="endereco" class="block mt-1 w-full" type="text" name="endereco" :value="old('endereco')" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>