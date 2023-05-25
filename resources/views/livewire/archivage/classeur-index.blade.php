<div class="col-lg-12">
    <div class="mb-4 d-flex justify-content-between align-items-center">
        <a href="{{ route('pm.archivages.index') }}" class="back">
            <i class="bi bi-chevron-left"></i> Retour
        </a>
        <div class="col-6 d-flex align-items-center justify-content-end">
            <input type="text" class="form-control me-2" placeholder="Recherche"
                wire:model='search'>
            <div class="dropdown">
                <button class="btn btn-filter me-2 d-flex text-nowrap" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="fi fi-rr-filter me-2"></i> {{ $filterText }}
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

    <div class="card card-table" style="overflow: inherit">
        <div class="card-body">

            <h5 class="title-small">Classeurs {{ $annee }}</h5>
            <div class="row g-3">
                @forelse ($classeurs as $classeur)
                    <div class="col-lg-4">
                        <div class="col-folder">
                            <a href="{{ route('pm.archive-classeurs.show', $classeur) }}">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('assets/img/icons/archivage.png') }}" alt=""
                                        class="me-2">
                                    <div class="text-star">
                                        <h6>{{ $classeur->titre }}</h6>
                                        <p>Ref: {{ $classeur->reference }}</p>
                                        <p>Créé le: {{ $classeur->created_at->format('m/d/Y') }}</p>
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
                                            <a class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#detail-classeur-{{ $classeur->id }}">
                                                <i class="fi fi-rr-eye" class="me-1"></i> Voir détails
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="">
                                                <i class="fi fi-rr-edit" class="me-1"></i> Modifier
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-delete-classeur-{{ $classeur->id }}">
                                                <i class="fi fi-rr-trash" class="me-1"></i>Supprimer
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
                        <p class="mb-0">Aucun classeur trouvé</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
