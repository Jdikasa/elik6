<div class="offcanvas offcanvas-end offcanvas-task" tabindex="-1" id="detail-task-{{ $tache->id }}"
    aria-labelledby="offcanvasRightLabel" style="width: 600px" wire:ignore.self>
    <div class="offcanvas-header align-items-center"
        style="flex-direction: column;border: none; padding-left:35px;padding-right: 35px;">
        <div class="d-flex justify-content-between w-100 align-items-center">
            @if (Auth::user()->id == 1)
                <a href="{{-- route('pm.taches.finish',$tache->id) --}}" class="btn">Marquer comme terminé</a>
            @endif
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"
                style="transform: scale(.8)"></button>
        </div>
    </div>
    <div class="offcanvas-body">
        <div class="pt-0 block-detail-task" wire:poll.keep-alive>
            <div class="d-flex w-100 align-items-baseline">
                <h4 class="mb-0 pe-3 title-task" style="word-break: break-all">{{ $tache->titre }}</h4>
                <div class="d-flex align-items-center ms-auto" style="flex: 0 0 auto">
                    <div
                        class="badge-task @if ($tache->priorite_id == 1) normal @elseif($tache->priorite_id == 2) urgent @else absolu @endif">
                        {{ $tache->priorite?->titre }}
                    </div>
                    @if ($tache->user_id == Auth::id())
                        <div class="dropdown">
                            <button class="px-0 btn btn-end ms-2" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="bi bi-menu-dots-vertical"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="">
                                <li>
                                    <a class="dropdown-item"
                                        href="{{ route('pm.taches.edit', $tache->id) }}">Modifier</a>
                                </li>
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                        data-bs-target="#modal-add-objectifs-{{ $tache->id }}">Ajouter un
                                        objectif</a></li>
                                <li>
                                    <a class="dropdown-item delete" href="#"
                                        data-id="{{ $tache->id }}">Supprimer</a>
                                </li>
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
            <div class="mt-2 row g-3">
                <div class="col-lg-5">
                    <div class="items">
                        <p class="mb-2 me-0"><i class="bi bi-person me-1"></i> Créée par</p>
                        <div class="d-flex w-100 align-items-center">
                            <div class="avatar-us-create">
                                <img src="{{ imageOrDefault($tache->user->agent->image) }}"
                                    alt="photo de profil {{ $tache->user->agent->prenom . ' ' . $tache->user->agent->nom }}">
                            </div>
                            <h6 class="mb-0 ms-2">
                                {{ $tache->user->agent->prenom . ' ' . $tache->user->agent->nom }}
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="items">
                        <p class="mb-2 me-0"><i class="bi bi-person-group me-1"></i> Participants</p>
                        <div class="block-all-membres">
                            @foreach ($tache->objectifs as $objectif)
                                <div class="avatar-membre" data-bs-toggle="modal"
                                    data-bs-target="#modal-edit-participants-{{ $tache->id }}">
                                    <img src="{{ imageOrDefault($objectif->agent?->image) }}" alt="image profil">
                                </div>
                            @endforeach
                            @if ($tache->pourcentage < 100 && $tache->statut_id != '3')
                                <div class="avatar-membre" data-bs-toggle="modal"
                                    data-bs-target="#modal-add-participants-{{ $tache->id }}">
                                    <i class="bi bi-plus"></i>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="items">
                        <p class="mb-3 me-0"><i class="bi bi-calendar me-1"></i> Période </p>
                        <h6>Du {{ $tache->date_debut?->format('d-m-Y') }} au
                            {{ $tache->date_fin?->format('d-m-Y') }}</h6>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="items">
                        <h6>
                            Description
                        </h6>
                        <p style="color: var(--colorTitre)">{!! $tache->description !!}</p>
                    </div>
                </div>
            </div>
            <hr>
            @livewire('taches.tache-pane', ['tache' => $tache], key($tache->id))
        </div>
    </div>
</div>
