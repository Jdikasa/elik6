<x-app-layout>
    @section('titre', 'ELIK6 - ' . __('Create Team'))
    <div class="content container-fluid">
        <!--breadcrumb-->
        <div class="page-header card card-lg">
            <div class="text-star">
                <h1>{{ __('Create Team') }}</h1>
                <div class="page-breadcrumb d-none d-sm-flex align-items-center">
                    <div class="mt-2">
                        <nav aria-label="breadcrumb">
                            <ol class="p-0 mb-0 breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('pm.home') }}"><i class="bi bi-house-fill"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('Create Team') }}</li>
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
            <div class="card">
                @livewire('teams.create-team-form')
            </div>
        </div>
    </div>
</x-app-layout>
