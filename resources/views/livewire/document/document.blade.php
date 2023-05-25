<div class="col-lg-12">
    <div class="d-flex justify-content-between align-items-center mb-3">

        <div class="col-6 d-flex align-items-center justify-content-start">
            <input type="text" class="form-control me-2" placeholder="Recherche"
                wire:model='search'>
            <div class="dropdown">
                <button class="p-2 btn-filter me-2 text-nowrap" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="bi bi-funnel me-2"></i> {{ $filterText }}
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="javascript:void(0)" wire:click='changeFilter(1)'>Par défaut</a></li>
                    <li>
                        <a class="dropdown-item" href="javascript:void(0)" wire:click='changeFilter(2)'>
                            <i class="bi bi-sort-alpha-down me-1"></i> A - Z
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="javascript:void(0)" wire:click='changeFilter(3)'>
                            <i class="bi bi-sort-alpha-up me-1"></i> Z - A
                        </a>
                    </li>
                    <li><a class="dropdown-item" href="javascript:void(0)" wire:click='changeFilter(4)'>Date d'ajout</a></li>
                    <li><a class="dropdown-item" href="javascript:void(0)" wire:click='changeFilter(5)'>Date de modification</a></li>
                </ul>
            </div>
        </div>
        <a href="{{ route('pm.documents.create').'?dossier='.$dossier->id }}" class="btn btn-primary">
            Numériser un document
        </a>
    </div>

    <div class="card card-table pt-5 p-3" style="overflow: inherit">
        <div class="d-none position-absolute d-flex justify-content-center m-0"
            style="z-index: 2; left:5px; right:5px; top:5px; bottom:5px; background-color: rgba(255,255,255,0.95)"
            wire:loading wire:target="filter, changeFilter, search" wire:loading.class.remove="d-none">
            <div class="text-center m-auto">
                <div class="spinner-border " role="status" style="color: var(--primaryColor)">
                    <span class="sr-only"></span>
                </div>
            </div>
        </div>

        <h5 class="title-small">Dossier {{ $dossier->titre }}</h5>
        <div class="row g-3 g-lg-5">
            @forelse ($documents as $document)
                <div class="col-lg-4">
                    <div class="col-folder">
                        <a href="{{ route('pm.documents.show', $document) }}">
                            <div class="d-flex align-items-center">
                                <img src="{{ fileIcon($document->document) }}" alt=""
                                    class="me-2 img-file">
                                <div class="text-star">

                                    <h6>{{ Str::ucfirst($document->libelle) }}</h6>
                                    <p>Ref : {{ Str::ucfirst($document->reference) }}</p>
                                    <p>Ajouté le: {{ $document->created_at->format('d/m/Y h:i') }}</p>
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
                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-new-task-ass">
                                            <i class="bi bi-share-fill" class="me-2"></i> Creer une tâche
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('pm.documents.show', $document) }}">
                                            <i class="bi bi-eye-fill" class="me-2"></i> Voir détails
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ files($document->document)->link }}" download="{{ files($document->document)->link }}">
                                            <i class="bi bi-download" class="me-2"></i> Télécharger
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('pm.documents.edit', $document) }}">
                                            <i class="bi bi-pencil-fill" class="me-2"></i> Modifier
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-delete-document-{{ $document->id }}">
                                            <i class="bi bi-trash" class="me-2"></i> Supprimer
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
                    <p>Aucun document trouvé</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
