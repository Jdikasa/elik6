@extends('pm.layouts.master')

@section('body')
    <div class="content container-fluid">
        <div class="page-header card card-lg">
            <div class="text-star">
                <h1>Affichage du pays</h1>
                <div class="page-breadcrumb d-none d-sm-flex align-items-center">
                    <div class="mt-2">
                        <nav aria-label="breadcrumb">
                            <ol class="p-0 mb-0 breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('pm.home') }}"><i class="bi bi-house-fill"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('pm.countries.index') }}">Pays</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{ $certificat->country->name_fr }}
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="ms-auto">
                        <a href="{{ route('pm.countries.edit', $certificat) }}" class="btn btn-light rounded-pill btn-sm">
                            <i class="bi-pencil-fill"></i>
                            Modifier
                        </a>
                    </div>
                </div>
            </div>
            <div class="block-circle">
                <div class="circle-white"></div>
                <div class="circle-white"></div>
                <div class="circle-white"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <!-- Card -->
                <div class="mb-3 card">
                    <!-- Body -->
                    <div class="card-body">
                        <!-- Media -->
                        <div class="mb-5 d-flex align-items-center">
                            @php
                                $random = rand(1, 4);
                            @endphp

                            @if (File::exists('../public/assets/vendor/flag-icon-css/flags/1x1/' . Str::lower($certificat->country->code) . '.svg'))
                                <div class="flex-shrink-0">
                                    <div class="avatar avatar-lg avatar-circle">
                                        <img class="avatar-img"
                                            src="{{ asset('assets/vendor/flag-icon-css/flags/1x1/' . Str::lower($certificat->country->code) . '.svg') }}"
                                            alt="Image Description">
                                    </div>
                                </div>
                            @else
                                <div
                                    class="avatar avatar-lg @if ($random == 1) avatar-soft-primary @elseif($random == 2) avatar-soft-dark @elseif($random == 3) avatar-soft-info @else avatar-soft-danger @endif  avatar-circle">
                                    <span class="avatar-initials">{{ Str::upper($certificat->country->name_fr[0]) }}</span>
                                </div>
                            @endif

                            <div class="mx-3 flex-grow-1">
                                <div class="mb-1 d-flex">
                                    <h3 class="mb-0 me-3">{{ Str::title($certificat->country->name_fr) }}</h3>
                                </div>
                                <span class="fs-6">Enregistré {{ $certificat->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                        <!-- End Media -->

                        <div class="row row-cols-3">
                            <div class="flex-fill mb-4">
                                <div class="col d-flex justify-content-between align-items-center">
                                    <h5>Procedure</h5>
                                </div>
                                {{ $certificat->is_mandatory ? 'Obligatoire' : 'Volontaire' }}
                            </div>
                            <div class="col flex-fill mb-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5>Type d'homologation</h5>
                                </div>
                                {{ $certificat->typeHomologation->nom }}
                            </div>
                            <div class="col flex-fill mb-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5>Temps d'exécution</h5>
                                </div>
                                {{ $certificat->leadTime->lead_time }}
                            </div>
                            <div class="col flex-fill mb-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5>Echantillon</h5>
                                </div>
                                {{ $certificat->sample_requirements ? 'Oui' : 'Non' }}
                                {{-- @foreach ($certificat->frequences as $frequence)
                                <span class="legend-indicator bg-success"></span>
                                {{ $frequence->frequence }}
                                @if (!$loop->last)
                                    <br>
                                @endif
                            @endforeach --}}
                            </div>

                            <div class="col flex-fill mb-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5>Type d'échantillon</h5>
                                </div>
                                {{ $certificat->typesEchantillon->nom ?? 'aucune' }}
                                {{-- @foreach ($certificat->puissances as $puissance)
                                <span class="legend-indicator bg-success"></span>
                                {{ $puissance->puisance }}
                                @if (!$loop->last)
                                    <br>
                                @endif
                            @endforeach --}}
                            </div>

                            <div class="col flex-fill mb-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5>Nombre d'échantillon</h5>
                                </div>
                                {{ $certificat->nombre_echantillon ?? '0' }}
                            </div>

                            <div class="col flex-fill mb-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5>Etiquetage</h5>
                                </div>
                                {{ $certificat->ettiquetage ? 'Oui' : 'Non' }}
                            </div>

                            <div class="col flex-fill mb-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5>Validité</h5>
                                </div>
                                {{ $certificat->validite }}
                            </div>

                            <div class="col flex-fill mb-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5>Representation local</h5>
                                </div>
                                {{ $certificat->local_representation ? 'Oui' : 'Non' }}
                            </div>

                            <div class="col flex-fill mb-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5>Representation local</h5>
                                </div>
                                {{ $certificat->local_representation ? 'Oui' : 'Non' }}
                            </div>

                            <div class="col flex-fill mb-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5>Prix initial</h5>
                                </div>
                                {{ $certificat->total_cost }}$
                            </div>

                            <div class="col flex-fill mb-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5>Prix de renouvellement</h5>
                                </div>
                                {{ $certificat->renewal_price }}$
                            </div>
                        </div>

                        @if ($certificat->description)
                            <h5>Description</h5>
                            <p>{{ $certificat->description }}</p>
                        @endif
                    </div>
                    <!-- Body -->
                </div>
                <!-- End Card -->

                <!-- Card -->
                <div class="mb-3 card">
                <!-- Header -->
                <div class="card-header card-header-content-sm-between">
                    <div class="gap-2 mb-2 d-grid mb-sm-0">
                        <h4 class="card-header-title">Projets éffectués</h4>
                    </div>

                    <!-- Nav Scroller -->
                    <div class="js-nav-scroller hs-nav-scroller-horizontal">
                        <span class="hs-nav-scroller-arrow-prev" style="display: none;">
                            <a class="hs-nav-scroller-arrow-link" href="javascript:;">
                                <i class="bi-chevron-left"></i>
                            </a>
                        </span>

                        <span class="hs-nav-scroller-arrow-next" style="display: none;">
                            <a class="hs-nav-scroller-arrow-link" href="javascript:;">
                                <i class="bi-chevron-right"></i>
                            </a>
                        </span>

                        <!-- Nav -->
                        <ul class="nav nav-segment nav-fill">
                            <li class="nav-item">
                                <a @class(['nav-link', 'active' => $stat == 1]) href="{{ route('pm.countries.show', $certificat->country) . '?project_stat=1' }}">Tout</a>
                            </li>
                            <li class="nav-item">
                                <a @class(['nav-link', 'active' => $stat == 2]) href="{{ route('pm.countries.show', $certificat->country) . '?project_stat=2' }}"
                                    tabindex="-1">En cours</a>
                            </li>
                            <li class="nav-item">
                                <a @class(['nav-link', 'active' => $stat == 3]) href="{{ route('pm.countries.show', $certificat->country) . '?project_stat=3' }}"
                                    tabindex="-1">Terminé</a>
                            </li>
                        </ul>
                        <!-- End Nav -->
                    </div>
                    <!-- End Nav Scroller -->
                </div>
                <!-- End Header -->

                <!-- Body -->
                <div class="card-body">
                    <!-- Input Group -->
                    <div class="input-group input-group-merge">
                        <div class="input-group-prepend input-group-text">
                            <i class="bi-search"></i>
                        </div>

                        <input id="datatableSearch" type="search" class="form-control" placeholder="Search orders"
                            aria-label="Search orders">
                    </div>
                    <!-- End Input Group -->
                </div>
                <!-- End Body -->

                <!-- Table -->
                <div class="table-responsive datatable-custom">
                    <table id="datatable"
                        class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                        data-hs-datatables-options='{
                            "columnDefs": [{
                                "targets": [0, 5],
                                "orderable": false
                            }],
                            "order": [],
                            "info": {
                            "totalQty": "#datatableWithPaginationInfoTotalQty"
                            },
                            "search": "#datatableSearch",
                            "entries": "#datatableEntries",
                            "pageLength": 12,
                            "isResponsive": false,
                            "isShowPaging": false,
                            "pagination": "datatablePagination"
                        }'>
                        <thead class="thead-light">
                            <tr>
                                <th>Projet</th>
                                <th>Date soumi.</th>
                                <th>Client</th>
                                <th>Statut</th>
                                <th>Prix</th>
                                <th>Mis à jour</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <td>
                                        <a href="{{ route('pm.projects.show', $project) }}">#{{ $project->id }}</a>
                                    </td>
                                    <td>{{ $project->date_soumission->format('d/m/Y') }}</td>
                                    <td class="text-wrap">
                                        {{ $project->customer->societe->nom }}
                                    </td>
                                    <td>
                                        <span class="badge bg-soft-success text-success">
                                            <span class="legend-indicator bg-success"></span>Paid
                                        </span>
                                    </td>
                                    <td>{{ $project->prix ?? 0 }}$</td>
                                    <td>
                                        {{ $project->update_date->format('d/m/Y') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- End Table -->

                <!-- Footer -->
                <div class="card-footer">
                    <div class="row justify-content-center justify-content-sm-between align-items-sm-center">
                        <div class="mb-2 col-sm mb-sm-0">
                            <div class="d-flex justify-content-center justify-content-sm-start align-items-center">
                                <span class="me-2">Affichant:</span>

                                <!-- Select -->
                                <div class="tom-select-custom">
                                    <select id="datatableEntries"
                                        class="w-auto js-select form-select form-select-borderless" autocomplete="off"
                                        data-hs-tom-select-options='{
                                            "searchInDropdown": false,
                                            "hideSearch": true
                                        }'>
                                        <option value="10" selected>10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>
                                <!-- End Select -->

                                <span class="text-secondary me-2">sûr</span>

                                <!-- Pagination Quantity -->
                                <span id="datatableWithPaginationInfoTotalQty"></span>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-sm-auto">
                            <div class="d-flex justify-content-center justify-content-sm-end">
                                <!-- Pagination -->
                                <nav id="datatablePagination" aria-label="Activity pagination"></nav>
                            </div>
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->
                </div>
                <!-- End Footer -->
                </div>
                <!-- End Card -->

                <div class="d-none d-lg-block text-end">
                    <button type="button" class="btn btn-danger">Supprimer l'équipement</button>
                </div>
            </div>

            <div class="col-lg-4">
                <!-- Card -->
                <div class="mb-3 card mb-lg-5">
                    <!-- Header -->
                    <div class="card-header card-header-content-between">
                        <h4 class="card-header-title">Documents à fournir</h4>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="px-0 card-body">
                        @php
                            $str = Str::replace('"', '', $certificat->documents);
                            $str = Str::replace('[', '', $str);
                            $str = Str::replace(']', '', $str);
                            $documents = explode(',', $str);
                        @endphp
                        <ul class="list list-unstyled">
                            @foreach ($documents as $document)
                                {{-- @dd($document); --}}
                                <li class="list-group-item">
                                    <div class="row align-items-center mx-0">
                                        <div class="col-auto pe-0">
                                            <i class="bi bi-check text-success fs-1"></i>
                                        </div>

                                        <div class="col">
                                            <h5 class="mb-0 fw-normal">
                                                <a class="text-dark" href="#">
                                                    {{ $document }}
                                                </a>
                                            </h5>
                                        </div>
                                        <!-- End Col -->
                                    </div>
                                    <!-- End Row -->
                                </li>
                            @endforeach
                            @if (!count($documents))
                                <li class="list-group-item">
                                    <div class="p-4 text-center">
                                        <img class="mb-3" src="{{ asset('assets/svg/illustrations/oc-error.svg') }}"
                                            alt="Image Description" style="width: 10rem;"
                                            data-hs-theme-appearance="default">
                                        <img class="mb-3"
                                            src="{{ asset('assets/svg/illustrations-light/oc-error.svg') }}"
                                            alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="dark">
                                        <p class="mb-0">Aucun document à fournir</p>
                                    </div>
                                </li>
                            @endif
                        </ul>
                    </div>
                    <!-- End Body -->
                </div>
                <!-- End Card -->
                <!-- Card -->
                <div class="mb-3 card mb-lg-5">
                    <!-- Header -->
                    <div class="card-header card-header-content-between">
                        <h4 class="card-header-title">Documents du pays</h4>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="px-0 card-body">
                        <ul class="list-group list-group-flush">
                            <!-- Item -->
                            @if ($certificat->reglementation && $certificat->reglementation != '[]')
                                <li class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <img class="avatar avatar-xs avatar-4x3"
                                                src="{{ fileIcon($certificat->reglementation) }}" alt="Image Description">
                                        </div>

                                        <div class="col">
                                            <h5 class="mb-0">
                                                Reglementation
                                            </h5>
                                            <ul class="list-inline list-separator small text-body">
                                                <li class="list-inline-item">
                                                    @if (Storage::exists('public/'.json_decode($certificat->reglementation)[0]->download_link))
                                                        {{ get_file_size(json_decode($certificat->reglementation)[0]->download_link) }}
                                                    @else
                                                        <small class="text-danger">Fichier introuvable dans le
                                                            serveur</small>
                                                    @endif
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- End Col -->

                                        <div class="col-auto">
                                            <!-- Dropdown -->
                                            <div class="dropdown">
                                                <button type="button" class="p-1 btn btn-white btn-sm"
                                                    id="filesListDropdown2" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </button>

                                                <div class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="filesListDropdown2" style="min-width: 13rem;">
                                                    <span class="dropdown-header">Options</span>
                                                    <a class="dropdown-item"
                                                        href="{{ files($certificat->reglementation)->link }}"
                                                        download="contrat">
                                                        <i class="bi-download dropdown-item-icon"></i> Télécharger
                                                    </a>

                                                    {{-- <div class="dropdown-divider"></div>

                                                    <a class="dropdown-item" href="#">
                                                        <i class="bi-trash dropdown-item-icon"></i> Supprimer
                                                    </a> --}}
                                                </div>
                                            </div>
                                            <!-- End Dropdown -->
                                        </div>
                                    </div>
                                    <!-- End Row -->
                                </li>
                            @endif
                            <!-- End Item -->

                            <!-- Item -->
                            @if ($certificat->model_cert && $certificat->model_cert != '[]')
                                <li class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <img class="avatar avatar-xs avatar-4x3"
                                                src="{{ fileIcon($certificat->model_cert) }}" alt="Image Description">
                                        </div>

                                        <div class="col">
                                            <h5 class="mb-0">
                                                Modele de certificat
                                            </h5>
                                            <ul class="list-inline list-separator small text-body">
                                                <li class="list-inline-item">
                                                    @if (Storage::exists('public/'.json_decode($certificat->model_cert)[0]->download_link))
                                                        {{ get_file_size(json_decode($certificat->model_cert)[0]->download_link) }}
                                                    @else
                                                        <small class="text-danger">Fichier introuvable dans le
                                                            serveur</small>
                                                    @endif
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- End Col -->

                                        <div class="col-auto">
                                            <!-- Dropdown -->
                                            <div class="dropdown">
                                                <button type="button" class="p-1 btn btn-white btn-sm"
                                                    id="filesListDropdown2" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </button>

                                                <div class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="filesListDropdown2" style="min-width: 13rem;">
                                                    <span class="dropdown-header">Options</span>
                                                    <a class="dropdown-item"
                                                        href="{{ files($certificat->model_cert)->link }}"
                                                        download="contrat">
                                                        <i class="bi-download dropdown-item-icon"></i> Télécharger
                                                    </a>

                                                    {{-- <div class="dropdown-divider"></div>

                                                    <a class="dropdown-item" href="#">
                                                        <i class="bi-trash dropdown-item-icon"></i> Supprimer
                                                    </a> --}}
                                                </div>
                                            </div>
                                            <!-- End Dropdown -->
                                        </div>
                                    </div>
                                    <!-- End Row -->
                                </li>
                            @endif
                            <!-- End Item -->

                            <!-- Item -->
                            @if ($certificat->formulaire && $certificat->formulaire != '[]')
                                <li class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <img class="avatar avatar-xs avatar-4x3"
                                                src="{{ fileIcon($certificat->formulaire) }}" alt="Image Description">
                                        </div>

                                        <div class="col">
                                            <h5 class="mb-0">
                                                Formulaire
                                            </h5>
                                            <ul class="list-inline list-separator small text-body">
                                                <li class="list-inline-item">
                                                    @if (Storage::exists('public/'.json_decode($certificat->formulaire)[0]->download_link))
                                                        {{ get_file_size(json_decode($certificat->formulaire)[0]->download_link) }}
                                                    @else
                                                        <small class="text-danger">Fichier introuvable dans le
                                                            serveur</small>
                                                    @endif
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- End Col -->

                                        <div class="col-auto">
                                            <!-- Dropdown -->
                                            <div class="dropdown">
                                                <button type="button" class="p-1 btn btn-white btn-sm"
                                                    id="filesListDropdown2" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </button>

                                                <div class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="filesListDropdown2" style="min-width: 13rem;">
                                                    <span class="dropdown-header">Options</span>
                                                    <a class="dropdown-item"
                                                        href="{{ files($certificat->formulaire)->link }}"
                                                        download="contrat">
                                                        <i class="bi-download dropdown-item-icon"></i> Télécharger
                                                    </a>

                                                    {{-- <div class="dropdown-divider"></div>

                                                    <a class="dropdown-item" href="#">
                                                        <i class="bi-trash dropdown-item-icon"></i> Supprimer
                                                    </a> --}}
                                                </div>
                                            </div>
                                            <!-- End Dropdown -->
                                        </div>
                                    </div>
                                    <!-- End Row -->
                                </li>
                            @endif
                            <!-- End Item -->

                            @foreach (json_decode($certificat->autre_doc ?? '[]') as $doc)
                                <li class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <img class="avatar avatar-xs avatar-4x3"
                                                src="{{ fileIcon($doc->download_link) }}" alt="Image Description">
                                        </div>

                                        <div class="col">
                                            <h5 class="mb-0">
                                                <a class="text-dark" href="#">
                                                    Autre document {{ $loop->iteration }}
                                                </a>
                                            </h5>
                                            <ul class="list-inline list-separator small text-body">
                                                <li class="list-inline-item">
                                                    @if (Storage::exists('public/'.$doc->download_link))
                                                        {{ get_file_size($doc->download_link) }}
                                                    @else
                                                        <small class="text-danger">Fichier introuvable dans le
                                                            serveur</small>
                                                    @endif
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- End Col -->

                                        <div class="col-auto">
                                            <!-- Dropdown -->
                                            <div class="dropdown">
                                                <button type="button" class="p-1 btn btn-white btn-sm"
                                                    id="filesListDropdown2" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </button>

                                                <div class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="filesListDropdown2" style="min-width: 13rem;">
                                                    <span class="dropdown-header">Options</span>
                                                    <a class="dropdown-item"
                                                        href="{{ asset('storage') . '/' . $doc->download_link }}"
                                                        download="Autre_document_{{ $loop->iteration }}">
                                                        <i class="bi-download dropdown-item-icon"></i> Télécharger
                                                    </a>
                                                    {{-- <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="bi-trash dropdown-item-icon"></i> Supprimer
                                                    </a> --}}
                                                </div>
                                            </div>
                                            <!-- End Dropdown -->
                                        </div>
                                    </div>
                                    <!-- End Row -->
                                </li>
                            @endforeach
                            @if (!count(json_decode($certificat->autre_doc ?? '[]')) &&
                                !($certificat->declaration && $certificat->declaration != '[]') &&
                                !($certificat->rapport_sar && $certificat->rapport_sar != '[]') &&
                                !($certificat->formulaire && $certificat->formulaire != '[]') &&
                                !($certificat->model_cert && $certificat->model_cert != '[]') &&
                                !($certificat->reglementation && $certificat->reglementation != '[]'))
                                <li class="list-group-item">
                                    <div class="p-4 text-center">
                                        <img class="mb-3" src="{{ asset('assets/svg/illustrations/oc-error.svg') }}"
                                            alt="Image Description" style="width: 10rem;"
                                            data-hs-theme-appearance="default">
                                        <img class="mb-3"
                                            src="{{ asset('assets/svg/illustrations-light/oc-error.svg') }}"
                                            alt="Image Description" style="width: 10rem;"
                                            data-hs-theme-appearance="dark">
                                        <p class="mb-0">Aucun document ajouté</p>
                                    </div>
                                </li>
                            @endif
                        </ul>
                    </div>
                    <!-- End Body -->
                </div>
                <!-- End Card -->
                <!-- Card -->
                <div class="mb-3 card mb-lg-5">
                    <!-- Header -->
                    <div class="card-header card-header-content-between">
                        <h4 class="card-header-title">Activités</h4>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <!-- Step -->
                        <ul class="step step-icon-sm">
                            @forelse($certificat->revisionHistory->groupBy('created_at') as $date => $histories)
                                <!-- Step Item -->
                                <li class="step-item">
                                    <div class="step-content-wrapper">
                                        <small
                                            class="step-divider">{{ \Carbon\Carbon::parse($date)->isoFormat('LL') }}</small>
                                    </div>
                                </li>
                                <!-- End Step Item -->
                                @foreach ($histories as $history)
                                    @if ($history->key == 'created_at' && !$history->old_value)
                                        <!-- Step Item -->
                                        <li class="step-item">
                                            <div class="step-content-wrapper">
                                                <span class="step-icon step-icon-soft-dark step-icon-pseudo"></span>
                                                <div class="step-content">
                                                    <h5 class="mb-1">{{ $history->userResponsible()->name }} a ajouté
                                                        cette équipement.</h5>
                                                    <p class="mb-0 fs-5">
                                                        {{ \Carbon\Carbon::parse($history->newValue())->format('H:m:s') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- End Step Item -->
                                    @else
                                        <!-- Step Item -->
                                        <li class="step-item">
                                            <div class="step-content-wrapper">
                                                <span class="step-icon step-icon-soft-dark step-icon-pseudo"></span>

                                                <div class="step-content">
                                                    <h5 class="mb-1">
                                                        {{ $history->userResponsible()->name }} a changé
                                                        {{ $history->fieldName() }}, de
                                                        <span
                                                            class="text-danger">"{{ Str::limit($history->oldValue(), 50) }}"</span>
                                                        à
                                                        <span
                                                            class="text-success">"{{ Str::limit($history->newValue(), 50) }}"</span>
                                                    </h5>
                                                    <p class="mb-0 fs-5">{{ $history->created_at->format('H:m:s') }}</p>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- End Step Item -->
                                    @endif
                                @endforeach
                            @empty
                                <li class="step-item">
                                    <div class="p-4 text-center">
                                        <img class="mb-3" src="{{ asset('assets/svg/illustrations/oc-error.svg') }}"
                                            alt="Image Description" style="width: 10rem;"
                                            data-hs-theme-appearance="default">
                                        <img class="mb-3"
                                            src="{{ asset('assets/svg/illustrations-light/oc-error.svg') }}"
                                            alt="Image Description" style="width: 10rem;"
                                            data-hs-theme-appearance="dark">
                                        <p class="mb-0">Aucune activité enregistré</p>
                                    </div>
                                </li>
                            @endforelse
                        </ul>
                        <!-- End Step -->
                    </div>
                    <!-- End Body -->
                </div>
                <!-- End Card -->
            </div>
        </div>

        <div class="d-lg-none text-end">
            <button type="button" class="btn btn-danger">Supprimer l'équipement</button>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" action="#" method="POST" id="delete-form">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <h5>
                        <i class="bi bi-warning"></i>
                        Etez-vous sûr de vouloire supprimer cet équipement ?
                    </h5>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-success" data-bs-dismiss="modal">Annuler</a>
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script-vendor')
@endsection

@section('javascript')
    <!-- JS Plugins Init. -->
    <script>
        $(document).on('ready', function() {
            // INITIALIZATION OF DATATABLES
            // =======================================================
            HSCore.components.HSDatatables.init($('#datatable'), {
                select: {
                    style: 'multi',
                    selector: 'td:first-child input[type="checkbox"]',
                    classMap: {
                        checkAll: '#datatableCheckAll',
                        counter: '#datatableCounter',
                        counterInfo: '#datatableCounterInfo'
                    }
                },
                language: {
                    zeroRecords: `<div class="p-4 text-center">
                  <img class="mb-3" src="{{ asset('assets/svg/illustrations/oc-error.svg') }}" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="default">
                  <img class="mb-3" src="{{ asset('assets/svg/illustrations-light/oc-error.svg') }}" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="dark">
                    <p class="mb-0">Aucun projet avec ce client</p>
                </div>`
                }
            });

            const datatable = HSCore.components.HSDatatables.getItem(0)

            $('.js-datatable-filter').on('change', function() {
                var $this = $(this),
                    elVal = $this.val(),
                    targetColumnIndex = $this.data('target-column-index');

                datatable.column(targetColumnIndex).search(elVal).draw();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            var deleteToggle = $('.delete-toggle');
            var deleteForm = $('#delete-form');

            deleteToggle.on('click', function() {
                deleteForm.attr('action', '{{ route('pm.countries.destroy', '__id') }}'.replace('__id', $(
                    this).data('id')));
            });

        });

        function printdiv(printpage) {
            var headstr = "<html><head><title></title></head><body>";
            var footstr = "</body>";
            var newstr = document.all.item(printpage).innerHTML;
            var oldstr = document.body.innerHTML;
            document.body.innerHTML = headstr + newstr + footstr;
            window.print();
            document.body.innerHTML = oldstr;
            return false;
        }
    </script>
@endsection
