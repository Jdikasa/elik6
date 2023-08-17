@extends('pm.layouts.master')

@section('css')
@endsection

@section('titre', 'ELIK6 - edition d\'un partenaire')

@section('body')
    <div class="page-header card card-lg">
        <div class="text-star">
            <h1>Partenaires</h1>
            <div class="mt-2 page-breadcrumb d-none d-sm-flex align-items-center">
                <div class="">
                    <nav aria-label="breadcrumb">
                        <ol class="p-0 mb-0 breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('pm.home') }}">
                                    <i class="bi bi-house-fill"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('pm.partenaires.index') }}">Partenaires</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Editer un partenaire</li>
                        </ol>
                    </nav>
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
        <form class="row g-3 justify-content-center" method="POST"
            action="{{ route('pm.partenaires.update', $partenaire) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label">Societé <sup class="text-danger">*</sup></label>
                                        <div class="tom-select-custom">
                                            <select class="js-select form-select form-select-sm" autocomplete="off"
                                                data-hs-tom-select-options='{
                                                    "create": true,
                                                    "searchInDropdown": false
                                                }'
                                                name="societe_id">
                                                <option value="">Selectionnez une societe...</option>
                                                @foreach ($societes as $societe)
                                                    <option value="{{ $societe->id }}" @selected($partenaire->societe->id == $societe->id)>
                                                        {{ $societe->nom }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Non de la personne contact <sup
                                                class="text-danger">*</sup></label>
                                        <input type="text" class="form-control" name="nom"
                                            placeholder="Non de la personne contact" value="{{ $partenaire->nom }}"
                                            required>
                                    </div>

                                    <div class="col-12 col-lg-6">
                                        <label class="form-label">Téléphone <sup class="text-danger">*</sup></label>
                                        <input type="text" class="form-control" name="phone" placeholder="Téléphone"
                                            required value="{{ $partenaire->phone }}">
                                    </div>

                                    <div class="col-12 col-lg-6">
                                        <label class="form-label">Email <sup class="text-danger">*</sup></label>
                                        <input type="text" class="form-control" name="email" placeholder="Email"
                                            required value="{{ $partenaire->email }}">
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Images <small>(optionnel)</small></label>
                                        <input class="form-control" type="file" name="image">
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Description <small>(optionnel)</small></label>
                                        <textarea class="form-control" name="description" placeholder="Description" rows="4" cols="4">{{ $partenaire->description }}</textarea>
                                    </div>

                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <fieldset class="p-3 border rounded">
                                            <h5 class="mb-4">Paiement</h5>

                                            <label class="form-label">Mode de paiement <sup
                                                    class="text-danger">*</sup></label>
                                            <div class="mb-3 tom-select-custom">
                                                <select class="js-select form-select" name="mode_id" id="country_id"
                                                    autocomplete="off"
                                                    data-hs-tom-select-options='{
                                                        "placeholder": "Selectionez un pays"
                                                    }'>
                                                    <option value="">Selectionez un pays</option>
                                                    @foreach ($modePaiements as $modePaiement)
                                                        <option value="{{ $modePaiement->id }}"
                                                            @selected($partenaire->mode->id == $modePaiement->id)>
                                                            {{ $modePaiement->mode }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            @php
                                                $paiement_attributs = json_decode($partenaire->paiement_attributs);
                                            @endphp

                                            <div class="mode-bank @if ($partenaire->mode->id != 1) d-none @endif">
                                                <div class="pb-3 mx-0 mt-3 border rounded row g-3">
                                                    <div class="col-12 col-lg-6">
                                                        <label class="form-label" for="nom_bank">Nom de la bank <sup
                                                                class="text-danger">*</sup></label>
                                                        <input type="text" class="form-control" name="nom_bank"
                                                            placeholder="Nom de la bank"
                                                            value="{{ $paiement_attributs->nom_bank ?? '' }}"
                                                            id="nom_bank">
                                                    </div>
                                                    <div class="col-12 col-lg-6">
                                                        <label class="form-label">Code swift <sup
                                                                class="text-danger">*</sup></label>
                                                        <input type="text" class="form-control" name="code_swift"
                                                            placeholder="Code swift"
                                                            value="{{ $paiement_attributs->code_swift ?? '' }}">
                                                    </div>
                                                    <div class="col-12 col-lg-6">
                                                        <label class="form-label">Numerro du compte <sup
                                                                class="text-danger">*</sup></label>
                                                        <input type="text" class="form-control" name="num_compte"
                                                            placeholder="Numerro du compte"
                                                            value="{{ $paiement_attributs->num_compte ?? '' }}">
                                                    </div>
                                                    <div class="col-12 col-lg-6">
                                                        <label class="form-label">Nom du beneficiaire <sup
                                                                class="text-danger">*</sup></label>
                                                        <input type="text" class="form-control"
                                                            name="nom_beneficiaire_1" placeholder="Nom du beneficiaire"
                                                            value="{{ $paiement_attributs->nom_beneficiaire ?? '' }}">
                                                    </div>
                                                    <div class="col-12">
                                                        <label class="form-label">Adresse de la bank <sup
                                                                class="text-danger">*</sup></label>
                                                        <textarea class="form-control" name="adresse_bank" placeholder="Adresse de la banc" rows="2" cols="4">{{ $paiement_attributs->adresse_bank ?? '' }}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mode-agence @if ($partenaire->mode->id != 2) d-none @endif">
                                                <div class="pb-3 mx-0 mt-3 border rounded row g-3">
                                                    <div class="col-12 col-lg-6">
                                                        <label class="form-label">Nom du beneficiaire <sup
                                                                class="text-danger">*</sup></label>
                                                        <input type="text" class="form-control"
                                                            name="nom_beneficiaire_2" placeholder="Nom du beneficiaire"
                                                            value="{{ $paiement_attributs->nom_beneficiaire ?? '' }}">
                                                    </div>
                                                    <div class="col-12 col-lg-6">
                                                        <label class="form-label">Téléphone du beneficiaire <sup
                                                                class="text-danger">*</sup></label>
                                                        <input type="text" class="form-control"
                                                            name="phone_beneficiaire"
                                                            placeholder="Téléphone du beneficiaire"
                                                            value="{{ $paiement_attributs->phone_beneficiaire ?? '' }}">
                                                    </div>
                                                </div>
                                            </div>

                                        </fieldset>
                                    </div>

                                    <div class="col-12">
                                        <fieldset class="p-3 border rounded modalite">
                                            <h5>Modalité</h5>
                                            @if ($partenaire->modalites->count())
                                                @foreach ($partenaire->modalites as $modalite)
                                                    <div class="element position-relative">
                                                        <hr class="@if (!$loop->first) d-none @endif">
                                                        <div class="pb-3 mx-0 mt-3 border rounded row g-3">
                                                            <div class="col-12 col-lg-6">
                                                                <input type="hidden" name="id_modalite[]"
                                                                    value="{{ $modalite->id }}">
                                                                <label class="form-label">Pays <sup
                                                                        class="text-danger">*</sup></label>
                                                                <div class="mb-3 tom-select-custom">
                                                                    <select class="js-select form-select"
                                                                        name="mod_country_id[]" autocomplete="off"
                                                                        data-hs-tom-select-options='{
                                                                            "placeholder": "Selectionez un pays"
                                                                        }'>
                                                                        <option value="">Selectionez un pays</option>
                                                                        @foreach ($countries as $country)
                                                                            <option value="{{ $country->id }}"
                                                                                @selected($modalite->country->id == $country->id)
                                                                                data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle me-2" src="{{ asset('assets/vendor/flag-icon-css/flags/1x1/' . Str::lower($country->code) . '.svg') }}" alt="{{ $country->name_fr ?? $country->name_en }}" /><span class="text-truncate">{{ $country->name_fr ?? $country->name_en }}</span></span>'>
                                                                                {{ $country->name_fr ?? $country->name_en }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-lg-6">
                                                                <label class="form-label">
                                                                    Prix <sup class="text-danger">*</sup>
                                                                </label>
                                                                <input type="text" class="form-control"
                                                                    name="mod_prix[]" placeholder="Prix"
                                                                    value="{{ $modalite->prix }}" required>
                                                            </div>
                                                            <div class="col-12 col-lg-6">
                                                                <label class="form-label">Prix de renouvellement <sup
                                                                        class="text-danger">*</sup></label>
                                                                <input type="text" class="form-control"
                                                                    name="mod_renewal_price[]"
                                                                    placeholder="Prix de renouvellement"value="{{ $modalite->renewal_price }}"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <a href="javascript:void(0)"
                                                            class="position-absolute btn btn-close d-none"
                                                            style="right:5px; top:35px; font-size:10px"
                                                            onclick="removeThisElement(this)"></a>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="element position-relative">
                                                    <hr class="d-none">
                                                    <div class="pb-3 mx-0 mt-3 border rounded row g-3">
                                                        <div class="col-12 col-lg-6">
                                                            <input type="hidden" name="id_modalite[]" value="0">
                                                            <label class="form-label">Pays <sup
                                                                    class="text-danger">*</sup></label>
                                                            {{-- <select class="form-select select2" name="mod_country_id[]" required
                                                                data-placeholder="Choisir un pays" data-tags="false"
                                                                data-get-items-route="{{ route('pm.partenaires.relation') }}" data-id=""
                                                                data-related-model="Country" data-label="name" data-method="edit">
                                                            </select> --}}
                                                            <div class="mb-3 tom-select-custom">
                                                                <select class="js-select form-select"
                                                                    name="mod_country_id[]" autocomplete="off"
                                                                    data-hs-tom-select-options='{
                                                                        "placeholder": "Selectionez un pays"
                                                                    }'
                                                                    required>
                                                                    <option value="">Selectionez un pays</option>
                                                                    @foreach ($countries as $country)
                                                                        <option value="{{ $country->id }}"
                                                                            data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle me-2" src="{{ asset('assets/vendor/flag-icon-css/flags/1x1/' . Str::lower($country->code) . '.svg') }}" alt="{{ $country->name_fr ?? $country->name_en }}" /><span class="text-truncate">{{ $country->name_fr ?? $country->name_en }}</span></span>'>
                                                                            {{ $country->name_fr ?? $country->name_en }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg-6">
                                                            <label class="form-label">Prix <sup
                                                                    class="text-danger">*</sup></label>
                                                            <input type="text" class="form-control" name="mod_prix[]"
                                                                placeholder="Prix" required>
                                                        </div>
                                                    </div>
                                                    <a href="javascript:void(0)"
                                                        class="position-absolute btn btn-close d-none"
                                                        style="right:5px; top:35px; font-size:10px"
                                                        onclick="removeThisElement(this)"></a>
                                                </div>
                                            @endif


                                        </fieldset>
                                        <a href="javascript:void(0)" class="btn btn-link" id="add-contact">
                                            Ajouter une modalité
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-3 col-12 text-end">
                                <button type="submit" class="btn btn-success">Enregistrer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!--end row-->
@endsection

@section('script-vendor')
@endsection

@section('javascript')
    <script>
        (function() {
            // INITIALIZATION OF DROPZONE
            // =======================================================
            let fileInput = document.querySelector('input[name=autre_doc]');
            const dataTransfer = new DataTransfer();
            HSCore.components.HSDropzone.init('.js-dropzone', {
                paramName: "autre_doc",
                success: function(file, response) {
                    dataTransfer.items.add(file);
                    fileInput.files = dataTransfer.files;
                    // console.log(fileInput.files);
                }
            })


            // INITIALIZATION OF SELECT
            // =======================================================
            // HSCore.components.HSTomSelect.init('.js-select')


            // INITIALIZATION OF ADD FIELD
            // =======================================================
            new HSAddField('.js-add-field', {
                addedField: field => {
                    HSCore.components.HSTomSelect.init(field.querySelector('.js-select-dynamic'))
                    HSCore.components.HSMask.init(field.querySelector('.js-input-mask'))
                    var input = field.querySelectorAll('input')
                    var select = field.querySelectorAll('select')

                    $(input).each(function() {
                        $(this).attr('name', $(this).attr('data-name'))
                    });
                    $(select).each(function() {
                        $(this).attr('name', $(this).attr('data-name'))
                    });
                    // console.log($(input));
                }
            })


            // INITIALIZATION OF INPUT MASK
            // =======================================================
            HSCore.components.HSMask.init('.js-input-mask')

            // INITIALIZATION OF FILE ATTACH
            // =======================================================
            new HSFileAttach('.js-file-attach')

            // INITIALIZATION OF QUILLJS EDITOR
            // =======================================================
            HSCore.components.HSQuill.init('.js-quill')
        })();
    </script>
    <script>
        $(document).ready(function() {

            var btnAdd = $('#add-contact');
            var parent = $('fieldset.modalite');
            var element = $('.element');

            btnAdd.on('click', function() {
                var clone = element.clone();
                clone.find('hr').removeClass('d-none');
                clone.find('.btn-close').removeClass('d-none');
                parent.append(clone);
                parent.find('div.ts-wrapper').last().remove();
                clone.find('input').val('');

                var input = clone.find('select').last();
                input.val('');
                input.addClass('js-select-' + parent.find('select').length);
                input.removeClass("tomselected");
                input.removeClass("ts-hidden-accessible");
                input.removeAttr('data-select2-id');
                input.removeAttr('tabindex');
                input.removeAttr('aria-hidden');
                HSCore.components.HSTomSelect.init('.js-select-' + parent.find('select').length);
            });

            $('select[name=mode_id]').on('change', function() {
                if ($(this).val() == 1) {
                    $('.mode-bank').removeClass('d-none');
                    $('.mode-bank').find('input').attr('required', true);
                    $('.mode-agence').addClass('d-none');
                    $('.mode-agence').find('input').attr('required', false);
                } else {
                    $('.mode-agence').removeClass('d-none');
                    $('.mode-agence').find('input').attr('required', true);
                    $('.mode-bank').addClass('d-none');
                    $('.mode-bank').find('input').attr('required', false);
                }
            });

        });

        function removeThisElement(btn) {
            $(btn).parent().remove();
        }
    </script>
@endsection
