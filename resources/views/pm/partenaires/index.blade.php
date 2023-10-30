@extends('pm.layouts.master')

@section('css')
    <link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.2/tailwind.min.css" integrity="sha512-l7qZAq1JcXdHei6h2z8h8sMe3NbMrmowhOl+QkP3UhifPpCW2MC4M0i26Y8wYpbz1xD9t61MLT9L1N773dzlOA==" crossorigin="anonymous" /> --}}
@endsection

@section('body')
    <!--breadcrumb-->
    <div class="page-header card card-lg">
        <div class="text-star">
            <h1>Liste des partenaires</h1>
            <div class="page-breadcrumb d-none d-sm-flex align-items-center">
                <div class="">
                    <nav aria-label="breadcrumb">
                        <ol class="p-0 mb-0 breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('pm.home') }}"><i class="bi bi-house-fill"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Partenaire</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <a href="{{ route('pm.partenaires.create') }}" class="btn btn-light rounded-pill">
                        <i class="bi bi-plus-circle-fill"></i>
                        Ajouter un partenaire
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
        <div class="card">
            <!-- Header -->
            <div class="card-header card-header-content-sm-between">
                <div class="mb-2 mb-sm-0">
                    <form>
                        <!-- Search -->
                        <div class="input-group input-group-merge input-group-flush">
                            <div class="input-group-prepend input-group-text">
                                <i class="bi-search"></i>
                            </div>
                            <input id="datatableSearch" type="search" class="form-control" placeholder="Search orders"
                                aria-label="Search orders">
                        </div>
                        <!-- End Search -->
                    </form>
                </div>

                <div class="gap-2 d-grid d-sm-flex justify-content-sm-end align-items-sm-center">
                    <!-- Datatable Info -->
                    <div id="datatableCounterInfo" style="display: none;">
                        <div class="d-flex align-items-center">
                            <span class="fs-5 me-3">
                                <span id="datatableCounter">0</span>
                                Selectionné
                            </span>
                            <a class="btn btn-sm btn-outline-danger rounded-pill" href="javascript:;">
                                <i class="bi-trash"></i> Supprimer
                            </a>
                        </div>
                    </div>
                    <!-- End Datatable Info -->

                    <!-- Dropdown -->
                    <div class="dropdown me-2">
                        <button type="button" class="btn btn-white btn-sm rounded-pill dropdown-toggle"
                            id="usersExportDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi-download me-2"></i> Exporter
                        </button>

                        <div class="dropdown-menu dropdown-menu-sm-end" aria-labelledby="usersExportDropdown">
                            <span class="dropdown-header">Options</span>
                            <a id="export-copy" class="dropdown-item" href="javascript:;">
                                <img class="avatar avatar-xss avatar-4x3 me-2"
                                    src="../assets/svg/illustrations/copy-icon.svg" alt="Image Description">
                                Copier
                            </a>
                            <a id="export-print" class="dropdown-item" href="javascript:;">
                                <img class="avatar avatar-xss avatar-4x3 me-2"
                                    src="../assets/svg/illustrations/print-icon.svg" alt="Image Description">
                                Imprimer
                            </a>
                            <div class="dropdown-divider"></div>
                            <span class="dropdown-header">Format de téléchargement</span>
                            <a id="export-excel" class="dropdown-item" href="javascript:;">
                                <img class="avatar avatar-xss avatar-4x3 me-2" src="../assets/svg/brands/excel-icon.svg"
                                    alt="Image Description">
                                Excel
                            </a>
                            <a id="export-csv" class="dropdown-item" href="javascript:;">
                                <img class="avatar avatar-xss avatar-4x3 me-2"
                                    src="../assets/svg/components/placeholder-csv-format.svg" alt="Image Description">
                                .CSV
                            </a>
                            <a id="export-pdf" class="dropdown-item" href="javascript:;">
                                <img class="avatar avatar-xss avatar-4x3 me-2" src="../assets/svg/brands/pdf-icon.svg"
                                    alt="Image Description">
                                PDF
                            </a>
                        </div>
                    </div>
                    <!-- End Dropdown -->

                    <!-- Dropdown -->
                    <div class="dropdown">
                        <button type="button" class="btn btn-white btn-sm rounded-pill w-100" id="showHideDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                            <i class="bi-table me-1"></i> Columns <span
                                class="badge bg-soft-dark text-dark rounded-circle ms-1">6</span>
                        </button>

                        <div class="dropdown-menu dropdown-menu-end dropdown-card" aria-labelledby="showHideDropdown"
                            style="width: 15rem;">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="gap-3 d-grid">
                                        <!-- Form Switch -->
                                        <label class="row form-check form-switch" for="toggleColumn_name">
                                            <span class="col-8 col-sm-9 ms-0">
                                                <span class="me-2">Nom du contact</span>
                                            </span>
                                            <span class="col-4 col-sm-3 text-end">
                                                <input type="checkbox" class="form-check-input" id="toggleColumn_name"
                                                    checked>
                                            </span>
                                        </label>
                                        <!-- End Form Switch -->

                                        <!-- Form Switch -->
                                        <label class="row form-check form-switch" for="toggleColumn_email">
                                            <span class="col-8 col-sm-9 ms-0">
                                                <span class="me-2">Societé</span>
                                            </span>
                                            <span class="col-4 col-sm-3 text-end">
                                                <input type="checkbox" class="form-check-input" id="toggleColumn_email"
                                                    checked>
                                            </span>
                                        </label>
                                        <!-- End Form Switch -->

                                        <!-- Form Switch -->
                                        <label class="row form-check form-switch" for="toggleColumn_phone">
                                            <span class="col-8 col-sm-9 ms-0">
                                                <span class="me-2">Pays</span>
                                            </span>
                                            <span class="col-4 col-sm-3 text-end">
                                                <input type="checkbox" class="form-check-input" id="toggleColumn_phone">
                                            </span>
                                        </label>
                                        <!-- End Form Switch -->

                                        <!-- Form Switch -->
                                        <label class="row form-check form-switch" for="toggleColumn_country">
                                            <span class="col-8 col-sm-9 ms-0">
                                                <span class="me-2">Téléphone</span>
                                            </span>
                                            <span class="col-4 col-sm-3 text-end">
                                                <input type="checkbox" class="form-check-input" id="toggleColumn_country"
                                                    checked>
                                            </span>
                                        </label>
                                        <!-- End Form Switch -->

                                        <!-- Form Switch -->
                                        <label class="row form-check form-switch" for="toggleColumn_account_status">
                                            <span class="col-8 col-sm-9 ms-0">
                                                <span class="me-2">Email</span>
                                            </span>
                                            <span class="col-4 col-sm-3 text-end">
                                                <input type="checkbox" class="form-check-input"
                                                    id="toggleColumn_account_status" checked>
                                            </span>
                                        </label>
                                        <!-- End Form Switch -->

                                        <!-- Form Switch -->
                                        <label class="row form-check form-switch" for="toggleColumn_total_spent">
                                            <span class="col-8 col-sm-9 ms-0">
                                                <span class="me-2">Action</span>
                                            </span>
                                            <span class="col-4 col-sm-3 text-end">
                                                <input type="checkbox" class="form-check-input"
                                                    id="toggleColumn_total_spent" checked>
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
            <div class="table-responsive datatable-custom">
                <table id="datatable"
                    class="table table-sm table-borderles table-thead-bordered table-wrap table-align-middle card-table"
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
                        "isShowPaging": true,
                        "pagination": "datatablePagination",
                        "buttons": ["copy", "excel", "pdf", "print","csv"]
                    }'>
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" class="table-column-pe-0">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="datatableCheckAll">
                                    <label class="form-check-label" for="datatableCheckAll"></label>
                                </div>
                            </th>
                            <th>Nom du contact</th>
                            <th>Societé</th>
                            <th>Pays</th>
                            <th>Téléphone</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($partenaires as $partenaire)
                            <tr>
                                <td class="table-column-pe-0">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="usersDataCheck1">
                                        <label class="form-check-label" for="usersDataCheck1"></label>
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('pm.partenaires.show', $partenaire) }}" class="gap-3 d-flex align-items-center">
                                        @if ($partenaire->image)
                                            <img src="{{ image($partenaire->image) }}"
                                                class="rounded-circle" width="44" height="44" alt="">
                                        @endif

                                        <div class="">
                                            <p class="mb-0">{{ $partenaire->nom }}</p>
                                        </div>
                                    </a>
                                </td>
                                <td>{{ $partenaire->societe->nom }}</td>
                                <td>
                                    @foreach ($partenaire->modalites as $modalite)
                                        <pre class="mb-0">- {{ $modalite->country->name_fr ?? $modalite->country->name_en }} => Prix : {{ $modalite->prix }}$</pre>
                                    @endforeach
                                </td>
                                <td>{{ $partenaire->phone }}</td>
                                <td>{{ $partenaire->email }}</td>
                                <td>
                                    <div class="gap-3 d-flex align-items-center fs-6">
                                        <a href="{{ route('pm.partenaires.show', $partenaire) }}" class="text-primary"
                                            data-bs-toggle="tooltip" data-bs-placement="bottom" title=""
                                            data-bs-original-title="Voir le detail" aria-label="Voir">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>
                                        <a href="{{ route('pm.partenaires.edit', $partenaire) }}" class="text-warning"
                                            data-bs-toggle="tooltip" data-bs-placement="bottom" title=""
                                            data-bs-original-title="Editer les infos" aria-label="Editer">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="text-danger delete-toggle"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal"
                                            data-id="{{ $partenaire->id }}">
                                            <i class="bi bi-trash-fill" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title=""
                                                data-bs-original-title="Supprimer" aria-label="Supprimer"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Footer -->
            <div class="card-footer">
                <div class="row justify-content-center justify-content-sm-between align-items-sm-center">
                    <div class="mb-2 col-sm mb-sm-0">
                        <div class="d-flex justify-content-center justify-content-sm-start align-items-center">
                            <span class="me-2">Affichant:</span>

                            <!-- Select -->
                            <div class="tom-select-custom">
                                <select id="datatableEntries"
                                    class="js-select form-select form-select-borderless text-nowrap" autocomplete="off"
                                    data-hs-tom-select-options='{
                                        "searchInDropdown": false,
                                        "hideSearch": true
                                    }'>
                                    <option value="10" selected>10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
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
    </div>

    <!-- Modal -->
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
                        Etez-vous sûr de vouloire supprimer ce partenaire ?
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
                        <p class="mb-0">No data to show</p>
                    </div>`
                }
            });

            const datatable = HSCore.components.HSDatatables.getItem('datatable')

            HSCore.components.HSDatatables.init('.js-datatable')

            // const exportDatatable = HSCore.components.HSDatatables.getItem('exportDatatable')

            document.getElementById('export-copy').addEventListener('click', function() {
                datatable.button('.buttons-copy').trigger()
            })

            document.getElementById('export-excel').addEventListener('click', function() {
                datatable.button('.buttons-excel').trigger()
            })

            document.getElementById('export-csv').addEventListener('click', function() {
                datatable.button('.buttons-csv').trigger()
            })

            document.getElementById('export-pdf').addEventListener('click', function() {
                datatable.button('.buttons-pdf').trigger()
            })

            document.getElementById('export-print').addEventListener('click', function() {
                datatable.button('.buttons-print').trigger()
            })

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

            $('#toggleColumn_name').change(function(e) {
                datatable.columns(1).visible(e.target.checked)
            })

            $('#toggleColumn_email').change(function(e) {
                datatable.columns(2).visible(e.target.checked)
            })

            datatable.columns(3).visible(false)

            $('#toggleColumn_phone').change(function(e) {
                datatable.columns(3).visible(e.target.checked)
            })

            $('#toggleColumn_country').change(function(e) {
                datatable.columns(4).visible(e.target.checked)
            })

            // datatable.columns(5).visible(false)

            $('#toggleColumn_account_status').change(function(e) {
                datatable.columns(5).visible(e.target.checked)
            })

            $('#toggleColumn_orders').change(function(e) {
                datatable.columns(6).visible(e.target.checked)
            })
            // datatable.columns(6).visible(false)

            // $('#toggleColumn_total_spent').change(function(e) {
            //     datatable.columns(7).visible(e.target.checked)
            // })
            // datatable.columns(7).visible(false)

            // $('#toggleColumn_last_activity').change(function(e) {
            //     datatable.columns(8).visible(e.target.checked)
            // })

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
    <script>
        $(document).ready(function() {
            var deleteToggle = $('.delete-toggle');
            var deleteForm = $('#delete-form');
            deleteToggle.on('click', function() {
                deleteForm.attr('action', '{{ route('pm.partenaires.destroy', '__id') }}'.replace('__id',
                    $(
                        this).data('id')));
            });
        });
    </script>
@endsection
