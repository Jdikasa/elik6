@extends('pm.layouts.master')

@section('css')
    <style>
        input[type="number"] {
            -moz-appearance: inherit !important;
        }
    </style>
@endsection

@section('titre', 'ELIK6 - Liste des clients')

@section('body')

    <div class="content container-fluid">
        <!--breadcrumb-->
        <div class="page-header card card-lg">
            <div class="text-star">
                <h1>Liste des Clients</h1>
                <div class="page-breadcrumb d-none d-sm-flex align-items-center">
                    <div class="">
                        <nav aria-label="breadcrumb">
                            <ol class="p-0 mb-0 breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('pm.home') }}"><i class="bi bi-house-fill"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Factures</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="ms-auto">
                        <a href="{{ route('pm.fin.factures.create') }}" class="btn btn-light rounded-pill">
                            <i class="bi bi-plus-circle-fill"></i>
                            Créer une facture
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
        <!--end breadcrumb-->

        {{-- <div class="mb-3 row justify-content-end">
            <div class="col-lg">
                <!-- Datatable Info -->
                <div id="datatableCounterInfo" style="display: none;">
                    <div class="d-sm-flex justify-content-lg-end align-items-sm-center">
                        <span class="mb-2 d-block d-sm-inline-block fs-5 me-3 mb-sm-0">
                            <span id="datatableCounter">0</span>
                            Selected
                        </span>
                        <a class="mb-2 btn btn-outline-danger btn-sm mb-sm-0 me-2" href="javascript:;">
                            <i class="bi-trash"></i> Delete
                        </a>
                        <a class="mb-2 btn btn-white btn-sm mb-sm-0 me-2" href="javascript:;">
                            <i class="bi-archive"></i> Archive
                        </a>
                        {{-- <a class="mb-2 btn btn-white btn-sm mb-sm-0 me-2" href="javascript:;">
                            <i class="bi-upload"></i> Publish
                            </a>
                            <a class="mb-2 btn btn-white btn-sm mb-sm-0" href="javascript:;">
                            <i class="bi-x-lg"></i> Unpublish
                            </a> -}}
                    </div>
                </div>
                <!-- End Datatable Info -->
            </div>
            <!-- End Col -->
        </div> --}}
        <!-- End Row -->

        <!-- Card -->
        <div class="card">
            <!-- Header -->
            <div class="card-header card-header-content-md-between">
                <div class="mb-2 mb-md-0">
                    <form>
                        <!-- Search -->
                        <div class="input-group input-group-merge input-group-flush">
                            <div class="input-group-prepend input-group-text">
                                <i class="bi-search"></i>
                            </div>
                            <input id="datatableSearch" type="search" class="form-control" placeholder="Search users"
                                aria-label="Search users">
                        </div>
                        <!-- End Search -->
                    </form>
                </div>

                <div id="datatableCounterInfo" style="display: none;">
                    <div class="d-sm-flex justify-content-lg-end align-items-sm-center">
                        <span class="mb-2 d-block d-sm-inline-block fs-5 me-3 mb-sm-0">
                            <span id="datatableCounter">0</span>
                            Selectionné
                        </span>
                        <a class="mb-2 btn btn-outline-danger btn-sm mb-sm-0 me-2" href="javascript:;">
                            <i class="bi-trash"></i> Supprimer
                        </a>
                        <a class="mb-2 btn btn-white btn-sm mb-sm-0 me-2" href="javascript:;">
                            <i class="bi-archive"></i> Archiver
                        </a>
                    </div>
                </div>

                <div class="gap-2 d-grid d-sm-flex">
                    <!-- Dropdown -->
                    <div class="dropdown">
                        <button type="button" class="btn btn-white btn-sm dropdown-toggle w-100" id="usersExportDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi-download me-2"></i> Export
                        </button>

                        <div class="dropdown-menu dropdown-menu-sm-end" aria-labelledby="usersExportDropdown">
                            <span class="dropdown-header">Options</span>
                            <a id="export-copy" class="dropdown-item" href="javascript:;">
                                <img class="avatar avatar-xss avatar-4x3 me-2" src="{{ asset('assets/svg/illustrations/copy-icon.svg') }}"
                                    alt="Image Description">
                                Copier
                            </a>
                            <a id="export-print" class="dropdown-item" href="javascript:;">
                                <img class="avatar avatar-xss avatar-4x3 me-2" src="{{ asset('assets/svg/illustrations/print-icon.svg') }}"
                                    alt="Image Description">
                                Imprimmer
                            </a>
                            <div class="dropdown-divider"></div>
                            <span class="dropdown-header">Download options</span>
                            <a id="export-excel" class="dropdown-item" href="javascript:;">
                                <img class="avatar avatar-xss avatar-4x3 me-2" src="{{ asset('assets/svg/brands/excel-icon.svg') }}"
                                    alt="Image Description">
                                Excel
                            </a>
                            <a id="export-csv" class="dropdown-item" href="javascript:;">
                                <img class="avatar avatar-xss avatar-4x3 me-2"
                                    src="{{ asset('assets/svg/components/placeholder-csv-format.svg') }}" alt="Image Description">
                                .CSV
                            </a>
                            <a id="export-pdf" class="dropdown-item" href="javascript:;">
                                <img class="avatar avatar-xss avatar-4x3 me-2" src="{{ asset('assets/svg/brands/pdf-icon.svg') }}"
                                    alt="Image Description">
                                PDF
                            </a>
                        </div>
                    </div>
                    <!-- End Dropdown -->

                    <!-- Dropdown -->
                    <div class="dropdown">
                        <button type="button" class="btn btn-white btn-sm w-100" id="showHideDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                            <i class="bi-table me-1"></i> Colones
                            <span
                                class="badge bg-soft-dark text-dark rounded-circle ms-1">7</span>
                        </button>

                        <div class="dropdown-menu dropdown-menu-end dropdown-card" aria-labelledby="showHideDropdown"
                            style="width: 15rem;">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="gap-3 d-grid">
                                        <!-- Form Switch -->
                                        <label class="row form-check form-switch" for="toggleColumn_order">
                                            <span class="col-8 col-sm-9 ms-0">
                                                <span class="me-2">N°</span>
                                            </span>
                                            <span class="col-4 col-sm-3 text-end">
                                                <input type="checkbox" class="form-check-input" id="toggleColumn_order"
                                                    checked>
                                            </span>
                                        </label>
                                        <!-- End Form Switch -->

                                        <!-- Form Switch -->
                                        <label class="row form-check form-switch" for="toggleColumn_date">
                                            <span class="col-8 col-sm-9 ms-0">
                                                <span class="me-2">Date du payment</span>
                                            </span>
                                            <span class="col-4 col-sm-3 text-end">
                                                <input type="checkbox" class="form-check-input" id="toggleColumn_date">
                                            </span>
                                        </label>
                                        <!-- End Form Switch -->

                                        <!-- Form Switch -->
                                        <label class="row form-check form-switch" for="toggleColumn_customer">
                                            <span class="col-8 col-sm-9 ms-0">
                                                <span class="me-2">Client</span>
                                            </span>
                                            <span class="col-4 col-sm-3 text-end">
                                                <input type="checkbox" class="form-check-input"
                                                    id="toggleColumn_customer" checked>
                                            </span>
                                        </label>
                                        <!-- End Form Switch -->

                                        <!-- Form Switch -->
                                        <label class="row form-check form-switch" for="toggleColumn_payment_status">
                                            <span class="col-8 col-sm-9 ms-0">
                                                <span class="me-2">Statut</span>
                                            </span>
                                            <span class="col-4 col-sm-3 text-end">
                                                <input type="checkbox" class="form-check-input"
                                                    id="toggleColumn_payment_status" checked>
                                            </span>
                                        </label>
                                        <!-- End Form Switch -->

                                        <!-- Form Switch -->
                                        <label class="row form-check form-switch" for="toggleColumn_fulfillment_status">
                                            <span class="col-8 col-sm-9 ms-0">
                                                <span class="me-2">Bank</span>
                                            </span>
                                            <span class="col-4 col-sm-3 text-end">
                                                <input type="checkbox" class="form-check-input"
                                                    id="toggleColumn_fulfillment_status" checked>
                                            </span>
                                        </label>
                                        <!-- End Form Switch -->
                                        <!-- Form Switch -->
                                        <label class="row form-check form-switch" for="toggleColumn_montant_total">
                                            <span class="col-8 col-sm-9 ms-0">
                                                <span class="me-2">Total</span>
                                            </span>
                                            <span class="col-4 col-sm-3 text-end">
                                                <input type="checkbox" class="form-check-input"
                                                    id="toggleColumn_montant_total" checked>
                                            </span>
                                        </label>
                                        <!-- End Form Switch -->

                                        <!-- Form Switch -->
                                        <label class="row form-check form-switch" for="toggleColumn_total_paye">
                                            <span class="col-8 col-sm-9 ms-0">
                                                <span class="me-2">Montant payé</span>
                                            </span>
                                            <span class="col-4 col-sm-3 text-end">
                                                <input type="checkbox" class="form-check-input"
                                                    id="toggleColumn_total_paye" checked>
                                            </span>
                                        </label>
                                        <!-- End Form Switch -->

                                        <!-- Form Switch -->
                                        <label class="row form-check form-switch" for="toggleColumn_total_rest">
                                            <span class="col-8 col-sm-9 ms-0">
                                                <span class="me-2">Montant Restant</span>
                                            </span>
                                            <span class="col-4 col-sm-3 text-end">
                                                <input type="checkbox" class="form-check-input"
                                                    id="toggleColumn_total_rest" checked>
                                            </span>
                                        </label>
                                        <!-- End Form Switch -->

                                        <!-- Form Switch -->
                                        <label class="row form-check form-switch" for="toggleColumn_actions">
                                            <span class="col-8 col-sm-9 ms-0">
                                                <span class="me-2">Actions</span>
                                            </span>
                                            <span class="col-4 col-sm-3 text-end">
                                                <input type="checkbox" class="form-check-input" id="toggleColumn_actions">
                                            </span>
                                        </label>
                                        <!-- End Form Switch -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Dropdown -->
                </div>
            </div>
            <!-- End Header -->

            <!-- Table -->
            <div class="table-responsive datatable-custom" style="overflow: scroll">
                <table id="datatable"
                    class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                    style="width: 100%"
                    data-hs-datatables-options='{
                        "columnDefs": [{
                            "targets": [0],
                            "orderable": false
                        }],
                        "order": [],
                        "info": {
                            "totalQty": "#datatableWithPaginationInfoTotalQty"
                        },
                        "search": "#datatableSearch",
                        "entries": "#datatableEntries",
                        "pageLength": 10,
                        "isResponsive": false,
                        "isShowPaging": false,
                        "pagination": "datatablePagination"
                    }'>
                    <thead class="thead-light">
                        <tr>
                            <th class="table-column-pe-0">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="datatableCheckAll">
                                    <label class="form-check-label" for="datatableCheckAll"></label>
                                </div>
                            </th>
                            <th class="table-column-ps-0">N°</th>
                            <th>Date du payment</th>
                            <th>Client</th>
                            <th>Status</th>
                            <th>Bank</th>
                            <th>Total</th>
                            <th>Payé</th>
                            <th>Reste</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($factures as $facture)
                            <tr>
                                <td class="table-column-pe-0">
                                    <div class="form-check">
                                        <input type="checkbox" name="ids" class="form-check-input" id="ordersCheck{{ $facture->id }}" value="{{ $facture->id }}">
                                        <label class="form-check-label" for="ordersCheck{{ $facture->id }}"></label>
                                    </div>
                                </td>
                                <td class="table-column-ps-0">
                                    <a href="{{ route('pm.fin.factures.show', $facture->id) }}">#{{ str_pad($facture->id, 6, '0', 0) }}</a>
                                </td>
                                <td>{{ $facture->date_limit_paie->format('d/m/Y') }}</td>
                                <td class="text-wrap" style="min-width: 150px">
                                    <a class="text-body" href="{{ route('pm.clients.show', $facture->client->id) }}">
                                        {{ $facture->client->societe->nom }}
                                    </a>
                                </td>
                                <td>
                                    <span @class(["badge ", "bg-soft-danger" => ($facture->statut_id == 4), "bg-soft-success text-success" => ($facture->statut_id == 3), "bg-soft-danger text-danger" => $facture->statut_id == 1, "bg-soft-warning text-warning" => $facture->statut_id == 2])>
                                        <span @class(["legend-indicator ", "bg-danger" => ($facture->statut_id == 4), "bg-success" => ($facture->statut_id == 3), "bg-danger" => $facture->statut_id == 1, "bg-warning" => $facture->statut_id == 2])></span>
                                        {{ $facture->statut->titre }}
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        {{ $facture->compte?->bank->nom }}
                                    </div>
                                </td>
                                <td>{{ number_format($facture->total_net, 2,'.', ' ') }}$</td>
                                <td>{{ number_format($facture->transactions->sum('montant'), 2,'.', ' ') }}$</td>
                                <td>{{ number_format($facture->total_net - $facture->transactions->sum('montant'), 2,'.', ' ') }}$</td>
                                <td>
                                    @if ($facture->total_net <= $facture->transactions->sum('montant'))
                                        <a class="js-export-print dropdown-ite" href="{{ route('pm.fin.factures.show', $facture) }}">
                                            <i class="bi bi-eye-fill dropdown-item-icon text-primary"></i>
                                        </a>
                                        <a class="dropdown-ite  delete-toggle" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#delete-modal"
                                            data-id="{{ $facture->id }}" >
                                            <i class="bi-trash dropdown-item-icon text-danger"></i>
                                        </a>
                                    @else
                                        <div class="btn-group" role="group">
                                            <a class="btn btn-white btn-sm text-success paiement-toggle" href="javascript:void(0)"
                                                data-id="{{ $facture->id }}" data-bs-toggle="modal" data-bs-target="#paiement-modal">
                                                <i class="bi-check"></i> Payer
                                            </a>

                                            <!-- Button Group -->
                                            <div class="btn-group">
                                                <button type="button"
                                                    class="btn btn-white btn-icon btn-sm dropdown-toggle dropdown-toggle-empty"
                                                    id="ordersExportDropdown1" data-bs-toggle="dropdown"
                                                    aria-expanded="false"></button>

                                                <div class="mt-1 dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="ordersExportDropdown1">
                                                    {{-- <span class="dropdown-header">Options</span> --}}
                                                    <a class="js-export-print dropdown-item" href="{{ route('pm.fin.factures.show', $facture) }}">
                                                        <i class="bi bi-eye-fill"></i> Voir
                                                    </a>
                                                    {{-- <a class="js-export-print dropdown-item" href="{{ route('pm.fin.factures.edit', $facture) }}">
                                                        <i class="bi bi-pencil-fill"></i> Editer
                                                    </a> --}}
                                                    {{-- <div class="dropdown-divider"></div> --}}
                                                    <a class="dropdown-item text-danger delete-toggle" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#delete-modal"
                                                        data-id="{{ $facture->id }}" >
                                                        <i class="bi-trash dropdown-item-icon"></i> Supprimer
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- End Unfold -->
                                        </div>
                                    @endif
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
                            <span class="me-2">Affichant : </span>

                            <!-- Select -->
                            <div class="tom-select-custom">
                                <select id="datatableEntries" class="w-auto js-select form-select form-select-borderless"
                                    autocomplete="off"
                                    data-hs-tom-select-options='{
                                        "searchInDropdown": false,
                                        "hideSearch": true
                                    }'>
                                    <option value="10" selected>10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
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

        <div class="modal fade" id="paiement-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <form class="modal-content" action="#" method="POST" id="paiement-form">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Paiement</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <input type="hidden" name="facture_id">
                            <div class="col-12">
                                <h6>Enregistrer un paiement sur cette facture</h6>
                            </div>
                            <div class="col-12">
                                <label for="montant" class="form-label">Montant</label>
                                <input type="text" name="montant" id="montant" class="form-control">
                            </div>
                            <div class="col-12">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" cols="30" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-light" data-bs-dismiss="modal">Annuler</a>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="delete-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <form class="modal-content" action="#" method="POST" id="delete-form">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="text-center modal-body">
                        <h5 class="mb-3">
                            <i class="bi bi-warning"></i>
                            Etez-vous sûr de vouloire supprimer cette facture ?
                        </h5>
                        <h6>
                            Attention, cette opération est irreversible
                        </h6>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-success" data-bs-dismiss="modal">Annuler</a>
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script-vendor')
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            var deleteToggle = $('.delete-toggle');
            var deleteForm = $('#delete-form');
            deleteToggle.on('click', function() {
                deleteForm.attr('action', '{{ route('pm.fin.factures.destroy', '__id') }}'.replace('__id', $(this).data('id')));
            });

            var paiementToggle = $('.paiement-toggle');
            var paiementForm = $('#paiement-form');
            paiementToggle.on('click', function() {
                paiementForm.find('input[name=facture_id]').val($(this).data('id'));
                paiementForm.attr('action', '{{ route("pm.fin.finances.savePaiement") }}');
            });
        });
    </script>

    <!-- JS Plugins Init. -->
    <script>
        $(document).on('ready', function() {
            // // INITIALIZATION OF STICKY HEADER
            // // =======================================================
            // new HSTableStickyHeader('.js-sticky-header', {
            //     offsetTop: "60px"
            // }).init();

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
                        <p class="mb-0">Auccune facture disponible</p>
                    </div>`
                },
                responsive : true,
            });

            const datatable = HSCore.components.HSDatatables.getItem('datatable')

            $('.js-datatable-filter').on('change', function() {
                var $this = $(this),
                    elVal = $this.val(),
                    targetColumnIndex = $this.data('target-column-index');

                datatable.column(targetColumnIndex).search(elVal).draw();
            });

            $('#datatableSearch').on('mouseup', function(e) {
                var $input = $(this),
                    oldValue = $input.val();

                if (oldValue == "") return;

                setTimeout(function() {
                    var newValue = $input.val();

                    if (newValue == "") {
                        // Gotcha
                        datatable.search('').draw();
                    }
                }, 1);
            });

            $('#toggleColumn_order').change(function(e) {
                datatable.columns(1).visible(e.target.checked)
            })

            datatable.columns(2).visible(false)

            $('#toggleColumn_date').change(function(e) {
                datatable.columns(2).visible(e.target.checked)
            })

            $('#toggleColumn_customer').change(function(e) {
                datatable.columns(3).visible(e.target.checked)
            })

            $('#toggleColumn_payment_status').change(function(e) {
                datatable.columns(4).visible(e.target.checked)
            })

            $('#toggleColumn_fulfillment_status').change(function(e) {
                datatable.columns(5).visible(e.target.checked)
            })

            $('#toggleColumn_montant_total').change(function(e) {
                datatable.columns(6).visible(e.target.checked)
            })

            $('#toggleColumn_total_paye').change(function(e) {
                datatable.columns(7).visible(e.target.checked)
            })

            $('#toggleColumn_total_rest').change(function(e) {
                datatable.columns(7).visible(e.target.checked)
            })

            $('#toggleColumn_actions').change(function(e) {
                datatable.columns(8).visible(e.target.checked)
            })

        });
    </script>

    <!-- Style Switcher JS -->
    <script>
        (function() {
            // STYLE SWITCHER
            // =======================================================
            const $dropdownBtn = document.getElementById('selectThemeDropdown') // Dropdowon trigger
            const $variants = document.querySelectorAll(
                `[aria-labelledby="selectThemeDropdown"] [data-icon]`) // All items of the dropdown

            // Function to set active style in the dorpdown menu and set icon for dropdown trigger
            const setActiveStyle = function() {
                $variants.forEach($item => {
                    if ($item.getAttribute('data-value') === HSThemeAppearance.getOriginalAppearance()) {
                        $dropdownBtn.innerHTML = `<i class="${$item.getAttribute('data-icon')}" />`
                        return $item.classList.add('active')
                    }

                    $item.classList.remove('active')
                })
            }

            // Add a click event to all items of the dropdown to set the style
            $variants.forEach(function($item) {
                $item.addEventListener('click', function() {
                    HSThemeAppearance.setAppearance($item.getAttribute('data-value'))
                })
            })

            // Call the setActiveStyle on load page
            setActiveStyle()

            // Add event listener on change style to call the setActiveStyle function
            window.addEventListener('on-hs-appearance-change', function() {
                setActiveStyle()
            })
        })()
    </script>

    <!-- End Style Switcher JS -->
@endsection
