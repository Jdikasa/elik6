<x-app-layout>
    @section('titre', 'ELIK6 - '.__('Profile'))
    {{-- <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Profile') }}
        </h2>
    </x-slot> --}}

    <div class="content container-fluid">
        <!--breadcrumb-->
        <div class="page-header card card-lg">
            <div class="text-star">
                <h1>{{ __('Profile Settings') }}</h1>
                <div class="page-breadcrumb d-none d-sm-flex align-items-center">
                    <div class="">
                        <nav aria-label="breadcrumb">
                            <ol class="p-0 mb-0 breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('pm.home') }}"><i class="bi bi-house-fill"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('Profile') }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="block-circle">
                <div class="circle-white"></div>
                <div class="circle-white"></div>
                <div class="circle-white"></div>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="py-0">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')
                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                @livewire('profile.update-password-form')

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                @livewire('profile.two-factor-authentication-form')

                <x-section-border />
            @endif

            @livewire('profile.logout-other-browser-sessions-form')

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-section-border />

                @livewire('profile.delete-user-form')
            @endif
        </div>
    </div>
</x-app-layout>
