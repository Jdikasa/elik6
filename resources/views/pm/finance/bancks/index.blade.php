@extends('pm.layouts.master')

@section('css')
    <style>
        input[type="number"] {
            -moz-appearance: inherit !important;
        }
    </style>
@endsection

@section('titre', 'ELIK6 - Liste des comptes')

@section('body')

    <div class="content container-fluid">
        <!--breadcrumb-->
        <div class="page-header card card-lg">
            <div class="text-star">
                <h1>Banck</h1>
                <div class="page-breadcrumb d-none d-sm-flex align-items-center">
                    <div class="mt-3">
                        <nav aria-label="breadcrumb">
                            <ol class="p-0 mb-0 breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('pm.home') }}"><i class="bi bi-house-fill"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Banck</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="ms-auto">
                        <a href="javascript:void(0)" class="btn btn-light rounded-pill" data-bs-toggle="modal" data-bs-target="#new-banque">
                            <i class="bi bi-plus-circle-fill"></i>
                            Ajouter une banque
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

        <div class="row justify-content-lg-center">
            <div class="col-lg-12">
                <div class="gap-3 d-grid gap-lg-4">

                    <div class="row">
                        <div class="col-lg-9">
                            <!-- Card -->
                            <div class="card card-body">

                                <div class="row col-lg-divider g-lg-3 row-cols-3">
                                    <div class="p-3 col">
                                        <!-- Media -->
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-3 card-subtitle">Total balances</h6>
                                                <h3 class="card-title">{{ number_format($total, 2, '.', ',') }}$</h3>

                                                <div class="d-flex align-items-center">
                                                    <span class="d-block fs-6">{{ convertUnit($total_count) }} transac.</span>
                                                    {{-- <span class="badge bg-soft-success text-success ms-2">
                                                        <i class="bi-graph-up"></i> 4.3%
                                                    </span> --}}
                                                </div>
                                            </div>

                                            <span class="icon icon-soft-secondary icon-sm icon-circle ms-3">
                                                <i class="bi-calendar2-week"></i>
                                            </span>
                                        </div>
                                        <!-- End Media -->
                                    </div>
                                    <!-- End Col -->

                                    <div class="p-3 col">
                                        <!-- Media -->
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-3 card-subtitle">Cette année</h6>
                                                <h3 class="card-title">{{ number_format($this_year, 2, '.', ',') }}$</h3>

                                                <div class="d-flex align-items-center">
                                                    <span class="d-block fs-6">{{ convertUnit($this_year_count) }} transac.</span>
                                                    @php
                                                        $difference = $this_year - $last_year;
                                                        $max = $this_year + $last_year;
                                                        $percentage = ($this_year * 100) > 0 ? ($this_year * 100) / $max : 0;
                                                    @endphp
                                                    @if ($difference == 0)
                                                        <span class="badge bg-soft-primary text-primary ms-2">
                                                            <i class="bi-reception-0"></i> {{ round($percentage, 2) }}%
                                                        </span>
                                                    @elseif($difference > 0)
                                                        <span class="badge bg-soft-success text-success ms-2">
                                                            <i class="bi-graph-up"></i> {{ round($percentage, 2) }}%
                                                        </span>
                                                    @else
                                                        <span class="badge bg-soft-danger text-danger ms-2">
                                                            <i class="bi-graph-down"></i> {{ round($percentage, 2) }}%
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <span class="icon icon-soft-secondary icon-sm icon-circle ms-3">
                                                <i class="bi-piggy-bank"></i>
                                            </span>
                                        </div>
                                        <!-- End Media -->
                                    </div>
                                    <!-- End Col -->

                                    <div class="p-3 col">
                                        <!-- Media -->
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-3 card-subtitle">L'année passé</h6>
                                                <h3 class="card-title">{{ number_format($last_year, 2, '.', ',') }}$</h3>

                                                <div class="d-flex align-items-center">
                                                    <span class="d-block fs-6">{{ convertUnit($last_year_count) }} transac.</span>
                                                    @php
                                                        $difference = $last_year - $this_year;
                                                        $max = $last_year + $this_year;
                                                        $percentage = ($last_year * 100) > 0 ? ($last_year * 100) / $max : 0;
                                                    @endphp
                                                    @if ($difference == 0)
                                                        <span class="badge bg-soft-primary text-primary ms-2">
                                                            <i class="bi-reception-0"></i> {{ round($percentage,2) }}%
                                                        </span>
                                                    @elseif($difference > 0)
                                                        <span class="badge bg-soft-success text-success ms-2">
                                                            <i class="bi-graph-up"></i> {{ round($percentage,2) }}%
                                                        </span>
                                                    @else
                                                        <span class="badge bg-soft-danger text-danger ms-2">
                                                            <i class="bi-graph-down"></i> {{ round($percentage,2) }}%
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <span class="icon icon-soft-secondary icon-sm icon-circle ms-3">
                                                <i class="bi-piggy-bank"></i>
                                            </span>
                                        </div>
                                        <!-- End Media -->
                                    </div>
                                    <!-- End Col -->
                                </div>
                                <!-- End Row -->
                            </div>
                            <!-- End Card -->
                        </div>
                        <div class="col-lg-3">
                            <!-- Card -->
                            <a class="card card-dashed card-centered" href="javascript:;" data-bs-toggle="modal"
                                data-bs-target="#accountAddCardModal">
                                <div class="py-6 card-body card-dashed-body">
                                    <img class="mb-3 avatar avatar-sm avatar-4x3"
                                        src="{{ asset('assets/svg/illustrations/oc-add-card.svg') }}"
                                        alt="Image Description" data-hs-theme-appearance="default">
                                    <img class="mb-2 avatar avatar-lg avatar-4x3"
                                        src="{{ asset('assets/svg/illustrations-light/oc-add-card.svg') }}"
                                        alt="Image Description" data-hs-theme-appearance="dark">
                                    <span style="font-size: 12px"><i class="bi-plus"></i> Ajouter une comptes</span>
                                </div>
                            </a>
                            <!-- End Card -->
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->

                    <!-- List Group -->
                    <ul class="list-group">
                        <li class="list-group-item">
                            <h5 class="mb-0">Liste des comptes enregistrées</h5>
                        </li>
                        @forelse ($comptes as $compte)
                            <!-- Item -->
                            <li class="list-group-item">
                                <div class="mb-2">
                                    <h4>
                                        {{ $compte->bank->nom }}
                                        @if ($compte->is_primary)
                                            <span class="rounded-pill badge text-primary bg-soft-primary ms-1">Principale</span>
                                        @endif
                                        {{-- @if ($compte->date_expir->lt(now())) --}}
                                            {{-- <span class="text-danger small ms-1">{{ $compte->intitule }}</span> --}}
                                        {{-- @endif --}}
                                    </h4>
                                </div>

                                <!-- Media -->
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <img class="avatar avatar-sm bg-light p-2 text-black-50" src="{{ asset($compte->bank->image) }}"
                                            alt="Image Description" style="min-width: 100px; font-size:10px">
                                    </div>

                                    <div class="flex-grow-1 ms-3">
                                        <div class="row">
                                            <div class="mb-3 col-sm mb-sm-0">
                                                <span class="d-block text-dark">
                                                    {{-- {{ $compte->type->titre }}
                                                    @php
                                                        $num = '';
                                                        foreach (str_split($compte->num) as $key => $digit) {
                                                            if ($digit == ' ') {
                                                                continue;
                                                            }
                                                            if ($key >= Str::length($compte->num) - 4) {
                                                                $num .= $digit;
                                                            } else {
                                                                $num .= '&bull;';
                                                            }
                                                        }
                                                    @endphp --}}

                                                    {!! $compte->num_compte !!}
                                                </span>
                                                <small class="d-block text-muted">{{ $compte->intitule }}
                                                    {{-- $compte->date_expir?->format('m/Y') --}}</small>
                                            </div>
                                            <!-- End Col -->

                                            {{-- @php
                                                $balance = $compte->factures->map(function ($facture)
                                                {
                                                    return ['sum_transac' => $facture->transactions->sum('montant')];
                                                })->sum('sum_transac');
                                            @endphp --}}

                                            <div class="col-sm">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-1 card-subtitle">Solde disponible</h6>
                                                        <h3 class="card-title">
                                                            {{ number_format($compte->balance, 2, '.', ',') }}$</h3>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm">
                                                <div class="gap-2 d-flex justify-content-end align-items-center h-100">
                                                    <a class="btn btn-white btn-sm text-nowrap" href="{{ route('pm.fin.comptes.show', $compte->id) }}">
                                                        <i class="bi-list-check me-1"></i> Détail
                                                    </a>
                                                    <a class="btn btn-white btn-sm edit-toggle text-nowrap"
                                                        href="javascript:;" data-compte="{{ $compte }}"
                                                        data-bs-toggle="modal" data-bs-target="#accountEditCardModal">
                                                        <i class="bi-pencil-fill me-1"></i> Editer
                                                    </a>
                                                    <a href="#"
                                                        class="btn btn-white btn-sm delete-toggle text-nowrap"
                                                        data-id="{{ $compte->id }}" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal">
                                                        <i class="bi-trash me-1"></i> Supprimer
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- End Col -->
                                        </div>
                                        <!-- End Row -->
                                    </div>
                                </div>
                                <!-- End Media -->
                            </li>
                            <!-- End Item -->
                        @empty
                            <li class="list-group-item">
                                <p class="text-center">Aucune comptes enregistrée</p>
                            </li>
                        @endforelse
                    </ul>
                    <!-- End List Group -->

                </div>
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->

        <!-- Add Card Modal -->
        <div class="modal fade" id="new-banque" tabindex="-1" aria-labelledby="" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <!-- Header -->
                    <div class="modal-header">
                        <h4 class="modal-title" id="">Ajouter une banque</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="modal-body">
                        <!-- Form -->
                        <form action="{{ route('pm.fin.banques.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="country_id" class="form-label">Pays de la banque</label>
                                <div class="tom-select-custom">
                                    <select class="js-select form-select form-select-sm" autocomplete="off"
                                        data-hs-tom-select-options='{
                                            "placeholder": "Selectionnez une banque ..."
                                        }' name="country_id" id="country_id">
                                        <option value="">Pays de la banque ...</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">
                                                {{ $country->name_fr ?? $country->name_en }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Form -->
                            <div class="mb-4">
                                <label for="nom_banque" class="form-label">Nom de la banque</label>
                                <input type="text" name="nom" class="form-control" id="nom_banque"
                                    placeholder="Nom de la banque" aria-label="Nom de la banque">
                            </div>
                            <!-- End Form -->

                            <!-- Form -->
                            <div class="mb-4">
                                <label for="code_swift" class="form-label">Code SWIFT</label>
                                <input type="text" class="form-control" name="code_swift"
                                    id="code_swift" placeholder="Code SWIFT">
                            </div>
                            <!-- End Form -->

                            <div class="mb-4">
                                <label class="form-check-label" for="image">Logo de la banque</label>
                                <input type="file" name="image" class="form-control form-control-file" id="image">
                            </div>

                            <div class="gap-3 d-flex justify-content-end">
                                <button type="reset" class="btn btn-white" data-bs-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </form>
                        <!-- End Form -->
                    </div>
                    <!-- End Body -->
                </div>
            </div>
        </div>

        <!-- Edit Card Modal -->
        <div class="modal fade" id="accountEditCardModal" tabindex="-1" aria-labelledby="accountEditCardModalLabel"
            role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <!-- Header -->
                    <div class="modal-header">
                        <h4 class="modal-title" id="accountEditCardModalLabel">Edit card</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="modal-body">
                        <!-- Form -->
                        <form action="#" method="POST" id="edit-form">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="" class="form-label">Nom de la banque</label>
                                <div class="tom-select-custom">
                                    <select class="js-selecte form-select form-select-sm" autocomplete="off"
                                        data-hs-tom-select-options='{
                                            "placeholder": "Selectionnez une banque..."
                                        }' name="bank_id" id="">
                                        <option value="">Selectinnez une banque...</option>
                                        @foreach ($banks as $bank)
                                            <option value="{{ $bank->id }}">
                                                {{ $bank->nom }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- <label for="cardNameLabel" class="form-label">Type de comptes</label>
                            <div class="btn-group-sm-vertical">
                                <div class="mb-4 btn-group btn-group-segment btn-group-fill" role="group"
                                    aria-label="Status radio button group">
                                    @foreach ($typecomptes as $typecomptes)
                                        <input type="radio" class="btn-check flex-fill" name="type_id"
                                            id="type-edit-{{ $typecomptes->id }}" autocomplete="off"
                                            value="{{ $typecomptes->id }}">
                                        <label class="btn btn-sm" for="type-edit-{{ $typecomptes->id }}">
                                            <img class="avatar avatar-xss avatar-4x3 me-2"
                                                src="{{ asset($typecomptes->image) }}" alt="{{ $typecomptes->titre }}">
                                            {{ $typecomptes->titre }}
                                        </label>
                                    @endforeach
                                </div>
                            </div> --}}
                            <!-- End Radio Button Group -->

                            <!-- Form -->
                            <div class="mb-4">
                                <label for="edit-nom" class="form-label">Intitulé du compte</label>
                                <input type="text" name="nom" class="form-control" id="edit-nom"
                                    placeholder="Intitulé du compte" aria-label="Intitulé du compte">
                            </div>
                            <!-- End Form -->

                            <!-- Form -->
                            <div class="mb-4">
                                <label for="edit-num" class="form-label">Numero du compte</label>
                                <input type="text" class="form-control" name="num" id="edit-num"
                                    placeholder="Numero du compte">
                            </div>
                            <!-- End Form -->

                            <!-- Custom Checkbox -->
                            <div class="mb-4 form-check">
                                <input type="checkbox" name="is_primary" class="form-check-input" id="edit-is_primary">
                                <label class="form-check-label" for="edit-is_primary">Faire de ce compte votre compte
                                    principale ?</label>
                            </div>
                            <!-- End Custom Checkbox -->

                            <div class="gap-3 d-flex justify-content-end">
                                <button type="reset" class="btn btn-white" data-bs-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </form>
                        <!-- End Form -->
                    </div>
                    <!-- End Body -->
                </div>
            </div>
        </div>

        <!-- Add Card Modal -->
        <div class="modal fade" id="accountAddCardModal" tabindex="-1" aria-labelledby="accountAddCardModalLabel"
            role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <!-- Header -->
                    <div class="modal-header">
                        <h4 class="modal-title" id="">Ajouter une comptes</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="modal-body">
                        <!-- Form -->
                        <form action="{{ route('pm.fin.comptes.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="bank_id" class="form-label">Nom de la banque</label>
                                <div class="tom-select-custom">
                                    <select class="js-select form-select form-select-sm" autocomplete="off"
                                        data-hs-tom-select-options='{
                                            "placeholder": "Selectionnez une banque ..."
                                        }' name="bank_id" id="bank_id">
                                        <option value="">Selectinnez une banque ...</option>
                                        @foreach ($banks as $bank)
                                            <option value="{{ $bank->id }}">
                                                {{ $bank->nom }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- <label for="cardNameLabel" class="form-label">Type de comptes</label>
                            <div class="btn-group-sm-vertical">
                                <div class="mb-4 btn-group btn-group-segment btn-group-fill" role="group"
                                    aria-label="Status radio button group">
                                    @foreach ($typeComptes as $typecomptes)
                                        <input type="radio" class="btn-check flex-fill" name="type_id"
                                            id="type-{{ $typecomptes->id }}" autocomplete="off"
                                            value="{{ $typecomptes->id }}" @checked($loop->first)>
                                        <label class="btn btn-sm" for="type-{{ $typecomptes->id }}">
                                            <img class="avatar avatar-xss avatar-4x3 me-2"
                                                src="{{ asset($typecomptes->image) }}" alt="{{ $typecomptes->titre }}">
                                            {{ $typecomptes->titre }}
                                        </label>
                                    @endforeach
                                </div>
                            </div> --}}
                            <!-- End Radio Button Group -->

                            <!-- Form -->
                            <div class="mb-4">
                                <label for="cardNameLabel" class="form-label">Intitulé du compte</label>
                                <input type="text" name="nom" class="form-control" id="cardNameLabel"
                                    placeholder="Intitulé du compte" aria-label="Intitulé du compte">
                            </div>
                            <!-- End Form -->

                            <!-- Form -->
                            <div class="mb-4">
                                <label for="cardNumberLabel" class="form-label">Numéro du compte</label>
                                <input type="text" class="form-control" name="num"
                                    id="cardNumberLabel" placeholder="Numéro du compte">
                            </div>
                            <!-- End Form -->

                            <!-- Custom Checkbox -->
                            <div class="mb-4 form-check">
                                <input type="checkbox" name="is_primary" class="form-check-input" id="is_primary">
                                <label class="form-check-label" for="is_primary">Faire de ce compte votre compte principale ?</label>
                            </div>
                            <!-- End Custom Checkbox -->

                            <div class="gap-3 d-flex justify-content-end">
                                <button type="reset" class="btn btn-white" data-bs-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </form>
                        <!-- End Form -->
                    </div>
                    <!-- End Body -->
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <form class="modal-content" action="#" method="POST" id="delete-form">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        {{-- <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5> --}}
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="text-center modal-body">
                        <h3 class="mb-3">
                            <i class="bi bi-warning"></i>
                            Etez-vous sûr de vouloire supprimer cette comptes ?
                        </h3>
                        {{-- <h6>
                            Attention, cette opération va suprimer tous les projets liés à ce client
                        </h6> --}}
                        {{-- </div>
                    <div class="modal-footer"> --}}
                        <div class="my-5"></div>
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
            // supression
            var deleteToggle = $('.delete-toggle');
            var deleteForm = $('#delete-form');
            deleteToggle.on('click', function() {
                deleteForm.attr('action', '{{ route('pm.fin.comptes.destroy', '__id') }}'.replace('__id', $(
                    this).data('id')));
            });

            // edition
            var editToggle = $('.edit-toggle');
            var editForm = $('#edit-form');
            editToggle.on('click', function() {

                var compte = $(this).data('compte');
                console.log(compte);

                editForm.find("select[name=bank_id]").value = compte.bank_id;

                editForm.find("select[name=bank_id] option[value=" + compte.bank_id + "]").attr('selected', true).trigger('change');

                // editForm.find("input[name=type_id][value=" + compte.type_id + "]").attr('checked', true);
                editForm.find("input[name=nom]").val(compte.intitule);
                editForm.find("input[name=num]").val(compte.num_compte);
                // editForm.find("input[name=date_expir]").val(date_expir);
                // editForm.find("input[name=code_cvv]").val(compte.code_cvv);
                editForm.find("input[name=is_primary]").attr('checked', compte.is_primary ? true : false);
                editForm.attr('action', '{{ route('pm.fin.comptes.update', '__id') }}'.replace('__id', compte
                    .id));

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

            // INITIALIZATION OF INPUT MASK
            // =======================================================
            HSCore.components.HSMask.init('.js-input-mask')


            // INITIALIZATION OF TOGGLE SWITCH
            // =======================================================
            new HSToggleSwitch('.js-toggle-switch')

            document.querySelectorAll('[name="billingPricingRadio"]').forEach(item => {
                if (item.checked) {
                    item.closest('.form-check-select-stretched').classList.add('checked')
                }

                item.addEventListener('change', function(e) {
                    $checked = document.querySelector('.form-check-select-stretched.checked')
                    if ($checked) {
                        $checked.classList.remove('checked')
                    }

                    item.closest('.form-check-select-stretched').classList.add('checked')
                })
            })

            // INITIALIZATION OF ADD FIELD
            // =======================================================
            new HSAddField('.js-add-field', {
                addedField: field => {
                    // HSCore.components.HSTomSelect.init(field.querySelector('.js-select-dynamic'))
                    // HSCore.components.HSMask.init(field.querySelector('.js-input-mask'))
                    var input = field.querySelectorAll('input')
                    // var select = field.querySelectorAll('select')

                    $(input).each(function () {
                        $(this).attr('name', $(this).attr('data-name'))
                    });
                    // $(select).each(function () {
                    //     $(this).attr('name', $(this).attr('data-name'))
                    // });
                    // console.log($(input));
                }
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
