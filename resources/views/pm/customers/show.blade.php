@extends('pm.layouts.master')

@section('css')
    {{-- <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" /> --}}
    <style>
        .list-custom {
            display: grid !important;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 1em;
        }
    </style>
@endsection

@section('body')
    <div class="content container-fluid  pb-5">
        <div class="page-header card card-lg">
            <div class="text-star">
                <h1>Affichage du Client</h1>
                <div class="page-breadcrumb d-none d-sm-flex align-items-center">
                    <div class="mt-2">
                        <nav aria-label="breadcrumb">
                            <ol class="p-0 mb-0 breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('pm.home') }}"><i class="bi bi-house-fill"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('pm.clients.index') }}">Clients</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $customer->societe->nom }}</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="ms-auto">
                        <a href="{{ route('pm.clients.edit', $customer) }}" class="btn btn-light rounded-pill btn-sm">
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
                            @if ($customer->logo)
                                <div class="flex-shrink-0">
                                    <div class="avatar avatar-lg avatar-circle">
                                        <img class="avatar-img" src="{{ image($customer->logo) }}"
                                            alt="Image Description">
                                    </div>
                                </div>
                            @else
                                <div
                                    class="avatar avatar-lg @if ($random == 1) avatar-soft-primary @elseif($random == 2) avatar-soft-dark @elseif($random == 3) avatar-soft-info @else avatar-soft-danger @endif  avatar-circle">
                                    <span class="avatar-initials">{{ Str::upper($customer->societe->nom[0]) }}</span>
                                </div>
                            @endif

                            <div class="mx-3 flex-grow-1">
                                <div class="mb-1 d-flex">
                                    <h3 class="mb-0 me-3">{{ $customer->societe?->nom }}</h3>
                                </div>
                                <span class="fs-6">Enregistré {{ $customer->created_at->diffForHumans() }}</span>
                            </div>

                            <div class="d-none d-sm-inline-block ms-auto text-end">
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
                                        {{-- <a class="dropdown-item" href="#">
                                            <i class="bi-arrow-repeat dropdown-item-icon"></i> Merge
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" href="#">
                                            <i class="bi-trash dropdown-item-icon text-danger"></i>
                                            Suprimmer
                                        </a> --}}
                                    </div>
                                </div>
                                <!-- End Dropdown -->
                            </div>
                        </div>
                        <!-- End Media -->

                        <div class="d-flex mb-2">
                            <div class="flex-fill">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5>Contact</h5>
                                </div>

                                <ul class="list-unstyled list-py-1 text-body">
                                    <li>
                                        <i class="bi-at me-2"></i>{{ $customer->adresse?->email }}
                                    </li>
                                    <li class="d-flex">
                                        <i class="bi-phone me-2"></i>
                                        <div>
                                            @foreach (collect(json_decode($customer->adresse?->phone ?? '[]', true)) as $phone)
                                                {{-- <span class="legend-indicator bg-success"></span> --}}
                                                {{ $phone['type'] . ': ' . $phone['num'] }}
                                                @if (!$loop->last)
                                                    <br>
                                                @endif
                                            @endforeach
                                        </div>

                                    </li>
                                </ul>
                            </div>
                            <div class="flex-fill">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5>Adresse</h5>
                                    {{-- <a class="link" href="javascript:;">Edit</a> --}}
                                </div>

                                @if ($customer->adresse?->adresse_1)
                                    <span class="mb-2 d-block text-body">
                                        <i class="bi-map me-2"></i>{{ $customer->adresse?->adresse_1 }}
                                    </span>
                                @endif

                                @if ($customer->adresse?->adresse_2)
                                    <span class="d-block text-body">
                                        <i class="bi-map me-2"></i>{{ $customer->adresse?->adresse_2 }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        @if (count($customer->personnes))
                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5>Personnes contact</h5>
                                </div>
                                <div class="list-custom">
                                    @foreach ($customer->personnes as $personne)
                                        <div
                                            class="text-body px-3 @if ($loop->first) ps-0 @endif @if ($loop->last) pe-0 @endif @if (!$loop->last) border-end @endif">
                                            <i class="bi-person me-2"></i>{{ $personne->prenom }} {{ $personne->nom }}<br>
                                            <i class="bi-at me-2"></i>{{ $personne->email }}<br>
                                            <i class="bi-phone me-2"></i>{{ $personne->phone }}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if ($customer->description)
                            <h5>Note</h5>
                            <p>{{ $customer->description }}</p>
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
                            <div id="datatableCounterInfo" style="display: none;">
                                <div class="d-flex align-items-center">
                                    <span class="fs-5 me-3">
                                        <span id="datatableCounter">0</span>
                                        Selectionné
                                    </span>
                                    <a class="btn btn-outline-danger btn-sm" href="javascript:;">
                                        <i class="bi-trash"></i> Supprimmer
                                    </a>
                                </div>
                            </div>
                            <!-- End Datatable Info -->
                        </div>

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
                                    <th>Pays</th>
                                    {{-- <th>Statut</th> --}}
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
                                            {{ $project->certificat->country->name_fr }}
                                        </td>
                                        {{-- <td>
                                            <span class="badge bg-soft-success text-success">
                                                <span class="legend-indicator bg-success"></span>Paid
                                            </span>
                                        </td> --}}
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

                @can('delete customers')
                    <div class="d-none d-lg-block">
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="bi bi-trash-fill" data-bs-toggle="tooltip"
                                data-bs-placement="bottom" title=""
                                data-bs-original-title="Delete" aria-label="Delete"></i>
                            Supprimer le client
                        </button>
                    </div>
                @endcan
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
                            <!-- Item -->
                            @if ($customer->contrat && $customer->contrat != '[]')
                                <li class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <img class="avatar avatar-xs avatar-4x3"
                                                src="{{ fileIcon($customer->contrat) }}"
                                                alt="Image Description">
                                        </div>

                                        <div class="col">
                                            <h5 class="mb-0">
                                                {{-- <a class="text-dark" href="#"></a> --}}
                                                Contrat
                                            </h5>
                                            <ul class="list-inline list-separator small text-body">
                                                <li class="list-inline-item">{{ get_file_size(json_decode($customer->contrat)[0]->download_link) }}</li>
                                            </ul>
                                        </div>
                                        <!-- End Col -->

                                        <div class="col-auto">
                                            <!-- Dropdown -->
                                            <div class="dropdown">
                                                <button type="button" class="p-1 btn btn-white btn-sm"
                                                    id="filesListDropdown2" data-bs-toggle="dropdown" aria-expanded="false">
                                                    {{-- <span class="d-none d-sm-inline-block me-1">More</span> --}}
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </button>

                                                <div class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="filesListDropdown2" style="min-width: 13rem;">
                                                    <span class="dropdown-header">Options</span>

                                                    {{-- <a class="dropdown-item" href="#">
                                                        <i class="bi-share dropdown-item-icon"></i> Share file
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="bi-folder-plus dropdown-item-icon"></i> Move to
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="bi-star dropdown-item-icon"></i> Add to stared
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="bi-pencil dropdown-item-icon"></i> Rename
                                                    </a> --}}
                                                    <a class="dropdown-item" href="{{ files($customer->contrat)->link }}" download="contrat">
                                                        <i class="bi-download dropdown-item-icon"></i> Télécharger
                                                    </a>

                                                    {{-- <div class="dropdown-divider"></div>

                                                    <a class="dropdown-item" href="#">
                                                        <i class="bi-chat-left-dots dropdown-item-icon"></i> Report
                                                    </a>
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
                            @if ($customer->nda && $customer->nda != '[]')
                                <li class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <img class="avatar avatar-xs avatar-4x3"
                                                src="{{ fileIcon($customer->nda) }}" alt="Image Description">
                                        </div>

                                        <div class="col">
                                            <h5 class="mb-0">
                                                <a class="text-dark" href="#">NDA</a>
                                            </h5>
                                            <ul class="list-inline list-separator small text-body">
                                                {{-- <li class="list-inline-item">Updated 1 hour ago</li> --}}
                                                <li class="list-inline-item">{{ get_file_size(json_decode($customer->nda)[0]->download_link) }}</li>
                                            </ul>
                                        </div>
                                        <!-- End Col -->

                                        <div class="col-auto">
                                            <!-- Dropdown -->
                                            <div class="dropdown">
                                                <button type="button" class="p-1 btn btn-white btn-sm"
                                                    id="filesListDropdown2" data-bs-toggle="dropdown" aria-expanded="false">
                                                    {{-- <span class="d-none d-sm-inline-block me-1">More</span> --}}
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </button>

                                                <div class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="filesListDropdown2" style="min-width: 13rem;">
                                                    <span class="dropdown-header">Options</span>

                                                    {{-- <a class="dropdown-item" href="#">
                                                        <i class="bi-share dropdown-item-icon"></i> Share file
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="bi-folder-plus dropdown-item-icon"></i> Move to
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="bi-star dropdown-item-icon"></i> Add to stared
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="bi-pencil dropdown-item-icon"></i> Rename
                                                    </a> --}}
                                                    <a class="dropdown-item" href="{{ files($customer->nda)->link }}" download="nda">
                                                        <i class="bi-download dropdown-item-icon"></i> Télécharger
                                                    </a>

                                                    {{-- <div class="dropdown-divider"></div>

                                                    <a class="dropdown-item" href="#">
                                                        <i class="bi-chat-left-dots dropdown-item-icon"></i> Report
                                                    </a>
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

                            @foreach (json_decode($customer->autre_doc ?? '[]') as $doc)
                                {{-- @dd($doc->download_link) --}}
                                <li class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <img class="avatar avatar-xs avatar-4x3"
                                                src="{{ fileIcon($doc->download_link) }}" alt="Image Description">
                                        </div>

                                        <div class="col">
                                            <h5 class="mb-0">
                                                <a class="text-dark" href="#">Autre document {{ $loop->iteration }}</a>
                                            </h5>
                                            <ul class="list-inline list-separator small text-body">
                                                {{-- <li class="list-inline-item">Updated 1 hour ago</li> --}}
                                                <li class="list-inline-item">{{ get_file_size($doc->download_link) }}</li>
                                            </ul>
                                        </div>
                                        <!-- End Col -->

                                        <div class="col-auto">
                                            <!-- Dropdown -->
                                            <div class="dropdown">
                                                <button type="button" class="p-1 btn btn-white btn-sm"
                                                    id="filesListDropdown2" data-bs-toggle="dropdown" aria-expanded="false">
                                                    {{-- <span class="d-none d-sm-inline-block me-1">More</span> --}}
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </button>

                                                <div class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="filesListDropdown2" style="min-width: 13rem;">
                                                    <span class="dropdown-header">Options</span>

                                                    {{-- <a class="dropdown-item" href="#">
                                                        <i class="bi-share dropdown-item-icon"></i> Share file
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="bi-folder-plus dropdown-item-icon"></i> Move to
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="bi-star dropdown-item-icon"></i> Add to stared
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="bi-pencil dropdown-item-icon"></i> Rename
                                                    </a> --}}
                                                    <a class="dropdown-item" href="{{ asset('storage').'/'.$doc->download_link }}" download="Autre_document_{{ $loop->iteration }}">
                                                        <i class="bi-download dropdown-item-icon"></i> Télécharger
                                                    </a>

                                                    {{-- <div class="dropdown-divider"></div> --}}

                                                    {{-- <a class="dropdown-item" href="#">
                                                        <i class="bi-chat-left-dots dropdown-item-icon"></i> Report
                                                    </a> --}}
                                                    {{-- <a class="dropdown-item" href="#">
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

                            @if (!count(json_decode($customer->autre_doc ?? '[]')) &&
                                !($customer->nda && $customer->nda != '[]') &&
                                !($customer->contrat && $customer->contrat != '[]'))
                                <li class="list-group-item">
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
                            @forelse($customer->revisionHistory->groupBy('created_at') as $date => $histories)
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
                                                    <h5 class="mb-1">{{ $history->userResponsible()->name }} a ajouté ce client.</h5>
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

        @can('delete customers')
            <div class="d-lg-none">
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="bi bi-trash-fill" data-bs-toggle="tooltip"
                        data-bs-placement="bottom" title=""
                        data-bs-original-title="Delete" aria-label="Delete"></i>
                    Supprimer le client
                </button>
            </div>
        @endcan
    </div>

    <!-- Invoice Modal -->
    <div class="modal fade" id="accountInvoiceReceiptModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <!-- Header -->
                <div class="text-center modal-top-cover bg-dark">
                    <figure class="bottom-0 position-absolute end-0 start-0">
                        <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                            viewBox="0 0 1920 100.1">
                            <path fill="#fff" d="M0,0c0,0,934.4,93.4,1920,0v100.1H0L0,0z" />
                        </svg>
                    </figure>

                    <div class="modal-close">
                        <button type="button" class="btn-close btn-close-light" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                </div>
                <!-- End Header -->

                <div class="modal-top-cover-icon">
                    <span class="shadow-sm icon icon-lg icon-light icon-circle icon-centered">
                        <i class="bi-receipt fs-2"></i>
                    </span>
                </div>

                <!-- Body -->
                <div class="modal-body">
                    <div class="mb-5 text-center">
                        <h3 class="mb-1">Invoice from Front</h3>
                        <span class="d-block">Invoice #3682303</span>
                    </div>

                    <div class="mb-6 row">
                        <div class="mb-3 col-md-4 mb-md-0">
                            <small class="mb-0 text-cap text-secondary">Amount paid:</small>
                            <span class="text-dark">$316.8</span>
                        </div>
                        <!-- End Col -->

                        <div class="mb-3 col-md-4 mb-md-0">
                            <small class="mb-0 text-cap text-secondary">Date paid:</small>
                            <span class="text-dark">April 22, 2020</span>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-4">
                            <small class="mb-0 text-cap text-secondary">Payment method:</small>
                            <div class="d-flex align-items-center">
                                <img class="avatar avatar-xss me-2" src="{{ asset('assets/svg/brands/mastercard.svg') }}"
                                    alt="Image Description">
                                <span class="text-dark">&bull;&bull;&bull;&bull; 4242</span>
                            </div>
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->

                    <small class="mb-2 text-cap">Summary</small>

                    <ul class="mb-4 list-group">
                        <li class="list-group-item text-dark">
                            <div class="d-flex justify-content-between align-items-center">
                                <span>Payment to Front</span>
                                <span>$264.00</span>
                            </div>
                        </li>
                        <li class="list-group-item text-dark">
                            <div class="d-flex justify-content-between align-items-center">
                                <span>Tax fee</span>
                                <span>$52.8</span>
                            </div>
                        </li>
                        <li class="list-group-item list-group-item-light text-dark">
                            <div class="d-flex justify-content-between align-items-center">
                                <strong>Amount paid</strong>
                                <strong>$316.8</strong>
                            </div>
                        </li>
                    </ul>

                    <div class="gap-3 d-flex justify-content-end">
                        <a class="btn btn-white btn-sm" href="#"><i
                                class="bi-file-earmark-arrow-down-fill me-1"></i> PDF</a>
                        <a class="btn btn-white btn-sm" href="#"><i class="bi-printer-fill me-1"></i> Print
                            Details</a>
                    </div>

                    <hr class="my-5">

                    <p class="modal-footer-text">If you have any questions, please contact us at <a class="link"
                            href="mailto:example@gmail.com">example@gmail.com</a> or call at <a class="link text-nowrap"
                            href="#">+1 898 34-5492</a></p>
                </div>
                <!-- End Body -->
            </div>
        </div>
    </div>
    <!-- End Invoice Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" action="{{ route('pm.clients.destroy', $customer) }}" method="POST" id="delete-form">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="text-center modal-body">
                    <h5>
                        <i class="bi bi-warning"></i>
                        Etez-vous sûr de vouloire supprimer ce client ?
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
    {{-- <script>
        $(document).ready(function() {
            var deleteToggle = $('.delete-toggle');
            var deleteForm = $('#delete-form');

            deleteToggle.on('click', function() {
                deleteForm.attr('action', '{{ route('pm.clients.destroy', '__id') }}'.replace('__id', $(
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
    </script> --}}
@endsection
