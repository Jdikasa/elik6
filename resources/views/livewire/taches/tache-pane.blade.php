<div class="mt-3 block-folder">
    <ul class="mb-3 nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link {{ $pan == 1 ? 'active' : '' }}" id="profile-tab" data-bs-toggle="tab"
                data-bs-target="#tache-{{ $tache->id }}" type="button" role="tab" aria-controls="tache"
                aria-selected="true" wire:click='changeTab(1)'>Liste de objectifs</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link {{ $pan == 2 ? 'active' : '' }}" id="home-tab" data-bs-toggle="tab"
                data-bs-target="#comment-{{ $tache->id }}" type="button" role="tab" aria-controls="comment"
                aria-selected="false" wire:click='changeTab(2)'>Commentaires</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link {{ $pan == 3 ? 'active' : '' }}" id="home-tab" data-bs-toggle="tab"
                data-bs-target="#fichier-{{ $tache->id }}" type="button" role="tab" aria-controls="fichier"
                aria-selected="false" wire:click='changeTab(3)'>Fichiers
                partagés</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade {{ $pan == 1 ? 'show active' : '' }}" id="tache-{{ $tache->id }}" role="tabpanel"
            aria-labelledby="home-tab">
            <h6 class="mt-4">
                Progression de la tâche assignée
            </h6>
            <div class="block-progress-bar d-flex align-items-center justify-content-between">
                <div
                    class="content-bar @if ($pourcentage < 50) red @elseif($pourcentage >= 50 && $pourcentage < 80) orange @else green @endif">
                    <div class="bar" style="width: {{ $pourcentage }}%">

                    </div>
                </div>

                <div class="pourc d-flex">
                    <p class="mb-0">{{ number_format($pourcentage, 0) }}%</p>
                </div>
            </div>
            <h6 class="mt-4">
                Objectifs assignés
            </h6>
            <div class="py-3 block-item">
                @foreach ($tache->objectifs as $objectif)
                    <div class="form-check">
                        <input type="checkbox" name="objectif" wire:click='objetcifChangeStatut({{ $objectif->id }})'
                            class="form-check-input check-cible" {{ $objectif->statut == 1 ? 'checked' : '' }}
                            @disabled($objectif->agent_id != Auth::user()->agent->id)>
                        <label class="form-check-label ms-2 col-12" for="flexCheckDefault">
                            @if ($objectif->agent_id != Auth::user()->agent->id)
                                @if ($objectif->statut == 1)
                                    <strike>
                                        {!! $objectif->libelle !!}
                                    </strike>
                                @else
                                    {!! $objectif->libelle !!}
                                @endif
                                <span class="text-end"> -
                                    {{ $objectif?->agent?->nom . ' ' . $objectif?->agent?->prenom }} |
                                </span>
                            @else
                                {{-- <a href=" {{route('taches.objectif.delete', $objectif->id)}} " class="btn btn-sm ">
                                                <i class="fi fi-rr-pencil"></i>
                                            </a> --}}
                                {{-- <a href=" {{ route('taches.objectif.delete', $objectif->id) }} "
                                        class="btn btn-sm btn-delete">
                                        <i class="fi fi-rr-trash"></i>
                                    </a> --}}
                                @if ($objectif->statut == 1)
                                    <strike>
                                        {!! $objectif->libelle !!}
                                    </strike>
                                @else
                                    {!! $objectif->libelle !!}
                                @endif
                                <span class="text-end"> -
                                    {{ $objectif->agent?->nom . ' ' . $objectif?->agent?->prenom }} |
                                </span>
                                {{-- <a href=" {{route('taches.objectif.delete', $objectif->id)}} " class="btn btn-sm">
                                                    <i class="fi fi-rr-pencil"></i>
                                                </a> --}}
                            @endif
                            @if ($objectif->user_id == Auth::id())
                                <a href="#" class="btn btn-sm btn-delete">
                                    <i class="fi fi-rr-trash"></i>
                                </a>
                            @endif
                        </label>
                    </div>
                @endforeach
                </form>

            </div>
        </div>
        <div class="tab-pane fade {{ $pan == 2 ? 'show active' : '' }}" id="comment-{{ $tache->id }}"
            role="tabpanel" aria-labelledby="home-tab">
            <div class="all-comments pe-3" style="overflow-y: auto; height: 35vh; overflow-x: hidden;">
                <div class="block-scroll" id="tache-commentaires">
                    @if ($commentaires->count() == 0)
                        <div class="file d-flex">
                            <div class="name-file">
                                Aucun commentaire pour l'instant !
                            </div>
                        </div>
                    @else
                        @foreach ($commentaires as $commentaire)
                            <div
                                class="block-comment {{ $commentaire->user_id == Auth::id() ? 'block-comment-me' : '' }} commentaires">
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
            </div>

            <form wire:submit.prevent="addCommentaire">
                <div class="form-group">
                    <textarea wire:model="message" class="form-control" rows="3" placeholder="Ajouter un commentaire..."></textarea>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary mt-2">Envoyer</button>
                </div>
            </form>

        </div>
        <div class="tab-pane fade {{ $pan == 3 ? 'show active' : '' }}" id="fichier-{{ $tache->id }}"
            role="tabpanel" aria-labelledby="home-tab" wire:ignore.self>
            <div class="block-scroll-file" style="overflow-y: auto; height: 35vh; overflow-x: hidden;">
                @if ($fichiers->count() == 0)
                    <div class="file d-flex">
                        <div class="name-file">
                            Aucun fichier téléversé !
                        </div>
                    </div>
                @else
                    @foreach ($fichiers as $fichier)
                        <div class="file d-flex">
                            <a href="{{ files($fichier->document)->link }}" target="_blank">
                                <div class="icon">
                                    <i class="fi fi-rr-file"></i>
                                </div>
                            </a>
                            <a href="{{ files($fichier->document)->link }}" target="_blank">
                                <div class="name-file">
                                    <h6>{{ $fichier->libelle }}</h6>
                                    <p>{{ $fichier->type }}</p>
                                </div>
                            </a>
                            {{-- <button wire:click="deleteFichier({{ $fichier->id }})" class="btn btn-sm btn-delete">
                                    <i class="fi fi-rr-trash"></i>
                                </button> --}}
                        </div>
                    @endforeach
                @endif
            </div>

            <form wire:submit.prevent="addFichier" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="file" wire:model="file" class="form-control" required>
                    @error('file')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary mt-2">Ajouter</button>
                </div>
            </form>

        </div>

    </div>
</div>
