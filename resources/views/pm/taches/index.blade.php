@extends('pm.layouts.master')

@section('styles')
    <style>
        .icon.avatar {
            width: 34px;
            height: 34px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: var(--whiteColor);
            border-radius: 100%;
            font-size: 14px;
            margin-right: 10px;
            overflow: hidden;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__display {
            cursor: default;
            padding-left: 0px;
            padding-right: 0px;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            display: block
        }

        .content .card-table .block-taks.task::before {
            display: none;
        }

        .content .card-table .block-taks .dropdown-menu {
            left: auto !important;
            right: 0 !important;
            transform: none !important;
        }
    </style>
@endsection

@section('body')
    <div class="content container-fluid">
        <div class="page-header card card-lg">
            <div class="text-star">
                <h1>Gestion de tâches</h1>
                <p class="text-white mt-2">
                    Vous avez 10 nouvelles taches à effectuer, 10 taches encours et 10 taches hors delais
                </p>
            </div>
            <div class="block-circle">
                <div class="circle-white"></div>
                <div class="circle-white"></div>
                <div class="circle-white"></div>
            </div>
        </div>

        @livewire('taches.index-tache', ['agents' => $agents])

    </div>

    @foreach ($taches as $key => $tache)
        <div class="offcanvas offcanvas-end offcanvas-task" tabindex="-1" id="detail-task-{{ $tache->id }}"
            aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header align-items-center"
                style="flex-direction: column;border: none; padding-left:35px;padding-right: 35px;">
                <div class="d-flex justify-content-between w-100">
                    <div class="text-star">
                    </div>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"
                        style="transform: scale(.8)"></button>
                </div>
            </div>
            <div class="offcanvas-body">
                <div class="pt-0 block-detail-task">
                    <div class="d-flex justify-content-between">
                        <h4 class="mb-0">{{ $tache->libelle }}</h4>
                        <div class="d-flex align-items-center">
                            <span class="badge-sm urgent">{{ $tache->etat?->libelle ?? 'etat' }}</span>
                            @if ($tache->progression == '0' && $tache->statut_id == '1')
                                <div class="dropdown">
                                    <button class="px-0 btn btn-end ms-2" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="fi fi-rr-menu-dots-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="">
                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                data-bs-target="#modal-edit-task-{{ $tache->id }}">Modifier</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item delete" href="#"
                                                data-id="{{ $tache->id }}">Supprimer</a>
                                        </li>
                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                data-bs-target="#modal-edit-objectif-{{ $tache->id }}">Les
                                                objectifs</a>
                                        </li>
                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                data-bs-target="#modal-add-objectifs-{{ $tache->id }}">Ajouter un
                                                objectif</a></li>
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="mt-2 row g-3">
                        <div class="col-lg-5">
                            <div class="items">
                                <p class="mb-2 me-0"><i class="fi fi-rr-user me-1"></i> Créée par</p>
                                <div class="d-flex w-100 align-items-center">
                                    <div class="avatar-us-create">
                                        <img src="{{ imageOrDefault($tache->user->agent->image) }}"
                                            alt="photo de profil {{ $tache->user->agent->prenom . ' ' . $tache->user->agent->nom }}">
                                    </div>
                                    <h6 class="mb-0 ms-2">{{ $tache->user->agent->prenom . ' ' . $tache->user->agent->nom }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="items">
                                <p class="mb-2 me-0"><i class="fi fi-rr-users me-1"></i> Participants</p>
                                <div class="block-all-membres">
                                    @foreach ($tache->executants as $executant)
                                        <div class="avatar-membre" data-bs-toggle="modal"
                                            data-bs-target="#modal-edit-participants-{{ $executant->id }}">
                                            <img src="{{ imageOrDefault($executant->image) }}"
                                                alt="image profil">
                                        </div>
                                    @endforeach
                                    @if (
                                        $tache->progression == '0' &&
                                            $tache->statut_id == '1' &&
                                            $tache->executant->where('tache_id', $tache->id)->count() != $users->count())
                                        <div class="avatar-membre" data-bs-toggle="modal"
                                            data-bs-target="#modal-add-participants-{{ $tache->id }}">
                                            <i class="fi fi-rr-plus"></i>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="items">
                                <p class="mb-3 me-0"><i class="fi fi-rr-calendar-clock me-1"></i> Date limite</p>
                                <h6>{{ $tache->fin }}</h6>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="items">
                                <p class="mb-2 me-0 d-flex align-items-center"><i class="fi fi-rr-list me-2"></i>
                                    Note
                                </p>
                                <p style="color: var(--colorTitre)">{{ $tache->description }}</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="mt-3 block-folder">
                        <ul class="mb-3 nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#tache-{{ $tache->id }}" type="button" role="tab"
                                    aria-controls="tache" aria-selected="true">Liste de tâches à exécuter</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#comment-{{ $tache->id }}" type="button" role="tab"
                                    aria-controls="comment" aria-selected="false">Commentaires</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#fichier-{{ $tache->id }}" type="button" role="tab"
                                    aria-controls="fichier" aria-selected="false">Fichiergs partagés</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tache-{{ $tache->id }}" role="tabpanel"
                                aria-labelledby="home-tab">
                                <p class="mt-4" style="font-size: 14px; color: var(--colorParagraph);">
                                    Progression de la tâche
                                </p>
                                <div class="block-progress-bar d-flex align-items-center justify-content-between">
                                    {{-- <div class="bar">
                                        @if ($tache->objectifs->where('statut', '1')->count() == 0)
                                            <div class="move" style="width: 0%"></div>
                                        @else
                                            <div class="move"
                                                style="width: {{ Str::substr(($tache->objectifs->where('statut', '1')->count() * 100) / $tache->objectifs->count(), 0, 2) }}%">
                                            </div>
                                        @endif
                                    </div> --}}
                                    {{-- <div class="pourc d-flex">
                                        @if ($tache->objectifs->where('statut', '1')->count() == 0)
                                            <p class="mb-0">0</p>
                                        @else
                                            <p class="mb-0">
                                                {{ Str::substr(($tache->objectifs->where('statut', '1')->count() * 100) / $tache->objectifs->count(), 0, 2) }}
                                            </p>
                                        @endif
                                        <p class="mb-0">/100%</p>
                                    </div> --}}
                                </div>
                                <div class="py-3 block-item">
                                    {{-- @foreach ($tache->objectifs as $cible)
                                        <div class="form-check ms-4">
                                            <input type="checkbox" name="cible_id" class="form-check-input check-cible"
                                                data-cible="{{ json_encode($cible) }}" id="flexCheckDefault"
                                                {{ $cible->statut == '1' ? 'checked' : '' }}>
                                            <label class="form-check-label ms-2 col-12" for="flexCheckDefault">
                                                @if ($cible->statut == '1')
                                                    <strike>
                                                        {{ $cible->libelle }}
                                                    </strike>
                                                    <span
                                                        class="text-end">{{ $cible->user->agent->prenom . ' ' . $cible->user->agent->nom }}</span>
                                                @else
                                                    {{ $cible->libelle }}
                                                @endif
                                            </label>
                                        </div>
                                    @endforeach --}}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="comment-{{ $tache->id }}" role="tabpanel"
                                aria-labelledby="home-tab">
                                <div class="all-comments pe-3"
                                    style="overflow-y: auto; height: 35vh; overflow-x: hidden;">
                                    <div class="block-scroll" id="tache-commentaires">
                                        @if ($tache->commentaires->count() == 0)
                                            <div class="file d-flex">
                                                <div class="name-file">
                                                    Aucun commentaire pour l'instant !
                                                </div>
                                            </div>
                                        @else
                                            @foreach ($tache->commentaires as $key => $commentaire)
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

                                    @if ($tache->executants->where('agent_id', Auth::user()->id)->first() != null && $tache->progression == '0')
                                        <div class="p-0 bg-white offcanvas-footer w-100"
                                            style="position: absolute; bottom: 0vw;">
                                            <div class="block-comment d-flex align-items-center"
                                                style="padding-left: 0!important">
                                                <div class="block-avatar-sm">
                                                    <img src="{{ imageOrDefault(Auth::user()->agent->image) }}"
                                                        alt="photo de profil {{ Auth::user()->agent->prenom . ' ' . Auth::user()->agent->nom }}">
                                                </div>
                                                <form method="post"
                                                    action="{{ route('pm.taches.commentaire.store') }}"
                                                    id="form-message">
                                                    @csrf
                                                    <div class="form-group row g-2">
                                                        <div class="col-lg-10 form-block input-form-comment">
                                                            <input type="hidden" name="tache_id"
                                                                value="{{ $tache->id }}" class="form-control"
                                                                required>
                                                            <input type="text" name="message" class="form-control"
                                                                id="comment-text" placeholder="Laissez un commentaire"
                                                                required>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <button type="submit" class="btn">
                                                                <i class="fi fi-rr-comment"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade" id="fichier-{{ $tache->id }}" role="tabpanel"
                                aria-labelledby="home-tab">
                                <div class="block-scroll-file"
                                    style="overflow-y: auto; height: 35vh; overflow-x: hidden;">
                                    @if ($tache->fichiers->count() == 0)
                                        <div class="file d-flex">
                                            <div class="name-file">
                                                Aucun fichier téléversé !
                                            </div>
                                        </div>
                                    @else
                                        @foreach ($tache->fichiers as $fichier)
                                            <div class="file d-flex">
                                                <a href="{{ asset('assets/pdfs/fichiers/' . $fichier->id . '.' . $fichier->type) }}"
                                                    target="_blank">
                                                    <div class="icon">
                                                        <i data-feather="file-text"></i>
                                                    </div>
                                                </a>
                                                <a href="{{ asset('assets/pdfs/fichiers/' . $fichier->id . '.' . $fichier->type) }}"
                                                    target="_blank">
                                                    <div class="name-file">
                                                        <h6>{{ $fichier->libelle }}</h6>
                                                        <p>{{ $fichier->type }}</p>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                @if ($tache->executants->where('agent_id', Auth::user()->agent->id)->first() != null && $tache->progression == '0')
                                    <div class="p-0 bg-white offcanvas-footer w-100"
                                        style="position: absolute; bottom: 0vw;">
                                        <div class="block-comment d-flex align-items-center"
                                            style="padding-left: 0!important">
                                            <div class="block-avatar-sm">
                                                <img src="{{ imageOrDefault(Auth::user()->agent->image) }}"
                                                    alt="photo de profil {{ Auth::user()->agent->prenom . ' ' . Auth::user()->agent->nom }}">
                                            </div>
                                            <form method="post"
                                                action="{{ route('pm.taches.commentaire.fichier.store') }}">
                                                @csrf
                                                <div class="form-group row g-2 align-items-center">
                                                    <div class="col-lg-10">
                                                        <div class="block-file-upload">
                                                            <label for="fichier">
                                                                <p>Importer un fichier</p>
                                                            </label>
                                                            <input type="hidden" name="tache_id"
                                                                value="{{ $tache->id }}" class="form-control ">
                                                            <input id="fichier" type="file" name="fichier"
                                                                class="form-control form-file" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <button type="submit" class="btn ">
                                                            <i class="fi fi-rr-copy-alt"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-add-objectifs-{{ $tache->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center" id="exampleModalLabel">
                            <span>{{ $tache->libelle }}</span>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{-- <form method="post" action="{{ route('pm.taches.objectifs.store') }}">
                            @csrf
                            <div class="form-group row g-4">
                                <div class="col-lg-12">
                                    <input type="hidden" name="tache_id" value="{{ $tache->id }}">
                                    <input type="text" name="libelle" placeholder="Veuillez saisir un objectif"
                                        class="form-control" required>
                                </div>
                                <div class="col-lg-12 text-end">
                                    <button class="btn btn-add">Ajouter</button>
                                </div>
                            </div>
                        </form> --}}
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-add-participants-{{ $tache->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center" id="exampleModalLabel">
                            <span>{{ $tache->libelle }}</span>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('pm.taches.participants.store') }}">
                            @csrf
                            <div class="form-group row g-4">
                                <div class="col-lg-12">
                                    <input type="hidden" name="tache_id" value="{{ $tache->id }}">
                                    <select class="form-select" name="employe_id" aria-label="Default select example">
                                        <option value="" selected disabled>Selectionnez</option>
                                        @foreach ($agents as $agent)
                                            @if ($tache->executants->where('id', $agent->id)->first() == null)
                                                <option value="{{ $agent->id }}">
                                                    {{ $agent->prenom . ' ' . $agent->nom }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-12 text-end">
                                    <button class="btn btn-add">Ajouter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @livewire('taches.add-tache-participant-modal', ['tache' => $tache], key($tache->id))

        <div class="modal fade" id="modal-edit-participants-{{ $tache->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center" id="exampleModalLabel">
                            <span>{{ $tache->libelle }}</span>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('pm.taches.update', $tache) }}">
                            @csrf
                            <div class="form-group row g-4">
                                {{-- @php
                                    dd($tache->pivotusertaches[0]->employe)
                                @endphp --}}
                                @foreach ($tache->executants as $executant)
                                    <div class="col-lg-8">
                                        <select class="form-select" aria-label="Default select example">
                                            <option value="" selected disabled>Selectionnez</option>
                                            <option>
                                                {{ $executant->prenom . ' ' . $executant->nom }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <a class="text-danger"
                                            href="{{ route('pm.taches.participants.delete', [$executant->id]) }}">supprimer</a>
                                    </div>
                                @endforeach
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-edit-objectif-{{ $tache->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center" id="exampleModalLabel">
                            <span>{{ $tache->libelle }}</span>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{-- <form method="post" action="{{ route('pm.taches.update', $tache) }}">
                            @csrf
                            <div class="form-group row g-4">
                                @foreach ($tache->objectifs as $cible)
                                    <div class="col-lg-8">
                                        <input type="hidden" name="cible_id_{{ $cible->id }}"
                                            value="{{ $cible->id }}">
                                        <input type="text" class="form-control" name="libelle"
                                            value="{{ $cible->libelle }}" placeholder="Veuillez saisir un objectif"
                                            required>
                                    </div>
                                    <div class="col-lg-4">
                                        <a class="text-danger"
                                            href="{{ route('pm.taches.objectif.delete', [$cible->id]) }}">supprimer</a>
                                    </div>
                                @endforeach
                            </div>
                        </form> --}}
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-edit-task-{{ $tache->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center" id="exampleModalLabel">
                            <span>Modification de la tâche</span>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{-- <form method="post" action="{{ route('pm.taches.update', $tache) }}">
                            @csrf
                            <div class="form-group row g-4">
                                <div class="col-lg-12">
                                    <input type="hidden" name="tache_id" value="{{ $tache->id }}"
                                        class="form-control">
                                    <input type="text" name="libelle" value="{{ $tache->libelle }}"
                                        class="form-control" placeholder="Dénomination">
                                </div>
                                <div class="col-lg-12">
                                    <textarea name="description" id="description" cols="30" rows="3" class="form-control"
                                        placeholder="Description">{{ $tache->description }}</textarea>
                                </div>
                                <div class="col-lg-12">
                                    <input type="date" name="debut" value="{{ $tache->debut }}"
                                        class="form-control" placeholder="Telephone">
                                </div>
                                <div class="col-lg-12">
                                    <input type="date" name="fin" value="{{ $tache->fin }}"
                                        class="form-control" placeholder="Telephone">
                                </div>
                                <div class="col-lg-12">
                                    <select class="form-select" name="etat_id" aria-label="Default select example">
                                        @foreach ($etats as $etat)
                                            <option value="{{ $etat->id }}"
                                                {{ $etat->id == $tache->etat_id ? 'selected' : '' }}>
                                                {{ $etat->libelle }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-12 text-end">
                                    <button class="btn btn-add">Modifier</button>
                                </div>
                            </div>
                        </form> --}}
                    </div>
                </div>

            </div>
        </div>
    @endforeach

    {{-- Begin - Modals Tâche --}}
    {{-- @livewire('taches.add-tache-modal') --}}
    <div class="modal fade" id="modal-new-task" aria-labelledby="exampleModalLabel" aria-modal="true"
        role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center" id="exampleModalLabel">
                        <span>Nouvelle tâche</span>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('pm.taches.store') }}" method="POST">
                        @csrf
                        {{-- <input type="hidden" name="document_id" value="{{ $document->id }}"> --}}
                        <div class="form-group row g-3">
                            <div class="col-lg-12">
                                <label for="">Titre de la tâche <sup class="text-danger fs-5">*</sup></label>
                                <input type="text" name="libelle" class="form-control" placeholder="Titre de la tâche"
                                    required>
                            </div>
                            <div class="col-lg-12">
                                <label for="">Description <sup class="text-danger fs-5">*</sup></label>
                                <textarea name="description" id="description" cols="30" rows="3" class="form-control"
                                    placeholder="Description" required></textarea>
                            </div>
                            <div class="col-lg-6">
                                <label for="">Date debut <sup class="text-danger fs-5">*</sup></label>
                                <input type="date" name="debut" class="form-control" placeholder="Date debut"
                                    required>
                            </div>
                            <div class="col-lg-6">
                                <label for="">Date fin</label>
                                <input type="date" name="fin" class="form-control" placeholder="Date fin">
                            </div>
                            <div class="col-lg-12">
                                <label for="agents">Agents concernés <sup class="text-danger fs-5">*</sup></label>
                                <div class="tom-select-custom">
                                    <select class="js-select form-select form-select-sm" name="agents[]" id="agents"
                                        autocomplete="off"
                                        data-hs-tom-select-options='{
                                                "placeholder": "Selectionnez des agents"
                                            }'
                                        multiple required>
                                        @foreach ($agents as $agent)
                                            <option value="{{ $agent->id }}"
                                                data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle me-2" src="{{ imageOrDefault($agent->image) }}" alt="{{ $agent->nom }}" /><span class="text-truncate">{{ $agent->prenom . ' ' . $agent->nom }}</span></span>'>
                                                {{ $agent->prenom . ' ' . $agent->nom }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <label for="">Priorité <sup class="text-danger fs-5">*</sup></label>
                                <div class="tom-select-custom">
                                    <select class="js-select form-select" name="priorite_id" autocomplete="off"
                                        data-hs-tom-select-options='{
                                                "placeholder": "Selectionnez une priorité"
                                            }'
                                        wire:model='stat.etat_id' required>
                                        <option value="">Selectionnez une priorité</option>
                                        @foreach ($priorites as $priorite)
                                            <option value="{{ $priorite->id }}"
                                                data-option-template='<span class="d-flex align-items-center"><span @class([
                                                    'legend-indicator',
                                                    'bg-success' => $priorite->id == 1,
                                                    'bg-warning' => $priorite->id == 2,
                                                    'bg-danger' => $priorite->id == 3,
                                                ])></span><span class="text-truncate">{{ $priorite->titre }}</span></span>'>
                                                {{ $priorite->titre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <label for="" class="mb-0 p-0">Tâche parent</label><span> (optionnel)</span>
                                <br>
                                <small class="mb-2">(cette tâche sera une sous-tâche de celle que vous selectionnez
                                    ici)</small>
                                <div class="tom-select-custom">
                                    <select class="js-select form-select" name="priorite_id" autocomplete="off"
                                        data-hs-tom-select-options='{
                                                "placeholder": "Selectionnez une priorité"
                                            }'
                                        wire:model='stat.etat_id'>
                                        @foreach ($taches as $tache)
                                            <option value="{{ $tache->id }}">{{ $tache->titre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="from-group row">
                            <div class="col-lg-12 text-end my-3">
                                <button class="btn btn-add">Enregistrer</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modal-delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center content-text">
                        <i data-feather="power"></i>
                        <h5>Suppression</h5>
                        <p>Voulez-vous vraiment vous Supprimer cette tâche ?</p>
                    </div>
                    <div class="mb-3 block-btn d-flex justify-content-between w-100">
                        <button class="btn btn-cancel" data-bs-dismiss="modal" aria-label="Close">Annuler</button>
                        <form method="POST" action="#" class="p-0" id="delete_form">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-delete">
                                Supprimer
                            </button>
                            {{-- <button class="btn btn-add">
                                Annuler
                            </button> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // $('#form-message').submit(function(event) {
        // event.preventDefault();

        // var elements = $('.form-block');

        // console.log($(elements).find('input').serialize());

        // $('#modal-load').modal('show');

        // for (let i = 0; i < elements.length; i++) {
        //     const element = elements[i];
        //     data = $(element).find('select, input').serialize();
        //     // console.log(elements.length + 1);
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     })
        //     $.ajax({
        //         url: $(this).attr('action'),
        //         type: "post",
        //         data: data,
        //         success: function(data) {
        //             console.log(data);
        //             $('#modal-load').modal('hide');
        //             $('#modal_add_vente').modal('hide');
        //             $('#modal_add_vente').on('hidden.bs.modal', function() {
        //                 location.reload();
        //             })
        //         },
        //         error: function(error) {
        //             $('#modal-load').modal('hide');
        //             console.log(error);
        //         }
        //     });
        // }
        // });

        $('.delete').on('click', function(e) {
            $('#delete_form')[0].action = '{{ route('pm.taches.destroy', '__id') }}'.replace('__id', $(this)
                .data('id'));
            $('#modal-delete').modal('show');
        });

        $(document).ready(function() {

            $('.check-cible').on('click', function(event) {
                cible = $(this).data('cible');

                if ($(this).prop("checked")) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    })
                    $.ajax({
                        url: '/gestion-taches/tache/cible/check',
                        type: "post",
                        data: cible,
                        success: function(data) {
                            console.log(data);
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                } else {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    })
                    $.ajax({
                        url: '/gestion-taches/tache/cible/uncheck',
                        type: "post",
                        data: cible,
                        success: function(data) {
                            console.log(data);
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                }
            });

            $('#form-messagddde').submit(function(event) {
                event.preventDefault();

                var elements = $('.input-form-comment');
                var data = $(elements).find('input').serialize();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                $.ajax({
                    url: $(this).attr('action'),
                    type: "post",
                    data: data,
                    success: function(data) {
                        $('#comment-text').val('');

                        // $('#tache-commentaires').empty();

                        // const comments = document.getElementById('tache-commentaires');
                        // comments.innerHTML = "";

                        // for(let i = 0; i < data.length; i++) {
                        //     comments.innerHTML += `
                    //     <div class="block-comment {{-- $commentaire->user_id==Auth::user()->id?'block-comment-me':'' --}} commentaires">
                    //         <div class="block-info-comment d-flex">
                    //             <div class="avatar-comment commentaires">
                    //                 <img src="{{-- asset('assets/images/profils/'.$commentaire->user->avatar) --}}" alt="Photo profil">
                    //             </div>
                    //             <div class="name-comment commentaires">
                    //                 <h6>{{-- $commentaire->user->prenom.''.$commentaire->user->nom --}}
                    //                 </h6>
                    //                 <p>{{-- $commentaire->created_at->diffForHumans() --}}</p>
                    //             </div>
                    //         </div>
                    //         <div class="comment commentaires">
                    //             <p>{{-- $commentaire->message --}}</p>
                    //         </div>
                    //     </div>
                    //     `;

                        //     // console.log(data[i]['message']);

                        //     // comments.innerHTML += `<div>${data[i]['message']}</div>`;
                        // }
                        console.log(data);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });

            $('#comment-form').submit(function(event) {
                event.preventDefault();
                // const token = document.querySelector('meta[name="csrf-token"]').content;
                const url = this.getAttribute('action');

                var elements = $('#comment-form');
                var value = $(elements).find('input').serialize();

                /* const value = document.getElementById('value').value;
                // fetch(url, {
                //     headers : {
                //         'Content-Type': 'application/json',
                //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                //     },
                //     method : "post",
                //     body : JSON.stringtify({
                //         value: value
                //     })
                // }).then(response => {
                //     response.json().then(data => {
                //         console.log(data)
                //     })
                // }).catch(error => {
                //     console.log(error)
                // });*/

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                $.ajax({
                    url: $(this).attr('action'),
                    type: "get",
                    data: value,
                    success: function(data) {
                        const comments = document.getElementById('posts');
                        comments.innerHTML = '';

                        for (let i = 0; i < data.length; i++) {
                            console.log(data[i]['message']);

                            comments.innerHTML = `<div>${data[i]['message']}</div>`;
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });

                // console.log(value);

            });

        });
    </script>
@endsection
