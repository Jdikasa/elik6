<form class="row g-3 justify-content-center" method="POST" action="{{ route('pm.projects.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="col-12 col-lg-8">
        <div class="card h-100">
            <div class="card-body">
                <div class="row g-3">

                    @can('definir le type du projet')
                        <div class="col-12">
                            <label class="form-label">Type de projet <sup class="text-danger">*</sup></label>
                            <div class="tom-select-custom" wire:ignore>
                                <select class="js-select form-select form-select-sm" autocomplete="off"
                                    data-hs-tom-select-options='{
                                        "placeholder": "Selectionnez un type..."
                                    }' name="type" required>
                                    <option value="">Selectionnez un type...</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                </select>
                            </div>
                        </div>
                    @endcan

                    <div class="col-12">
                        <label class="form-label">Client <sup class="text-danger">*</sup></label>
                        <div class="tom-select-custom" wire:ignore>
                            <select class="js-select form-select form-select-sm" autocomplete="off"
                                data-hs-tom-select-options='{
                                    "placeholder": "Selectionnez un client..."
                                }' name="client_id" required>
                                <option value="">Select a person...</option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}">
                                        {{ $client->societe->nom }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Pays <sup class="text-danger">*</sup></label>
                        <div class="tom-select-custom" wire:ignore>
                            <select class="js-select form-select form-select-sm" autocomplete="off"
                                data-hs-tom-select-options='{
                                    "placeholder": "Selectionnez un pays..."
                                }' name="certificat_id" required wire:model='certificat'>
                                <option value="" selected disabled>Choisir le pays</option>
                                @foreach ($certificats as $certificat)
                                    <option value="{{ $certificat->id }}">
                                        {{ $certificat->country->name ?? $certificat->country->name_en }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Equipement <sup class="text-danger">*</sup></label>
                        <div class="tom-select-custom" wire:ignore>
                            <select class="js-select form-select form-select-sm" autocomplete="off"
                                data-hs-tom-select-options='{
                                    "placeholder": "Selectionnez un equipement..."
                                }' name="product_id" required>

                                <option value="" selected disabled>Choisir un equipement</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">
                                        {{ $product->nom }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Partenaire <sup class="text-danger">*</sup></label>
                        <div class="tom-select-custom">
                            <select class="js-select form-select form-select-sm" autocomplete="off"
                                data-hs-tom-select-options='{
                                    "placeholder": "Selectionnez un pays..."
                                }' name="partenaire_id" wire:model='partenaire'>
                                <option value="" selected disabled>Choisir le partenaire</option>
                                @foreach ($partenaires as $partenaire)
                                    <option value="{{ $partenaire->id }}">
                                        {{ $partenaire->societe->nom }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4">
                        <label class="form-label">Date de reception <sup class="text-danger">*</sup></label>
                        {{-- <input type="text" class="form-control datepicker" name="date_reception" placeholder="aaaa-mm-dd"> --}}
                        <div id="invoiceDueDateFlatpickr" class="js-flatpickr flatpickr-custom"
                            data-hs-flatpickr-options='{
                                "appendTo": "#invoiceDueDateFlatpickr",
                                "dateFormat": "d/m/Y",
                                "wrap": true
                            }' wire:ignore>
                            <input type="text" name="date_reception" class="flatpickr-custom-form-control form-control"
                                placeholder="Date de reception" data-input value="">
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <label class="form-label">Date de soumission <sup class="text-danger">*</sup></label>
                        <div id="dateSoumission" class="js-flatpickr flatpickr-custom"
                            data-hs-flatpickr-options='{
                                "appendTo": "#dateSoumission",
                                "dateFormat": "d/m/Y",
                                "wrap": true
                            }' wire:ignore>
                            <input type="text" class="flatpickr-custom-form-control form-control" name="date_soumission" wire:model='date_soumission'
                                placeholder="Date de soumission" data-input value="">
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <label class="form-label">Date de cloture <sup class="text-danger">*</sup></label>
                        <div id="date_cloture" class="js-flatpickr flatpickr-custom"
                            data-hs-flatpickr-options='{
                                "appendTo": "#date_cloture",
                                "dateFormat": "d/m/Y",
                                "wrap": true
                            }'>
                            <input type="text" id="date_cloture_id" class="form-control datepicker" name="date_cloture" value="{{ $date_cloture }}"
                                data-input placeholder="Date de cloture">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label">Duré du projet (semaine) <sup class="text-danger">*</sup></label>
                        <input type="number" class="form-control" name="duree" placeholder="Duré du projet"
                            min="0" value="{{ $duree }}">
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label">Date du prochain Mise à jour <sup class="text-danger">*</sup></label>
                        <div id="update_date" class="js-flatpickr flatpickr-custom"
                            data-hs-flatpickr-options='{
                                "appendTo": "#update_date",
                                "dateFormat": "d/m/Y",
                                "wrap": true
                            }'>
                            <input type="text" id="update_date_id" class="form-control datepicker" name="update_date"
                                data-input value="{{ $date_maj }}" placeholder="Date du prochain Mise à jour">
                        </div>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Description <small>(optionnel)</small></label>
                        <textarea class="form-control" name="description" placeholder="Description" rows="4" cols="4"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-4">
        <div class="card mb-3">
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-12">
                        <h5>Mis à jour</h5>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Etape du projet <sup class="text-danger">*</sup></label>
                        <div class="tom-select-custom">
                            <select class="js-select form-select form-select-sm" autocomplete="off"
                                data-hs-tom-select-options='{
                                    "placeholder": "Selectionnez une etape..."
                                }' name="note_etape_id" wire:model='noteetape' required>
                                <option value="" selected disabled>Choisir l'etape</option>
                                @foreach ($noteEtapes as $noteEtape)
                                    <option value="{{ $noteEtape->id }}">
                                        {{ $noteEtape->titre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Statut du projet <sup class="text-danger">*</sup></label>
                        <div class="tom-select-custom">
                            <select class="js-select form-select form-select-sm" autocomplete="off"
                                data-hs-tom-select-options='{
                                    "placeholder": "Selectionnez un statut..."
                                }' name="note_statut_id" required>

                                <option value="" selected disabled>Choisir le statut</option>
                                @foreach ($noteStatuts as $noteStatut)
                                    <option value="{{ $noteStatut->id }}">
                                        {{ $noteStatut->titre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Note</label>
                        <textarea class="form-control" name="maj_text" placeholder="Note" rows="4" cols="4"></textarea>
                    </div>

                </div>
                <!--end row-->
            </div>
        </div>

        <div class="card mb-0">
            <div class="card-body">
                <div class="row g-3">

                    <div class="col-12">
                        <table class="table">
                            <thead>
                                <th colspan="2">
                                    Detail du projet
                                </th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Pays </td>
                                    <td class="text-end text-truncate pays">{{ $pays }}</td>
                                </tr>
                                <tr>
                                    <td>Prix du projet </td>
                                    <td class="text-end prix_pays">{{ $total_cost }}$</td>
                                </tr>
                                <tr>
                                    <td>Prix du partenaire </td>
                                    <td class="text-end prix_part">{{ $partener_cost }}$</td>
                                </tr>
                                <tr>
                                    <td>Marge </td>
                                    <td class="text-end prix_marge">{{ $total_cost - $partener_cost }}$</td>
                                </tr>
                            </tbody>

                        </table>
                    </div>

                </div>
                <!--end row-->
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-12 text-end">
                        <button type="reset" class="btn btn-danger rounded-pill px-4">Effacer</button>
                        <button type="submit" class="btn btn-primary rounded-pill ms-3 px-4">Enregistrer</button>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>

</form>

@push('scripts')

    <script>

        // document.addEventListener('livewire:load', function () {

        //     HSCore.components.HSTomSelect.init('.js-select');

        // });

        $(document).ready(function () {
            $('select[name=certificat_id]').on('change', function (e) {
                var data = $(this).val();
                @this.set('certificat', data);
            });

            $('input[name=date_soumission]').on('change', function (e) {
                $('.js-flatpickr .flatpickr-calendar.animate').remove();
                var data = $(this).val();
                @this.set('date_soumission', data);

                HSCore.components.HSFlatpickr.defaults.dateFormat = 'd/m/Y';
                HSCore.components.HSFlatpickr.init('.js-flatpickr')
                HSCore.components.HSFlatpickr.init('#date_cloture_id');
                HSCore.components.HSFlatpickr.init('#update_date_id');
            });

        });
    </script>

@endpush
