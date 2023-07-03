<div class="col-lg-12">
    <div class="d-flex justify-content-between" wire:ignore.self>
        <ul class="p-3 pb-2 mb-0 bg-white nav nav-tabs nav-user" id="myTab" role="tablist" wire:ignore.self>
            <li class="nav-item me-3" role="presentation">
                <button @class(['nav-link', 'active' => $page == 1]) id="home-tab" data-bs-toggle="tab" data-bs-target="#departement"
                    type="button" role="tab" aria-controls="departement" aria-selected="true"
                    wire:click='switchPage(1)' wire:ignore>
                    Nouvelle tâche
                </button>
            </li>
            <li class="nav-item me-3" role="presentation">
                <button @class(['nav-link', 'active' => $page == 2]) id="profile-tab" data-bs-toggle="tab" data-bs-target="#contrat" type="button"
                    role="tab" aria-controls="contrat" aria-selected="false"wire:click='switchPage(2)' wire:ignore>
                    En cours
                </button>
            </li>
            <li class="nav-item me-3" role="presentation">
                <button @class(['nav-link', 'active' => $page == 3]) id="profile-tab" data-bs-toggle="tab" data-bs-target="#activite" type="button"
                    role="tab" aria-controls="activite" aria-selected="false" wire:click='switchPage(3)' wire:ignore>
                    Hors delais
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button @class(['nav-link', 'active' => $page == 4]) id="profile-tab" data-bs-toggle="tab" data-bs-target="#edit-profil"
                    type="button" role="tab" aria-controls="edit-profil" aria-selected="false"
                    wire:click='switchPage(4)' wire:ignore>
                    Terminées
                </button>
            </li>
        </ul>
        <div>
            <a class="btn btn-add" data-bs-toggle="modal" data-bs-target="#modal-new-task">
                <i class="bi bi-plus"></i>
                Créer une tâche
            </a>
        </div>
    </div>

    <div class="border-0 card card-table card-profil" style="border-radius: 0 12px 12px 12px">
        <div class="card-body">
            <div class="py-3 tab-content position-relative" id="">
                
                <div class="m-0 d-none position-absolute d-flex justify-content-center"
                    style="z-index: 2; height:100%; width:100%; background-color: rgba(255,255,255,0.90)" wire:loading
                    wire:target="startTraitement, switchPage" wire:loading.class.remove="d-none">
                    <div class="m-auto text-center">
                        <div class="spinner-border" role="status" style="color: var(--primaryColor)">
                            <span class="sr-only"></span>
                        </div>
                    </div>
                </div>
                
                @if ($page == 1)
                    <div @class(['tab-pane fade', 'show active' => $page == 1]) id="departement" role="tabpanel" aria-labelledby="home-tab"
                        >
                        <div class="row g-3">
                            @forelse ($newTaches as $key => $tache)
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="p-3 shadow-none card card-table"
                                        style="overflow: inherit; background:#f3f6fe">
                                        <div class="pt-3 block-taks task" style="border: none">
                                            <div
                                                class="badge-task mt-1 @if ($tache->priorite_id == 1) normal @elseif($tache->priorite_id == 3) urgent @else moyen @endif">
                                                Priorite : {{ $tache->priorite->titre }}
                                            </div>
                                            <div class="dropdown">
                                                <button class="btn btn-end" id="dropdownMenuButton1"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                    <li>
                                                        <a class="dropdown-item" href="#">marquer comme
                                                            terminé</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                            data-bs-target="#modal-edit-task-{{ $tache->id }}">
                                                            Modifier
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item delete" href="#"
                                                            data-id="{{ $tache->id }}">Supprimer</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                            data-bs-target="#modal-edit-objectif-{{ $tache->id }}">Les
                                                            objectifs
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                            data-bs-target="#modal-add-objectifs-{{ $tache->id }}">Ajouter
                                                            un objectif
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="block pt-1 pb-2">
                                                {{ Str::ucfirst($tache->titre) }}
                                            </div>
                                            <div class="row g-2">
                                                <div class="px-1 col-12">
                                                    <div class="pb-2 block-detail">
                                                        <p>{{ Str::limit($tache->description, 80) }}</p>
                                                    </div>
                                                </div>
                                                <div class="px-1 col-6" style="flex-direction:column">
                                                    <p class="debute-task task-date">
                                                        Debut :
                                                        {{ $tache->date_debut->isoFormat('ll') }}
                                                    </p>
                                                </div>
                                                <div class="px-1 mb-2 col-6 text-end">
                                                    @if ($tache->date_fin)
                                                        <p class="end-task task-date">
                                                            Fin :
                                                            {{ $tache->date_fin?->isoFormat('ll') }}
                                                        </p>
                                                    @endif
                                                </div>
                                                <div
                                                    class="px-1 pt-2 col-12 d-flex justify-content-between border-top">
                                                    <div class="block-user d-flex">
                                                        @foreach ($tache->executants as $agent)
                                                            <div class="user" data-bs-toggle="modal"
                                                                style="z-index:{{ $loop->count - $loop->index }}"
                                                                data-bs-target="#modal-edit-participants-{{ $tache->id }}">
                                                                <span class="online"></span>
                                                                <img src="{{ imageOrDefault($agent->image) }}"
                                                                    alt="image de profil {{ $agent->prenom . ' ' . $agent->nom }}">
                                                            </div>
                                                        @endforeach

                                                        @if ($tache->executants->count() <= $agents->count())
                                                            <div class="user badge-plus" data-bs-toggle="modal"
                                                                data-bs-target="#modal-add-participants-{{ $tache->id }}">
                                                                <i class="bi bi-plus"></i>
                                                            </div>
                                                        @endif
                                                    </div>

                                                    <div class="block-options-sm d-flex align-items-center">
                                                        <button class="px-2 py-1 btn btn-sm btn-add"
                                                            wire:click='startTraitement({{ $tache->id }})'>
                                                            Traiter
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="my-4 text-center col-12">
                                    <img src="{{ asset('assets/img/sad.gif') }}" alt="" width="35px"
                                        class="">
                                    <p class="mb-0">Aucune nouvelle tâche trouvé</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                @endif

                
                @if ($page == 2)
                    <div @class(['tab-pane fade', 'show active' => $page == 2]) id="contrat" role="tabpanel" aria-labelledby="home-tab" 
                        wire:ignore.self>
                        <div class="row">
                            @forelse ($tacheEncours as $key => $tache)
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="p-3 shadow-none card card-table"
                                        style="overflow: inherit; background:#f3f6fe">
                                        <div class="pt-3 block-taks task" style="border: none">
                                            <div class="badge-task mt-1 @if ($tache->priorite_id == 1) normal @elseif($tache->priorite_id == 3) urgent @else moyen @endif">
                                                Priorite : {{ $tache->priorite->titre }}
                                            </div>
                                            <div class="dropdown">
                                                <button class="btn btn-end" id="dropdownMenuButton1"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                    <li>
                                                        <a class="dropdown-item" href="#">marquer comme
                                                            terminé</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modal-edit-task-{{ $tache->id }}">
                                                            Modifier
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item delete" href="#"
                                                            data-id="{{ $tache->id }}">Supprimer</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modal-edit-objectif-{{ $tache->id }}">Les
                                                            objectifs
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modal-add-objectifs-{{ $tache->id }}">Ajouter
                                                            un objectif
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="block pt-1 pb-2">
                                                {{ Str::ucfirst($tache->titre) }}
                                            </div>
                                            <div class="row g-2">
                                                <div class="px-1 col-12">
                                                    <div class="pb-2 block-detail">
                                                        <p>{{ Str::limit($tache->description, 80) }}</p>
                                                    </div>
                                                </div>
                                                <div class="px-1 col-6" style="flex-direction:column">
                                                    <p class="debute-task task-date">
                                                        Debut :
                                                        {{ $tache->date_debut->isoFormat('ll') }}
                                                    </p>
                                                </div>
                                                <div class="px-1 mb-2 col-6 text-end">
                                                    @if ($tache->date_fin)
                                                        <p class="end-task task-date">
                                                            Fin :
                                                            {{ $tache->date_fin?->isoFormat('ll') }}
                                                        </p>
                                                    @endif
                                                </div>
                                                <div class="col-12">
                                                    <div
                                                        class="block-progress d-flex justify-content-between align-items-center">
                                                        <div class="progressBar">
                                                            @if ($tache->sous_taches?->where('statut', '1')->count() == 0)
                                                                <div class="move" style="width: 0%"></div>
                                                            @else
                                                                <div class="move"
                                                                    style="width: {{ Str::substr(($tache->sous_taches?->where('statut', 1)->count() * 100) / $tache->objectifs->count(), 0, 3) }}%">
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="pourcentage">
                                                            @if ($tache->sous_taches?->where('statut', 1)->count() == 0)
                                                                0%
                                                            @else
                                                                {{ Str::substr(($tache->sous_taches?->where('statut', 1)->count() * 100) / $tache->objectifs->count(), 0, 3) }}%
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="px-1 pt-2 col-12 d-flex justify-content-between border-top">
                                                    <div class="block-user d-flex">
                                                        @foreach ($tache->executants as $agent)
                                                            <div class="user" data-bs-toggle="modal"
                                                                style="z-index:{{ $loop->count - $loop->index }}"
                                                                data-bs-target="#modal-edit-participants-{{ $tache->id }}">
                                                                <span class="online"></span>
                                                                <img src="{{ imageOrDefault($agent->image) }}"
                                                                    alt="image de profil {{ $agent->prenom . ' ' . $agent->nom }}">
                                                            </div>
                                                        @endforeach

                                                        @if ($tache->executants->count() <= $agents->count())
                                                            <div class="user badge-plus" data-bs-toggle="modal"
                                                                data-bs-target="#modal-add-participants-{{ $tache->id }}">
                                                                <i class="bi bi-plus"></i>
                                                            </div>
                                                        @endif
                                                    </div>

                                                    <div class="block-options-sm d-flex align-items-center">
                                                        <a href="javascript:void(0)" data-bs-toggle="offcanvas"
                                                        data-bs-target="#detail-task"
                                                        aria-controls="offcanvasRight" wire:click='selectTache({{ $tache->id }}, 1)'>
                                                            <i class="bi bi-eye"></i>
                                                        </a>
                                                        <a href="#" data-bs-toggle="offcanvas"
                                                            data-bs-target="#detail-task-{{ $tache->id }}">
                                                            <i class="bi bi-paperclip"></i>
                                                        </a>
                                                        <a href="#" data-bs-toggle="offcanvas"
                                                            data-bs-target="#detail-task-{{ $tache->id }}">
                                                            <i class="bi bi-chat-dots"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="my-4 text-center col-12">
                                    <img src="{{ asset('assets/img/sad.gif') }}" alt="" width="35px"
                                        class="">
                                    <p class="mb-0">Aucune tâche en cours</p>
                                </div>
                            @endforelse
                        </div>
                        
                        {{-- <a href="javascript:void(0)" class="btn" wire:click='selectTache(1)'>Test</a> --}}
                    </div>
                @endif

                @if ($page == 3)
                    <div @class(['tab-pane fade', 'show active' => $page == 3]) id="activite" role="tabpanel" aria-labelledby="activite-tab"
                        wire:ignore.self>
                        <div class="row g-3">
                            @forelse ($taches->where('progression', '2')->where('statut_id', '1') as $key => $tache)
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="pb-1 card card-table">
                                        <div class="block-taks task" style="border: none">
                                            @if ($tache->etat_id == '1')
                                                <div class="badge-task urgent">{{ $tache->etat->libelle }}</div>
                                            @elseif ($tache->etat_id == '2')
                                                <div class="badge-task moyen">{{ $tache->etat->libelle }}</div>
                                            @elseif ($tache->etat_id == '3')
                                                <div class="badge-task normal">{{ $tache->etat->libelle }}</div>
                                            @endif
                                            <div class="block">{{ $tache->libelle }}</div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="block-detail">
                                                        <h6>{{ $tache->tache }}</h6>
                                                        <p>{{ Str::substr($tache->description, 0, 200) }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-6 d-flex align-items-end"
                                                    style="flex-direction:column">
                                                    <h6>{{ $tache->date_debut }}</h6>
                                                    <p>{{ $tache->date_fin }}</p>
                                                </div>
                                                <div class="col-12">
                                                    <div
                                                        class="block-progress d-flex justify-content-between align-items-center">
                                                        <div class="progressBar">
                                                            @if ($tache->cibles->where('statut', '1')->count() == 0)
                                                                <div class="move" style="width: 0%"></div>
                                                            @else
                                                                <div class="move"
                                                                    style="width: {{ Str::substr(($tache->cibles->where('statut', '1')->count() * 100) / $tache->cibles->count(), 0, 3) }}%">
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="pourcentage">
                                                            @if ($tache->cibles->where('statut', '1')->count() == 0)
                                                                0%
                                                            @else
                                                                {{ Str::substr(($tache->cibles->where('statut', '1')->count() * 100) / $tache->cibles->count(), 0, 3) }}%
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex justify-content-between">
                                                    <div class="block-user d-flex">
                                                        @foreach ($tache->pivotusertaches as $pivotusertache)
                                                            <div class="user" data-bs-toggle="modal"
                                                                data-bs-target="#modal-edit-participants-{{ $tache->id }}">
                                                                <span class="online"></span>
                                                                <img src="{{ asset('assets/images/profils/' . $pivotusertache->employe->avatar) }}"
                                                                    alt="image de profil {{ $pivotusertache->user->prenom . ' ' . $pivotusertache->user->nom }}">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="block-options-sm d-flex align-items-center">
                                                        <a href="#" data-bs-toggle="offcanvas"
                                                            data-bs-target="#detail-task-{{ $tache->id }}"
                                                            aria-controls="offcanvasRight">
                                                            <i class="fi fi-rr-eye"></i>
                                                        </a>
                                                        <a href="#" data-bs-toggle="offcanvas"
                                                            data-bs-target="#detail-task-{{ $tache->id }}">
                                                            <i class="fi fi-rr-clip"></i>
                                                        </a>
                                                        <a href="#" data-bs-toggle="offcanvas"
                                                            data-bs-target="#detail-task-{{ $tache->id }}">
                                                            <i class="fi fi-rr-comment-alt"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="my-4 text-center col-12">
                                    <img src="{{ asset('assets/img/sad.gif') }}" alt="" width="35px"
                                        class="">
                                    <p class="mb-0">Aucune tâche hors delais</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                @endif

                @if ($page == 4)
                    <div @class(['tab-pane fade', 'show active' => $page == 4]) id="edit-profil" role="tabpanel"
                        aria-labelledby="edit-profil-tab" wire:ignore.self>
                        <div class="row g-3">
                            @forelse ($taches->where('progression', 1)->where('statut_id', 1) as $key => $tache)
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="pb-1 card card-table">
                                        <div class="block-taks task" style="border: none">
                                            @if ($tache->etat_id == '1')
                                                <div class="badge-task urgent">{{ $tache->etat->libelle }}</div>
                                            @elseif ($tache->etat_id == '2')
                                                <div class="badge-task moyen">{{ $tache->etat->libelle }}</div>
                                            @elseif ($tache->etat_id == '3')
                                                <div class="badge-task normal">{{ $tache->etat->libelle }}</div>
                                            @endif
                                            <div class="block">{{ $tache->libelle }}</div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="block-detail">
                                                        <h6>{{ $tache->tache }}</h6>
                                                        <p>{{ Str::substr($tache->description, 0, 200) }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-6 d-flex align-items-end"
                                                    style="flex-direction:column">
                                                    <h6>{{ $tache->date_debut }}</h6>
                                                    <p>{{ $tache->date_fin }}</p>
                                                </div>
                                                <div class="col-12">
                                                    <div
                                                        class="block-progress d-flex justify-content-between align-items-center">
                                                        <div class="progressBar">
                                                            @if ($tache->cibles->where('statut', '1')->count() == 0)
                                                                <div class="move" style="width: 0%"></div>
                                                            @else
                                                                <div class="move"
                                                                    style="width: {{ Str::substr(($tache->cibles->where('statut', '1')->count() * 100) / $tache->cibles->count(), 0, 3) }}%">
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="pourcentage">
                                                            @if ($tache->cibles->where('statut', '1')->count() == 0)
                                                                0%
                                                            @else
                                                                {{ Str::substr(($tache->cibles->where('statut', '1')->count() * 100) / $tache->cibles->count(), 0, 3) }}%
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex justify-content-between">
                                                    <div class="block-user d-flex">
                                                        @foreach ($tache->pivotusertaches as $pivotusertache)
                                                            <div class="user" data-bs-toggle="modal"
                                                                data-bs-target="#modal-edit-participants-{{ $tache->id }}">
                                                                <span class="online"></span>
                                                                <img src="{{ asset('assets/images/profils/' . $pivotusertache->employe->avatar) }}"
                                                                    alt="image de profil {{ $pivotusertache->user->prenom . ' ' . $pivotusertache->user->nom }}">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="block-options-sm d-flex align-items-center">
                                                        <a href="#" data-bs-toggle="offcanvas"
                                                            data-bs-target="#detail-task-{{ $tache->id }}"
                                                            aria-controls="offcanvasRight">
                                                            <i class="fi fi-rr-eye"></i>
                                                        </a>
                                                        <a href="#" data-bs-toggle="offcanvas"
                                                            data-bs-target="#detail-task-{{ $tache->id }}">
                                                            <i class="fi fi-rr-clip"></i>
                                                        </a>
                                                        <a href="#" data-bs-toggle="offcanvas"
                                                            data-bs-target="#detail-task-{{ $tache->id }}">
                                                            <i class="fi fi-rr-comment-alt"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="my-4 text-center col-12">
                                    <img src="{{ asset('assets/img/sad.gif') }}" alt="" width="35px"
                                        class="">
                                    <p class="mb-0">Aucune tâche terminée</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>
