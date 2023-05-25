<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <form class="js-validate needs-validation" novalidate method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-4">
                <h3 class="text-center card-title">{{ __('Forgot your password?') }}</h3>
                <p class="mb-5 card-text">
                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </p>

                <x-validation-errors class="mb-4" />

                @if (session('status'))
                    <div class="mb-4 text-sm font-medium text-danger">
                        {{ session('status') }}
                    </div>
                @endif

            </div>

            <div class="mb-3">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="form-control-lg" type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                tabindex="1" placeholder="{{ __('Email') }}"
                aria-label="email"/>
                <span class="invalid-feedback">Svp, tapez une adresse email valide.</span>
            </div>

            <div class="flex items-center justify-end">
                <x-button class="btn-link btn-lg text-uppercase">
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
