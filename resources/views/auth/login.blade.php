<x-app-layout>
    <x-jet-authentication-card class="bg-white border border-gray-300 shadow-md rounded-lg p-6">
        <x-slot name="logo">
            <div class="flex justify-center mb-4">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-32 h-auto">
            </div>
            <h1 class="text-2xl font-bold text-red-600 text-center">Inicia sesión</h1>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <x-jet-label for="email" value="{{ __('Email') }}" class="text-gray-700" />
                <x-jet-input id="email"
                    class="block mt-1 w-full border border-gray-300 rounded-lg shadow-sm focus:ring-red-500 focus:border-red-500"
                    type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mb-4">
                <x-jet-label for="password" value="{{ __('Password') }}" class="text-gray-700" />
                <x-jet-input id="password"
                    class="block mt-1 w-full border border-gray-300 rounded-lg shadow-sm focus:ring-red-500 focus:border-red-500"
                    type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="flex items-center mb-4">
                <x-jet-checkbox id="remember_me" name="remember" class="h-4 w-4 text-red-600 border-gray-300 rounded" />
                <label for="remember_me" class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</label>
            </div>

            <div class="flex items-center justify-between">
                @if (Route::has('password.request'))
                    <a class="text-sm text-red-600 hover:text-red-800 underline" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button
                    class="bg-red-600 text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-app-layout>
