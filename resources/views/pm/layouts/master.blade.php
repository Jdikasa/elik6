<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    @include('pm.common.meta')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @include('pm.common.stylesheets')
    @yield('css')
    <style>
        img {
            /* display: inline-block !important; */
        }

        .collapse {
            visibility: visible;
        }

        .nav-vertical.nav-pills .nav-link[aria-expanded="true"],
        .nav-vertical.nav-pills .nav-link.active[aria-expanded="false"],
        .nav-vertical.nav-pills .nav-link.active[aria-expanded="true"] {
            background-color: rgba(189, 197, 209, .2) !important;
        }
    </style>
</head>

<body class="has-navbar-vertical-aside navbar-vertical-aside-show-xl footer-offset">
    <script src="{{ asset('assets/js/hs.theme-appearance.js') }}"></script>
    <script src="{{ asset('assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js') }}">
    </script>

    <div id="layer-main-wrap" class="justify-content-center align-item-center">
        <div id="circularG">
            <div id="circularG_1" class="circularG"></div>
            <div id="circularG_2" class="circularG"></div>
            <div id="circularG_3" class="circularG"></div>
            <div id="circularG_4" class="circularG"></div>
            <div id="circularG_5" class="circularG"></div>
            <div id="circularG_6" class="circularG"></div>
            <div id="circularG_7" class="circularG"></div>
            <div id="circularG_8" class="circularG"></div>
        </div>
    </div>

    {{-- <x-jet-banner /> --}}
    @livewire('navigation-menu')

    @include('pm.common.sidebar')

    <!-- Page Content -->
    <div id="content" role="main" class="page-content main me-2">
        @yield('body')
        <div class="footer">
            <div class="row justify-content-between align-items-center">
                <div class="col">
                    <p class="mb-0 fs-6">&copy; Elik6 <span
                            class="d-none d-sm-inline-block">{{ now()->format('Y') }}</span></p>
                </div>
                <!-- End Col -->

                <div class="col-auto">
                    <div class="d-flex justify-content-end">
                        <!-- List Separator -->
                        <ul class="list-inline list-separator">
                            <li class="list-inline-item">
                                <a class="list-separator-link" href="#">FAQ</a>
                            </li>

                            <li class="list-inline-item">
                                <a class="list-separator-link" href="#">License</a>
                            </li>

                            <li class="list-inline-item">
                                <!-- Keyboard Shortcuts Toggle -->
                                <button class="btn btn-ghost-secondary btn-icon rounded-circle" type="button"
                                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasKeyboardShortcuts"
                                    aria-controls="offcanvasKeyboardShortcuts">
                                    <i class="bi-command"></i>
                                </button>
                                <!-- End Keyboard Shortcuts Toggle -->
                            </li>
                        </ul>
                        <!-- End List Separator -->
                    </div>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
    </div>

    @stack('modals')

    @include('pm.common.script')
    {{-- <script src="{{ asset('assets/js/demo.js') }}"></script> --}}

    @if (session()->get('session') && json_decode(session()->get('session'))->name != '')
        @php
            $statut = json_decode(session()->get('session'))->statut;
        @endphp
        <div class="message-flash {{ $statut }}">
            <div class="content-text d-flex">
                <div class="icon">
                    @if (json_decode(session()->get('session'))->statut == 'success')
                        <i class="bi bi-check"></i>
                    @elseif(json_decode(session()->get('session'))->statut == 'warnig')
                        <i class="bi bi-bell"></i>
                    @elseif(json_decode(session()->get('session'))->statut == 'error')
                        <i class="bi bi-circle"></i>
                    @endif
                </div>
                <div class="text-star">
                    <h6>{{ json_decode(session()->get('session'))->name }}</h6>
                    <p>{{ json_decode(session()->get('session'))->message }}</p>
                </div>
            </div>
        </div>
    @endif

    <script>
        $('.message-flash').addClass('show')
        setTimeout(() => {
            $('.message-flash').removeClass('show')
        }, 5000);

        var lis = document.querySelectorAll(".nav-tache li");

        if (window.matchMedia("(max-width: 576px)").matches) {
            var linkItems = document.querySelectorAll(".nav-tache li");
            linkItems.forEach((linkItem, index) => {
                var width = $(linkItem).width();

                linkItem.addEventListener("click", () => {
                    $(linkItem).parent().css("transform", "translateX(" + (index * width) + ")")
                    // indicator.style.top = `${index * 53 + 88}px`;
                    // $(indicator).text(text.innerHTML)
                    // $(indicator).addClass('show')
                })
            })

        }
        var linkItems = document.querySelectorAll(".nav-folder li");
            var indicator = document.querySelector(".indicator-nav");
            linkItems.forEach((linkItem, index) => {
                linkItem.addEventListener("click", () => {
                    var width = $(linkItem).width();
                    var leftOffset = linkItem.offsetLeft;
                    indicator.style.left = `${leftOffset + ((width / 2 ) - 20)}px`;
                })
            })
    </script>

    @livewireScripts
</body>

</html>
