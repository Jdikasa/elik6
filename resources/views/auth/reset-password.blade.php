<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="mb-4">
                <h3 class="card-title">{{ __('Reset Password') }}</h3>
                <p class="mb-5 card-text"></p>

                <x-validation-errors class="mb-4" />

                @if (session('status'))
                    <div class="mb-4 text-sm font-medium text-danger">
                        {{ session('status') }}
                    </div>
                @endif

            </div>

            <div class="mb-3">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="form-control-lg" type="email" name="email" :value="old('email', $request->email)"
                    required autofocus autocomplete="username" tabindex="1" placeholder="{{ __('Email') }}"
                    aria-label="email" />
                <span class="invalid-feedback">Svp, tapez une adresse email valide.</span>
            </div>

            <div class="mb-3">
                <x-label for="password" value="{{ __('Password') }}" />
                <div class="input-group input-group-merge" data-hs-validation-validate-class>
                    <x-input id="password" class="js-toggle-password form-control-lg" type="password" name="password" required
                        autocomplete="current-password" placeholder="{{ __('Password') }}"
                        aria-label="4+ characters required" minlength="4"
                        data-hs-toggle-password-options='{
                            "target": "#changePassTarget",
                            "defaultClass": "bi-eye-slash",
                            "showClass": "bi-eye",
                            "classChangeTarget": "#changePassIcon"
                        }'/>
                    <a id="changePassTarget" class="input-group-append input-group-text" href="javascript:;">
                        <i id="changePassIcon" class="bi-eye"></i>
                    </a>
                </div>
                <span class="invalid-feedback">Svp, tapez un mot de passe valide.</span>
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="form-control-lg" type="password" name="password_confirmation" required autocomplete="new-password"
                    placeholder="{{ __('Confirm Password') }}"/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="btn-primary btn-lg">
                    {{ __('Reset Password') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
