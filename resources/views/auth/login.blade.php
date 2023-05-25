<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <form class="js-validate needs-validation" novalidate method="POST" action="{{ route('login') }}">
            @csrf

            <div class="text-center">
                <div class="mb-4">
                    <h3 class="card-title">Connexion</h3>
                    <p class="mb-5 card-text">Bienvenu dans votre système de gestion des projets</p>

                    <x-validation-errors class="mb-4" />

                    @if (session('status'))
                        <div class="mb-4 text-sm font-medium text-danger">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>

                {{-- <div class="mb-3 d-grid">
                    {{-- <label class="form-label text-start" for="entreprise">{{ __('Entreprise') }}</label> -}}
                    <select id="entreprise" class="form-control single-select" name="team" required>
                        <option value="" disabled selected>Selectionez une entreprise</option>
                        @foreach (\App\Models\Team::all() as $team)
                            <option value="{{ $team->getKey() }}">{{ $team->name }}</option>
                        @endforeach
                    </select>
                </div> --}}
            </div>
            <div class="mb-3">
                <x-label for="signinSrEmail" value="{{ __('Email') }}" />
                <x-input id="signinSrEmail" class="form-control-lg" type="email" name="email" :value="old('email')"
                    required  autocomplete="off" tabindex="1" placeholder="{{ __('Email') }}"
                    aria-label="email" />
                <span class="invalid-feedback">Svp, tapez une adresse email valide.</span>
            </div>

            <div class="mb-3">
                <x-label for="signupSrPassword" class="w-100">
                    <span class="d-flex justify-content-between align-items-center">
                        <span>{{ __('Password') }}</span>
                        @if (Route::has('password.request'))
                            <a class="mb-0 form-label-link" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </span>
                </x-label>
                <div class="input-group input-group-merge" data-hs-validation-validate-class>
                    <x-input id="signupSrPassword" class="js-toggle-password form-control-lg" type="password" name="password" required
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

            <div class="mb-3 form-check">
                <x-checkbox id="remember_me" name="remember"/>
                <label for="remember_me" class="form-check-label">
                    <span class="me-2">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="d-grid">
                <x-button class="btn-primary btn-lg text-uppercase">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
