<header id="header" x-data="{ open: false }" class="bg-white navbar navbar-expand-lg navbar-fixed navbar-height navbar-container navbar-borderless">
    <!-- Primary Navigation Menu -->
    <div class="navbar-nav-wrap">
        <!-- Logo -->
        <a class="navbar-brand" href="{{ route('pm.home') }}" aria-label="Front">
            <img class="navbar-brand-logo" src="{{ asset('assets/svg/logos/logo.png') }}" alt="Logo" data-hs-theme-appearance="default">
            <img class="navbar-brand-logo" src="{{ asset('assets/svg/logos-light/logo.png') }}" alt="Logo" data-hs-theme-appearance="dark">
            <img class="navbar-brand-logo-mini" src="{{ asset('assets/svg/logos/logo-short.png') }}" alt="Logo" data-hs-theme-appearance="default">
            <img class="navbar-brand-logo-mini" src="{{ asset('assets/svg/logos-light/logo-short.png') }}" alt="Logo" data-hs-theme-appearance="dark">
        </a>
        <!-- End Logo -->

        <div class="navbar-nav-wrap-content-start">
            <!-- Navbar Vertical Toggle -->
            <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-aside-toggler">
                <i class="bi-arrow-bar-left navbar-toggler-short-align"
                    data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
                    data-bs-toggle="tooltip" data-bs-placement="right" title="Collapse"></i>
                <i class="bi-arrow-bar-right navbar-toggler-full-align"
                    data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
                    data-bs-toggle="tooltip" data-bs-placement="right" title="Expand"></i>
            </button>
            <!-- End Navbar Vertical Toggle -->

            {{-- <!-- Search Form -->
            <div class="dropdown ms-2">
                <!-- Input Group -->
                <div class="d-none d-lg-block">
                    <div class="input-group input-group-merge input-group-borderless input-group-hover-light navbar-input-group">
                        <div class="input-group-prepend input-group-text">
                            <i class="bi-search"></i>
                        </div>

                        <input type="search" class="js-form-search form-control" placeholder="Search in front"
                            aria-label="Search in front"
                            data-hs-form-search-options='{
                       "clearIcon": "#clearSearchResultsIcon",
                       "dropMenuElement": "#searchDropdownMenu",
                       "dropMenuOffset": 20,
                       "toggleIconOnFocus": true,
                       "activeClass": "focus"
                     }'>
                        <a class="input-group-append input-group-text" href="javascript:;">
                            <i id="clearSearchResultsIcon" class="bi-x-lg" style="display: none;"></i>
                        </a>
                    </div>
                </div>

                <button class="js-form-search js-form-search-mobile-toggle btn btn-ghost-secondary btn-icon rounded-circle d-lg-none"
                    type="button"
                    data-hs-form-search-options='{
                       "clearIcon": "#clearSearchResultsIcon",
                       "dropMenuElement": "#searchDropdownMenu",
                       "dropMenuOffset": 20,
                       "toggleIconOnFocus": true,
                       "activeClass": "focus"
                     }'>
                    <i class="bi-search"></i>
                </button>
                <!-- End Input Group -->

                <!-- Card Search Content -->
                {{-- <div id="searchDropdownMenu"
                    class="hs-form-search-menu-content dropdown-menu dropdown-menu-form-search navbar-dropdown-menu-borderless">
                    <div class="card">
                        <!-- Body -->
                        <div class="card-body-height">
                            <div class="d-lg-none">
                                <div class="mb-5 input-group input-group-merge navbar-input-group">
                                    <div class="input-group-prepend input-group-text">
                                        <i class="bi-search"></i>
                                    </div>

                                    <input type="search" class="form-control" placeholder="Search in front"
                                        aria-label="Search in front">
                                    <a class="input-group-append input-group-text" href="javascript:;">
                                        <i class="bi-x-lg"></i>
                                    </a>
                                </div>
                            </div>

                            <span class="dropdown-header">Recent searches</span>

                            <div class="bg-transparent dropdown-item text-wrap">
                                <a class="btn btn-soft-dark btn-xs rounded-pill" href="index-2.html">
                                    Gulp <i class="bi-search ms-1"></i>
                                </a>
                                <a class="btn btn-soft-dark btn-xs rounded-pill" href="index-2.html">
                                    Notification panel <i class="bi-search ms-1"></i>
                                </a>
                            </div>

                            <div class="dropdown-divider"></div>

                            <span class="dropdown-header">Tutorials</span>

                            <a class="dropdown-item" href="index-2.html">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <span class="icon icon-soft-dark icon-xs icon-circle">
                                            <i class="bi-sliders"></i>
                                        </span>
                                    </div>

                                    <div class="flex-grow-1 text-truncate ms-2">
                                        <span>How to set up Gulp?</span>
                                    </div>
                                </div>
                            </a>

                            <a class="dropdown-item" href="index-2.html">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <span class="icon icon-soft-dark icon-xs icon-circle">
                                            <i class="bi-paint-bucket"></i>
                                        </span>
                                    </div>

                                    <div class="flex-grow-1 text-truncate ms-2">
                                        <span>How to change theme color?</span>
                                    </div>
                                </div>
                            </a>

                            <div class="dropdown-divider"></div>

                            <span class="dropdown-header">Members</span>

                            <a class="dropdown-item" href="index-2.html">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <img class="avatar avatar-xs avatar-circle" src="assets/img/160x160/img10.jpg"
                                            alt="Image Description">
                                    </div>
                                    <div class="flex-grow-1 text-truncate ms-2">
                                        <span>Amanda Harvey <i class="tio-verified text-primary" data-toggle="tooltip"
                                                data-placement="top" title="Top endorsed"></i></span>
                                    </div>
                                </div>
                            </a>

                            <a class="dropdown-item" href="index-2.html">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <img class="avatar avatar-xs avatar-circle" src="assets/img/160x160/img3.jpg"
                                            alt="Image Description">
                                    </div>
                                    <div class="flex-grow-1 text-truncate ms-2">
                                        <span>David Harrison</span>
                                    </div>
                                </div>
                            </a>

                            <a class="dropdown-item" href="index-2.html">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="avatar avatar-xs avatar-soft-info avatar-circle">
                                            <span class="avatar-initials">A</span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 text-truncate ms-2">
                                        <span>Anne Richard</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- End Body -->

                        <!-- Footer -->
                        <a class="text-center card-footer" href="index-2.html">
                            See all results <i class="bi-chevron-right small"></i>
                        </a>
                        <!-- End Footer -->
                    </div>
                </div> -}}
                <!-- End Card Search Content -->

            </div>
            <!-- End Search Form --> --}}
        </div>

        <div class="navbar-nav-wrap-content-end">
            <ul class="navbar-nav">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <li class="nav-item d-none d-sm-inline-block">
                        <x-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="btn btn-ghost-secondary btn-ico rounded-pill d-flex">
                                        {{ Auth::user()->currentTeam?->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="dropdown-card w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam?->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-dropdown-link>
                                    @endcan

                                    <!-- Team Switcher -->
                                    @if (Auth::user()->allTeams()->count() > 1)
                                        <div class="border-t border-gray-200 dark:border-gray-600"></div>

                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Switch Teams') }}
                                        </div>

                                        @foreach (Auth::user()->allTeams() as $team)
                                            <x-switchable-team :team="$team" />
                                        @endforeach
                                    @endif
                                </div>
                            </x-slot>
                        </x-dropdown>
                    </li>
                @endif

                {{-- <li class="nav-item d-none d-sm-inline-block">
                    <!-- Notification -->
                    <div class="dropdown">
                        <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle"
                            id="navbarNotificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false"
                            data-bs-auto-close="outside" data-bs-dropdown-animation>
                            <i class="bi-bell"></i>
                            <span class="btn-status btn-sm-status btn-status-danger"></span>
                        </button>

                        <div class="dropdown-menu dropdown-menu-end dropdown-card navbar-dropdown-menu navbar-dropdown-menu-borderless p-0"
                            aria-labelledby="navbarNotificationsDropdown" style="width: 25rem;">
                            <div class="card p-0">
                                <!-- Header -->
                                <div class="card-header card-header-content-between p-3">
                                    <h4 class="card-title">Notifications</h4>
                                </div>
                                <!-- End Header -->

                                <!-- Body -->
                                <div class="card-body-height p-3">
                                    <!-- List Group -->
                                    <ul class="list-group list-group-flush navbar-card-list-group p-0 m-0">
                                        <!-- Item -->
                                        <li class="list-group-item form-check-select p-0">
                                            <a class="stretched-link" href="#">
                                                <div class="row">
                                                    <div class="col-auto">
                                                        <div class="d-flex align-items-center">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="notificationCheck1" checked>
                                                                <label class="form-check-label"
                                                                    for="notificationCheck1"></label>
                                                                <span class="form-check-stretched-bg"></span>
                                                            </div>
                                                            <img class="avatar avatar-sm avatar-circle"
                                                                src="{{ asset('assets/img/160x160/img3.jpg') }}"
                                                                alt="Image Description">
                                                        </div>
                                                    </div>
                                                    <!-- End Col -->

                                                    <div class="col ms-n2">
                                                        <h5 class="mb-1">Brian Warner</h5>
                                                        <p class="text-body fs-5">changed an issue from "In
                                                            Progress" to <span
                                                                class="badge bg-success">Review</span></p>
                                                    </div>
                                                    <!-- End Col -->

                                                    <small class="col-auto text-muted text-cap">2hr</small>
                                                    <!-- End Col -->
                                                </div>
                                            </a>
                                            <a href="#" class="remove-btn">
                                                <i class="bi bi-x"></i>
                                            </a>
                                        </li>
                                        <!-- End Item -->

                                        <!-- Item -->
                                        <li class="list-group-item form-check-select p-0">
                                            <a class="stretched-link" href="#">
                                                <div class="row">
                                                    <div class="col-auto">
                                                        <div class="d-flex align-items-center">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="" id="notificationCheck4">
                                                                <label class="form-check-label"
                                                                    for="notificationCheck4"></label>
                                                                <span class="form-check-stretched-bg"></span>
                                                            </div>
                                                            <div class="avatar avatar-sm avatar-circle">
                                                                <img class="avatar-img"
                                                                    src="{{ asset('assets/svg/brands/google-icon.svg') }}"
                                                                    alt="Image Description">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Col -->

                                                    <div class="col ms-n2">
                                                        <h5 class="mb-1">from Google</h5>
                                                        <p class="text-body fs-5">Start using forms to capture the
                                                            information of prospects visiting your Google website
                                                        </p>
                                                    </div>
                                                    <!-- End Col -->

                                                    <small class="col-auto text-muted text-cap">17dy</small>
                                                    <!-- End Col -->
                                                </div>
                                                <!-- End Row -->
                                            </a>
                                            <a href="#" class="remove-btn">
                                                <i class="bi bi-x"></i>
                                            </a>
                                        </li>
                                        <!-- End Item -->
                                    </ul>
                                    <!-- End List Group -->
                                </div>
                                <!-- End Body -->

                                <!-- Card Footer -->
                                {{-- <a class="text-center card-footer p-0 pt-2" href="#">
                                    View all notifications <i class="bi-chevron-right"></i>
                                </a> -}}
                                <!-- End Card Footer -->
                            </div>
                        </div>
                    </div>
                    <!-- End Notification -->
                </li> --}}

                <!-- Settings Dropdown -->
                <div class="relative ml-3">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm transition border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300">
                                    <img class="object-cover w-8 h-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md dark:text-gray-400 dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-dropdown-link>
                            @endif

                            <div class="border-t border-gray-200 dark:border-gray-600"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-dropdown-link href="{{ route('logout') }}"
                                         @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </ul>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('pm.home') }}" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="mr-3 shrink-0">
                        <img class="object-cover w-10 h-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="text-base font-medium text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                    <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-responsive-nav-link href="{{ route('logout') }}"
                                   @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200 dark:border-gray-600"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam?->id) }}" :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-responsive-nav-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                            {{ __('Create New Team') }}
                        </x-responsive-nav-link>
                    @endcan

                    <!-- Team Switcher -->
                    @if (Auth::user()->allTeams()->count() > 1)
                        <div class="border-t border-gray-200 dark:border-gray-600"></div>

                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Switch Teams') }}
                        </div>

                        @foreach (Auth::user()->allTeams() as $team)
                            <x-switchable-team :team="$team" component="responsive-nav-link" />
                        @endforeach
                    @endif
                @endif
            </div>
        </div>
    </div>
</header>
