<div class="col-lg-12">
    <div class="mb-3 mb-md-4 d-flex justify-content-between align-items-start align-items-md-center block-action-table">
        {{-- <div class="d-flex align-items-center">
            <h5>Visualisez vos documents</h5>
        </div> --}}
        <div class="col-6 d-flex align-items-center justify-content-end">
            <input type="text" class="form-control me-2" placeholder="Recherche" style="border:none;" wire:model='search'>
            <div class="dropdown">
                <button class="btn btn-filter me-2 d-flex text-nowrap" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-funnel me-2"></i> {{ $filterText }}
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="javascript:void(0)" wire:click='changeFilter(1)'>Par défaut</a>
                    </li>
                    <li><a class="dropdown-item" href="javascript:void(0)" wire:click='changeFilter(2)'>A - Z</a></li>
                    <li><a class="dropdown-item" href="javascript:void(0)" wire:click='changeFilter(3)'>Z - A</a></li>
                    <li>
                        <a class="dropdown-item" href="javascript:void(0)" wire:click='changeFilter(4)'>Date d'ajout</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="javascript:void(0)" wire:click='changeFilter(5)'>Date de modification</a>
                    </li>
                </ul>
            </div>
        </div>
        <button class="btn btn-primary text-nowrap" data-bs-toggle="modal" data-bs-target="#modal-new-classeur">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
            <span>Créer un classeur</span>
        </button>
    </div>

    <div class="card card-table p-3 position-relative" style="overflow: inherit">
        <div class="d-none position-absolute d-flex justify-content-center m-0"
            style="z-index: 2; left:5px; right:5px; top:5px; bottom:5px; background-color: rgba(255,255,255,0.95)"
            wire:loading wire:target="filter, changeFilter, search" wire:loading.class.remove="d-none">
            <div class="text-center m-auto">
                <div class="spinner-border " role="status" style="color: var(--primaryColor)">
                    <span class="sr-only"></span>
                </div>
            </div>
        </div>

        <h3 class="title-small">Classeurs</h3>
        <div class="row g-3">
            @forelse ($classeurs as $classeur)
                <div class="col-lg-4">
                    <div class="col-folder">
                        <a href="{{ route('pm.classeurs.show', $classeur) }}">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('assets/img/icons/classeur.svg') }}" alt=""
                                    class="me-2">
                                <div class="text-star">
                                    <h6>{{ $classeur->titre }}</h6>
                                    <p>Ref: {{ $classeur->reference }}</p>
                                    <p>Créé le: {{ $classeur->created_at->format('m/d/Y') }}</p>
                                </div>
                            </div>
                        </a>
                        <div class="block-options">
                            <div class="dropdown">
                                <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="selectThemeDropdown2" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation="">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectThemeDropdown2">
                                    <li>
                                        <a class="dropdown-item" href="#" data-bs-toggle="offcanvas"
                                            data-bs-target="#detail-classeur-{{ $classeur->id }}">
                                            <i class="fi fi-rr-eye" class="me-1"></i> Voir détails
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                            data-bs-target="#modal-edit-classeur-{{ $classeur->id }}">
                                            <i class="fi fi-rr-edit" class="me-1"></i> Modifier
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                            data-bs-target="#modal-delete-classeur-{{ $classeur->id }}">
                                            <i class="fi fi-rr-trash" class="me-1"></i>Supprimer
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
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
