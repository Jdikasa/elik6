<div class="col-lg-12">
    <div class="mb-3 d-flex justify-content-between align-items-center">

        <div class="col-6 d-flex align-items-center justify-content-start">
            <input type="text" class="form-control me-2" placeholder="Recherche"
                wire:model='search'>
            <div class="dropdown">
                <button class="p-3 py-2 btn-filter me-2 d-flex" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="bi bi-funnel me-2"></i> {{ $filterText }}
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="javascript:void(0)" wire:click='changeFilter(1)'>Par défaut</a></li>
                    <li><a class="dropdown-item" href="javascript:void(0)" wire:click='changeFilter(2)'>A - Z</a></li>
                    <li><a class="dropdown-item" href="javascript:void(0)" wire:click='changeFilter(3)'>Z - A</a></li>
                    <li><a class="dropdown-item" href="javascript:void(0)" wire:click='changeFilter(4)'>Date d'ajout</a></li>
                    <li><a class="dropdown-item" href="javascript:void(0)" wire:click='changeFilter(5)'>Date de modification</a></li>
                </ul>
            </div>
        </div>
        <button class="btn btn-primary text-nowrap" data-bs-toggle="modal" data-bs-target="#modal-new-archive-dossier">
            Créer un dossier
        </button>
    </div>

    <div class="card card-table p-3" style="overflow: inherit">

        <div class="d-none position-absolute d-flex justify-content-center m-0"
            style="z-index: 2; left:5px; right:5px; top:5px; bottom:5px; background-color: rgba(255,255,255,0.95)"
            wire:loading wire:target="filter, changeFilter, search" wire:loading.class.remove="d-none">
            <div class="text-center m-auto">
                <div class="spinner-border " role="status" style="color: var(--primaryColor)">
                    <span class="sr-only"></span>
                </div>
            </div>
        </div>

        <h5 class="title-small">Classeur : {{ $classeur->titre }}</h5>
        <div class="row g-3 g-lg-5">

            @forelse ($dossiers as $dossier)
                <div class="col-lg-4">
                    <div class="col-folder">
                        <a href="@if(!$dossier->confidentiel) {{ route('pm.classeurs.dossiers.show', [$dossier->classeur, $dossier]) }} @else # @endif"
                            @if($dossier->confidentiel) data-bs-toggle="modal" data-bs-target="#modal-pass-dossier-{{ $dossier->id }}" @endif>
                            <div class="d-flex align-items-center">
                                @if ($dossier->confidentiel)
                                    <img src="{{ asset('assets/img/icons/lockedfolder-arsp.svg') }}" alt=""
                                    class="me-2">
                                @else
                                    <img src="{{ asset('assets/img/icons/folder-arsp.svg') }}" alt=""
                                    class="me-2">
                                @endif

                                <div class="text-star">
                                    <h6>{{ Str::ucfirst($dossier->titre) }}</h6>
                                    <p>Ref: {{ $dossier->reference }}</p>
                                    <p>Créé le: {{ $dossier->created_at->format('m-d-Y') }}</p>
                                </div>
                            </div>
                        </a>
                        <div class="block-options">
                            <div class="dropdown">
                                <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="selectThemeDropdown2" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation="">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                {{-- <i class="bi bi-three-dots-vertical"></i> --}}
                                <ul class="dropdown-menu navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectThemeDropdown2">
                                    <li>
                                        <a class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#detail-dossier-{{ $dossier->id }}">
                                            <i class="fi fi-rr-eye" class="me-1"></i> Voir détails
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-edit-archive-dossier-{{ $dossier->id }}">
                                            <i class="fi fi-rr-edit" class="me-1"></i> Modifier
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-delete-dossier-{{ $dossier->id }}">
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
                    <p>Aucun dossiers trouvé</p>
                </div>
            @endforelse

        </div>

    </div>

</div>
