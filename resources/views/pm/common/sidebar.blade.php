<aside
    class="bg-white js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-vertical-aside-initialized">
    <div class="navbar-vertical-container">
        <div class="navbar-vertical-footer-offset">
            <!-- Logo -->
            <a class="navbar-brand" href="index-2.html" aria-label="Front">
                <img class="navbar-brand-logo" src="{{ asset('assets/svg/logos/logo.png') }}" alt="Logo"
                    data-hs-theme-appearance="default">
                <img class="navbar-brand-logo" src="{{ asset('assets/svg/logos-light/logo.png') }}" alt="Logo"
                    data-hs-theme-appearance="dark">
                <img class="navbar-brand-logo-mini" src="{{ asset('assets/svg/logos/logo-short.png') }}" alt="Logo"
                    data-hs-theme-appearance="default">
                <img class="navbar-brand-logo-mini" src="{{ asset('assets/svg/logos-light/logo-short.png') }}"
                    alt="Logo" data-hs-theme-appearance="dark">
            </a>
            <!-- End Logo -->

            <!-- Navbar Vertical Toggle -->
            <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-aside-toggler"
                style="opacity: 1;">
                <i class="bi-arrow-left navbar-toggler-short-align"
                    data-bs-template="<div class='tooltip d-none d-md-block' role='tooltip'><div class='arrow'></div><div class='tooltip-inner'></div></div>"
                    data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Collapse"
                    data-bs-original-title="Collapse"></i>
                <i class="bi-arrow-right navbar-toggler-full-align"
                    data-bs-template="<div class='tooltip d-none d-md-block' role='tooltip'><div class='arrow'></div><div class='tooltip-inner'></div></div>"
                    data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Expand"
                    data-bs-original-title="Expand"></i>
            </button>
            <!-- End Navbar Vertical Toggle -->

            <!-- Content -->
            <div class="navbar-vertical-content">
                <div id="navbarVerticalMenu" class="nav nav-pills nav-vertical card-navbar-nav">

                    <div class="nav-item">
                        <a class="nav-link @if (Route::is('pm.home')) active @endif"
                            href="{{ route('pm.home') }}">
                            <i class="bi bi-graph-up-arrow nav-icon"></i>
                            <span class="nav-link-title">Tableau de bord</span>
                        </a>
                    </div>

                    @if (Auth::user()->can('view projects') ||
                            Auth::user()->can('view products') ||
                            Auth::user()->can('view countries information') ||
                            Auth::user()->can('view parteners'))
                        <span class="mt-2 dropdown-header">Général</span>
                        <small class="bi-three-dots nav-subtitle-replacer"></small>
                    @endif

                    <div id="navbarVerticalMenuPagesMenu">

                        @can('view customers')
                            <div class="nav-item">
                                <a class="nav-link @if (Route::is('pm.clients.index') || Str::contains(route('pm.clients.index'), request()->segment(1))) active @endif"
                                    href="{{ route('pm.clients.index') }}">
                                    <i class="bi bi-people-fill nav-icon"></i>
                                    <span class="nav-link-title">Clients</span>
                                </a>
                            </div>
                        @endcan

                        @can('view products')
                            <div class="nav-item">
                                <a class="nav-link @if (Route::is('pm.products.index') || Str::contains(route('pm.products.index'), request()->segment(1))) active @endif"
                                    href="{{ route('pm.products.index') }}">
                                    <i class="bi bi-router-fill nav-icon"></i>
                                    <span class="nav-link-title">Equipements</span>
                                </a>
                            </div>
                        @endcan

                        @can('view countries information')
                            <div class="nav-item">
                                <a class="nav-link @if (Route::is('pm.countries.index') || Str::contains(route('pm.countries.index'), request()->segment(1))) active @endif"
                                    href="{{ route('pm.countries.index') }}">
                                    <i class="bi bi-globe2 nav-icon"></i>
                                    <span class="nav-link-title">Pays</span>
                                </a>
                            </div>
                        @endcan

                        @can('view parteners')
                            <div class="nav-item">
                                <a class="nav-link @if (Route::is('pm.partenaires.index') || Str::contains(route('pm.partenaires.index'), request()->segment(1))) active @endif"
                                    href="{{ route('pm.partenaires.index') }}" data-placement="left">
                                    <i class="bi bi-boxes nav-icon"></i>
                                    <span class="nav-link-title">Partenaires</span>
                                </a>
                            </div>
                        @endcan

                        @can('view projects')
                            <div class="nav-item">
                                <a class="nav-link @if (Route::is('pm.projects.index') || Str::contains(route('pm.projects.index'), request()->segment(1))) active @endif"
                                    href="{{ route('pm.projects.index') }}">
                                    <i class="bi bi-stickies-fill nav-icon"></i>
                                    <span class="nav-link-title">Projets</span>
                                </a>
                            </div>
                        @endcan

                    </div>

                    @if (Auth::user()->can('view finance') ||
                            Auth::user()->can('view tasks') ||
                            Auth::user()->can('manage human ressources'))
                            {{-- , Tâches --}}
                        <span class="mt-2 dropdown-header">Finance & RH</span>
                        <small class="bi-three-dots nav-subtitle-replacer"></small>
                    @endif

                    @can('view finance')
                        <div class="nav-item">
                            @php
                                $collapsed = Route::is('pm.fin.cotations.index') ||
                                    Str::contains(route('pm.fin.cotations.index'), request()->segment(1)) ||
                                    Route::is('pm.fin.factures.index') || Str::contains(route('pm.fin.factures.index'), request()->segment(2)) ||
                                    Route::is('pm.fin.banques.index') || Str::contains(route('pm.fin.banques.index'), request()->segment(2));
                            @endphp
                            <a @class([
                                'nav-link dropdown-toggle',
                                'collapsed' => !$collapsed,
                            ]) href="#navbarVerticalMenuPagesAccountMenu" role="button"
                                data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesAccountMenu"
                                aria-expanded="{{ $collapsed ? "true" : "false" }}" aria-controls="navbarVerticalMenuPagesAccountMenu">
                                <i class="bi-cash-coin nav-icon"></i>
                                <span class="nav-link-title">Finance</span>
                            </a>

                            <div id="navbarVerticalMenuPagesAccountMenu" @class(["nav-collapse collapse", "show" => $collapsed])
                                data-bs-parent="#navbarVerticalMenuPagesMenu" hs-parent-area="#navbarVerticalMenu">
                                @can('view cotations')
                                    <a class="nav-link @if (Route::is('pm.fin.cotations.index') || Str::contains(route('pm.fin.cotations.index'), request()->segment(2))) active @endif"
                                        href="{{ route('pm.fin.cotations.index') }}">
                                        Cotation
                                    </a>
                                @endcan
                                @can('view bills')
                                    <a class="nav-link @if (Route::is('pm.fin.factures.index') || Str::contains(route('pm.fin.factures.index'), request()->segment(2))) active @endif"
                                        href="{{ route('pm.fin.factures.index') }}">
                                        Facture
                                    </a>
                                @endcan
                                @can('view bank')
                                    <a class="nav-link  @if (Route::is('pm.fin.banques.index') || Str::contains(route('pm.fin.banques.index'), request()->segment(2))) active @endif"
                                        href="{{ route('pm.fin.banques.index') }}">
                                        Banque
                                    </a>
                                @endcan
                            </div>
                        </div>
                    @endcan

                    {{-- @can('view tasks')
                        <div class="nav-item">
                            <a class="nav-link @if (Route::is('pm.taches.index') || Str::contains(route('pm.taches.index'), request()->segment(2))) active @endif"
                                href="{{ route('pm.taches.index') }}">
                                <i class="bi-list-task nav-icon"></i>
                                <span class="nav-link-title">Tâches</span>
                            </a>
                        </div>
                    @endcan --}}

                    @can('manage human ressources')
                        <div class="nav-item">
                            <a class="nav-link @if (Route::is('pm.personnels.index') || Str::contains(route('pm.personnels.index'), request()->segment(2))) active @endif"
                                href="{{ route('pm.personnels.index') }}" data-placement="left">
                                <i class="bi-person-lines-fill nav-icon"></i>
                                <span class="nav-link-title">Ressource humaine</span>
                            </a>
                        </div>
                    @endcan

                    @if (Auth::user()->can('view documents') || Auth::user()->can('view archives'))
                        <span class="mt-2 dropdown-header">Documents & Archives</span>
                        <small class="bi-three-dots nav-subtitle-replacer"></small>
                    @endif

                    @can('view documents')
                        <div class="nav-item">
                            <a class="nav-link @if (Route::is('pm.documents.index') || Str::contains(route('pm.documents.index'), request()->segment(2))) active @endif"
                                href="{{ route('pm.documents.index') }}">
                                <i class="bi-folder2-open nav-icon"></i>
                                <span class="nav-link-title">Documents</span>
                            </a>
                        </div>
                    @endcan

                    @can('view archives')
                        <div class="nav-item">
                            <a class="nav-link @if (Route::is('pm.archivages.index') || Str::contains(route('pm.archivages.index'), request()->segment(2))) active @endif"
                                href="{{ route('pm.archivages.index') }}" data-placement="left">
                                <i class="bi-inboxes-fill nav-icon"></i>
                                <span class="nav-link-title">Archives</span>
                            </a>
                        </div>
                    @endcan

                    @can('view settings')
                        <span class="mt-2 dropdown-header">Parametrages</span>
                        <small class="bi-three-dots nav-subtitle-replacer"></small>

                        <div class="nav-item">
                            <a class="nav-link dropdown-toggle collapsed" href="#navbarVerticalMenuPagesActivitetMenu"
                                role="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarVerticalMenuPagesActivitetMenu" aria-expanded="false"
                                aria-controls="navbarVerticalMenuPagesActivitetMenu">
                                <i class="bi bi-gear-fill nav-icon"></i>
                                <span class="nav-link-title">Parametres</span>
                            </a>
                            <div id="navbarVerticalMenuPagesActivitetMenu" class="nav-collapse collapse "
                                data-bs-parent="#navbarVerticalMenuPagesMenu" hs-parent-area="#navbarVerticalMenu">
                                <a class="nav-link " href="#">Directions</a>
                                <a class="nav-link " href="#">Departements</a>
                                <a class="nav-link " href="#">Services</a>
                                <a class="nav-link " href="#">Fonctions</a>
                            </div>
                        </div>
                    @endcan

                </div>
            </div>
            <!-- End Content -->

            <!-- Footer -->
            <div class="navbar-vertical-footer">
                <ul class="navbar-vertical-footer-list">
                    <li class="navbar-vertical-footer-list-item">
                        <!-- Style Switcher -->
                        {{-- <div class="dropdown dropup"> --}}
                            <a href="" class="btn btn-ghost-secondary btn-icon rounded-circle avatar-user" id=""
                                data-bs-target="#updateModal" data-bs-toggle="modal">
                                <i class="bi bi-clock-history"></i>
                                {{-- <span class="btn-status btn-sm-status btn-status-danger"></span> --}}
                            </a>

                            {{-- <div class="dropdown-menu navbar-dropdown-menu navbar-dropdown-menu-borderless"
                                aria-labelledby="selectThemeDropdown">
                                <a class="dropdown-item" href="#" data-icon="bi-moon-stars" data-value="auto">
                                    <i class="bi-moon-stars me-2"></i>
                                    <span class="text-truncate" title="Auto (system default)">Auto (system
                                        default)</span>
                                </a>
                                <a class="dropdown-item active" href="#" data-icon="bi-brightness-high"
                                    data-value="default">
                                    <i class="bi-brightness-high me-2"></i>
                                    <span class="text-truncate" title="Default (light mode)">Default (light
                                        mode)</span>
                                </a>
                                <a class="dropdown-item" href="#" data-icon="bi-moon" data-value="dark">
                                    <i class="bi-moon me-2"></i>
                                    <span class="text-truncate" title="Dark">Dark</span>
                                </a>
                            </div> --}}
                        {{-- </div> --}}
                        <!-- End Style Switcher -->
                    </li>

                    <li class="navbar-vertical-footer-list-item">
                        <!-- Style Switcher -->
                        <div class="dropdown dropup">
                            <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle"
                                id="selectThemeDropdown" data-bs-toggle="dropdown" aria-expanded="false"
                                data-bs-dropdown-animation=""><i class="bi-brightness-high"></i></button>

                            <div class="dropdown-menu navbar-dropdown-menu navbar-dropdown-menu-borderless"
                                aria-labelledby="selectThemeDropdown">
                                <a class="dropdown-item" href="#" data-icon="bi-moon-stars" data-value="auto">
                                    <i class="bi-moon-stars me-2"></i>
                                    <span class="text-truncate" title="Auto (system default)">Auto (system
                                        default)</span>
                                </a>
                                <a class="dropdown-item active" href="#" data-icon="bi-brightness-high"
                                    data-value="default">
                                    <i class="bi-brightness-high me-2"></i>
                                    <span class="text-truncate" title="Default (light mode)">Default (light
                                        mode)</span>
                                </a>
                                <a class="dropdown-item" href="#" data-icon="bi-moon" data-value="dark">
                                    <i class="bi-moon me-2"></i>
                                    <span class="text-truncate" title="Dark">Dark</span>
                                </a>
                            </div>
                        </div>
                        <!-- End Style Switcher -->
                    </li>

                    <li class="navbar-vertical-footer-list-item">
                        <!-- Other Links -->
                        <div class="dropdown dropup">
                            <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle"
                                id="otherLinksDropdown" data-bs-toggle="dropdown" aria-expanded="false"
                                data-bs-dropdown-animation="">
                                <i class="bi-info-circle"></i>
                            </button>

                            <div class="dropdown-menu navbar-dropdown-menu-borderless"
                                aria-labelledby="otherLinksDropdown">
                                <span class="dropdown-header">Help</span>
                                <a class="dropdown-item" href="#">
                                    <i class="bi-journals dropdown-item-icon"></i>
                                    <span class="text-truncate" title="Resources &amp; tutorials">Resources &amp;
                                        tutorials</span>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="bi-command dropdown-item-icon"></i>
                                    <span class="text-truncate" title="Keyboard shortcuts">Keyboard shortcuts</span>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="bi-alt dropdown-item-icon"></i>
                                    <span class="text-truncate" title="Connect other apps">Connect other apps</span>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="bi-gift dropdown-item-icon"></i>
                                    <span class="text-truncate" title="What's new?">What's new?</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <span class="dropdown-header">Contacts</span>
                                <a class="dropdown-item" href="#">
                                    <i class="bi-chat-left-dots dropdown-item-icon"></i>
                                    <span class="text-truncate" title="Contact support">Contact support</span>
                                </a>
                            </div>
                        </div>
                        <!-- End Other Links -->
                    </li>

                    {{-- <li class="navbar-vertical-footer-list-item">
                    <!-- Language -->
                    <div class="dropdown dropup">
                        <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="selectLanguageDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation="">
                        <img class="avatar avatar-xss avatar-circle" src="assets/vendor/flag-icon-css/flags/1x1/us.svg" alt="United States Flag">
                        </button>

                        <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectLanguageDropdown">
                        <span class="dropdown-header">Select language</span>
                        <a class="dropdown-item" href="#">
                            <img class="avatar avatar-xss avatar-circle me-2" src="assets/vendor/flag-icon-css/flags/1x1/us.svg" alt="Flag">
                            <span class="text-truncate" title="English">English (US)</span>
                        </a>
                        <a class="dropdown-item" href="#">
                            <img class="avatar avatar-xss avatar-circle me-2" src="assets/vendor/flag-icon-css/flags/1x1/gb.svg" alt="Flag">
                            <span class="text-truncate" title="English">English (UK)</span>
                        </a>
                        <a class="dropdown-item" href="#">
                            <img class="avatar avatar-xss avatar-circle me-2" src="assets/vendor/flag-icon-css/flags/1x1/de.svg" alt="Flag">
                            <span class="text-truncate" title="Deutsch">Deutsch</span>
                        </a>
                        <a class="dropdown-item" href="#">
                            <img class="avatar avatar-xss avatar-circle me-2" src="assets/vendor/flag-icon-css/flags/1x1/dk.svg" alt="Flag">
                            <span class="text-truncate" title="Dansk">Dansk</span>
                        </a>
                        <a class="dropdown-item" href="#">
                            <img class="avatar avatar-xss avatar-circle me-2" src="assets/vendor/flag-icon-css/flags/1x1/it.svg" alt="Flag">
                            <span class="text-truncate" title="Italiano">Italiano</span>
                        </a>
                        <a class="dropdown-item" href="#">
                            <img class="avatar avatar-xss avatar-circle me-2" src="assets/vendor/flag-icon-css/flags/1x1/cn.svg" alt="Flag">
                            <span class="text-truncate" title="中文 (繁體)">中文 (繁體)</span>
                        </a>
                        </div>
                    </div>

                    <!-- End Language -->
                    </li> --}}
                </ul>
            </div>
            <!-- End Footer -->
        </div>
    </div>
</aside>

@livewire('update-check')
