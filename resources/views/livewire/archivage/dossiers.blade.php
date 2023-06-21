<div class="col-lg-12">
    <div class="mb-3 d-flex justify-content-between align-items-center">
        {{-- @if(count($dossiers)){{ route('pm.archive-classeurs.index', $dossiers[0]->classeur->created_at->format('Y')) }}@else  @endif --}}
        <a href="{{ url()->previous() }}" class="back">
            <i class="bi bi-chevron-left"></i> Retour
        </a>
        <div class="col-10 d-flex align-items-center justify-content-end">
            <input type="text" class="form-control me-2" placeholder="Recherche"
                style="width: 25%;" wire:model='search'>
            <div class="dropdown">
                <button class="p-3 py-2 btn-filter me-2 d-flex text-nowrap" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="bi bi-funnel me-2"></i> {{ $filterText }}
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="javascript:void(0)" wire:click='changeFilter(1)'>Par défaut</a></li>
                    <li><a class="dropdown-item" href="javascript:void(0)" wire:click='changeFilter(2)'>A - Z</a></li>
                    <li><a class="dropdown-item" href="javascript:void(0)" wire:click='changeFilter(3)'>Z - A</a></li>
                    <li><a class="dropdown-item" href="javascript:void(0)" wire:click='changeFilter(4)'>Date d'ajout</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="pt-4 card card-table">
        <div class="card-body">
            <div class="row g-3 g-lg-5">

                @forelse ($dossiers as $dossier)
                    <div class="col-lg-3">
                        <div class="col-folder">
                            <a href="{{ route('pm.archive-classeurs.archive-dossiers.show', [$dossier->classeur, $dossier]) }}">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('assets/img/icons/archivage.png') }}" alt=""
                                        class="me-2">
                                    <div class="text-star">
                                        <h6>{{ Str::ucfirst($dossier->titre) }}</h6>
                                        <p>Ref: {{ $dossier->reference }}</p>
                                        <p>Créé le: {{ $dossier->created_at->format('m-d-Y') }}</p>
                                    </div>
                                </div>
                            </a>
                            {{-- <div class="block-options">
                                <div class="dropdown">
                                    <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="selectThemeDropdown2" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation="">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectThemeDropdown2">
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <i data-feather="share-2" class="me-1"></i> Partager
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <i data-feather="eye" class="me-1"></i> Voir détails
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <i data-feather="download" class="me-1"></i> Télécharger
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <i data-feather="trash" class="me-1"></i>Supprimer
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                @empty
                    <div class="text-center col-12">
                        <img src="{{ asset('assets/img/sad.gif') }}" alt="" width="35px" class="">
                        <p class="mb-0">Aucun dossiers trouvé</p>
                    </div>
                @endforelse

            </div>
        </div>
    </div>

</div>
