<div>
    <div class="sidebar navbar-vertical-content">
        <div class="pt-5 content-sidebar">
            <div class="top-0 bg-white logo position-fixed" style="width: 250px;">
                <a href="{{ route('pm.home') }}" class="navbar-brand">
                    <div class="block-logo">
                        <img class="navbar-brand-logo" src="{{ asset('assets/svg/logos/logo.png') }}" alt="Logo"
                            data-hs-theme-appearance="default">
                        <img class="navbar-brand-logo-mini" src="{{ asset('assets/svg/logos/logo-short.png') }}"
                            alt="Logo" data-hs-theme-appearance="default">
                    </div>
                </a>
            </div>
            <div class="pt-5 mt-5 block-btn">
                <button class="btn-add btn w-100" data-bs-toggle="modal" data-bs-target="#modal-new-personnel">
                    <i class="fi fi-rr-plus"></i> Ajouter un employé
                </button>
            </div>
            <div class="block-search">
                <form action="">
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="bi bi-search"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="Recherche" id="input-search-contact">
                    </div>
                </form>
            </div>

            <div class="" id="person-active" role="tabpanel" aria-labelledby="home-tab" wire:ignore.self>
                <div class="block-personnels">
                    <ul class="nav nav-tabs all-person" id="list-contact">
                        @forelse ($actifAgents as $actifAgent)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link click @if ($agent && $agent->id == $actifAgent->id) active @endif"
                                    wire:click="showUser({{ $actifAgent->id }})">
                                    <div class="overflow-hidden block-detail-person d-flex align-items-center">
                                        <div class="avatar-person">
                                            <img src="{{ imageOrDefault($actifAgent?->image) }}" alt="photo profil">
                                        </div>
                                        <div class="name-person">
                                            <h6>{{ $actifAgent?->prenom . ' ' . $actifAgent?->nom }}</h6>
                                            <p>{{ $actifAgent?->fonction()?->titre }}</p>
                                        </div>
                                        @if (Auth::user()->agent->id == $actifAgent->id)
                                            <small class="pt-1 badge bg-success rounded-pill ms-2"
                                                style="font-size: 9px">Vous</small>
                                        @endif
                                    </div>
                                </button>
                            </li>
                        @empty
                        @endforelse
                    </ul>
                </div>
            </div>

        </div>
    </div>

    <div class="container-fluid px-lg-4">
        <a href="javascript:history.back()" class="back">
            <i class="bi bi-chevron-left"></i>
            Retour
        </a>
        <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade show active" id="block-details-person" role="tabpanel" aria-labelledby="home-tab">

                <div class="mt-3 mb-3 d-flex justify-content-between align-items-center">
                    <h1 class="mb-0">Fiche de l'employé</h1>
                    @if ($agent)
                        <div>
                            @if (Auth::user()->id === $agent->user?->id)
                                <!-- Leave Team -->
                                <button class="py-1 rounded-2 btn btn-outline btn-outline-danger"
                                    wire:click="$toggle('confirmingLeavingTeam')">
                                    <i class="bi bi-trash"></i>
                                    {{ __('Leave Team') }}
                                </button>
                            @elseif (Gate::check('removeTeamMember', $team))
                                <!-- Remove Team Member -->
                                <button class="py-1 rounded-2 btn btn-outline btn-outline-danger"
                                    wire:click="confirmTeamMemberRemoval('{{ $agent->user?->id }}')">
                                    <i class="bi bi-trash"></i>
                                    {{ __('Remove Team Member') }}
                                </button>
                            @endif
                        </div>
                    @endif
                </div>

                <div class="row g-lg-3">

                    <div class="m-2 d-none position-absolute d-flex justify-content-center"
                        style="z-index: 2; height:98%; width:100%; background-color: rgba(244,245,252,0.99)"
                        wire:loading wire:target="showUser" wire:loading.class.remove="d-none">
                        <div class="m-auto text-center">
                            <div class="spinner-border" role="status" style="color: var(--primaryColor)">
                                <span class="sr-only"></span>
                            </div>
                        </div>
                    </div>

                    @if ($agent == null)
                        <div class="col-12">
                            <div class="card card-table justify-content-center align-items-center"
                                style="height: calc(100vh - 50px)">
                                <img src="{{ asset('assets/img/icons/icon-employes.png') }}" alt=""
                                    class="img-icon">
                            </div>
                        </div>
                    @endif

                    <div class="col-lg-12 @if ($agent == null) d-none @endif">
                        <div class="border-0 card card-table card-profil card-profil-sm h-100">
                            <div class="card-body">
                                <div class="block-user-info">
                                    <div class="row g-3 align-items-center">
                                        <div class="col-lg-4">
                                            <div class="d-flex">

                                                <div class="avatar-user">
                                                    <span
                                                        class="statut @if ($agent?->user?->statut_id == 1) on @else off @endif"></span>
                                                    <img src="{{ imageOrDefault($agent?->image) }}" alt="photo profil">
                                                </div>

                                                <div class="text-star">
                                                    <h4>{{ $agent?->prenom }} {{ $agent?->nom }}</h4>
                                                    <p class="mb-0">{{ $agent?->fonction()?->titre }}</p>
                                                    <p class="mb-0">Matricule: {{ $agent?->matricule }}</p>
                                                    <p class="mb-0">En emploi
                                                        {{ $agent?->contrat?->date_debut?->diffForHumans() }}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-8">
                                            <div class="details-contact">
                                                <div class="details">
                                                    <div class="row g-3">
                                                        <div class="col-lg-4">
                                                            <div class="block-detail-sm">
                                                                <div class="icon">
                                                                    <i class="bi bi-at"></i>
                                                                </div>
                                                                <div class="infos">
                                                                    <p>Email</p>
                                                                    <h6>
                                                                        {{ $agent?->adresse?->agent_email ?? 'Non Specifié' }}
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="block-detail-sm">
                                                                <div class="icon">
                                                                    <i class="bi bi-telephone"></i>
                                                                </div>
                                                                <div class="phone">
                                                                    <p>Téléphone</p>
                                                                    <h6>{{ $agent?->adresse?->agent_phone ?? 'Non Specifié' }}
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="block-detail-sm">
                                                                <div class="icon">
                                                                    <i class="bi bi-geo-alt"></i>
                                                                </div>
                                                                <div class="infos">
                                                                    <p>Adresse</p>
                                                                    <h6>{{ $agent?->adresse?->residence ?? 'Non Specifié' }}
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 @if ($agent == null) d-none @endif">
                        <div class="d-flex">
                            <ul class="p-3 pb-2 mb-0 bg-white nav nav-tabs nav-user" id="myTab" role="tablist"
                                wire:ignore>
                                <li class="nav-item me-3" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                        data-bs-target="#departement" type="button" role="tab"
                                        aria-controls="departement" aria-selected="true">Details personnels</button>
                                </li>
                                <li class="nav-item me-3" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#contrat" type="button" role="tab"
                                        aria-controls="contrat" aria-selected="false">Contrat</button>
                                </li>
                                <li class="nav-item me-3" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#activite" type="button" role="tab"
                                        aria-controls="activite" aria-selected="false">Activités</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#edit-profil" type="button" role="tab"
                                        aria-controls="edit-profil" aria-selected="false">Modifier</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="authentication-tab" data-bs-toggle="tab"
                                        data-bs-target="#authentication" type="button" role="tab"
                                        aria-controls="authentication" aria-selected="false">Authentification</button>
                                </li>
                                {{-- <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="team-tab" data-bs-toggle="tab"
                                        data-bs-target="#team" type="button" role="tab"
                                        aria-controls="team" aria-selected="false">Entreprise</button>
                                </li> --}}
                            </ul>
                        </div>

                        <div class="border-0 card card-table card-profil" style="border-radius: 0 12px 12px 12px">
                            <div class="card-body">
                                <div class="tab-content" id="myTabContent">

                                    <div class="tab-pane fade show active" id="departement" role="tabpanel"
                                        aria-labelledby="home-tab" wire:ignore.self>
                                        <div class="info-lg">
                                            <h2>Infos personnelles</h2>
                                            <div class="row g-3">
                                                <div class="col-lg-3">
                                                    <div class="items">
                                                        <p>Prenom </p>
                                                        <h6>{{ $agent?->prenom ?? 'Non Specifié' }}</h6>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="items">
                                                        <p>Nom</p>
                                                        <h6>{{ $agent?->nom ?? 'Non Specifié' }}</h6>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="items">
                                                        <p>Post-nom</p>
                                                        <h6>{{ $agent?->post_nom ?? 'Non Specifié' }}</h6>
                                                    </div>

                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="items">
                                                        <p>Sexe</p>
                                                        <h6>{{ $agent?->sexe ?? 'Non Specifié' }}</h6>
                                                    </div>

                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="items">
                                                        <p>Lieu de naissance</p>
                                                        <h6>{{ $agent?->lieu_naiss ?? 'Non Specifié' }}</h6>
                                                    </div>

                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="items">
                                                        <p>Date de naissance</p>
                                                        <h6>{{ date('d/m/Y', strtotime($agent?->date_naiss)) ?? 'Non Specifié' }}
                                                        </h6>
                                                    </div>

                                                </div>
                                                {{-- <div class="col-lg-3">
                                                    <div class="items">
                                                        <p>Province d'origine</p>
                                                        <h6>{{ $agent?->prenom ?? 'Non Specifié' }}</h6>
                                                    </div>
                                                </div> --}}
                                                {{-- <div class="col-lg-3">
                                                    <div class="items">
                                                        <p>Ville d'origine</p>
                                                        <h6>{{ $agent?->adresse->ville ?? 'Non Specifié' }}</h6>
                                                    </div>
                                                </div> --}}
                                                <div class="col-lg-3">
                                                    <div class="items">
                                                        <p>Nationalité</p>
                                                        <h6>{{ $agent?->nationalite ?? 'Non Specifié' }}</h6>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="items">
                                                        <p>Etat civil</p>
                                                        <h6>{{ $agent?->etat_civil ?? 'Non Specifié' }}</h6>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="items">
                                                        <p>Nombre d'enfants</p>
                                                        <h6>{{ $agent?->nbr_enfant ?? 'Non Specifié' }}</h6>
                                                    </div>
                                                </div>
                                                {{-- <div class="col-lg-3">
                                                    <div class="items">
                                                        <p>Salaire</p>
                                                        <div class="block-salaire">
                                                            <h6 class="text-clique text-clique-1">
                                                                <i class="fi fi-rr-eye"></i>
                                                            </h6>
                                                            <h6 class="opacity">
                                                                {{ $agent?->contrat->salaire ?? 0 }} $
                                                            </h6>
                                                            <h6 class="text-clique text-clique-2">
                                                                {{ $agent?->contrat->salaire ?? 0 }} $
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                        <div class="info-lg">
                                            <h2>Infos proféssionneles</h2>
                                            <div class="row g-3">
                                                <div class="col-lg-3">
                                                    <div class="items">
                                                        <p>Département </p>
                                                        <h6>{{ $agent?->fonction()->departement?->libelle ?? 'Non Specifié' }}
                                                        </h6>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="items">
                                                        <p>Division</p>
                                                        <h6>{{ $agent?->fonction()->service?->division?->libelle ?? 'Non Specifié' }}
                                                        </h6>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="items">
                                                        <p>Service </p>
                                                        <h6>{{ $agent?->fonction()->service?->titre ?? 'Non Specifié' }}
                                                        </h6>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="items">
                                                        <p>Fonction</p>
                                                        <h6>{{ $agent?->fonction()->titre ?? 'Non Specifié' }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="info-lg">
                                            <h2>Documents cursus du personnel</h2>
                                            <div class="row g-3">
                                                @forelse ($agent->documents ?? [] as $document)
                                                    <div class="col-lg-3">
                                                        <div class="d-flex align-items-center position-relative">
                                                            <div class="icon-lg text-star" style="position: initial">
                                                                {{-- <a href="{{ route('arsp.documents.show', $document) }}" class="stretched-link">
                                                                    <img src="{{ fileIcon($document->document) }}" alt="" class="me-2 img-file" style="width: 30px">
                                                                </a> --}}
                                                                <a href="{{ files($document->document)->link }}"
                                                                    class="stretched-link" target="__blank">
                                                                    <img src="{{ fileIcon($document->document) }}"
                                                                        alt="" class="me-2 img-file"
                                                                        style="width: 30px">
                                                                </a>
                                                            </div>
                                                            <div class="text-star">
                                                                <p class="para">
                                                                    {{ $document->libelle }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <div class="text-center col-12">
                                                        <img src="{{ asset('assets/images/sad.gif') }}"
                                                            alt="" width="35px" class="">
                                                        <p class="text-center para">
                                                            Aucun document trouvé
                                                        </p>
                                                    </div>
                                                @endforelse
                                            </div>
                                        </div>
                                        <div class="info-lg text-end">
                                            <div class="mt-0 block-file-attach document-attach"
                                                data-bs-target="#modal-upload-document-{{ $agent?->id }}"
                                                data-bs-toggle="modal">
                                                {{-- <input type="file"> --}}
                                                <div class="label d-flex align-items-center">
                                                    <span>Joindre un document</span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="feather feather-paperclip ms-3">
                                                        <path
                                                            d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48">
                                                        </path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="contrat" role="tabpanel"
                                        aria-labelledby="home-tab" wire:ignore.self>
                                        <div class="info-lg">
                                            <div class="d-flex justify-content-between">
                                                <h2>Type de contrat</h2>
                                                <div class="dropdown">
                                                    <button class="btn btn-end" id="dropdownMenuButton1"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="bi bi-three-dots-vertical"></i>
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                        @if ($agent && $agent->contrat?->statut_id == 1)
                                                            <li>
                                                                <a class="dropdown-item" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#modal-edit-contrat-{{ $agent?->id }}">Modifier
                                                                    le contrat</a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="@if ($agent) {{ route('pm.rh.contrat.suspension', $agent) }}@else # @endif">Mettre
                                                                    fin au contrat</a>
                                                            </li>
                                                        @else
                                                            <li>
                                                                <a class="dropdown-item" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#modal-edit-contrat-{{ $agent?->id }}">Changer
                                                                    le contrat</a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="@if ($agent) {{ route('pm.rh.contrat.activate', $agent) }}@else # @endif">Renouveler
                                                                    le contrat</a>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row g-3">
                                                <div class="col-lg-4">
                                                    <div class="items">
                                                        <p>Type de contrat</p>
                                                        <h6>{{ $agent?->contrat?->type->libelle ?? 'Non specifié' }}
                                                        </h6>
                                                    </div>

                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="items">
                                                        <p>Début du contrat</p>
                                                        <h6>{{ $agent?->contrat?->date_debut?->format('d/m/Y') ?? 'Non specifié' }}
                                                        </h6>
                                                    </div>
                                                </div>
                                                @if ($agent?->contrat?->type?->id != 1)
                                                    <div class="col-lg-4">
                                                        <div class="items">
                                                            <p>Fin du contrat</p>
                                                            <h6>{{ $agent?->contrat?->fin?->format('d/m/Y') ?? 'Non specifié' }}
                                                            </h6>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="info-lg">
                                            <h2>Rémunération et temps de travail prévue dans le contrat</h2>
                                            <div class="row g-3">
                                                <div class="col-lg-4">
                                                    <div class="items">
                                                        <p>Salaire du contrat</p>
                                                        <div class="block-salaire">
                                                            <h6 class="text-clique text-clique-1">
                                                                <i class="fi fi-rr-eye"></i>
                                                            </h6>
                                                            <h6 class="opacity">
                                                                {{ $agent?->contrat->salaire ?? 0 }} $
                                                            </h6>
                                                            <h6 class="text-clique text-clique-2">
                                                                {{ $agent?->contrat->salaire ?? 0 }} $
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="items">
                                                        <p>Temps contractuel</p>
                                                        <h6>{{ $agent?->contrat?->temps ? $agent?->contrat?->temps . ' heures' : 'Non specifié' }}
                                                        </h6>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="info-lg">
                                            <h2>Fonction</h2>
                                            <div class="row g-3">
                                                <div class="col-lg-4">
                                                    <div class="items">
                                                        <p>Classification</p>
                                                        <h6>Salarié - Cadre</h6>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="items">
                                                        <p>Catégorie</p>
                                                        <h6>Ingénieur et Cadres - 170</h6>
                                                    </div>

                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="items">
                                                        <p>Fonction</p>
                                                        <h6>{{ $agent?->fonction()->titre ?? 'Non specifié' }}</h6>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="info-lg">
                                            <h2>Job description</h2>
                                            <p class="para">
                                                {{ $agent?->fonction()->description ?? 'Non specifié' }}
                                            </p>
                                            {{-- <button class="btn btn-cv">
                                                Voir mon CV
                                            </button> --}}
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="activite" role="tabpanel"
                                        aria-labelledby="activite-tab" wire:ignore.self>
                                        <div class="info-lg">
                                            <h2>Fichiers partagés</h2>
                                            <div class="row g-3">
                                                @forelse ($agent?->created_documents()->groupBy('dossier_id') ?? [] as $key => $documentGroups)
                                                    @php
                                                        $dossier = \App\Models\Dossier::find($key);
                                                    @endphp
                                                    <div class="col-lg-4">
                                                        <div
                                                            class="d-inline-flex align-items-center position-relative">
                                                            <div class="icon-lg text-star" style="position: initial">
                                                                <a href="@if (!$dossier->confidentiel) {{ route('pm.classeurs.dossiers.show', [$dossier->classeur, $dossier]) }} @else # @endif"
                                                                    class="stretched-link"
                                                                    @if ($dossier->confidentiel) data-bs-toggle="modal" data-bs-target="#modal-pass-dossier-{{ $dossier->id }}" @endif>
                                                                    @if ($dossier->confidentiel)
                                                                        <img src="{{ asset('assets/images/icons/lockedfolder-arsp.svg') }}"
                                                                            alt="" class="me-2">
                                                                    @else
                                                                        <img src="{{ asset('assets/images/icons/folder-arsp.svg') }}"
                                                                            alt="" class="me-2">
                                                                    @endif
                                                                </a>
                                                            </div>
                                                            <div class="text-star">
                                                                <p class="para">
                                                                    {{ $dossier->titre }}
                                                                </p>
                                                                <small>ref : {{ $dossier->reference }}</small>
                                                            </div>
                                                        </div>

                                                    </div>
                                                @empty
                                                    <div class="col-12"></div>
                                                @endforelse
                                            </div>
                                        </div>
                                        <div class="info-lg">

                                            <h2>Progression de tâches</h2>
                                            <div class="block-all-task">
                                                <div class="block-task-item">
                                                    <div class="mb-0 form-check d-flex ps-0">
                                                        <input class="form-check-input ms-0 me-3" type="checkbox"
                                                            value="" id="flexCheckDefault1"
                                                            name="flexRadioDefault">
                                                        <label
                                                            class="mb-0 form-check-label d-flex justify-content-between w-100"
                                                            for="flexCheckDefault1">
                                                            <div class="infos-croup" style="width: 85%">
                                                                <h6 class="mb-0">Name of task</h6>
                                                                <p>2 users</p>
                                                            </div>
                                                            <div class="dropdown">
                                                                <button class="p-0 btn btn-end btn-toggle"
                                                                    id="dropdownMenuButton2" data-bs-toggle="dropdown"
                                                                    aria-expanded="true">
                                                                    <p class="d-flex">Priorité: <span
                                                                            class="ms-1 d-flex"
                                                                            style="color: var(--colorTitre)">Urgent <i
                                                                                class="fi fi-rr-triangle ms-1"
                                                                                style="transform: rotate(180deg); font-size: 8px; margin-top: -7px;position: relative; top: -4px"></i></span>
                                                                    </p>
                                                                </button>
                                                                <ul class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuButton2"
                                                                    style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(0.366669px, 38px);"
                                                                    data-popper-placement="bottom-end">
                                                                    <li><a class="dropdown-item"
                                                                            href="#">Urgent</a></li>
                                                                    <li><a class="dropdown-item"
                                                                            href="#">Moyen</a></li>
                                                                    <li><a class="dropdown-item"
                                                                            href="#">Normal</a></li>
                                                                </ul>
                                                            </div>
                                                        </label>

                                                    </div>
                                                    <div
                                                        class="my-2 block-progress d-flex justify-content-between align-items-center">
                                                        <div class="progressBar" style="width: 90%">
                                                            <div class="move"></div>
                                                        </div>
                                                        <div class="pourcentage">
                                                            50%
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between">
                                                        <div class="date">
                                                            <span>Date limite: 12 jan 2022</span>
                                                        </div>
                                                        <div
                                                            class="mt-0 tools-sm d-flex align-items-center justify-content-end">
                                                            <a href="#">
                                                                <i class="fi fi-rr-clip"></i>
                                                            </a>
                                                            <a href="#">
                                                                <i class="fi fi-rr-comment-alt"></i>
                                                            </a>
                                                            <a href="#">
                                                                <i class="fi fi-rr-user-add"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="tab-pane fade" id="edit-profil" role="tabpanel"
                                        aria-labelledby="edit-profil-tab" wire:ignore.self>
                                        <div class="info-lg">
                                            <h2>Informations personnels</h2>
                                            <form
                                                action="@if ($agent) {{ route('pm.personnels.update', $agent) }} @endif"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group row g-3">
                                                    {{-- <div class="col-lg-2">
                                                        <div class="avatar-img avatar-user-modal">
                                                            <img src="{{ imageOrDefault($agent?->image) }}" alt="photo de profil" id="img_profil">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-10">
                                                        <div class="block-up-img">
                                                            <input type="file" id="file-img-profil"
                                                                accept=".jpg,.png" name="image">
                                                            <label for="file-img-profil" class="dashed"
                                                                id="label-2">
                                                                <svg viewBox="0 0 801.19 537.98">
                                                                    <g id="Calque_2" data-name="Calque 2">
                                                                        <g id="Calque_1-2" data-name="Calque 1">
                                                                            <path
                                                                                d="M754.28,264.59A159.67,159.67,0,0,0,648.9,217.87c.58-.77,1.13-1.55,1.68-2.34A76.4,76.4,0,0,0,531.91,120,195.87,195.87,0,0,0,351.32,0C256.06,0,176.7,68,159.12,158.11,68.79,173.41,0,252,0,346.7,0,452.34,85.64,538,191.28,538c1.43,0,2.85,0,4.27-.05s2.82.05,4.24.05H642.14A161.47,161.47,0,0,0,796.75,415.41c.12-.47.23-.94.34-1.41a160.45,160.45,0,0,0-42.81-149.41ZM499.56,296.45c-5.09,11.64-15.11,15.75-27.19,15.78-13.62,0-27.23.24-40.84-.06-6.1-.14-8.07,2.22-8,8.13.27,16.07.1,32.13.1,51.47-.93,15.74,1.62,34.84-1.34,53.79-3.89,25-25.87,43.75-50.7,43.4a51.73,51.73,0,0,1-50.17-43.18c-1.85-10.85-1.11-21.72-1.19-32.58-.16-23.69-.35-47.38.12-71.06.16-8-2.58-10.36-10.31-10-12.77.54-25.58.22-38.37.11-11.93-.1-22.14-3.65-27.34-15.48-5.4-12.28-.77-22.17,8-30.91q49.93-49.95,100-99.87c12.27-12.17,26.86-12.3,39-.23q50.48,50,100.53,100.44C500.41,274.72,504.71,284.65,499.56,296.45Z">
                                                                            </path>
                                                                        </g>
                                                                    </g>
                                                                </svg>
                                                                <p>
                                                                    Cliquez pour uploader l'image
                                                                </p>
                                                            </label>
                                                        </div>
                                                    </div> --}}
                                                    <div class="mt-3 mb-5 d-flex align-items-center">
                                                        <!-- Avatar -->
                                                        <label class="avatar avatar-xl avatar-circle" for="avatarUploader">
                                                            <img id="avatarImg" class="avatar-img" src=" {{ imageOrLocal($agent?->image,'assets/img/160x160/img1.jpg') }}" alt="Image Description">
                                                        </label>

                                                        <div class="gap-2 d-flex ms-4">
                                                            <button type="button" class="form-attachment-btn btn btn-sm btn-outline-primary rounded-pill">
                                                                <i class="bi bi-download"
                                                                    data-bs-toggle="tooltip"
                                                                    data-bs-placement="bottom" title="Importer"
                                                                    data-bs-original-title="Importer" aria-label="Importer"></i>
                                                                <input type="file" class="js-file-attach form-attachment-btn-label" id="avatarUploader"
                                                                    data-hs-file-attach-options='{
                                                                        "textTarget": "#avatarImg",
                                                                        "mode": "image",
                                                                        "targetAttr": "src",
                                                                        "resetTarget": ".js-file-attach-reset-img",
                                                                        "resetImg": "../assets/img/160x160/img1.jpg",
                                                                        "allowTypes": [".png", ".jpeg", ".jpg"]
                                                                    }' name="image">
                                                            </button>
                                                            <!-- End Avatar -->

                                                            <button type="button" class="js-file-attach-reset-img btn btn-sm btn-outline-danger rounded-pill">
                                                                <i class="bi bi-trash-fill"
                                                                    data-bs-toggle="tooltip"
                                                                    data-bs-placement="bottom" title=""
                                                                    data-bs-original-title="Supprimer" aria-label="Delete"></i>
                                                            </button>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <label>
                                                            Nom
                                                        </label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Inserez le nom" name="nom"
                                                            value="{{ $agent?->nom }}">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label>
                                                            Post-nom
                                                        </label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Inserez le nom" name="post_nom"
                                                            value="{{ $agent?->post_nom }}">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label>
                                                            Prénom
                                                        </label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Inserez le nom" name="prenom"
                                                            value="{{ $agent?->prenom }}">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label>
                                                            Sexe
                                                        </label>
                                                        <select class="form-select"
                                                            aria-label="Default select example" name="sexe">
                                                            <option value="">Selectionez</option>
                                                            <option value="M" @selected($agent?->sexe == 'M')>
                                                                Masculin</option>
                                                            <option value="F" @selected($agent?->sexe == 'F')>Feminin
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label>
                                                            Lieu de naissance
                                                        </label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Inserez le nom" name="lieu_naiss"
                                                            value="{{ $agent?->lieu_naiss }}">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label>
                                                            Date de naissance
                                                        </label>
                                                        <input type="date" class="form-control"
                                                            placeholder="Inserez le nom" name="date_naiss"
                                                            value="{{ $agent?->date_naiss }}">
                                                    </div>
                                                    {{-- <div class="col-lg-6">
                                                        <label>
                                                            Email
                                                        </label>
                                                        <input type="email" class="form-control"
                                                            placeholder="Inserez le nom" name="email">
                                                    </div> --}}
                                                    <div class="col-lg-6">
                                                        <label>
                                                            Téléphone
                                                        </label>
                                                        <input type="tel" class="form-control"
                                                            placeholder="Inserez le nom" name="telephone"
                                                            value="{{ $agent?->adresse?->agent_phone }}">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label>
                                                            Nationalité
                                                        </label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Inserez le nom" name="nationalite"
                                                            value="{{ $agent?->nationalite }}">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label>
                                                            Etat civil
                                                        </label>
                                                        <select class="form-select"
                                                            aria-label="Default select example" name="etat_civil">
                                                            <option value="">Selectionez</option>
                                                            <option value="Marié(e)" @selected($agent?->etat_civil == 'Marié(e)')>
                                                                Marié(e)</option>
                                                            <option value="célibataire" @selected($agent?->etat_civil == 'célibataire')>
                                                                célibataire</option>
                                                            <option value="Divorcé(e)" @selected($agent?->etat_civil == 'Divorcé(e)')>
                                                                Divorcé(e)</option>
                                                            <option value="Veuf" @selected($agent?->etat_civil == 'Veuf')>Veuf
                                                            </option>
                                                            <option value="Veuve" @selected($agent?->etat_civil == 'Veuve')>Veuve
                                                            </option>
                                                        </select>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <label>
                                                            Nombre d'enfants
                                                        </label>
                                                        <input type="number" class="form-control"
                                                            placeholder="Inserez le nom" name="nbr_enfant"
                                                            value="{{ $agent?->nbr_enfant }}">
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <label>
                                                            Adresse
                                                        </label>
                                                        <textarea name="adresse" id="" cols="30" rows="3" class="form-control">{{ $agent?->adresse?->residence }}</textarea>
                                                    </div>
                                                    <div class="mt-4 col-lg-6">

                                                    </div>
                                                    <div class="mt-4 col-lg-6 text-end">
                                                        <button class="btn btn-primary btn-lg">Sauvegarder</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </div>

                                    <div class="tab-pane fade" id="authentication" role="tabpanel"
                                        aria-labelledby="authentication-tab" wire:ignore.self>
                                        <div class="info-lg position-relative">

                                            {{-- <form method="post" action="{{ route('pm.rh.user.update.auth') }}">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="user_id"
                                                    value="{{ $agent?->user?->id }}">
                                                <input type="hidden" name="agent_id" value="{{ $agent?->id }}">
                                                <div class="form-group row g-3 justify-content-center">
                                                    <div class="col-lg-12">
                                                        <h2>Informations sur le mode d'authentification à l'application
                                                        </h2>
                                                    </div>
                                                    <div class="col-lg-10">
                                                        <label>Email</label>
                                                        <input type="email" name="email"
                                                            value="{{ old('email', $agent?->user?->email) }}"
                                                            class="form-control" placeholder="Insérez l'email"
                                                            required autocomplete="off">
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <input type="hidden" name="user_id"
                                                            value="{{ $agent?->user?->id }}">
                                                        <label>Mot de passe </label>
                                                        <input type="password" name="password" class="form-control"
                                                            placeholder="Insérez l'email" autocomplete="new-password">
                                                        <small>(laissez vide pour garder l'ancien)</small>
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <input type="hidden" name="user_id"
                                                            value="{{ $agent?->user?->id }}">
                                                        <label>Confirmer le mot de passe</label>
                                                        <input type="password" name="password_confirm"
                                                            class="form-control"
                                                            placeholder="Confirmer le mot de passe">
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <label>Statut</label>
                                                        <select class="form-select" name="statut_id"
                                                            aria-label="Default select example" required>
                                                            <option value="" disabled>Selectionnez le statut
                                                            </option>
                                                            @foreach ($statuts as $statut)
                                                                <option value="{{ $statut->id }}"
                                                                    @selected($agent?->user?->statut_id == $statut->id)>
                                                                    {{ $statut->libelle }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-5"></div>
                                                    <div class="mt-4 col-lg-10 text-end">
                                                        <button class="btn btn-add float-end">Enregistrer</button>
                                                    </div>
                                                </div>
                                            </form> --}}

                                            <x-form-section submit="updatePassword" class="card border-0 shadow-none">
                                                <x-slot name="title">
                                                    {{ __('Update Password') }}
                                                </x-slot>

                                                <x-slot name="description">
                                                    {{ __('Ensure your account is using a long, random password to stay secure.') }}
                                                </x-slot>

                                                <x-slot name="form">
                                                    <div class="col-span-6 sm:col-span-4">
                                                        <x-label for="current_password"
                                                            value="{{ __('Current Password') }}" />
                                                        <x-input id="current_password" type="password"
                                                            class="mt-1 block w-full"
                                                            wire:model.defer="state.current_password"
                                                            autocomplete="current-password" />
                                                        <x-input-error for="current_password" class="mt-2" />
                                                    </div>

                                                    <div class="col-span-6 sm:col-span-4">
                                                        <x-label for="password" value="{{ __('New Password') }}" />
                                                        <x-input id="password" type="password"
                                                            class="mt-1 block w-full"
                                                            wire:model.defer="state.password"
                                                            autocomplete="new-password" />
                                                        <x-input-error for="password" class="mt-2" />
                                                    </div>

                                                    <div class="col-span-6 sm:col-span-4">
                                                        <x-label for="password_confirmation"
                                                            value="{{ __('Confirm Password') }}" />
                                                        <x-input id="password_confirmation" type="password"
                                                            class="mt-1 block w-full"
                                                            wire:model.defer="state.password_confirmation"
                                                            autocomplete="new-password" />
                                                        <x-input-error for="password_confirmation" class="mt-2" />
                                                    </div>
                                                </x-slot>

                                                <x-slot name="actions">
                                                    <x-action-message class="mr-3" on="saved">
                                                        {{ __('Saved.') }}
                                                    </x-action-message>

                                                    <x-button class="btn-primary btn-lg">
                                                        {{ __('Save') }}
                                                    </x-button>
                                                </x-slot>
                                            </x-form-section>
                                            <hr>
                                            <form wire:submit.prevent="updatePermission" class="position-relative">
                                                <div class="m-0 d-none position-absolute d-flex justify-content-center"
                                                    style="z-index: 2; height:100%; width:100%; background-color: rgba(255,255,255,0.99)"
                                                    wire:loading wire:target="showUser,updatePermission"
                                                    wire:loading.class.remove="d-none">
                                                    <div class="m-auto text-center">
                                                        <div class="spinner-border" role="status"
                                                            style="color: var(--primaryColor)">
                                                            <span class="sr-only"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row g-3 justify-content-center">
                                                    <div class="col-lg-12">
                                                        {{-- {{ $agent?->fonction()->service?->division?->departement->id ?? 4 }} --}}
                                                        <h2>Informations sur les permission</h2>
                                                    </div>
                                                    <div class="col-12">
                                                        {{-- <div class="mb-2">
                                                            <a href="javascript:void(0)"
                                                                class="permission-select-all">Sélectionner tout</a> /
                                                            <a href="javascript:void(0)"
                                                                class="permission-deselect-all">Désélectionner tout</a>
                                                        </div> --}}

                                                        <ul class="mt-3 permissions checkbox list-unstyled row">
                                                            @php
                                                                $role_permissions = $agent?->user?->permissions->count() ? $agent?->user?->permissions->pluck('key')->toArray() : [];
                                                            @endphp
                                                            @foreach (\App\Models\Permission::all()->groupBy('module_id') as $module_id => $permission)
                                                                @php
                                                                    $module = \App\Models\Module::find($module_id);
                                                                @endphp
                                                                <li class="col-4">
                                                                    {{-- <input type="checkbox" id="{{ Str::slug($module->name)  }}" class="permission-group" wire:model.defer="permissionGoup"> --}}
                                                                    <label for="{{ Str::slug($module->name) }}">
                                                                        <strong>{{ __($module->name) }}</strong>
                                                                    </label>
                                                                    <ul class="list-unstyled ms-4 mb-3">
                                                                        @foreach ($permission as $perm)
                                                                        {{-- @php
                                                                            dd($agent?->user?->can($perm->name))
                                                                        @endphp --}}
                                                                            <li class="d-flex gap-2">
                                                                                <div class="form-check form-switch form-switch->sm">
                                                                                    <input type="checkbox" id="permission-{{ $perm->id }}"
                                                                                        class="form-check-input rounded-pill the-permission"
                                                                                        value="{{ $perm->name }}"
                                                                                        @checked($agent?->user?->can($perm->name))
                                                                                        wire:model.defer="permissions"
                                                                                        />
                                                                                    <label class="form-check-label" for="permission-{{ $perm->id }}">
                                                                                        {{ __($perm->name) }}
                                                                                    </label>
                                                                                </div>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    <div class="mt-4 col-lg-10 text-end">
                                                        <button class="btn btn-primary btn-lg">Enregister</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    {{-- <div class="tab-pane fade" id="team" role="tabpanel"
                                        aria-labelledby="authentication-tab" wire:ignore.self>
                                        <div class="info-lg position-relative">

                                            @livewire('teams.team-information', ['team' => $team])
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

    <!-- Leave Team Confirmation Modal -->
    <x-confirmation-modal wire:model="confirmingLeavingTeam">
        <x-slot name="title">
            {{ __('Leave Team') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you would like to leave this team?') }}
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('confirmingLeavingTeam')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ml-3" wire:click="leaveTeam" wire:loading.attr="disabled">
                {{ __('Leave') }}
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>

    <!-- Remove Team Member Confirmation Modal -->
    <x-confirmation-modal wire:model="confirmingTeamMemberRemoval">
        <x-slot name="title">
            {{ __('Remove Team Member') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you would like to remove this person from the team?') }}
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('confirmingTeamMemberRemoval')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ml-3" wire:click="removeTeamMember" wire:loading.attr="disabled">
                {{ __('Remove') }}
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>

    @foreach ($agent?->created_documents()->groupBy('dossier_id') ?? [] as $key => $documentGroups)
        @php
            $dossier = \App\Models\Dossier::find($key);
        @endphp
        <div class="modal fade" id="modal-pass-dossier-{{ $dossier->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore>
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center content-text">
                            <i data-feather="trash"></i>
                            <h5>Autorisation</h5>
                            <p>Veillez saisir le mot de passe pour acceder au dossier</p>
                        </div>
                        <form action="{{ route('pm.dossiers.access') }}" method="POST">
                            @csrf
                            <div class="form-group row g-3 align-items-center">
                                <input type="hidden" name="dossier_id" id="" value="{{ $dossier->id }}">
                                <div class="col-12 position-relative">
                                    <label for="password" class="mb-3">Mot de passe</label>
                                    <input type="password" class="form-control form-control-validation"
                                        placeholder="Mot de passe" name="password">
                                </div>
                                <div class="mt-2 col-12 d-flex justify-content-end">
                                    <button class="btn btn-add">{{ __('Accéder') }}</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @if ($agent)
        {{-- @push('scripts') --}}
        <script>
            $('document').ready(function() {
                // $('.toggleswitch').bootstrapToggle();

                $('.permission-group').on('change', function() {
                    $(this).siblings('ul').find("input[type='checkbox']").prop('checked', this.checked);
                });

                $('.permission-select-all').on('click', function() {
                    $('ul.permissions').find("input[type='checkbox']").prop('checked', true);
                    return false;
                });

                $('.permission-deselect-all').on('click', function() {
                    $('ul.permissions').find("input[type='checkbox']").prop('checked', false);
                    return false;
                });

                function parentChecked() {
                    $('.permission-group').each(function() {
                        var allChecked = true;
                        $(this).siblings('ul').find("input[type='checkbox']").each(function() {
                            console.log(this.checked);
                            if (!this.checked) allChecked = false;
                        });
                        $(this).prop('checked', allChecked);
                    });
                }

                parentChecked();

                $('.the-permission').on('change', function() {
                    parentChecked();
                });


                // $('#edit-person select[name=direction_id]').on('change', function () {
                //     $ajax({
                //         url : '/ajax/',
                //         method : '',
                //         data : {
                //             '':
                //         },
                //         success : function (data) {

                //         },
                //         error : function (data) {

                //         }
                //     });
                // })

                // $('#edit-person select[name=service_id]').on('change', function () {
                //     $ajax({
                //         url : '',
                //         method : '',
                //         data : {
                //             '':
                //         },
                //         success : function (data) {

                //         },
                //         error : function (data) {

                //         }
                //     });
                // })

                // $('#edit-person select[name=fonction_id]').on('change', function () {
                //     $ajax({
                //         url : '',
                //         method : '',
                //         data : {
                //             '':
                //         },
                //         success : function (data) {

                //         },
                //         error : function (data) {

                //         }
                //     });
                // })

            });
        </script>
        {{-- @endpush --}}
    @endif
</div>

@push('scripts')
    <script>
        const nvImg_profil = document.querySelector('#file-img-profil');
        var nsr = document.getElementById('img_profil');
        console.log(nvImg_profil);
        nvImg_profil.addEventListener('change', function() {
            const fichier_img = this.files[0];
            if (fichier_img) {
                const analyseur_file = new FileReader();
                analyseur_file.readAsDataURL(fichier_img);
                analyseur_file.addEventListener('load', function() {
                    nsr.setAttribute('src', this.result);
                    $(nsr).addClass('fade')
                    $("#label-2").addClass('active')
                })
            }
            setTimeout(() => {
                $(nsr).removeClass('fade')
            }, 3000);
        })
    </script>
@endpush
