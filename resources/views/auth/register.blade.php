<x-app-layout>
    <x-jet-authentication-card class="bg-white border border-gray-300 shadow-md rounded-lg p-6">
        <x-slot name="logo">
            <div class="flex justify-center mb-4">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-32 h-auto">
            </div>
            <h1 class="text-2xl font-bold text-red-600 text-center">Registro de Usuario</h1>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4">
                <x-jet-label for="name" value="{{ __('Name') }}" class="text-gray-700" />
                <x-jet-input id="name"
                    class="block mt-1 w-full border border-gray-300 rounded-lg shadow-sm focus:ring-red-500 focus:border-red-500"
                    type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mb-4">
                <x-jet-label for="email" value="{{ __('Email') }}" class="text-gray-700" />
                <x-jet-input id="email"
                    class="block mt-1 w-full border border-gray-300 rounded-lg shadow-sm focus:ring-red-500 focus:border-red-500"
                    type="email" name="email" :value="old('email')" required />
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

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mb-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"
                                class="h-4 w-4 text-red-600 border-gray-300 rounded" required />
                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' =>
                                        '<a target="_blank" href="' .
                                        route('terms.show') .
                                        '" class="underline text-sm text-gray-600 hover:text-gray-900">' .
                                        __('Terms of Service') .
                                        '</a>',
                                    'privacy_policy' =>
                                        '<a target="_blank" href="' .
                                        route('policy.show') .
                                        '" class="underline text-sm text-gray-600 hover:text-gray-900">' .
                                        __('Privacy Policy') .
                                        '</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-between mt-4">
                <a class="underline text-sm text-red-600 hover:text-red-800" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button
                    class="bg-red-600 text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-app-layout>
