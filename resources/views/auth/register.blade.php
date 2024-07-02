<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <h2 class="text-2xl font-bold text-center text-gray-900 dark:text-gray-100 mb-6">Registro</h2>

        <!-- Name -->
        <div>
            <x-input-label for="first_name" :value="__('Primeiro Nome')" />
            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="first_name" />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div>
        
        <!-- Name -->
        <div class="mt-4">
            <x-input-label for="last_name" :value="__('Sobrenome')" />
            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="last_name" />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Palavra-passe')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirme Palavra-passe')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        
        <!-- Nacionalidade -->
        <div class="mt-4">
            <x-input-label for="nationality" :value="__('Nacionalidade')" />
            <x-text-input id="nationality" class="block mt-1 w-full" type="text" name="nationality" :value="old('nationality')" required autofocus autocomplete="nationality" />
            <x-input-error :messages="$errors->get('nationality')" class="mt-2" />
        </div>

        <!-- Trabalho -->
        <div class="mt-4">
            <x-input-label for="job" :value="__('Emprego')" />
            <x-text-input id="job" class="block mt-1 w-full" type="text" name="job" :value="old('job')" required autofocus autocomplete="job" />
            <x-input-error :messages="$errors->get('job')" class="mt-2" />
        </div>
        
        <div class="mt-4">
            <x-input-label for="bi" :value="__('Bilhete de Identidade')" />
            <x-text-input id="bi" class="block mt-1 w-full" type="text" name="bi" :value="old('bi')" required autofocus autocomplete="bi" />
            <x-input-error :messages="$errors->get('bi')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="bi" :value="__('Cartão de Credito')" />
            <x-text-input id="card_number" class="block mt-1 w-full" type="text" name="card_number" :value="old('card_number')" required autofocus autocomplete="card_number" />
            <x-input-error :messages="$errors->get('card_number')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="phone_number" :value="__('Número de Telefone')" />
            <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="old('phone_number')" required autofocus autocomplete="phone_number" />
            <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="address" :value="__('Morada')" />
            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus autocomplete="address" />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Já Registrado?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Registrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
