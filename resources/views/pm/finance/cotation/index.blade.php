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

<!--breadcrumb-->
<div class="page-header card card-lg">
    <div class="text-star">
        <h1>Liste des cotations</h1>
        <div class="page-breadcrumb d-none d-sm-flex align-items-center">
            <div class="">
                <nav aria-label="breadcrumb">
                    <ol class="p-0 mb-0 breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('pm.home') }}"><i class="bi bi-house-fill"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Cotations</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a href="{{ route('pm.fin.cotations.create') }}" class="btn btn-light rounded-pill">
                    <i class="bi bi-plus-circle-fill"></i>
                    Créer une cotation
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
    <div class="content container-fluid pb-5">

        <div class="row justify-content-end mb-3">
            <div class="col-lg">
                <!-- Datatable Info -->
                <div id="datatableCounterInfo" style="display: none;">
                    <div class="d-sm-flex justify-content-lg-end align-items-sm-center">
                        <span class="d-block d-sm-inline-block fs-5 me-3 mb-2 mb-sm-0">
                            <span id="datatableCounter">0</span>
                            Selected
                        </span>
                        <a class="btn btn-outline-danger btn-sm mb-2 mb-sm-0 me-2" href="javascript:;">
                            <i class="bi-trash"></i> Delete
                        </a>
                        <a class="btn btn-white btn-sm mb-2 mb-sm-0 me-2" href="javascript:;">
                            <i class="bi-archive"></i> Archive
                        </a>
                        {{-- <a class="btn btn-white btn-sm mb-2 mb-sm-0 me-2" href="javascript:;">
                  <i class="bi-upload"></i> Publish
                </a>
                <a class="btn btn-white btn-sm mb-2 mb-sm-0" href="javascript:;">
                  <i class="bi-x-lg"></i> Unpublish
                </a> --}}
                    </div>
                </div>
                <!-- End Datatable Info -->
            </div>
            <!-- End Col -->
        </div>
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

                <div class="d-grid d-sm-flex gap-2">
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
                                Copy
                            </a>
                            <a id="export-print" class="dropdown-item" href="javascript:;">
                                <img class="avatar avatar-xss avatar-4x3 me-2" src="{{ asset('assets/svg/illustrations/print-icon.svg') }}"
                                    alt="Image Description">
                                Print
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
                            <i class="bi-table me-1"></i> Columns <span
                                class="badge bg-soft-dark text-dark rounded-circle ms-1">7</span>
                        </button>

                        <div class="dropdown-menu dropdown-menu-end dropdown-card" aria-labelledby="showHideDropdown"
                            style="width: 15rem;">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="d-grid gap-3">
                                        <!-- Form Switch -->
                                        <label class="row form-check form-switch" for="toggleColumn_order">
                                            <span class="col-8 col-sm-9 ms-0">
                                                <span class="me-2">Order</span>
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
                                                <span class="me-2">Date</span>
                                            </span>
                                            <span class="col-4 col-sm-3 text-end">
                                                <input type="checkbox" class="form-check-input" id="toggleColumn_date"
                                                    checked>
                                            </span>
                                        </label>
                                        <!-- End Form Switch -->

                                        <!-- Form Switch -->
                                        <label class="row form-check form-switch" for="toggleColumn_customer">
                                            <span class="col-8 col-sm-9 ms-0">
                                                <span class="me-2">Customer</span>
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
                                                <span class="me-2">Payment status</span>
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
                                                <span class="me-2">Fulfillment status</span>
                                            </span>
                                            <span class="col-4 col-sm-3 text-end">
                                                <input type="checkbox" class="form-check-input"
                                                    id="toggleColumn_fulfillment_status" checked>
                                            </span>
                                        </label>
                                        <!-- End Form Switch -->

                                        <!-- Form Switch -->
                                        <label class="row form-check form-switch" for="toggleColumn_payment_method">
                                            <span class="col-8 col-sm-9 ms-0">
                                                <span class="me-2">Payment method</span>
                                            </span>
                                            <span class="col-4 col-sm-3 text-end">
                                                <input type="checkbox" class="form-check-input"
                                                    id="toggleColumn_payment_method" checked>
                                            </span>
                                        </label>
                                        <!-- End Form Switch -->

                                        <!-- Form Switch -->
                                        <label class="row form-check form-switch" for="toggleColumn_total">
                                            <span class="col-8 col-sm-9 ms-0">
                                                <span class="me-2">Total</span>
                                            </span>
                                            <span class="col-4 col-sm-3 text-end">
                                                <input type="checkbox" class="form-check-input" id="toggleColumn_total">
                                            </span>
                                        </label>
                                        <!-- End Form Switch -->

                                        <!-- Form Switch -->
                                        <label class="row form-check form-switch" for="toggleColumn_actions">
                                            <span class="col-8 col-sm-9 ms-0">
                                                <span class="me-2">Actions</span>
                                            </span>
                                            <span class="col-4 col-sm-3 text-end">
                                                <input type="checkbox" class="form-check-input" id="toggleColumn_actions"
                                                    checked>
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
            <div class="table-responsive datatable-custom" style="overflow: initial">
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
                            {{-- 	total 	tax 	total_net 	created_at  --}}
                            <th class="table-column-ps-0">N°</th>
                            <th>Pays</th>
                            <th>Client</th>
                            <th>Total</th>
                            <th>Total Net</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($cotations as $cotation)
                            <tr>
                                <td class="table-column-pe-0">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="ordersCheck1">
                                        <label class="form-check-label" for="ordersCheck1"></label>
                                    </div>
                                </td>
                                <td class="table-column-ps-0">
                                    <a href="ecommerce-order-details.html">#{{ $cotation->id }}</a>
                                </td>
                                <td>{{ $cotation->certificat->country->name_fr ?? $cotation->certificat->country->name_en }}</td>
                                <td>
                                    <a class="text-body" href="{{ route('pm.clients.show', $cotation->client) }}">{{ $cotation->client->societe->nom }}</a>
                                </td>
                                <td>
                                    {{ $cotation->total }}$
                                </td>
                                <td>
                                    {{ $cotation->total_net }}$
                                </td>
                                <td>
                                    {{ $cotation->created_at->format('d/m/Y') }}
                                </td>
                                <td>

                                    <div class="gap-3 d-flex align-items-center fs-6">
                                        <a href="{{ route('pm.fin.cotations.show', $cotation) }}"
                                            class="text-primary" data-bs-toggle="tooltip"
                                            data-bs-placement="bottom" title=""
                                            data-bs-original-title="View detail" aria-label="Views">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>
                                        {{-- <a href="{{ route('pm.clients.edit', ['client' => $customer]) }}"
                                            class="text-warning" data-bs-toggle="tooltip"
                                            data-bs-placement="bottom" title=""
                                            data-bs-original-title="Edit info" aria-label="Edit">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a> --}}
                                        <a href="javascript:void(0)" class="text-danger delete-toggle"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal"
                                            data-id="{{ $cotation->id }}">
                                            <i class="bi bi-trash-fill" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title=""
                                                data-bs-original-title="Delete" aria-label="Delete"></i>
                                        </a>
                                    </div>
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
                    <div class="col-sm mb-2 mb-sm-0">
                        <div class="d-flex justify-content-center justify-content-sm-start align-items-center">
                            <span class="me-2">Affichant : </span>

                            <!-- Select -->
                            <div class="tom-select-custom">
                                <select id="datatableEntries" class="js-select form-select form-select-borderless w-auto"
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

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                            Etez-vous sûr de vouloire supprimer cette cotation ?
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
                deleteForm.attr('action', '{{ route('pm.clients.destroy', '__id') }}'.replace('__id', $(
                    this).data('id')));
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
                }
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

            $('#toggleColumn_payment_method').change(function(e) {
                datatable.columns(6).visible(e.target.checked)
            })

            // datatable.columns(7).visible(false)

            $('#toggleColumn_total').change(function(e) {
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
