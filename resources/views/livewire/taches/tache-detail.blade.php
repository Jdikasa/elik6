<div style="width: 600px;" class="offcanvas offcanvas-end offcanvas-task" tabindex="-1" id="detail-task"
    aria-labelledby="offcanvasRightLabel" wire:ignore.self>
    <div class="offcanvas-header align-items-center"
        style="flex-direction: column;border: none; padding-left:35px;padding-right: 35px;">
        <div class="d-flex justify-content-between w-100">
            <div class="text-star">
                Tache
            </div>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"
                style="transform: scale(.8)"></button>
        </div>
    </div>
    <div class="offcanvas-body">
        @if ($selectedTache)
            <div class="p-0 block-detail-task">

                <div class="d-flex justify-content-between align-items-center">

                    <small
                        class="badge-task py-1 px-2 rounded-pill @if ($selectedTache->priorite_id == 1) text-success bg-soft-success @elseif($selectedTache->priorite_id == 3) text-danger bg-soft-danger @else text-warning bg-soft-warning @endif">
                        Priorite : {{ $selectedTache->priorite->titre }}
                    </small>
                    @if ($selectedTache->progression == 0 && $selectedTache->statut_id == 2)
                        <div class="dropdown">
                            <button class="px-0 btn btn-end ms-2" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="">
                                <li>
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                        data-bs-target="#modal-edit-task-{{ $selectedTache->id }}">Modifier</a>
                                </li>
                                <li>
                                    <a class="dropdown-item delete" href="#"
                                        data-id="{{ $selectedTache->id }}">Supprimer</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                        data-bs-target="#modal-edit-objectif-{{ $selectedTache->id }}">Les
                                        objectifs</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                        data-bs-target="#modal-add-objectifs-{{ $selectedTache->id }}">Ajouter un
                                        objectif</a>
                                </li>
                            </ul>
                        </div>
                    @endif
                </div>

                <div class="mt-2">
                    <small>Titre</small>
                    <h4 class="mb-0">{{ $selectedTache->titre }}</h4>
                </div>

                <div class="mt-2 row g-3">
                    <div class="col-lg-5">
                        <div class="items">
                            <p class="mb-2 me-0"><i class="fi fi-rr-user me-1"></i> Créée par</p>
                            <div class="d-flex w-100 align-items-center">
                                <div class="avatar-us-create">
                                    <img src="{{ imageOrDefault($selectedTache->user->agent->image) }}"
                                        alt="photo de profil {{ $selectedTache->user->agent->prenom . ' ' . $selectedTache->user->agent->nom }}">
                                </div>
                                <h6 class="mb-0 ms-2">
                                    {{ $selectedTache->user->agent->prenom . ' ' . $selectedTache->user->agent->nom }}
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="items">
                            <p class="mb-2 me-0"><i class="fi fi-rr-users me-1"></i> Participants</p>
                            <div class="block-all-membres">
                                @foreach ($selectedTache->executants as $executant)
                                    <div class="avatar-membre" data-bs-toggle="modal"
                                        data-bs-target="#modal-edit-participants-{{ $executant->id }}">
                                        <img src="{{ imageOrDefault($executant->image) }}"
                                            alt="image de profil {{ $executant->prenom . ' ' . $executant->nom }}"
                                            title="{{ $executant->prenom . ' ' . $executant->nom }}">
                                    </div>
                                @endforeach

                                @if (
                                    $selectedTache->progression == 0 &&
                                        $selectedTache->statut_id == 2 &&
                                        $selectedTache->executants->where('tache_id', $selectedTache->id)->count() != $agents->count())
                                    <div class="avatar-membre bg-light" data-bs-toggle="modal"
                                        data-bs-target="#modal-add-participants-{{ $selectedTache->id }}">
                                        <i class="bi bi-plus"></i>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="items">
                            <p class="mb-3 me-0"><i class="fi fi-rr-calendar-clock me-1"></i> Date limite</p>
                            <h6 class="px-2 py-1 rounded-pill text-danger bg-soft-danger d-inline-block">
                                {{ $selectedTache->date_fin->format('d/m/Y') }}</h6>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="items">
                            <p class="mb-2 me-0 d-flex align-items-center">
                                {{-- <i class="bi bi-list me-2"></i> --}}
                                Note
                            </p>
                            <p style="color: var(--colorTitre)">{{ $selectedTache->description }}</p>
                        </div>
                    </div>
                </div>
                <div class="mt-3 block-folder">
                    <ul class="mb-2 nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active text-uppercase" id="profile-tab" data-bs-toggle="tab"
                                data-bs-target="#tache-{{ $selectedTache->id }}" type="button" role="tab"
                                aria-controls="tache" aria-selected="true">Liste de tâches à exécuter</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-uppercase" id="home-tab" data-bs-toggle="tab"
                                data-bs-target="#comment-{{ $selectedTache->id }}" type="button" role="tab"
                                aria-controls="comment" aria-selected="false">Commentaires</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-uppercase" id="home-tab" data-bs-toggle="tab"
                                data-bs-target="#fichier-{{ $selectedTache->id }}" type="button" role="tab"
                                aria-controls="fichier" aria-selected="false">Fichiergs partagés</button>
                        </li>
                    </ul>
                    <hr class="mt-0">
                    <div class="tab-content" id="myTabContent">
                        <div @class(['tab-pane fade', 'show active' => $tab == 1]) id="tache-{{ $selectedTache->id }}" role="tabpanel"
                            aria-labelledby="home-tab">
                            <p class="mt-4" style="font-size: 14px; color: var(--colorParagraph);">
                                Progression de la tâche
                            </p>
                            <div class="block-progress-bar d-flex align-items-center justify-content-between">
                                <div class="bar">
                                    <div class="move"
                                        style="width: {{ Str::substr((($selectedTache->sous_taches->where('statut_id', '=', 3)->count() + ($selectedTache->statut_id == 3 ? 1 : 0)) * 100) / ($selectedTache->sous_taches->count() + 1), 0, 4) }}%">
                                    </div>
                                </div>
                                <div class="pourc d-flex">
                                    <p class="mb-0">
                                        {{ Str::substr((($selectedTache->sous_taches->where('statut_id', '=', 3)->count() + ($selectedTache->statut_id == 3 ? 1 : 0)) * 100) / ($selectedTache->sous_taches->count() + 1), 0, 4) }}%
                                    </p>
                                </div>
                            </div>
                            <div class="py-3 block-item">
                                <div class="form-check ms-4">
                                    <input type="checkbox" name="tache_id" class="form-check-input check-cible"
                                        data-cible="{{ json_encode($selectedTache) }}" id="flexCheckDefault"
                                        @checked($selectedTache->statut_id == 3)>
                                    <label class="form-check-label ms-2 col-12" for="flexCheckDefault">
                                        @if ($selectedTache->statut_id == 3)
                                            <strike>
                                                {{ $selectedTache->titre }}
                                            </strike>
                                            <span
                                                class="text-end">{{ $selectedTache->user->agent->prenom . ' ' . $selectedTache->user->agent->nom }}</span>
                                        @else
                                            {{ $selectedTache->titre }}
                                        @endif
                                    </label>
                                </div>
                                @foreach ($selectedTache->sous_taches as $tache)
                                    <div class="form-check ms-4">
                                        <input type="checkbox" name="tache_id" class="form-check-input check-cible"
                                            data-cible="{{ json_encode($tache) }}" id="flexCheckDefault-{{ $tache->id }}"
                                            @checked($tache->statut_id == 3)>
                                        <label class="form-check-label ms-2 col-12" for="flexCheckDefault-{{ $tache->id }}">
                                            @if ($tache->statut_id == 3)
                                                <strike>
                                                    {{ $tache->titre }}
                                                </strike>
                                                <span
                                                    class="text-end">{{ $tache->user->agent->prenom . ' ' . $tache->user->agent->nom }}</span>
                                            @else
                                                {{ $tache->titre }}
                                            @endif
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="comment-{{ $selectedTache->id }}" role="tabpanel"
                            aria-labelledby="home-tab">
                            <div class="all-comments pe-3"
                                style="overflow-y: auto; height: 35vh; overflow-x: hidden;">
                                <div class="block-scroll" id="tache-commentaires">
                                    @if ($selectedTache->commentaires->count() == 0)
                                        <div class="file d-flex justify-content-center align-items-center">
                                            <div class="name-file">
                                                Aucun commentaire pour l'instant !
                                            </div>
                                        </div>
                                    @else
                                        @foreach ($selectedTache->commentaires as $key => $commentaire)
                                            <div
                                                class="block-comment {{ $commentaire->user_id == Auth::user()->id ? 'block-comment-me' : '' }} commentaires">
                                                <div class="block-info-comment d-flex">
                                                    <div class="avatar-comment commentaires">
                                                        <img src="{{ imageOrDefault($commentaire->user->agent->image) }}"
                                                            alt="Photo profil">
                                                    </div>
                                                    <div class="name-comment commentaires">
                                                        <h6>{{ $commentaire->user->agent->prenom . ' ' . $commentaire->user->agent->nom }}
                                                        </h6>
                                                        <p>{{ $commentaire->created_at->diffForHumans() }}</p>
                                                    </div>
                                                </div>
                                                <div class="comment commentaires">
                                                    <p>{{ $commentaire->message }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                                {{-- @if ($selectedTache->executants->where('user_id', Auth::user()->id)->first() != null && $tache->progression == 0) --}}
                                <div class="p-0 bg-white offcanvas-footer w-100"
                                    style="position: absolute; bottom: 0vw;">
                                    <div class="block-comment d-flex align-items-center"
                                        style="padding-left: 0!important">
                                        <div class="block-avatar-sm">
                                            <img src="{{ imageOrDefault(Auth::user()->agent->image) }}"
                                                alt="photo de profil {{ Auth::user()->agent->prenom . ' ' . Auth::user()->agent->nom }}">
                                        </div>
                                        <form method="post" action="{{ route('pm.taches.commentaire.store') }}"
                                            id="form-message">
                                            @csrf
                                            <div class="form-group row g-2">
                                                <div class="col-lg-12 form-block input-form-comment">
                                                    <input type="hidden" name="tache_id"
                                                        value="{{ $selectedTache->id }}" class="form-control"
                                                        required>
                                                        <textarea name="message" id="comment-text" cols="30" rows="2"
                                                            placeholder="Laissez un commentaire" required
                                                            class="rounded form-control"></textarea>
                                                </div>
                                            </div>
                                        </form>
                                        <button type="submit" class="px-2 py-1 btn ms-2" form="form-message">
                                            <i class="bi bi-send bi-send-das"></i>
                                        </button>
                                    </div>
                                </div>
                                {{-- @endif --}}
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="fichier-{{ $selectedTache->id }}" role="tabpanel"
                            aria-labelledby="home-tab">
                            <div class="block-scroll-file"
                                style="overflow-y: auto; height: 35vh; overflow-x: hidden;">
                                @if (!$selectedTache->fichier)
                                    <div class="file d-flex justify-content-center align-items-center">
                                        <div class="name-file">
                                            Aucun fichier téléversé !
                                        </div>
                                    </div>
                                @else
                                    {{-- @foreach ($selectedTache->fichiers as $fichier) --}}
                                        <div class="file d-flex">
                                            <a href="{{ route('pm.documents.show', $selectedTache->fichier) }}" class="col-4">
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ fileIcon($selectedTache->fichier->document) }}" alt=""
                                                        class="me-2 img-file img-fluid" style="max-width: 80px">
                                                    <div class="text-star col-10">
                                                        <h6>{{ Str::ucfirst($selectedTache->fichier->libelle) }}</h6>
                                                        <p>Ref : {{ Str::ucfirst($selectedTache->fichier->reference) }}</p>
                                                        <p>Ajouté le: {{ $selectedTache->fichier->created_at->format('d/m/Y h:i') }}</p>
                                                    </div>
                                                </div>
                                            </a>
                                            {{-- <a href="{{ asset('assets/pdfs/fichiers/' . $selectedTache->fichier?->id . '.' . $selectedTache->fichier?->type) }}"
                                                target="_blank">
                                                <div class="icon">
                                                    <i data-feather="file-text"></i>
                                                </div>
                                            </a>
                                            <a href="{{ asset('assets/pdfs/fichiers/' . $selectedTache->fichier?->id . '.' . $selectedTache->fichier?->type) }}"
                                                target="_blank">
                                                <div class="name-file">
                                                    <h6>{{ $selectedTache->fichier?->libelle }}</h6>
                                                    <p>{{ $selectedTache->fichier?->type }}</p>
                                                </div>
                                            </a> --}}
                                        </div>
                                    {{-- @endforeach --}}
                                @endif
                            </div>
                            @if ($selectedTache->document_id == '' || $selectedTache->document_id == null)
                                <div class="p-0 bg-white offcanvas-footer w-100"
                                    style="position: absolute; bottom: 0vw;">
                                    <div class="block-comment d-flex align-items-end"
                                        style="padding-left: 0!important">
                                        <div class="block-avatar-sm">
                                            <img src="{{ imageOrDefault(Auth::user()->agent->image) }}"
                                                alt="photo de profil {{ Auth::user()->agent->prenom . ' ' . Auth::user()->agent->nom }}">
                                        </div>
                                        <form method="post" id="file-form" enctype="multipart/form-data"
                                            action="{{ route('pm.taches.commentaire.fichier.store') }}">
                                            @csrf
                                            <div class="form-group row g-2 align-items-center">
                                                <div class="col-lg-12">
                                                    <div class="block-file-upload">
                                                        <label for="fichier">
                                                            Importer un fichier
                                                        </label>
                                                        <input type="hidden" name="tache_id"
                                                            value="{{ $selectedTache->id }}" class="form-control ">
                                                        <input id="fichier" type="file" name="document"
                                                            class="form-control form-file" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <button type="submit" class="px-2 py-1 mb-2 btn ms-2" form="file-form">
                                            <i class="bi bi-upload"></i>
                                        </button>
                                    </div>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
