<div class="row">

    <div class="col-lg-4">
        <div id="stickyBlockStartPoint">
            <div class="js-sticky-block"
                data-hs-sticky-block-options='{
                    "parentSelector": "#stickyBlockStartPoint",
                    "breakpoint": "lg",
                    "startPoint": "#stickyBlockStartPoint",
                    "endPoint": "#stickyBlockEndPoint",
                    "stickyOffsetTop": 20
                }'
                wire:ignore.self>
                <div class="mb-3 card card-lg" style="position: initial">
                    <h4 class="p-3 card-header text-uppercase">
                        Créer une facture
                    </h4>
                    <!-- Body -->
                    <div class="px-3 py-4 card-body">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="" class="form-label">Banck concernée :</label>
                                <!-- Flatpickr -->
                                <select name="banck_id" id="" class="form-control form-select"
                                    wire:model='stat.banck_id' @disabled($hasItem)>
                                    <option value="" selected disabled>Selectionnez la banck</option>
                                    @foreach ($stat['bancks'] as $banck)
                                        <option value="{{ $banck->id }}">
                                            {{ $banck->bank->nom }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="" class="form-label">Facturé à :</label>
                                <!-- Flatpickr -->
                                <select name="client_id" id="" class="form-control form-select"
                                    wire:model='stat.customer' wire:change='selectClient'
                                    @disabled($hasItem)>
                                    <option value="" selected disabled>Selectionnez un client</option>
                                    @foreach ($stat['customers'] as $customer)
                                        <option value="{{ $customer->id }}">
                                            {{ $customer->societe->nom }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="" class="form-label">Adresse du client :</label>
                                <textarea class="form-control" placeholder="A quelle adresse cette facture est-il destinée ?" id="invoiceAddressToLabel"
                                    aria-label="Who is this invoice from?" rows="3" wire:model='stat.customer_adresse'
                                    @disabled($hasItem)></textarea>
                            </div>
                            <div class="col-12" wire:ignore>
                                <label for="" class="form-label">Date du paiement :</label>
                                <div id="invoiceDueDateFlatpickr" class="js-flatpickr flatpickr-custom"
                                    data-hs-flatpickr-options='{
                                        "appendTo": "#invoiceDueDateFlatpickr",
                                        "dateFormat": "d/m/Y",
                                        "wrap": true
                                    }' @disabled($hasItem)>
                                    <input type="text" name="date_limit_paie" class="flatpickr-custom-form-control form-control"
                                        placeholder="Select dates" data-input value="" wire:model='stat.date_limit_paie' @disabled($hasItem)>
                                </div>
                            </div>
                            <hr class="mb-0">
                            <div class="col-12">
                                <label for="" class="form-label">Projet : </label>
                                <select name="" id="" class="form-control form-select"
                                    wire:model='stat.selected_project'>
                                    <option value="" selected disabled>Selectionnez un projet</option>
                                    @foreach ($stat['projects'] as $project)
                                        <option value="{{ $project->id }}">
                                            {{ $project->equipement->nom }} |
                                            {{ $project->certificat->country->name_fr }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="" class="form-label">Quantité : </label>
                                <input class="form-control" type="number" value="1" min="1"
                                    wire:model='stat.qt'>
                            </div>
                            <div class="col-12">
                                <label for="" class="form-label">Montant déjà payé : </label>
                                <input class="form-control" type="number" value="0"
                                    wire:model='stat.post_pay'>
                            </div>

                            <div class="col-12">
                                <button type="button"
                                    class="border border-2 btn btn-white btn-block btn-md w-100 border-primary"
                                    style="border-style: dashed !important; border-color:#377dff !important"
                                    wire:click.prevent='addItem'>
                                    <i class="bi-plus me-1"></i> Ajouter
                                </button>
                            </div>
                        </div>

                        <form action="{{ route('pm.fin.factures.store') }}" id="bill-form" method="POST">
                            @csrf
                            @php
                                $total = 0;
                                $tax = 0;
                                $total_taxe = 0;
                                $total_net = 0;
                                $post_pay = 0;
                                foreach ($selectedStat as $item) {
                                    $total += $item['price'] * $item['qt'];
                                    // $tax += ($total * 16) / 100;
                                    $total_taxe += $total + $tax;
                                    $post_pay += $item['post_pay'];
                                }
                                $total_net = $total_taxe;// - $post_pay;
                            @endphp
                            <input type="hidden" name="carte_id" value="{{ $stat['banck_id'] }}">
                            <input type="hidden" name="customer_id" value="{{ $stat['customer'] }}">
                            <input type="hidden" name="date_limit_paie" value="{{ $stat['date_limit_paie'] }}">
                            <input type="hidden" name="total" value="{{ number_format($total, 2, ',', '.') }}">
                            <input type="hidden" name="tax" value="{{ number_format($total_taxe, 2, ',', '.') }}">
                            <input type="hidden" name="total_net" value="{{ number_format($total_net, 2, ',', '.') }}">
                            <input type="hidden" name="total_net" value="{{ number_format($total_net, 2, ',', '.') }}">
                            <input type="hidden" name="post_pay" value="{{ number_format($post_pay, 2, ',', '.') }}">
                            <input type="hidden" name="data" value="{{ json_encode($selectedStat) }}">
                        </form>
                    </div>
                </div>

                @if (count($selectedStat))
                    <div class="gap-2 mb-2 d-grid gap-sm-3 mb-sm-3">
                        {{-- <a class="btn btn-primary" href="javascript:;">
                            <i class="bi-cursor-fill me-1"></i> Enregistrer
                        </a> --}}
                        <button type="submit" class="btn btn-primary" form="bill-form">
                            <i class="bi-save me-1"></i> Enregistrer
                        </button>

                        <a class="btn btn-white" href="javascript:;" onclick="printDiv()">
                            <i class="bi-printer me-1"></i> Imprimer
                        </a>
                    </div>

                    {{-- <div class="row gx-3">
                        <div class="mb-2 col-sm mb-sm-0">
                            <div class="d-grid">
                                <a class="btn btn-white" href="javascript:;">
                                    <i class="bi-download me-1"></i> Télécharger
                                </a>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-sm">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-white" form="bill-form">
                                    <i class="bi-save me-1"></i> Enregistrer
                                </button>
                            </div>
                        </div>
                        <!-- End Col -->
                    </div> --}}
                    <!-- End Row -->
                @endif

            </div>
        </div>
    </div>

    <div class="mb-5 col-lg-8 mb-lg-0">

        <!-- Card -->
        <div class="card card-lg">
            <!-- Body -->
            <div class="card-body" id="to_print">

                <div class="bg-white d-none position-absolute d-flex justify-content-center"
                    style="left: 0;right: 0;top: 0;bottom: 0;z-index: 1;" wire:loading.class.remove='d-none'
                    wire:target='addItem, removeItem'>
                    <div class="m-auto text-center">
                        <div class="spinner-border text-primary">
                            <span class="sr-only"></span>
                        </div>
                    </div>
                </div>

                <div class="d-block d-md-flex justify-content-md-between">
                    <div class="col-md-5">
                        <!-- Logo -->
                        <img id="logoImg"
                            class="mb-2 mx-md-0 avatar avatar-xl avatar-4x3 avatar-centered avatar-md-start"
                            src="{{ asset('assets/svg/logos/logo.png') }}" alt="Image Description"
                            data-hs-theme-appearance="default">
                        {{-- <img id="logoImg" class="mb-2 avatar avatar-xl avatar-4x3 avatar-centere"
                            src="{{ asset('assets/svg/logos/logo-light.svg') }}" alt="Image Description"
                            data-hs-theme-appearance="dark"> --}}

                        <div class="mt-4 text-center text-md-start" style="font-size: 12px">
                            <h6>44 Boulevard Sendwe, Matonge/Kalamu</h6>
                            <p class="pb-0 mb-1">
                                RCCM : CD KIN/RCCM/14-B-3472,<br>IDNAT : 01-610-N86071M
                            </p>
                            <p class="pb-0 mb-1">
                                TEL : +243858508022
                            </p>
                            <p class="pb-0 mb-1">
                                E-Mail : info@conformitech.net
                            </p>
                            <a href="http://www.conformitech.net">www.conformitech.net</a>
                        </div>

                        {{-- <span class="d-block">Browse your file here</span> --}}

                        {{-- <input type="file" class="js-file-attach form-check-input" id="logoUploader"
                                data-hs-file-attach-options='{
                                    "textTarget": "#logoImg",
                                    "mode": "image",
                                    "targetAttr": "src",
                                    "allowTypes": [".png", ".jpeg", ".jpg"]
                                }'> --}}
                        {{-- </label> --}}
                        <!-- End Logo -->
                    </div>
                    <!-- End Col -->

                    <div class="col-md-5 align-self-md-start text-md-end">
                        <h2 class="text-end me-4 text-success">FACTURE</h2>
                        <!-- Form -->
                        <div class="mt-3" style="font-size: 12px">
                            <dl class="mb-0 d-flex justify-content-between align-items-center">
                                <dt class="col-md text-sm-end mb-sm-0">Facture N° :</dt>
                                <dd class="p-0 mb-0 border ms-1 col-md-auto border-bottom-0">
                                    <span class="p-1 text-center d-block"
                                        style="width: 110px">{{ $stat['num_facture'] }}</span>
                                </dd>
                            </dl>

                            <dl class="mb-0 d-flex justify-content-between align-items-center">
                                <dt class="col-md text-sm-end mb-sm-0">Date de la facture :</dt>
                                <dd class="p-0 mb-0 border ms-1 col-md-auto border-bottom-0">
                                    <span class="p-1 text-center d-block"
                                        style="width: 110px">{{ $stat['date_facute'] }}</span>
                                </dd>
                            </dl>

                            <dl class="mb-0 d-flex justify-content-between align-items-center">
                                <dt class="col-md text-sm-end mb-sm-0">ID du Client :</dt>
                                <dd class="p-0 mb-0 border ms-1 col-md-auto border-bottom-0">
                                    <span class="p-1 text-center d-block" style="width: 110px">
                                        @if (isset($selectedStat[0]))
                                            {{ $selectedStat[0]['client_id'] == '' ? '####' : $selectedStat[0]['client_id'] }}
                                        @else
                                            ####
                                        @endif
                                    </span>
                                </dd>
                            </dl>

                            <dl class="d-flex justify-content-between align-items-center">
                                <dt class="col-md text-sm-end mb-sm-0">Date du payement :</dt>
                                <dd class="p-0 mb-0 border ms-1 col-md-auto">
                                    <span class="p-1 text-center d-block" style="width: 110px">
                                        @if (isset($selectedStat[0]))
                                            {{ $selectedStat[0]['date_limit_paie'] == '' ? '####' : $selectedStat[0]['date_limit_paie'] }}
                                        @else
                                            ####
                                        @endif
                                    </span>
                                </dd>
                            </dl>
                        </div>
                        <!-- End Form -->
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->

                <hr class="my-5">

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <!-- Form -->
                        <div class="mb-4">
                            <label for="" class="form-label">Facturé à :</label><br>
                            <small>
                                {!! isset($selectedStat[0]) ? $selectedStat[0]['client_adresse'] : '' !!}
                            </small>
                        </div>
                        <!-- End Form -->
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->

                <div class="table-responsive js-add-fiel">
                    <!-- Title -->
                    <div class="mb-0">
                        <div class="mx-0 row flex-nowrap" style="width: 97%">
                            <div class="p-2 border ps-3 col-9 col-sm-5 bg-soft-primary">
                                <h6 class="mb-0 card-title text-cap">Description</h6>
                            </div>
                            <!-- End Col -->

                            <div class="p-2 border col-4 col-sm-2 bg-soft-primary border-start-0">
                                <h6 class="mb-0 card-title text-cap">Prix</h6>
                            </div>
                            <!-- End Col -->

                            <div class="p-2 border col-7 col-sm-3 bg-soft-primary border-start-0">
                                <h6 class="mb-0 card-title text-cap">Quantité</h6>
                            </div>
                            <!-- End Col -->

                            <div class="p-2 border col-4 col-sm-2 bg-soft-primary border-start-0">
                                <h6 class="mb-0 card-title text-cap">Montant</h6>
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->
                    </div>
                    <!-- End Title -->

                    @forelse ($selectedStat as $key => $item)
                        <!-- Content -->
                        <div class="mx-0 row flex-nowrap" style="width: 97%">
                            <div class="py-2 border border-top-0 col-9 col-md-5">
                                <small>{!! $item['project'] !!}</small>
                            </div>
                            <!-- End Col -->

                            <div class="py-2 col-4 col-sm col-md-2 border-end border-bottom">
                                <!-- Input Group -->
                                <small>
                                    {{ $item['price'] }}$
                                </small>
                                <!-- End Input Group -->
                            </div>
                            <!-- End Col -->

                            <div class="py-2 col-7 col-sm-auto col-md-3 border-end border-bottom">
                                <small>{{ $item['qt'] }}</small>
                            </div>
                            <!-- End Col -->

                            <div class="py-2 col-4 col-md-2 border-end border-bottom">
                                <small>{{ $item['price'] * $item['qt'] }} $</small>
                            </div>
                            <!-- End Col -->
                            <a class="w-auto px-1 pt-2 d-inline-block position-static" href="javascript:;"
                                data-toggle="tooltip" data-placement="top" title="Supprimer"
                                wire:click='removeItem({{ $key }})'>
                                <i class="bi-x-lg text-danger"></i>
                            </a>
                        </div>
                        <!-- End Content -->
                    @empty
                        <div class="mx-0 row flex-nowrap" style="width: 97%">
                            <div class="py-2 text-center col-12 border-start border-end border-bottom">
                                <small>Aucun element ajouté</small>
                            </div>
                            <!-- End Col -->
                        </div>
                    @endforelse

                </div>

                <hr class="my-5">

                <div class="mb-3 row justify-content-md-end">
                    <!-- Form -->
                    <div class="col-md-7 align-self-end">
                        <table class="table table-bordered">
                            <thead class="bg-soft-primary">
                                <th>
                                    <label for="invoiceNotesLabel" class="p-0 mb-0 form-label">Autres
                                        commentaires</label>
                                </th>
                            </thead>
                            <tbody>
                                <td class="">
                                    <small style="font-size: 11px">
                                        1. Le paiement total est attendu dans 15 jours<br>
                                        2. Veillez inclure le numérro de la facture dans le check<br>

                                    </small>
                                </td>
                            </tbody>
                        </table>
                    </div>
                    <!-- End Form -->
                    @php
                        $total = 0;
                        $taxe = 0;
                        $total_taxe = 0;
                        $total_net = 0;
                        $post_pay = 0;
                        foreach ($selectedStat as $item) {
                            $total += $item['price'] * $item['qt'];
                            // $taxe += ($total * 16) / 100;
                            $total_taxe += $total + $taxe;
                            $post_pay += $item['post_pay'];
                            $total_net = $total_taxe; //- $post_pay;
                        }
                    @endphp
                    <div class="mb-5 col-md-5 ps-0">
                        <dl class="row text-md-end" style="font-size: 12px">
                            <dt class="col-md-6">Sous-total:</dt>
                            <dd class="col-md-6">{{ number_format($total, 2, ',', '.') }}$</dd>
                            <dt class="mb-1 col-md-6 mb-md-0">Taxe:</dt>
                            <dd class="col-md-6">
                                {{ number_format($taxe, 2, ',', '.') }}$
                            </dd>
                            <dt class="col-md-6">Montant taxe:</dt>
                            <dd class="col-md-6">{{ number_format($total_taxe, 2, ',', '.') }}$</dd>
                            <dt class="mb-1 col-md-6 mb-md-0">Montant payé:</dt>
                            <dd class="col-md-6">
                                {{ number_format($post_pay, 2, ',', '.') }}$
                            </dd>
                            {{-- <dt class="border-3 border-success col-12 border-bottom ms-5 w-85"></dt> --}}
                            <dt class="p-0 col-12">
                                <div class="p-2 border-3 border-success border-top bg-soft-success d-flex ms-auto w-85 justify-content-between">
                                    <h4 class="mt-1 mb-0 text-black-50 ">Total :</h4>
                                    <h4 class="mt-1 mb-0 text-black-50 ">
                                        {{ number_format($total_net, 2, ',', '.') }}$
                                    </h4>
                                </div>
                            </dt>
                        </dl>
                        <!-- End Row -->
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->

                <p class="mt-5 mb-2 text-center fs-6">
                    Si vous avez des questions à propos de cette facture, veillez contacter <br>Elik6, +243858508022,
                    info@conformitech.net
                </p>
                <h5 class="text-center">Heureux de faire affaire avec vous</h5>
            </div>
            <!-- End Body -->
        </div>
        <!-- End Card -->

        <!-- Sticky Block End Point -->
        <div id="stickyBlockEndPoint"></div>
    </div>
</div>

@push('livewire_script')
    <script>
        function printDiv() {
            var divToPrint = document.getElementById('to_print');
            var popupWin = window.open('', '_blank', 'width=900,height=800');
            var head = document.querySelector('head').innerHTML;
            var my_document = '<html><head>' + head + '</head><body>' + divToPrint.innerHTML + '</body></html>';
            popupWin.document.open();
            popupWin.document.write(my_document);
            popupWin.document.close();
            popupWin.print();
            popupWin.close();
        }
    </script>
@endpush
