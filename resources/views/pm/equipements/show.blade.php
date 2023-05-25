@extends('pm.layouts.master')

@section('css')
    <style>
        .list-custom {
            display: grid !important;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 1em;
        }
    </style>
@endsection

@section('body')
    <div class="content container-fluid">
        <div class="page-header card card-lg">
            <div class="text-star">
                <h1>Affichage de l'équipement</h1>
                <div class="page-breadcrumb d-none d-sm-flex align-items-center">
                    <div class="mt-2">
                        <nav aria-label="breadcrumb">
                            <ol class="p-0 mb-0 breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('pm.home') }}"><i class="bi bi-house-fill"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('pm.products.index') }}">Equipements</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $product->nom }}</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="ms-auto">
                        <a href="{{ route('pm.products.edit', $product) }}" class="btn btn-light rounded-pill btn-sm">
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
                            @if ($product->image)
                                <div class="flex-shrink-0">
                                    <div class="avatar avatar-lg avatar-circle">
                                        <img class="avatar-img" src="{{ image($product->image) }}" alt="Image Description">
                                    </div>
                                </div>
                            @else
                                <div class="avatar avatar-lg @if ($random == 1) avatar-soft-primary @elseif($random == 2) avatar-soft-dark @elseif($random == 3) avatar-soft-info @else avatar-soft-danger @endif  avatar-circle">
                                    <span class="avatar-initials">{{ Str::upper($product->nom[0]) }}</span>
                                </div>
                            @endif

                            <div class="mx-3 flex-grow-1">
                                <div class="mb-1 d-flex">
                                    <h3 class="mb-0 me-3">{{ Str::title($product->nom) }}</h3>
                                </div>
                                <span class="fs-6">Enregistré {{ $product->created_at->diffForHumans() }}</span>
                            </div>

                            {{-- <div class="d-none d-sm-inline-block ms-auto text-end">
                                <!-- Dropdown -->
                                <div class="dropdown">
                                    <button type="button" class="btn btn-white btn-sm" id="actionsDropdown"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions <i class="bi-chevron-down"></i>
                                    </button>

                                    <div class="mt-1 dropdown-menu" aria-labelledby="actionsDropdown">
                                        <a class="dropdown-item" href="mailto:{{ $customer->adresse?->email }}">
                                            <i class="bi-envelope dropdown-item-icon"></i> Email
                                        </a>
                                        <a class="dropdown-item"
                                            href="tel:{{ json_decode($customer->adresse?->phone ?? '[]', true)[0]['num'] }}">
                                            <i class="bi-telephone dropdown-item-icon"></i> Téléphoner
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" href="#">
                                            <i class="bi-trash dropdown-item-icon text-danger"></i>
                                            Suprimmer
                                        </a>
                                    </div>
                                </div>
                                <!-- End Dropdown -->
                            </div> --}}
                        </div>
                        <!-- End Media -->

                        <div class="row row-cols-3">
                            <div class="flex-fill mb-4">
                                <div class="col d-flex justify-content-between align-items-center">
                                    <h5>Type de l'équipement</h5>
                                </div>
                                {{ Str::title($product->type->nom) }}
                            </div>
                            <div class="col flex-fill mb-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5>Marque de l'équipement</h5>
                                </div>
                                {{ Str::title($product->marque->marque) }}
                            </div>
                            <div class="col flex-fill mb-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5>Modèle de l'équipement</h5>
                                </div>
                                {{ Str::title($product->modele->modele) }}
                            </div>
                            <div class="col flex-fill mb-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5>Bande de fréquence</h5>
                                </div>
                                @foreach ($product->frequences as $frequence)
                                    <span class="legend-indicator bg-success"></span>
                                    {{ $frequence->frequence }}
                                    @if (!$loop->last)
                                        <br>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col flex-fill mb-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5>Puissance</h5>
                                </div>
                                @foreach ($product->puissances as $puissance)
                                    <span class="legend-indicator bg-success"></span>
                                    {{ $puissance->puisance }}
                                    @if (!$loop->last)
                                        <br>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col flex-fill mb-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5>Normes</h5>
                                </div>
                                @foreach ($product->normes as $norme)
                                    <span class="legend-indicator bg-success"></span>
                                    {{ $norme->norme }}
                                    @if (!$loop->last)
                                        <br>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        @if ($product->description)
                            <h5>Description</h5>
                            <p>{{ $product->description }}</p>
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

                            <!-- Datatable Info -->
                            {{-- <div id="datatableCounterInfo" style="display: none;">
                                <div class="d-flex align-items-center">
                                    <span class="fs-5 me-3">
                                        <span id="datatableCounter">0</span>
                                        Selectionné
                                    </span>
                                    <a class="btn btn-outline-danger btn-sm" href="javascript:;">
                                        <i class="bi-trash"></i> Supprimmer
                                    </a>
                                </div>
                            </div> --}}
                            <!-- End Datatable Info -->
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
                                    <a @class(['nav-link', 'active' => $stat == 0]) href="{{ route('pm.products.show', $product) }}">Tout</a>
                                </li>
                                <li class="nav-item">
                                    <a @class(['nav-link', 'active' => $stat == 1]) href="{{ route('pm.products.show', $product) . '?project_stat=1' }}"
                                        tabindex="-1">En cours</a>
                                </li>
                                <li class="nav-item">
                                    <a @class(['nav-link', 'active' => $stat == 2]) href="{{ route('pm.products.show', $product) . '?project_stat=2' }}"
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
                        <h4 class="card-header-title">Documents du clients</h4>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="px-0 card-body">
                        <ul class="list-group list-group-flush">
                            <!-- Item Rapport RF -->
                            @if ($product->rapport_rf && $product->rapport_rf != '[]')
                                <li class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <img class="avatar avatar-xs avatar-4x3"
                                                src="{{ fileIcon($product->rapport_rf) }}" alt="Image Description">
                                        </div>

                                        <div class="col">
                                            <h5 class="mb-0">
                                                Rapport RF
                                            </h5>
                                            <ul class="list-inline list-separator small text-body">
                                                <li class="list-inline-item">
                                                    @if (Storage::exists('public/'.json_decode($product->rapport_rf)[0]->download_link))
                                                        {{ get_file_size(json_decode($product->rapport_rf)[0]->download_link) }}
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
                                                        href="{{ files($product->rapport_rf)->link }}"
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

                            <!-- Item Rapport SAFETY -->
                            @if ($product->rapport_safety && $product->rapport_safety != '[]')
                                <li class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <img class="avatar avatar-xs avatar-4x3"
                                                src="{{ fileIcon($product->rapport_safety) }}" alt="Image Description">
                                        </div>

                                        <div class="col">
                                            <h5 class="mb-0">
                                                Rapport SAFETY
                                            </h5>
                                            <ul class="list-inline list-separator small text-body">
                                                <li class="list-inline-item">
                                                    @if (Storage::exists('public/'.json_decode($product->rapport_safety)[0]->download_link))
                                                        {{ get_file_size(json_decode($product->rapport_safety)[0]->download_link) }}
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
                                                        href="{{ files($product->rapport_safety)->link }}"
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

                            <!-- Item Rapport EMC -->
                            @if ($product->rapport_emc && $product->rapport_emc != '[]')
                                <li class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <img class="avatar avatar-xs avatar-4x3"
                                                src="{{ fileIcon($product->rapport_emc) }}" alt="Image Description">
                                        </div>

                                        <div class="col">
                                            <h5 class="mb-0">
                                                Rapport EMC
                                            </h5>
                                            <ul class="list-inline list-separator small text-body">
                                                <li class="list-inline-item">
                                                    @if (Storage::exists('public/'.json_decode($product->rapport_emc)[0]->download_link))
                                                        {{ get_file_size(json_decode($product->rapport_emc)[0]->download_link) }}
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
                                                        href="{{ files($product->rapport_emc)->link }}"
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

                            <!-- Item Rapport SAR -->
                            @if ($product->rapport_sar && $product->rapport_sar != '[]')
                                <li class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <img class="avatar avatar-xs avatar-4x3"
                                                src="{{ fileIcon($product->rapport_sar) }}" alt="Image Description">
                                        </div>

                                        <div class="col">
                                            <h5 class="mb-0">
                                                Rapport SAR
                                            </h5>
                                            <ul class="list-inline list-separator small text-body">
                                                <li class="list-inline-item">
                                                    @if (Storage::exists('public/'.json_decode($product->rapport_sar)[0]->download_link))
                                                        {{ get_file_size(json_decode($product->rapport_sar)[0]->download_link) }}
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
                                                        href="{{ files($product->rapport_sar)->link }}"
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
                            @if ($product->declaration && $product->declaration != '[]')
                                <li class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <img class="avatar avatar-xs avatar-4x3"
                                                src="{{ fileIcon($product->declaration) }}" alt="Image Description">
                                        </div>

                                        <div class="col">
                                            <h5 class="mb-0">
                                                Declaration
                                            </h5>
                                            <ul class="list-inline list-separator small text-body">
                                                <li class="list-inline-item">
                                                    @if (Storage::exists('public/'.json_decode($product->declaration)[0]->download_link))
                                                        {{ get_file_size(json_decode($product->declaration)[0]->download_link) }}
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
                                                        href="{{ files($product->declaration)->link }}"
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

                            @foreach (json_decode($product->autre_rapport ?? '[]') as $doc)
                                <li class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <img class="avatar avatar-xs avatar-4x3"
                                                src="{{ fileIcon($doc->download_link) }}" alt="Image Description">
                                        </div>

                                        <div class="col">
                                            <h5 class="mb-0">
                                                {{-- <a class="text-dark" href="#"> --}}
                                                    Autre document {{ $loop->iteration }}
                                                {{-- </a> --}}
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

                            @if (!count(json_decode($product->autre_rapport ?? '[]')) &&
                                !($product->declaration && $product->declaration != '[]') &&
                                !($product->rapport_sar && $product->rapport_sar != '[]') &&
                                !($product->rapport_emc && $product->rapport_emc != '[]') &&
                                !($product->rapport_safety && $product->rapport_safety != '[]') &&
                                !($product->rapport_rf && $product->rapport_rf != '[]'))
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
                            @forelse($product->revisionHistory->groupBy('created_at') as $date => $histories)
                                <!-- Step Item -->
                                <li class="step-item">
                                    <div class="step-content-wrapper">
                                        <small class="step-divider">{{ \Carbon\Carbon::parse($date)->isoFormat('LL')  }}</small>
                                    </div>
                                </li>
                                <!-- End Step Item -->
                                @foreach($histories as $history)
                                    @if($history->key == 'created_at' && !$history->old_value)
                                        <!-- Step Item -->
                                        <li class="step-item">
                                            <div class="step-content-wrapper">
                                                <span class="step-icon step-icon-soft-dark step-icon-pseudo"></span>
                                                <div class="step-content">
                                                    <h5 class="mb-1">{{ $history->userResponsible()->name }} a ajouté cette équipement.</h5>
                                                    <p class="mb-0 fs-5">{{ \Carbon\Carbon::parse($history->newValue())->format('H:m:s') }}</p>
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
                                                        <span class="text-danger">"{{ Str::limit($history->oldValue(), 50) }}"</span> à
                                                        <span class="text-success">"{{ Str::limit($history->newValue(), 50) }}"</span>
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

    <!-- JS Plugins Init. -->
    <script>
        (function() {
            //   window.onload = function () {


            //     // INITIALIZATION OF NAVBAR VERTICAL ASIDE
            //     // =======================================================
            //     new HSSideNav('.js-navbar-vertical-aside').init()


            //     // INITIALIZATION OF FORM SEARCH
            //     // =======================================================
            //     // new HSFormSearch('.js-form-search')


            //     // INITIALIZATION OF BOOTSTRAP DROPDOWN
            //     // =======================================================
            //     // HSBsDropdown.init()


            //     // INITIALIZATION OF NAV SCROLLER
            //     // =======================================================
            // new HsNavScroller('.js-nav-scroller')


            //     // INITIALIZATION OF SELECT
            //     // =======================================================
            //     // HSCore.components.HSTomSelect.init('.js-select')


            //     // INITIALIZATION OF CHARTJS
            //     // =======================================================
            //     HSCore.components.HSChartJS.init('.js-chart')


            //     // INITIALIZATION OF QUILLJS EDITOR
            //     // =======================================================
            //     HSCore.components.HSQuill.init('.js-quill')
            //     HSCore.components.HSQuill.init('.js-quill-step')


            //     // INITIALIZATION OF LEAFLET
            //     // =======================================================
            //     // const leaflet = HSCore.components.HSLeaflet.init(document.getElementById('map'))

            //     // L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            //     //   id: 'mapbox/light-v9'
            //     // }).addTo(leaflet)
            //   }
        })()
    </script>
    <script>
        $(document).ready(function() {
            var deleteToggle = $('.delete-toggle');
            var deleteForm = $('#delete-form');

            deleteToggle.on('click', function() {
                deleteForm.attr('action', '{{ route('pm.products.destroy', '__id') }}'.replace('__id', $(
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
