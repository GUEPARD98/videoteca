<x-app-layout>
    <x-jet-authentication-card class="bg-white border border-gray-300 shadow-md rounded-lg p-6">
        <x-slot name="logo">
            <div class="flex justify-center mb-4">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-32 h-auto">
            </div>
            <h1 class="text-2xl font-bold text-red-600 text-center">Restablecer Contraseña</h1>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="mb-4">
                <x-jet-label for="email" value="{{ __('Email') }}" class="text-gray-700" />
                <x-jet-input id="email"
                    class="block mt-1 w-full border border-gray-300 rounded-lg shadow-sm focus:ring-red-500 focus:border-red-500"
                    type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <div class="mb-4">
                <x-jet-label for="password" value="{{ __('Password') }}" class="text-gray-700" />
                <x-jet-input id="password"
                    class="block mt-1 w-full border border-gray-300 rounded-lg shadow-sm focus:ring-red-500 focus:border-red-500"
                    type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mb-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="text-gray-700" />
                <x-jet-input id="password_confirmation"
                    class="block mt-1 w-full border border-gray-300 rounded-lg shadow-sm focus:ring-red-500 focus:border-red-500"
                    type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button
                    class="bg-red-600 text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                    {{ __('Reset Password') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-app-layout>
