<div class="navbar-vertical-content">
    <div id="navbarVerticalMenu" class="nav nav-pills nav-vertical card-navbar-nav">
        <!-- Collapse -->
        <div class="nav-item">
            <a class="nav-link @if(Route::is('pm.home')) active @endif" href="{{ route('pm.home') }}">
                <i class="bi-house-door-fill nav-icon"></i>
                <span class="nav-link-title">Tableau de bord</span>
            </a>
        </div>
        <!-- End Collapse -->

        <span class="mt-2 dropdown-header">Général</span>
        <small class="bi-three-dots nav-subtitle-replacer"></small>

        <!-- Collapse -->
        <div class="navbar-nav nav-compact">

        </div>
        <div id="navbarVerticalMenuPagesMenu">
            <!-- Collapse -->

            <div class="nav-item">
                <a class="nav-link @if(Route::is('pm.projects.index') || Str::contains(route('pm.projects.index'), request()->segment(1))) active @endif" href="{{ route('pm.projects.index') }}">
                    <i class="bi bi-stickies-fill nav-icon"></i>
                    <span class="nav-link-title">Projets</span>
                </a>
            </div>
            <!-- End Collapse -->

            <!-- Collapse -->
            <div class="nav-item">
                <a class="nav-link @if(Route::is('pm.clients.index') || Str::contains(route('pm.clients.index'), request()->segment(1))) active @endif" href="{{ route('pm.clients.index') }}">
                    <i class="bi bi-people-fill nav-icon"></i>
                    <span class="nav-link-title">Clients</span>
                </a>
            </div>
            <!-- End Collapse -->

            <!-- Collapse -->
            <div class="nav-item">
                <a class="nav-link @if(Route::is('pm.products.index') || Str::contains(route('pm.products.index'), request()->segment(1))) active @endif" href="{{ route('pm.products.index') }}">
                    <i class="bi bi-router-fill nav-icon"></i>
                    <span class="nav-link-title">Equipements</span>
                </a>
            </div>
            <!-- End Collapse -->

            <!-- Collapse -->
            <div class="nav-item">
                <a class="nav-link @if(Route::is('pm.countries.index') || Str::contains(route('pm.countries.index'), request()->segment(1))) active @endif" href="{{ route('pm.countries.index') }}">
                    <i class="bi bi-globe-europe-africa nav-icon"></i>
                    <span class="nav-link-title">Pays</span>
                </a>
            </div>
            <!-- End Collapse -->

            <div class="nav-item">
                <a class="nav-link @if(Route::is('pm.partenaires.index') || Str::contains(route('pm.partenaires.index'), request()->segment(1))) active @endif" href="{{ route('pm.partenaires.index') }}" data-placement="left">
                    <i class="bi bi-boxes nav-icon"></i>
                    <span class="nav-link-title">Partenaires</span>
                </a>
            </div>

        </div>
        <!-- End Collapse -->

        <span class="mt-2 dropdown-header">Finance & RH</span>
        <small class="bi-three-dots nav-subtitle-replacer"></small>

        <div class="nav-item">
            <a class="nav-link dropdown-toggle collapsed"  href="#navbarVerticalMenuPagesAccountMenu" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesAccountMenu" aria-expanded="false" aria-controls="navbarVerticalMenuPagesAccountMenu">
                <i class="bi-cash-coin nav-icon"></i>
                <span class="nav-link-title">Finance</span>
            </a>

            <div id="navbarVerticalMenuPagesAccountMenu" class="nav-collapse collapse " data-bs-parent="#navbarVerticalMenuPagesMenu" hs-parent-area="#navbarVerticalMenu">
                <a class="nav-link " href="{{ route('pm.fin.cotations.index') }}">Cotation</a>
                <a class="nav-link " href="{{ route('pm.fin.factures.index') }}">Facture</a>
                <a class="nav-link " href="{{ route('pm.fin.banques.index') }}">Banque</a>
            </div>
        </div>

        {{-- <div class="nav-item">
            <a class="nav-link " href="#">
                <i class="bi-list-task nav-icon"></i>
                <span class="nav-link-title">Tâches</span>
            </a>
        </div> --}}

        <div class="nav-item">
            <a class="nav-link " href="{{ route('pm.personnels.index') }}" data-placement="left">
                <i class="bi-person-lines-fill nav-icon"></i>
                <span class="nav-link-title">Ressource humaine</span>
            </a>
        </div>

        <span class="mt-2 dropdown-header">Documents & Archives</span>
        <small class="bi-three-dots nav-subtitle-replacer"></small>

        <div class="nav-item">
            <a class="nav-link" href="{{ route('pm.documents.index') }}">
                <i class="bi-folder2-open nav-icon"></i>
                <span class="nav-link-title">Documents</span>
            </a>
        </div>

        <div class="nav-item">
            <a class="nav-link " href="{{ route('pm.archivages.index') }}" data-placement="left">
                <i class="bi-inboxes-fill nav-icon"></i>
                <span class="nav-link-title">Archives</span>
            </a>
        </div>

        {{-- <span class="mt-2 dropdown-header">Parametrages</span>
        <small class="bi-three-dots nav-subtitle-replacer"></small>

        <div class="nav-item">
            <a class="nav-link dropdown-toggle collapsed" href="#navbarVerticalMenuPagesActivitetMenu"  role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesActivitetMenu" aria-expanded="false" aria-controls="navbarVerticalMenuPagesActivitetMenu">
                <i class="bi-activity nav-icon"></i>
                <span class="nav-link-title">Activités</span>
            </a>
            <div id="navbarVerticalMenuPagesActivitetMenu" class="nav-collapse collapse " data-bs-parent="#navbarVerticalMenuPagesMenu" hs-parent-area="#navbarVerticalMenu">
                <a class="nav-link " href="#">Directions</a>
                <a class="nav-link " href="#">Departements</a>
                <a class="nav-link " href="#">Services</a>
                <a class="nav-link " href="#">Fonctions</a>
            </div>
        </div> --}}
    </div>
</div>