<x-app-layout>
    <x-jet-authentication-card class="bg-white border border-gray-300 shadow-md rounded-lg p-6">
        <x-slot name="logo">
            <div class="flex justify-center mb-4">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-32 h-auto">
            </div>
            <h1 class="text-2xl font-bold text-red-600 text-center">Two-Factor Authentication</h1>
        </x-slot>

        <div x-data="{ recovery: false }">
            <div class="mb-4 text-sm text-gray-600" x-show="! recovery">
                {{ __('Please confirm access to your account by entering the authentication code provided by your authenticator application.') }}
            </div>

            <div class="mb-4 text-sm text-gray-600" x-show="recovery">
                {{ __('Please confirm access to your account by entering one of your emergency recovery codes.') }}
            </div>

            <x-jet-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('two-factor.login') }}">
                @csrf

                <div class="mt-4" x-show="! recovery">
                    <x-jet-label for="code" value="{{ __('Code') }}" class="text-gray-700" />
                    <x-jet-input id="code"
                        class="block mt-1 w-full border border-gray-300 rounded-lg shadow-sm focus:ring-red-500 focus:border-red-500"
                        type="text" inputmode="numeric" name="code" autofocus x-ref="code"
                        autocomplete="one-time-code" />
                </div>

                <div class="mt-4" x-show="recovery">
                    <x-jet-label for="recovery_code" value="{{ __('Recovery Code') }}" class="text-gray-700" />
                    <x-jet-input id="recovery_code"
                        class="block mt-1 w-full border border-gray-300 rounded-lg shadow-sm focus:ring-red-500 focus:border-red-500"
                        type="text" name="recovery_code" x-ref="recovery_code" autocomplete="one-time-code" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button type="button" class="text-sm text-gray-600 hover:text-gray-900 underline cursor-pointer"
                        x-show="! recovery"
                        x-on:click="
                        recovery = true;
                        $nextTick(() => { $refs.recovery_code.focus() })
                    ">
                        {{ __('Use a recovery code') }}
                    </button>

                    <button type="button" class="text-sm text-gray-600 hover:text-gray-900 underline cursor-pointer"
                        x-show="recovery"
                        x-on:click="
                        recovery = false;
                        $nextTick(() => { $refs.code.focus() })
                    ">
                        {{ __('Use an authentication code') }}
                    </button>

                    <x-jet-button
                        class="ml-4 bg-red-600 text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                        {{ __('Log in') }}
                    </x-jet-button>
                </div>
            </form>
        </div>
    </x-jet-authentication-card>
</x-app-layout>
