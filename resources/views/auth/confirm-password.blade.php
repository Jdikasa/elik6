<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div class="mb-4">
                <h3 class="text-center card-title">{{ __('Forgot your password?') }}</h3>
                <p class="mb-5 card-text">
                    {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                </p>

                <x-validation-errors class="mb-4" />

                @if (session('status'))
                    <div class="mb-4 text-sm font-medium text-danger">
                        {{ session('status') }}
                    </div>
                @endif

            </div>

            <div>
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="form-control-lg" type="password" name="password" required autocomplete="current-password" autofocus />
            </div>

            <div class="flex justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Confirm') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
