{{-- <aside class="bg-white js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-vertical-aside-initialized">
    <div class="navbar-vertical-container">
        <div class="navbar-vertical-footer-offset">
            <!-- Logo -->
            <a class="navbar-brand" href="index-2.html" aria-label="Front">
                <img class="navbar-brand-logo" src="{{ asset('assets/svg/logos/logo.png') }}" alt="Logo" data-hs-theme-appearance="default">
                <img class="navbar-brand-logo" src="{{ asset('assets/svg/logos-light/logo.png') }}" alt="Logo" data-hs-theme-appearance="dark">
                <img class="navbar-brand-logo-mini" src="{{ asset('assets/svg/logos/logo-short.png') }}" alt="Logo" data-hs-theme-appearance="default">
                <img class="navbar-brand-logo-mini" src="{{ asset('assets/svg/logos-light/logo-short.png') }}" alt="Logo" data-hs-theme-appearance="dark">
            </a>
            <!-- End Logo -->

            <!-- Navbar Vertical Toggle -->
            <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-aside-toggler" style="opacity: 1;">
                <i class="bi-arrow-left navbar-toggler-short-align" data-bs-template="<div class='tooltip d-none d-md-block' role='tooltip'><div class='arrow'></div><div class='tooltip-inner'></div></div>" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Collapse" data-bs-original-title="Collapse"></i>
                <i class="bi-arrow-right navbar-toggler-full-align" data-bs-template="<div class='tooltip d-none d-md-block' role='tooltip'><div class='arrow'></div><div class='tooltip-inner'></div></div>" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Expand" data-bs-original-title="Expand"></i>
            </button>
            <!-- End Navbar Vertical Toggle --> --}}

            <!-- Content -->
            @yield('sidebar')
            <!-- End Content -->

            <!-- Footer -->
            {{-- <div class="navbar-vertical-footer">
                <ul class="navbar-vertical-footer-list">
                    <li class="navbar-vertical-footer-list-item">
                    <!-- Style Switcher -->
                    <div class="dropdown dropup">
                        <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="selectThemeDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation=""><i class="bi-brightness-high"></i></button>

                        <div class="dropdown-menu navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectThemeDropdown">
                        <a class="dropdown-item" href="#" data-icon="bi-moon-stars" data-value="auto">
                            <i class="bi-moon-stars me-2"></i>
                            <span class="text-truncate" title="Auto (system default)">Auto (system default)</span>
                        </a>
                        <a class="dropdown-item active" href="#" data-icon="bi-brightness-high" data-value="default">
                            <i class="bi-brightness-high me-2"></i>
                            <span class="text-truncate" title="Default (light mode)">Default (light mode)</span>
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
                        <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="otherLinksDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation="">
                        <i class="bi-info-circle"></i>
                        </button>

                        <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="otherLinksDropdown">
                        <span class="dropdown-header">Help</span>
                        <a class="dropdown-item" href="#">
                            <i class="bi-journals dropdown-item-icon"></i>
                            <span class="text-truncate" title="Resources &amp; tutorials">Resources &amp; tutorials</span>
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
                    </li> -}}
                </ul>
            </div>
            <!-- End Footer -->
        </div>
    </div>
</aside> --}}
