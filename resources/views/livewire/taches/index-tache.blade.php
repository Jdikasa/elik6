<div class="col-lg-12">
    <div class="mb-0 d-flex justify-content-between align-items-center content-list">
        <ul class="nav nav-tabs nav-tache nav-folder" id="myTab" role="tablist">
            <li class="nav-item " role="presentation">
                <button class="nav-link {{ $tab == 1 ? 'active' : '' }}" id="tab-new-tache" wire:click='changeTab(1)'>
                    Vos tâches
                </button>
            </li>
            <li class="nav-item " role="presentation">
                <button class="nav-link {{ $tab == 2 ? 'active' : '' }}" id="tab-assign-tache"
                    wire:click='changeTab(2)'>Assignées</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ $tab == 3 ? 'active' : '' }}" id="tab-in-progress"
                    wire:click='changeTab(3)'>En cours</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ $tab == 4 ? 'active' : '' }}" id="profile-tab"
                    wire:click='changeTab(4)'>Terminées</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ $tab == 5 ? 'active' : '' }}" id="profile-tab" wire:click='changeTab(5)'>
                    Hors delais
                </button>
            </li>
            <div class="indicator-nav" wire:ignore>
                <span></span>
            </div>
        </ul>
    </div>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade {{ $tab == 1 ? 'show active' : '' }}" id="new-tache" role="tabpanel"
            aria-labelledby="new-tache">
            <div class="px-0 pt-3 card card-table" style="overflow: inherit">
                <div class="row px-lg-4 px-3 align-items-center">
                    <div class="col-lg-6 col-6">
                        <h4 class="no-padding no-margin">Liste des tâches</h4>
                    </div>
                    <div class="col-lg-6 col-6">
                        <div class="d-flex align-items-center justify-content-end">
                            <a href="{{ route('pm.taches.create') }}" class="btn btn-add">
                                Ajouter
                            </a>
                        </div>
                    </div>
                </div>
                <hr class="mb-0">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Titre</th>
                                <th scope="col">Priorité</th>
                                <th scope="col">Assignés</th>
                                <th scope="col">Date d'échéance</th>
                                <th scope="col">Progression</th>
                                <th scope="col">Statut</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($taches as $tache)
                                <tr>
                                    <td> {{ $tache->titre }} </td>
                                    <td> {{ $tache->priorite->titre }} </td>
                                    <td>
                                        <div class="box-avatar d-flex align-items-center">
                                            @foreach ($tache->objectifs as $objecif)
                                                <div class="cursor-pointer avatar-team" data-bs-toggle="modal"
                                                    data-bs-target="#modal-edit-participants-{{ $objecif->id }}">
                                                    <div class="tooltip-team">
                                                        {{ $objecif->agent?->prenom }}
                                                    </div>
                                                    <img src="{{ imageOrDefault($objecif->agent?->image) }}" alt="image de profil {{ $objecif->agent?->prenom . ' ' . $objecif->agent?->nom }}">
                                                </div>
                                            @endforeach
                                            <div class="user badge-plus" data-bs-toggle="modal"
                                                data-bs-target="#modal-add-participants-{{ $tache->id }}">
                                                <div class="tooltip-team">
                                                    Ajouter un agent
                                                </div>
                                                <i class="bi bi-plus"></i>
                                            </div>
                                        </div>
                                    </td>
                                    <td> {{ $tache->created_at }} </td>
                                    <td>
                                        <div
                                            class="progress-tache {{ $tache->pourcentage >= 80 ? 'green' : '' }} {{ $tache->pourcentage >= 50 && $tache->pourcentage < 80 ? 'orange' : '' }} ">
                                            <div class="pourc">
                                                {{ $tache->pourcentage }}%
                                            </div>
                                            <div class="content-progress-tache">
                                                <div style="width: {{ $tache->pourcentage }}%">

                                                </div>
                                            </div>

                                        </div>
                                    </td>
                                    <td> {{ $tache->tache_statut->titre }} </td>
                                    <td>
                                        <div class="d-flex align-items-center btns-action-table">
                                            {{-- <a href="#" class="p-2 text-white btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#modal-show-tache-{{ $tache->id }}"><i
                                                        class="fi fi-rr-eye"></i>
                                                    Voir</a> --}}
                                            <a href="#" class="btn" data-bs-toggle="offcanvas"
                                                data-bs-target="#detail-task-{{ $tache->id }}"
                                                style="color:var(--colorTitre)!important;">
                                                Voir
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">
                                        <div class="text-center col-12">
                                            <img src="{{ asset('assets/images/sad.gif') }}" alt=""
                                                width="35px" class="">
                                            <p>Aucune tache trouvé</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="tab-pane fade {{ $tab == 2 ? 'show active' : '' }}" id="assign-tache" role="tabpanel"
            aria-labelledby="in-progress">
            <div class="row g-3">
                @forelse ($newTaches ?? [] as $key => $tache)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="pb-1 card card-table">
                            <div class="block-taks task" style="border: none">
                                <div
                                    class="badge-task @if ($tache->priorite_id == 1) normal @elseif($tache->priorite_id == 2) urgent @else absolu @endif">
                                    {{ $tache->priorite->titre }}
                                </div>
                                <div
                                    class="badge-task @if ($tache->priorite_id == 1) normal @elseif($tache->priorite_id == 2) urgent @else absolu @endif">
                                    {{ $tache->priorite->titre }}
                                </div>
                                <div class="block">{{ $tache->titre }}</div>
                                <div class="row g-2">
                                    <div class="col-12">
                                        <div class="block-detail">
                                            {{-- <h6>{{ $tache->tache }}</h6> --}}
                                            <p>{{ "Une nouvelle tâche vous a été assignée, cliquez sur 'TRAITER' pour commencer le traitement " }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <span class="item-date">
                                            Date debut
                                        </span>
                                        <p class="debute-task task-date"> {{ $tache->date_debut }}</p>
                                    </div>
                                    <div class="col-6">
                                        <span class="item-date">
                                            Date fin
                                        </span>
                                        <p class="end-task task-date">{{ $tache->date_fin }}</p>
                                    </div>
                                    <div class="col-12">
                                        <div
                                            class="block-progress d-flex justify-content-between align-items-center">
                                            <div class="progressBar">
                                                <div class="move" style="width: {{ $tache->pourcentage }}%">
                                                </div>
                                            </div>
                                            <div class="pourcentage">
                                                {{ $tache->pourcentage }}%
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-between">
                                        <div class="block-user d-flex">
                                            <div class="block-user d-flex">
                                                @foreach ($tache->objectifs as $objecif)
                                                    <div class="user">
                                                        <span class="online"></span>
                                                        <img src="{{ imageOrDefault($objecif->agent?->image) }}"
                                                            alt="image de profil {{ $objecif->agent?->prenom . ' ' . $objecif->agent?->nom }}">
                                                    </div>
                                                @endforeach

                                                {{-- <div class="user badge-plus" data-bs-toggle="modal"
                                                        data-bs-target="#modal-add-participants-{{ $tache->id }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-plus">
                                                            <line x1="12" y1="5" x2="12"
                                                                y2="19"></line>
                                                            <line x1="5" y1="12" x2="19"
                                                                y2="12"></line>
                                                        </svg>
                                                    </div> --}}
                                            </div>
                                        </div>
                                        <button class="btn btn-sm btn-add"
                                            wire:click="updateStatut({{ $tache->id }})">Traiter</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-12 mx-auto">
                        <div class="card card-table">
                            <div class="text-center col-12">
                                <img src="{{ asset('assets/images/sad.gif') }}" alt="" class=""
                                    width="35px">
                                <p class="text-center para" style="font-size: 14px; color: var(--colorParagraph)">
                                    Aucune tâche assignée
                                </p>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>

        <div class="tab-pane fade {{ $tab == 3 ? 'show active' : '' }}" id="in-progress" role="tabpanel"
            aria-labelledby="in-progress">
            <div class="row g-3">
                @forelse ($tacheEncours ?? [] as $key => $tache)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="pb-1 card card-table">
                            <div class="block-taks task" style="border: none">
                                <div
                                    class="badge-task @if ($tache->priorite_id == 1) normal @elseif($tache->priorite_id == 2) urgent @else absolu @endif">
                                    {{ $tache->priorite->titre }}
                                </div>
                                <div
                                    class="badge-task @if ($tache->priorite_id == 1) normal @elseif($tache->priorite_id == 2) urgent @else absolu @endif">
                                    {{ $tache->priorite->titre }}
                                </div>
                                <div class="block">{{ $tache->titre }}</div>
                                <div class="row g-2">
                                    <div class="col-12">
                                        <div class="block-detail">
                                            <p>{{ 'La Tâche est en cours ... ' }}
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <span class="item-date">
                                            Date debut
                                        </span>
                                        <p class="debute-task task-date"> {{ $tache->date_debut }}</p>
                                    </div>
                                    <div class="col-6">
                                        <span class="item-date">
                                            Date fin
                                        </span>
                                        <p class="end-task task-date">{{ $tache->date_fin }}</p>
                                    </div>
                                    <div class="col-12">
                                        <div
                                            class="block-progress d-flex justify-content-between align-items-center">
                                            <div class="progressBar">

                                                <div class="move" style="width: {{ $tache->pourcentage }}%">
                                                </div>
                                            </div>
                                            <div class="pourcentage">
                                                {{ $tache->pourcentage }}%
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-between">
                                        <div class="block-user d-flex">
                                            @foreach ($tache->objectifs as $objecif)
                                                <div class="user">
                                                    <span class="online"></span>
                                                    <img src="{{ imageOrDefault($objecif->agent?->image) }}"
                                                        alt="image de profil {{ $objecif->agent?->prenom . ' ' . $objecif->agent?->nom }}">
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="block-options-sm d-flex align-items-center">
                                            <a href="#" data-bs-toggle="offcanvas"
                                                data-bs-target="#detail-task-{{ $tache->id }}"
                                                data-bs-pan="{{ 1 }}" aria-controls="offcanvasRight">
                                                <i class="fi fi-rr-eye"></i>
                                            </a>
                                            <a href="#" data-bs-toggle="offcanvas"
                                                data-bs-target="#detail-task-{{ $tache->id }}"
                                                data-bs-pan="{{ 2 }}">
                                                <i class="fi fi-rr-clip"></i>
                                            </a>
                                            <a href="#" data-bs-toggle="offcanvas"
                                                data-bs-target="#detail-task-{{ $tache->id }}"
                                                data-bs-pan="{{ 3 }}">
                                                <i class="fi fi-rr-comment-alt"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-12 mx-auto">
                        <div class="card card-table">
                            <div class="text-center col-12">
                                <img src="{{ asset('assets/images/sad.gif') }}" alt="" class=""
                                    width="35px">
                                <p class="text-center para"
                                    style="font-size: 14px; color: vafr(--colorParagraph)">
                                    Aucune tâche en cours
                                </p>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>

        <div class="tab-pane fade {{ $tab == 4 ? 'show active' : '' }}" id="task-end" role="tabpanel"
            aria-labelledby="home-tab">
            <div class="row g-3">
                @forelse ($endTaches ?? [] as $key => $tache)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="pb-1 card card-table">
                            <div class="block-taks task" style="border: none">
                                <div
                                    class="badge-task @if ($tache->priorite_id == 1) normal @elseif($tache->priorite_id == 2) urgent @else absolu @endif">
                                    {{ $tache->priorite->titre }}
                                </div>
                                <div class="block">{{ $tache->titre }}</div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="block-detail">
                                            <h6>{{ $tache->tache }}</h6>
                                            <p>{{ 'La tâche est terminée.' }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-6 d-flex align-items-end" style="flex-tache:column">
                                        <h6>{{ $tache->date_debut }}</h6>
                                        <p>{{ $tache->date_fin }}</p>
                                    </div>
                                    <div class="col-12">
                                        <div
                                            class="block-progress d-flex justify-content-between align-items-center">
                                            <div class="progressBar">
                                                <div class="move" style="width: {{ $tache->pourcentage }}%">
                                                </div>
                                            </div>
                                            <div class="pourcentage">
                                                {{ $tache->pourcentage }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-between">
                                        <div class="block-user d-flex">
                                            @foreach ($tache->objectifs as $objecif)
                                                <div class="user">
                                                    <span class="online"></span>
                                                    <img src="{{ imageOrDefault($objecif->agent?->image) }}"
                                                        alt="image de profil {{ $objecif->agent?->prenom . ' ' . $objecif->agent?->nom }}">
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="block-options-sm d-flex align-items-center">
                                            <a href="#" data-bs-toggle="offcanvas"
                                                data-bs-target="#detail-task-{{ $tache->id }}"
                                                data-bs-pan="{{ 1 }}" aria-controls="offcanvasRight">
                                                <i class="fi fi-rr-eye"></i>
                                            </a>
                                            <a href="#" data-bs-toggle="offcanvas"
                                                data-bs-target="#detail-task-{{ $tache->id }}"
                                                data-bs-pan="{{ 2 }}">
                                                <i class="fi fi-rr-clip"></i>
                                            </a>
                                            <a href="#" data-bs-toggle="offcanvas"
                                                data-bs-target="#detail-task-{{ $tache->id }}"
                                                data-bs-pan="{{ 3 }}">
                                                <i class="fi fi-rr-comment-alt"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-12 mx-auto">
                        <div class="card card-table">
                            <div class="text-center col-12">
                                <img src="{{ asset('assets/images/sad.gif') }}" alt="" class=""
                                    width="35px">
                                <p class="text-center para"
                                    style="font-size: 14px; color: vafr(--colorParagraph)">
                                    Aucune tâche terminée
                                </p>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>

        <div class="tab-pane fade {{ $tab == 5 ? 'show active' : '' }}" id="in-progress" role="tabpanel"
            aria-labelledby="in-progress">
            <div class="row g-3">
                @forelse ($horsDelais ?? [] as $key => $tache)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="pb-1 card card-table">
                            <div class="block-taks task" style="border: none">
                                <div
                                    class="badge-task @if ($tache->priorite_id == 1) normal @elseif($tache->priorite_id == 2) urgent @else absolu @endif">
                                    {{ $tache->priorite->titre }}
                                </div>
                                <div
                                    class="badge-task @if ($tache->priorite_id == 1) normal @elseif($tache->priorite_id == 2) urgent @else absolu @endif">
                                    {{ $tache->priorite->titre }}
                                </div>
                                <div class="block">{{ $tache->titre }}</div>
                                <div class="row g-2">
                                    <div class="col-12">
                                        <div class="block-detail">
                                            <p>{{ 'La Tâche est hors delais ... ' || Str::substr($tache->description, 0, 50) }}
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <span class="item-date">
                                            Date debut
                                        </span>
                                        <p class="debute-task task-date"> {{ $tache->date_debut }}</p>
                                    </div>
                                    <div class="col-6">
                                        <span class="item-date">
                                            Date fin
                                        </span>
                                        <p class="end-task task-date">{{ $tache->date_fin }}</p>
                                    </div>
                                    <div class="col-12">
                                        <div
                                            class="block-progress d-flex justify-content-between align-items-center">
                                            <div class="progressBar">

                                                <div class="move" style="width: {{ $tache->pourcentage }}%">
                                                </div>
                                            </div>
                                            <div class="pourcentage">
                                                {{ $tache->pourcentage }}%
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-between">
                                        <div class="block-user d-flex">
                                            @foreach ($tache->objectifs as $objecif)
                                                <div class="user">
                                                    <span class="online"></span>
                                                    <img src="{{ imageOrDefault($objecif->agent?->image) }}"
                                                        alt="image de profil {{ $objecif->agent?->prenom . ' ' . $objecif->agent?->nom }}">
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="block-options-sm d-flex align-items-center">
                                            <a href="#" data-bs-toggle="offcanvas"
                                                data-bs-target="#detail-task-{{ $tache->id }}"
                                                data-bs-pan="{{ 1 }}" aria-controls="offcanvasRight">
                                                <i class="fi fi-rr-eye"></i>
                                            </a>
                                            <a href="#" data-bs-toggle="offcanvas"
                                                data-bs-target="#detail-task-{{ $tache->id }}"
                                                data-bs-pan="{{ 2 }}">
                                                <i class="fi fi-rr-clip"></i>
                                            </a>
                                            <a href="#" data-bs-toggle="offcanvas"
                                                data-bs-target="#detail-task-{{ $tache->id }}"
                                                data-bs-pan="{{ 3 }}">
                                                <i class="fi fi-rr-comment-alt"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-12 mx-auto">
                        <div class="card card-table">
                            <div class="text-center col-12">
                                <img src="{{ asset('assets/images/sad.gif') }}" alt="" class=""
                                    width="35px">
                                <p class="text-center para"
                                    style="font-size: 14px; color: vafr(--colorParagraph)">
                                    Aucune tâche hors delais
                                </p>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
