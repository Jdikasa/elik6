<x-app-layout>
    @section('titre', 'ELIK6 - '.__('Team Settings'))
    {{-- <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Team Settings') }}
        </h2>
    </x-slot> --}}

    <div class="content container-fluid">
        <!--breadcrumb-->
        <div class="page-header card card-lg">
            <div class="text-star">
                <h1>{{ __('Team Settings') }}</h1>
                <div class="page-breadcrumb d-none d-sm-flex align-items-center">
                    <div class="">
                        <nav aria-label="breadcrumb">
                            <ol class="p-0 mb-0 breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('pm.home') }}"><i class="bi bi-house-fill"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('Team') }}</li>
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

            @livewire('teams.update-team-name-form', ['team' => $team])

            @livewire('teams.team-information', ['team' => $team])

            @livewire('teams.team-member-manager', ['team' => $team])

            @if (Gate::check('delete', $team) && ! $team->personal_team)
                <x-section-border />

                <div class="">
                    @livewire('teams.delete-team-form', ['team' => $team])
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
