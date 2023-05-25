<div class="col-lg-12">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="@if (count($documents)) {{ route('pm.archive-classeurs.archive-dossiers.show', [$documents[0]->dossier->classeur, $documents[0]->dossier]) }} @else {{ back() }} @endif"
            class="back">
            <i class="bi bi-chevron-left"></i> Retour
        </a>
        <div class="col-10 d-flex align-items-center justify-content-end">
            <input type="text" class="form-control me-2" placeholder="Recherche" style="width: 25%;border:none;"
                wire:model='search'>
            <div class="dropdown">
                <button class="btn btn-filter me-2" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="fi fi-rr-filter me-2"></i> {{ $filterText }}
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="javascript:void(0)" wire:click='changeFilter(1)'>Défaut</a></li>
                    <li><a class="dropdown-item" href="javascript:void(0)" wire:click='changeFilter(2)'>A - Z</a></li>
                    <li><a class="dropdown-item" href="javascript:void(0)" wire:click='changeFilter(3)'>Z - A</a></li>
                    <li><a class="dropdown-item" href="javascript:void(0)" wire:click='changeFilter(4)'>Date d'ajout</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="javascript:void(0)" wire:click='changeFilter(5)'>Date de
                            modification
                        </a>
                    </li>
                </ul>
            </div>
            {{-- <button class="btn btn-add" data-bs-toggle="modal" data-bs-target="#modal-new-archive-document">Ajouter</button> --}}
        </div>
    </div>
    <div class="card card-table" style="overflow:inherit">
        <div class="card-body">
            <h5 class="title-small">Fichiers</h5>
            <div class="row g-3">
                @forelse ($documents as $document)
                    <div class="col-lg-4">
                        <div class="col-folder">
                            <a href="{{ route('pm.archive-documents.show', $document) }}">
                                <div class="d-flex align-items-center">
                                    <img src="{{ fileIcon($document->document) }}" alt="" class="me-2 img-file">
                                    <div class="text-star">
                                        <h6>{{ Str::ucfirst($document->libelle) }}</h6>
                                        <p>Reférence : {{ Str::ucfirst($document->reference) }}</p>
                                        <p>Ajouté le: {{ $document->created_at->format('d/m/Y') }}</p>
                                    </div>
                                </div>
                            </a>
                            <div class="block-options">
                                <div class="dropdown">
                                    <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="selectThemeDropdown2" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation="">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectThemeDropdown2">
                                        {{-- <li>
                                            <a class="dropdown-item" href="#">
                                                <i class="fi fi-rr-share me-1"></i> Partager
                                            </a>
                                        </li> --}}
                                        <li>
                                            <a class="dropdown-item"
                                                href="{{ route('pm.archive-documents.show', $document) }}">
                                                <i class="fi fi-rr-eye me-1"></i> Voir détails
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ files($document->document)->link }}"
                                                download="{{ files($document->document)->link }}">
                                                <i class="fi fi-rr-download me-1"></i> Télécharger
                                            </a>
                                        </li>
                                        {{-- <li>
                                            <a class="dropdown-item" href="#">
                                                <i data-feather="trash" class="me-1"></i>Supprimer
                                            </a>
                                        </li> --}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center col-12">
                        <p>Aucun document trouvé</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
