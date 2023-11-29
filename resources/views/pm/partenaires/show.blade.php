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
    <div class="page-header card card-lg">
        <div class="text-star">
            <h1>Affichage du Partenaire</h1>
            <div class="page-breadcrumb d-none d-sm-flex align-items-center">
                <div class="mt-2">
                    <nav aria-label="breadcrumb">
                        <ol class="p-0 mb-0 breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('pm.home') }}"><i class="bi bi-house-fill"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('pm.partenaires.index') }}">Partenaires</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $partenaire->societe->nom }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <a href="{{ route('pm.partenaires.edit', $partenaire) }}" class="btn btn-light rounded-pill btn-sm">
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
                        {{-- country_id	mode_id	prix --}}
                        <div class="mb-5 d-flex align-items-center">
                            @php
                                $random = rand(1, 4);
                            @endphp
                            @if ($partenaire->image)
                                <div class="flex-shrink-0">
                                    <div class="avatar avatar-lg avatar-circle">
                                        <img class="avatar-img" src="{{ image($partenaire->image) }}"
                                            alt="Image Description">
                                    </div>
                                </div>
                            @else
                                <div
                                    class="avatar avatar-lg @if ($random == 1) avatar-soft-primary @elseif($random == 2) avatar-soft-dark @elseif($random == 3) avatar-soft-info @else avatar-soft-danger @endif  avatar-circle">
                                    <span class="avatar-initials">{{ Str::upper($partenaire->societe->nom[0]) }}</span>
                                </div>
                            @endif

                            <div class="mx-3 flex-grow-1">
                                <div class="mb-1 d-flex">
                                    <h3 class="mb-0 me-3">{{ Str::ucfirst($partenaire->societe?->nom) }}</h3>
                                </div>
                                <span class="fs-6">Enregistré {{ $partenaire->created_at->diffForHumans() }}</span>
                            </div>

                            <div class="d-none d-sm-inline-block ms-auto text-end">
                                <!-- Dropdown -->
                                <div class="dropdown">
                                    <button type="button" class="btn btn-white btn-sm" id="actionsDropdown"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions <i class="bi-chevron-down"></i>
                                    </button>

                                    <div class="mt-1 dropdown-menu" aria-labelledby="actionsDropdown">
                                        <a class="dropdown-item" href="mailto:{{ $partenaire->email }}">
                                            <i class="bi-envelope dropdown-item-icon"></i> Email
                                        </a>
                                        <a class="dropdown-item" href="tel:{{ $partenaire?->phone }}">
                                            <i class="bi-telephone dropdown-item-icon"></i> Téléphoner
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" href="#"
                                            onclick="document.getElementId('delete_partenaire').submit()">
                                            <i class="bi-trash dropdown-item-icon text-danger"></i>
                                            Suprimmer
                                        </a>
                                        <form action="{{ route('pm.partenaires.destroy', $partenaire) }}"
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
                            @if (count($partenaire->modalites))
                                <div class="flex-fill">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5>Pays</h5>
                                    </div>

                                    <ul class="list-unstyled list-py-1 text-body">
                                        @foreach ($partenaire->modalites as $key => $modalite)
                                            <li>
                                                {{ $modalite->country?->name_fr }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            {{-- <div class="flex-fill">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5>Prix du partenaire</h5>
                                </div>

                                <span class="mb-2 d-block text-body">
                                    {{ $partenaire->prix }} $
                                </span>
                            </div> --}}
                        </div>

                        <div class="mb-2 d-flex">
                            <div class="flex-fill">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5>Contact</h5>
                                </div>

                                <ul class="list-unstyled list-py-1 text-body">
                                    <li>
                                        <i class="bi-at me-2"></i>{{ $partenaire->email }}
                                    </li>
                                    <li class="d-flex">
                                        <i class="bi-phone me-2"></i>
                                        {{ $partenaire->phone }}
                                    </li>
                                </ul>
                            </div>
                            <div class="flex-fill">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5>Personne à contacter</h5>
                                </div>

                                <span class="mb-2 d-block text-body">
                                    <i class="bi-person me-2"></i>
                                    {{ $partenaire->nom }}
                                </span>
                            </div>
                        </div>

                        @if ($partenaire->paiement_attributs)
                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5>Mode de paiement</h5>
                                </div>
                                <div class="list-custom">
                                    @foreach (json_decode($partenaire->paiement_attributs, true) as $key => $paiement)
                                        <div
                                            class="text-body px-0 @if ($loop->first) ps-0 @endif @if ($loop->last) pe-0 @endif ">
                                            <strong>{{ Str::ucfirst(Str::replaceArray('_', [' '], $key)) }}</strong>
                                            :<br>{{ Str::ucfirst($paiement) }}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if (count($partenaire->modalites))
                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5>Modalites de paiement</h5>
                                </div>
                                <div class="list-custom">
                                    @foreach ($partenaire->modalites as $key => $modalite)
                                        <div
                                            class="text-body px-0 @if ($loop->first) ps-0 @endif @if ($loop->last) pe-0 @endif ">
                                            <strong>Pays</strong> : {{ Str::ucfirst($modalite->country?->name_fr) }}<br>
                                            <strong>Prix initial</strong> : {{ $modalite->prix }}$<br>
                                            <strong>Prix renouvel.</strong> : {{ $modalite->renewal_price }}$
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if ($partenaire->description)
                            <h5>Description</h5>
                            <p>{{ $partenaire->description }}</p>
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
                                    <th>Projet N°</th>
                                    <th>Non Client</th>
                                    <th>Date soumission</th>
                                    <th>Date cloture</th>
                                    <th>Durée</th>
                                    <th>Prochaine màj</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $projet)
                                    <tr>
                                        <td>
                                            <a href="{{ route('pm.projects.show', $projet) }}">#{{ $projet->id }}</a>
                                        </td>
                                        <td>
                                            {{ $projet->customer->societe->nom ?? 'nulle' }}
                                        </td>
                                        <td>{{ $projet->date_soumission?->isoFormat('ll') }}</td>
                                        <td>{{ $projet->date_cloture?->isoFormat('ll') }}</td>
                                        <td>
                                            {{ $projet->duree }}
                                        </td>
                                        <td>
                                            {{ $projet->update_date?->isoFormat('ll') }}
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
                    <button type="button" class="btn btn-danger">Supprimer le client</button>
                </div>
            </div>

            <div class="col-lg-4">

                {{-- <div class="mb-3 card mb-lg-5">
                    <!-- Header -->
                    <div class="card-header card-header-content-between">
                        <h4 class="card-header-title">Documents du clients</h4>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="px-0 card-body">
                        <ul class="list-group list-group-flush">
                            <!-- Item -->
                            @if ($partenaire->contrat && $partenaire->contrat != '[]')
                                <li class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <img class="avatar avatar-xs avatar-4x3"
                                                src="{{ fileIcon($partenaire->contrat) }}"
                                                alt="Image Description">
                                        </div>

                                        <div class="col">
                                            <h5 class="mb-0">
                                                Contrat
                                            </h5>
                                            <ul class="list-inline list-separator small text-body">
                                                <li class="list-inline-item">
                                                    {{ get_file_size(json_decode($partenaire->contrat)[0]->download_link) }}
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- End Col -->

                                        <div class="col-auto">
                                            <!-- Dropdown -->
                                            <div class="dropdown">
                                                <button type="button" class="p-1 btn btn-white btn-sm"
                                                    id="filesListDropdown2" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </button>

                                                <div class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="filesListDropdown2" style="min-width: 13rem;">
                                                    <span class="dropdown-header">Options</span>

                                                    <a class="dropdown-item" href="{{ files($customer->contrat)->link }}" download="contrat">
                                                        <i class="bi-download dropdown-item-icon"></i> Télécharger
                                                    </a>

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
                            @if ($partenaire->nda && $partenaire->nda != '[]')
                                <li class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <img class="avatar avatar-xs avatar-4x3"
                                                src="{{ fileIcon($partenaire->nda) }}" alt="Image Description">
                                        </div>

                                        <div class="col">
                                            <h5 class="mb-0">
                                                <a class="text-dark" href="#">NDA</a>
                                            </h5>
                                            <ul class="list-inline list-separator small text-body">
                                                <li class="list-inline-item">
                                                    {{ get_file_size(json_decode($partenaire->nda)[0]->download_link) }}
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- End Col -->

                                        <div class="col-auto">
                                            <!-- Dropdown -->
                                            <div class="dropdown">
                                                <button type="button" class="p-1 btn btn-white btn-sm"
                                                    id="filesListDropdown2" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </button>

                                                <div class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="filesListDropdown2" style="min-width: 13rem;">
                                                    <span class="dropdown-header">Options</span>

                                                    <a class="dropdown-item" href="{{ files($partenaire->nda)->link }}" download="nda">
                                                        <i class="bi-download dropdown-item-icon"></i> Télécharger
                                                    </a>

                                                </div>
                                            </div>
                                            <!-- End Dropdown -->
                                        </div>
                                    </div>
                                    <!-- End Row -->
                                </li>
                            @endif
                            <!-- End Item -->

                            @foreach (json_decode($partenaire->autre_doc ?? '[]') as $doc)
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
                                                <li class="list-inline-item">{{ get_file_size($doc->download_link) }}</li>
                                            </ul>
                                        </div>
                                        <!-- End Col -->

                                        <div class="col-auto">
                                            <!-- Dropdown -->
                                            <div class="dropdown">
                                                <button type="button" class="p-1 btn btn-white btn-sm"
                                                    id="filesListDropdown2" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </button>

                                                <div class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="filesListDropdown2" style="min-width: 13rem;">
                                                    <span class="dropdown-header">Options</span>

                                                    <a class="dropdown-item" href="{{ asset('storage').'/'.$doc->download_link }}" download="Autre_document_{{ $loop->iteration }}">
                                                        <i class="bi-download dropdown-item-icon"></i> Télécharger
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- End Dropdown -->
                                        </div>
                                    </div>
                                    <!-- End Row -->
                                </li>
                            @endforeach

                            @if (!count(json_decode($partenaire->autre_doc ?? '[]')) && !($partenaire->nda && $partenaire->nda != '[]') && !($partenaire->contrat && $partenaire->contrat != '[]'))
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
                </div> --}}

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
                            @forelse($partenaire->revisionHistory->groupBy('created_at') as $date => $histories)
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
                                                        ce partenaire.</h5>
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
    <script>
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
    </script>
@endsection
