@extends('pm.layouts.master')

@section('css')
    <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />
@endsection

@section('body')
    <div class="page-header card card-lg">
        <div class="text-star">
            <h1>Affichage du Projet</h1>
            <div class="page-breadcrumb d-none d-sm-flex align-items-center">
                <div class="mt-2">
                    <nav aria-label="breadcrumb">
                        <ol class="p-0 mb-0 breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('pm.home') }}"><i class="bi bi-house-fill"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('pm.projects.index') }}">Projets</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">#{{ $project->id }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <a href="{{ route('pm.projects.edit', $project) }}" class="btn btn-light rounded-pill btn-sm">
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
    <div class="pb-5 content container-fluid">

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
                            <div
                                class="avatar avatar-lg @if ($random == 1) avatar-soft-primary @elseif($random == 2) avatar-soft-dark @elseif($random == 3) avatar-soft-info @else avatar-soft-danger @endif  avatar-circle">
                                <span class="avatar-initials">
                                    {{ Str::upper($project->customer?->societe->nom[0] ?? 'I') }}
                                </span>
                            </div>

                            <div class="mx-3 flex-grow-1">
                                <span class="fs-6">CLIENT / SOCIETE</span>
                                <div class="mb-1 d-flex">
                                    <h3 class="mb-0 me-3">{{ $project->customer?->societe?->nom ?? 'Inconnu' }}</h3>
                                </div>
                                {{-- <span class="fs-6">Enregistré {{ $project->created_at->diffForHumans() }}</span> --}}
                            </div>

                            <div class="d-none d-sm-inline-block ms-auto text-end">
                                <!-- Dropdown -->
                                <div class="dropdown">
                                    <button type="button" class="btn btn-white btn-sm" id="actionsDropdown"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions <i class="bi-chevron-down"></i>
                                    </button>

                                    <div class="mt-1 dropdown-menu" aria-labelledby="actionsDropdown">
                                        <a class="dropdown-item" href="mailto:{{ $project->customer?->adresse?->email }}">
                                            <i class="bi-envelope dropdown-item-icon"></i> Email
                                        </a>
                                        <a class="dropdown-item"
                                            href="tel:{{ json_decode($project->customer?->adresse?->phone ?? '[]', true)[0]['num'] ?? '' }}">
                                            <i class="bi-telephone dropdown-item-icon"></i> Téléphoner
                                        </a>
                                    </div>
                                </div>
                                <!-- End Dropdown -->
                            </div>
                        </div>
                        <!-- End Media -->

                        <div class="mb-4 d-flex">
                            <div class="flex-fill">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5>Contact du client</h5>
                                </div>

                                <ul class="list-unstyled list-py-1 text-body">
                                    <li>
                                        <i class="bi-at me-2"></i>{{ $project->customer?->adresse?->email ?? 'Non defini' }}
                                    </li>
                                    <li class="d-flex">
                                        <i class="bi-phone me-2"></i>
                                        <div>
                                            @forelse (collect(json_decode($project->customer?->adresse?->phone ?? '[]', true)) as $phone)
                                                {{-- <span class="legend-indicator bg-success"></span> --}}
                                                {{ $phone['type'] . ': ' . $phone['num'] ?? 'non defini' }}
                                                @if (!$loop->last)
                                                    <br>
                                                @endif
                                            @empty
                                            Non defini
                                            @endforelse
                                        </div>

                                    </li>
                                </ul>
                            </div>
                            <div class="flex-fill">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5>Adresse du client</h5>
                                </div>
                                @if ($project->customer?->adresse?->adresse_1)
                                    <span class="mb-2 d-block text-body">
                                        <i class="bi-map me-2"></i>{{ $project->customer?->adresse?->adresse_1 ?? 'Non defini' }}
                                    </span>
                                @endif
                                @if ($project->customer?->adresse?->adresse_2)
                                    <span class="d-block text-body">
                                        <i class="bi-map me-2"></i>{{ $project->customer?->adresse?->adresse_2 ?? 'Non defini' }}
                                    </span>
                                @endif
                                @if (!$project->customer?->adresse?->adresse_2 && !$project->customer?->adresse?->adresse_1)
                                    <span class="mb-2 d-block text-body">
                                        <i class="bi-map me-2"></i>{{ 'Non defini' }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-4">
                            {{-- <div class="d-flex justify-content-between align-items-center">
                                <h3 class="text-uppercase">Pays</h3>
                            </div> --}}
                            <div class="mb-5 d-flex align-items-center">
                                @php
                                    $random = rand(1, 4);
                                @endphp

                                @if (File::exists(public_path(
                                            '/assets/vendor/flag-icon-css/flags/1x1/' . Str::lower($project->certificat->country->code) . '.svg')))
                                    <div class="flex-shrink-0">
                                        <div class="avatar avatar-lg avatar-circle">
                                            <img class="avatar-img"
                                                src="{{ asset('assets/vendor/flag-icon-css/flags/1x1/' . Str::lower($project->certificat->country->code) . '.svg') }}"
                                                alt="Image Description">
                                        </div>
                                    </div>
                                @else
                                    <div
                                        class="avatar avatar-lg @if ($random == 1) avatar-soft-primary @elseif($random == 2) avatar-soft-dark @elseif($random == 3) avatar-soft-info @else avatar-soft-danger @endif  avatar-circle">
                                        <span
                                            class="avatar-initials">{{ Str::upper($certificat->country->name_fr[0]) }}</span>
                                    </div>
                                @endif

                                <div class="mx-3 flex-grow-1">
                                    <span class="fs-6">PAYS</span>
                                    <div class="mb-1 d-flex">
                                        <h3 class="mb-0 me-3">{{ Str::title($project->certificat->country->name_fr) }}</h3>
                                    </div>
                                    {{-- <span class="fs-6">Enregistré {{ $project->certificat->created_at->diffForHumans() }}</span> --}}
                                </div>
                            </div>
                            <!-- End Media -->

                            <div class="row row-cols-3">
                                <div class="mb-4 flex-fill">
                                    <div class="col d-flex justify-content-between align-items-center">
                                        <h5>Procedure</h5>
                                    </div>
                                    {{ $project->certificat->is_mandatory ? 'Obligatoire' : 'Volontaire' }}
                                </div>
                                <div class="mb-4 col flex-fill">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5>Type d'homologation</h5>
                                    </div>
                                    {{ $project->certificat->typeHomologation->nom }}
                                </div>
                                <div class="mb-4 col flex-fill">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5>Temps d'exécution</h5>
                                    </div>
                                    {{ $project->certificat->leadTime->lead_time }}
                                </div>
                                <div class="mb-4 col flex-fill">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5>Echantillon</h5>
                                    </div>
                                    {{ $project->certificat->sample_requirements ? 'Oui' : 'Non' }}
                                </div>

                                <div class="mb-4 col flex-fill">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5>Type d'échantillon</h5>
                                    </div>
                                    {{ $project->certificat->typesEchantillon->nom ?? 'aucune' }}
                                </div>

                                <div class="mb-4 col flex-fill">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5>Nombre d'échantillon</h5>
                                    </div>
                                    {{ $project->certificat->nombre_echantillon ?? '0' }}
                                </div>

                                <div class="mb-4 col flex-fill">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5>Etiquetage</h5>
                                    </div>
                                    {{ $project->certificat->ettiquetage ? 'Oui' : 'Non' }}
                                </div>

                                <div class="mb-4 col flex-fill">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5>Validité</h5>
                                    </div>
                                    {{ $project->certificat->validite }}
                                </div>

                                <div class="mb-4 col flex-fill">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5>Representation local</h5>
                                    </div>
                                    {{ $project->certificat->local_representation ? 'Oui' : 'Non' }}
                                </div>

                                <div class="mb-4 col flex-fill">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5>Representation local</h5>
                                    </div>
                                    {{ $project->certificat->local_representation ? 'Oui' : 'Non' }}
                                </div>

                                <div class="mb-4 col flex-fill">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5>Prix initial</h5>
                                    </div>
                                    {{ $project->certificat->total_cost }}$
                                </div>

                                <div class="mb-4 col flex-fill">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5>Prix de renouvellement</h5>
                                    </div>
                                    {{ $project->certificat->renewal_price }}$
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="mb-5 d-flex align-items-center">
                                @php
                                    $random = rand(1, 4);
                                @endphp
                                @if ($project->partenaire?->image)
                                    <div class="flex-shrink-0">
                                        <div class="avatar avatar-lg avatar-circle">
                                            <img class="avatar-img" src="{{ image($project->partenaire?->image) }}"
                                                alt="Image Description">
                                        </div>
                                    </div>
                                @else
                                    <div
                                        class="avatar avatar-lg @if ($random == 1) avatar-soft-primary @elseif($random == 2) avatar-soft-dark @elseif($random == 3) avatar-soft-info @else avatar-soft-danger @endif  avatar-circle">
                                        <span
                                            class="avatar-initials">{{ Str::upper($project->partenaire?->societe->nom[0]) }}</span>
                                    </div>
                                @endif

                                <div class="mx-3 flex-grow-1">
                                    <span class="fs-6">PARTENAIRE</span>
                                    <div class="mb-1 d-flex">
                                        <h3 class="mb-0 me-3">{{ Str::ucfirst($project->partenaire?->societe?->nom) }}</h3>
                                    </div>
                                </div>

                                <div class="d-none d-sm-inline-block ms-auto text-end">
                                    <!-- Dropdown -->
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-white btn-sm" id="actionsDropdown"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Actions <i class="bi-chevron-down"></i>
                                        </button>

                                        <div class="mt-1 dropdown-menu" aria-labelledby="actionsDropdown">
                                            <a class="dropdown-item" href="mailto:{{ $project->partenaire?->email }}">
                                                <i class="bi-envelope dropdown-item-icon"></i> Email
                                            </a>
                                            <a class="dropdown-item" href="tel:{{ $project->partenaire?->phone }}">
                                                <i class="bi-telephone dropdown-item-icon"></i> Téléphoner
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item text-danger" href="#"
                                                onclick="document.getElementId('delete_partenaire').submit()">
                                                <i class="bi-trash dropdown-item-icon text-danger"></i>
                                                Suprimmer
                                            </a>
                                            <form action="{{ $project->partenaire? route('pm.partenaires.destroy', $project->partenaire):'#' }}"
                                                id="delete_partenaire">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </div>
                                    <!-- End Dropdown -->
                                </div>
                            </div>
                            <!-- End Media -->

                            <div class="mb-2 d-flex">
                                <div class="flex-fill">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5>Pays</h5>
                                    </div>

                                    <ul class="list-unstyled list-py-1 text-body">
                                        <li>
                                            {{ $project->certificat->country->name_fr ?? $project->certificat->country->name_en }}
                                        </li>
                                    </ul>
                                </div>
                                <div class="flex-fill">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5>Prix du partenaire</h5>
                                    </div>

                                    <span class="mb-2 d-block text-body">
                                        {{-- {{ $project->partenaire?->prix }} $ --}}
                                        {{ $project->prixPartenaire }} $

                                    </span>
                                </div>
                            </div>

                            <div class="mb-2 d-flex">
                                <div class="flex-fill">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5>Contact</h5>
                                    </div>

                                    <ul class="list-unstyled list-py-1 text-body">
                                        <li>
                                            <i class="bi-at me-2"></i>{{ $project->partenaire?->email }}
                                        </li>
                                        <li class="d-flex">
                                            <i class="bi-phone me-2"></i>
                                            {{ $project->partenaire?->phone }}
                                        </li>
                                    </ul>
                                </div>
                                <div class="flex-fill">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5>Personne à contacter</h5>
                                    </div>

                                    <span class="mb-2 d-block text-body">
                                        <i class="bi-person me-2"></i>
                                        {{ $project->partenaire?->nom }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        @if ($project->description)
                            <h5>Description</h5>
                            <p>{{ $project->description }}</p>
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
                            <h4 class="card-header-title">Paiements liés à ce projet</h4>

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
                                    <th scope="col" class="table-column-pe-0">
                                        <div class="form-check">
                                            <input id="datatableCheckAll" type="checkbox" class="form-check-input">
                                            <label class="form-check-label" for="datatableCheckAll"></label>
                                        </div>
                                    </th>
                                    <th class="table-column-ps-0">Facture</th>
                                    <th>Date</th>
                                    <th>Montant</th>
                                    <th>Reste</th>
                                    <th>Description</th>
                                    <th>Enregistré par</th>
                                </tr>
                            </thead>

                            <tbody>

                                @php
                                    $paiements = $project->factures->map(function ($facture) {
                                        return $facture->transactions;
                                    });
                                    $paiements = $paiements->flatten();
                                @endphp

                                @foreach ($paiements as $paiement)
                                    <tr>
                                        <td class="table-column-pe-0">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input"
                                                    id="ordersCheck{{ $paiement->id }}">
                                                <label class="form-check-label" for="ordersCheck3"></label>
                                            </div>
                                        </td>
                                        <td class="table-column-ps-0">
                                            <a href="{{ route('pm.fin.factures.show', $paiement->facture) }}"
                                                class="@if ($paiement->montant <= 0) text-danger @endif">
                                                #{{ str_pad($paiement->facture->id, 6, '0', 0) }}
                                            </a>
                                        </td>
                                        <td>{{ $paiement->created_at->isoFormat('ll') }}</td>
                                        <td>
                                            @if ($paiement->montant <= 0)
                                                <span class="text-danger">
                                                    {{ $paiement->montant }} $
                                                </span>
                                            @else
                                                {{ $paiement->montant }} $
                                            @endif
                                            {{-- <span class="badge bg-soft-success text-success">
                                                <span class="legend-indicator bg-success"></span>Paid
                                            </span> --}}
                                        </td>
                                        <td>
                                            {{ $paiement->facture->total_net - $paiement->montant }} $
                                            {{-- <a class="btn btn-white btn-sm" href="javascript:;" data-bs-toggle="modal"
                                                data-bs-target="#accountInvoiceReceiptModal">
                                                <i class="bi-receipt me-1"></i> Invoice
                                            </a> --}}
                                        </td>
                                        <td>
                                            {!! $paiement->description !!}
                                        </td>
                                        <td>
                                            {{ $paiement->user?->agent?->prenom }} {{ $paiement->user?->agent?->nom }}
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

                <div class="d-none d-lg-block">
                    <button type="button" class="btn btn-danger">Supprimer le projet</button>
                </div>
            </div>

            <div class="col-lg-4">
                <!-- Card -->
                <div class="mb-3 card mb-lg-5">
                    <!-- Header -->
                    <div class="card-header card-header-content-between">
                        <h4 class="card-header-title">Detail du projet</h4>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="px-0 card-body">
                        <table class="table">
                            @php
                                $project_cost = $project->certificat->total_cost ?? 0;
                                $partener_cost = $project->partenaire?->modalites->where('country_id', $project->certificat->country->id)->first()?->prix ?? 0;
                            @endphp
                            <tbody>
                                <tr>
                                    <td style="font-weight: bold !important">Type du projet </td>
                                    <td class="text-end text-truncate pays">
                                        {{ $project->type ?? 'Non défini' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold !important">Etape </td>
                                    <td class="text-end text-truncate pays">
                                        {{ $project->notes->last()?->etape?->titre ?? 'non défini' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold !important">Statut </td>
                                    <td class="text-end text-truncate pays">
                                        {{ $project->notes->last()?->statut?->titre ?? 'Inconnu' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold !important">Pays </td>
                                    <td class="text-end text-truncate pays">
                                        {{ $project->certificat->country->name_fr }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold !important">Prix du projet </td>
                                    <td class="text-end prix_pays">{{ $project_cost }}$</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold !important">Prix du partenaire </td>
                                    <td class="text-end prix_part">
                                        {{ $partener_cost }}$
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold !important">Marge </td>
                                    <td class="text-end prix_marge">{{ $project_cost - $partener_cost }}$</td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                    <!-- End Body -->
                </div>
                <!-- End Card -->

                <!-- Card -->
                <div class="mb-3 card mb-lg-5">
                    <!-- Header -->
                    <div class="card-header card-header-content-between">
                        <h4 class="card-header-title">Mise à jour du projet</h4>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="mb-3 card-body" style="max-height: 400px; overflow-y:scroll">
                        <!-- Step -->
                        <ul class="step step-icon-sm">

                            <!-- Step Item -->
                            {{-- <li class="step-item">
                                <div class="step-content-wrapper">
                                    <small class="step-divider">Wednesday, 19 August</small>
                                </div>
                            </li> --}}
                            <!-- End Step Item -->

                            @forelse ($project->notes as $note)
                                <!-- Step Item -->
                                <li class="step-item">
                                    <div class="step-content-wrapper">
                                        <span class="step-icon step-icon-soft-dark step-icon-pseudo"></span>

                                        <div class="step-content">
                                            <h6 class="mb-0">Etape : {{ $note->etape?->titre ?? 'Inconnu' }}</h6>
                                            <h5 class="mb-1">
                                                {{ $note->statut ? $note->statut->titre : $note->titre ?? 'Inconnu' }}</h5>
                                            <p class="mb-2 fs-5">{{ $note->note_text }}</p>
                                            <small class="mb-0">
                                                Par {{ $note->user?->agent->prenom . ' ' . $note->user?->agent->nom }}
                                                <br>le
                                                {{ $note->created_at->isoFormat('LL à H:m') }}
                                            </small>
                                        </div>
                                    </div>
                                </li>
                                <!-- End Step Item -->
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
                                        <p class="mb-0">Aucune mise à jour enregistré</p>
                                    </div>
                                </li>
                            @endforelse

                        </ul>
                        <!-- End Step -->
                    </div>
                    <!-- End Body -->
                    <div class="card-footer">
                        <ul class="step step-icon-sm">
                            <li class="mb-0 step-item">
                                <div class="step-content-wrapper">
                                    <div class="step-content">
                                        <h5 class="step-divide">Prochaine mis à jour
                                            {{ $project->update_date->diffForHumans() }}</h5>
                                        @if (today()->gte($project->update_date))
                                            <a href="javascript:void(0)" class="px-0 btn btn-link"
                                                data-bs-target="#update-modal" data-bs-toggle="modal">
                                                <i class="bi bi-clock"></i>
                                                Mettre à jour
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
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
                    <div class="mb-3 card-body" style="max-height: 400px; overflow-y:scroll">
                        @php
                            $revisionHistories = $project->revisionHistory->groupBy(function ($date) {
                                return $date->created_at->format('Y-m-d');
                            });
                        @endphp
                        <!-- Step -->
                        <ul class="step step-icon-sm">
                            @forelse($revisionHistories as $date => $histories)
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
                                                    <h5 class="mb-1">{{ $history->userResponsible()->name }} a créé ce
                                                        projet.</h5>
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

        <div class="d-lg-none">
            <button type="button" class="btn btn-danger">Supprimer le client</button>
        </div>
    </div>

    @livewire('projet.update-form-modal', ['project' => $project])

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" action="#" method="POST" id="delete-form">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="text-center modal-body">
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
                deleteForm.attr('action', '{{ route('pm.projects.destroy', '__id') }}'.replace('__id', $(
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
    @stack('scripts')
@endsection
