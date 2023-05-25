<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="">
            <div class="mb-4">
                <h3 class="card-title">{{ __('Verification Email') }}</h3>
                <p class="mb-4 card-text">
                    {{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                </p>

                @if (session('status') == 'verification-link-sent')
                    <p class="mb-5 text-sm font-medium text-green-600 card-text dark:text-green-400">
                        {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
                    </p>
                @endif

            </div>

            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button type="submit" class="btn-link text-uppercase">
                        {{ __('Resend Verification Email') }}
                    </x-button>
                </div>
            </form>

            <div>
                <a href="{{ route('profile.show') }}" class="btn-primary btn-lg text-uppercase">{{ __('Edit Profile') }}</a>

                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf

                    <button type="submit" class="btn-danger btn-lg text-uppercase">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </x-authentication-card>
</x-guest-layout>
