@extends('pm.layouts.master')

@section('css')
@endsection

@section('titre', 'ELIK6 - Nouvel pays')

@section('body')
    <div class="content container-fluid">
        <div class="page-header card card-lg">
            <div class="text-star">
                <h1>Pays</h1>
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
                                    <a href="{{ route('pm.countries.index') }}">Pays</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Ajouter un pays</li>
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

        <form class="row g-3 justify-content-center" method="POST"
            action="{{ route('pm.countries.update', ['country' => $certificat]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-12 col-lg-8">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row g-3">

                            <div class="col-12">
                                <label class="form-label">Pays <sup class="text-danger">*</sup></label>
                                <!-- Select -->
                                <div class="tom-select-custom">
                                    <select class="js-select form-select form-select-sm" autocomplete="off"
                                        data-hs-tom-select-options='{
                                            "placeholder": "Choisir le pays"
                                        }' name="country_id" required>
                                        <option value="">Choisir le pays</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}" @selected($certificat->country_id == $country->id)>
                                                {{ $country->name_fr }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- End Select -->
                            </div>

                            <div class="col-12">
                                <label class="form-label">Type d'homologation <sup class="text-danger">*</sup></label>
                                <!-- Select -->
                                <div class="tom-select-custom">
                                    <select class="js-select form-select form-select-sm" autocomplete="off"
                                        data-hs-tom-select-options='{
                                            "placeholder": "Choisir le Type homologation"
                                        }' name="types_homologation_id" required>
                                        <option value="">Choisir le Type d'homologation</option>
                                        @foreach ($typesHomologations as $typesHomologation)
                                            <option value="{{ $typesHomologation->id }}" @selected($typesHomologation->id == $certificat->types_homologation_id)>
                                                {{ $typesHomologation->nom }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- End Select -->
                            </div>

                            <div class="col-12">
                                <label class="form-label">Temps d'execution <sup class="text-danger">*</sup></label>
                                <!-- Select -->
                                <div class="tom-select-custom">
                                    <select class="js-select form-select form-select-sm" autocomplete="off"
                                        data-hs-tom-select-options='{
                                            "placeholder": "Choisir le Temps execution"
                                        }' name="lead_time_id" required>
                                        <option value="">Choisir le Temps d'execution</option>
                                        @foreach ($leadTimes as $leadTime)
                                            <option value="{{ $leadTime->id }}" @selected($leadTime->id == $certificat->lead_time_id)>
                                                {{ $leadTime->lead_time }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- End Select -->
                            </div>

                            <div class="col-12">
                                <label class="form-label">Echantillion requis ? <sup class="text-danger">*</sup></label>
                                <div class="form-check form-switch">
                                    <input type="checkbox" id="yes" name="sample_requirements"
                                        class="form-check-input rounded-pill"
                                        value="{{ $certificat->sample_requirements }}"
                                        {{ $certificat->sample_requirements ? 'checked' : '' }} />
                                    <label class="form-check-label"
                                        for="yes">{{ __($certificat->sample_requirements ? 'Oui' : 'Nom') }}</label>
                                </div>
                            </div>

                            <div class="col-12 mt-0" {!! !$certificat->sample_requirements ? 'style="display: none;"' : '' !!}>
                                <div class="element">
                                    <div class="row border pb-3 mt-3 rounded mx-0 g-3">
                                        <div class="col-12 col-lg-6">
                                            <label class="form-label">Type d'échantillon <sup class="text-danger">*</sup></label>
                                            <!-- Select -->
                                            <div class="tom-select-custom">
                                                <select class="js-select form-select form-select-sm" autocomplete="off"
                                                    data-hs-tom-select-options='{
                                                        "placeholder": "Choisir le Type échantillon"
                                                    }' name="types_echantillon_id">
                                                    <option value="">Choisir le Type d'échantillon</option>
                                                    @foreach ($typesEchantillons as $typesEchantillon)
                                                        <option value="{{ $typesEchantillon->id }}" @selected($typesEchantillon->id == $certificat->types_echantillon_id)>
                                                            {{ $typesEchantillon->nom }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <!-- End Select -->
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <label class="form-label">Nombre d'échantillon <sup
                                                    class="text-danger">*</sup></label>
                                            <input type="number" class="form-control" name="nombre_echantillon"
                                                placeholder="Nombre d'échantillon" min="1"
                                                value="{{ $certificat->nombre_echantillon }}" {!! !$certificat->sample_requirements ? 'style="display: none;"' : '' !!}>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Validité <sup class="text-danger">*</sup></label>
                                <div class="form-check form-switch">
                                    <input type="checkbox" id="yes" name="validite"
                                        class="form-check-input rounded-pill"
                                        value="{{ $certificat->validite == 'A vie' }}"
                                        {{ $certificat->validite == 'A vie' ? 'checked' : '' }} />
                                    <label class="form-check-label" for="yes">{{ __('A vie') }}</label>
                                </div>
                            </div>

                            <div class="col-12 mt-0" {!! $certificat->validite == 'A vie' ? 'style="display: none;"' : '' !!}>
                                <div class="element2 validite">
                                    <div class="row border pb-3 mt-3 rounded mx-0 g-3">
                                        <div class="col-12 col-lg-6">
                                            <label class="form-label">Nombre d'année <sup class="text-danger">*</sup></label>
                                            <input type="number" name="nombre_an" id="" class="form-control" placeholder="Nombre d'année" min="1"
                                                min="1" value="{{ $certificat->validite }}" {!! $certificat->validite == 'A vie' ? 'style="display: none;"' : '' !!}>
                                            {{-- <input type="number" class="form-control" name="nombre_an"
                                                placeholder="Nombre d'année" min="1"
                                                value="{{ (int) $certificat->validite }}" {!! $certificat->validite == 'A vie' ? 'style="display: none;"' : '' !!}> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Prix initial <sup class="text-danger">*</sup></label>
                                <input type="number" class="form-control" name="total_cost" placeholder="Prix initial"
                                    min="1" value="{{ $certificat->total_cost }}">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Prix de renouvellement <sup class="text-danger">*</sup></label>
                                <input type="number" class="form-control" name="renewal_price"
                                    placeholder="Prix de renouvellement" min="0"
                                    value="{{ $certificat->renewal_price }}">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Description <small>(optionnel)</small></label>
                                <textarea class="form-control" name="description" placeholder="Description" rows="4" cols="4">{{ $certificat->description }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label">Reglementation <small>(optionnel)</small></label>
                                <input class="form-control" type="file" name="reglementation">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Model de certificat <small>(optionnel)</small></label>
                                <input class="form-control" type="file" name="model_cert">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Formulaire <small>(optionnel)</small></label>
                                <input class="form-control" type="file" name="formulaire">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Autres document <small>(optionnel)</small></label>
                                <input class="form-control" type="file" name="autre_doc" multiple>
                            </div>
                            <hr>
                            <div class="col-12 mb-2">
                                @php
                                    $documets_fields = ['Rapport de test', 'Déclaration de conformité', 'Lettre de representation', 'Data sheet', 'Facture commerciale'];
                                    $documets = json_decode($certificat->documents, true);
                                @endphp
                                <label class="form-label">Documents à fournir <sup class="text-danger">*</sup></label>
                                @foreach ($documets_fields as $key => $documets_field)
                                    <div class="form-check form-switch mb-2">
                                        <input type="checkbox" id="document-{{ $key }}" name="documents[]"
                                            class="form-check-input rounded-pill" value="{{ __($documets_field) }}"
                                            @checked(in_array($documets_field, $documets)) />
                                        <label class="form-check-label"
                                            for="document-{{ $key }}">{{ __($documets_field) }}</label>
                                    </div>
                                @endforeach
                            </div>

                            <div class="col-12 mb-2">
                                <label class="form-label">Procedure <sup class="text-danger">*</sup></label>
                                <div class="form-check form-switch">
                                    <input type="checkbox" id="is_mandatory" name="is_mandatory"
                                        class="form-check-input rounded-pill" value="{{ $certificat->is_mandatory }}"
                                        @checked($certificat->is_mandatory) />
                                    <label class="form-check-label"
                                        for="is_mandatory">{{ __($certificat->is_mandatory ? 'Obligatoire' : 'Volontaire') }}</label>
                                </div>
                            </div>

                            <div class="col-12 mb-2">
                                <label class="form-label">Ettiquetage <sup class="text-danger">*</sup></label>
                                <div class="form-check form-switch">
                                    <input type="checkbox" id="ettiquetage" name="ettiquetage"
                                        class="form-check-input rounded-pill yes-no"
                                        value="{{ $certificat->ettiquetage }}" @checked($certificat->ettiquetage) />
                                    <label class="form-check-label"
                                        for="ettiquetage">{{ __($certificat->ettiquetage ? 'Oui' : 'Non') }}</label>
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <label class="form-label">Representation locale <sup class="text-danger">*</sup></label>
                                <div class="form-check form-switch">
                                    <input type="checkbox" id="local_representation" name="local_representation"
                                        class="form-check-input rounded-pill yes-no"
                                        value="{{ $certificat->local_representation }}" @checked($certificat->local_representation) />
                                    <label class="form-check-label"
                                        for="local_representation">{{ __($certificat->local_representation ? 'Oui' : 'Non') }}</label>
                                </div>
                            </div>

                        </div>
                        <!--end row-->
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="gap-3 d-flex justify-content-end">
                            <button type="reset" class="btn btn-white">Effacer</button>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
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
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('select.select2').each(function() {
                $(this).select2({
                    tags: $(this).data('tags') ? $(this).data('tags') : false,
                    placeholder: $(this).data('placeholder'),
                    language: "fr",
                    createTag: function(params) {
                        var term = $.trim(params.term);

                        if (term === '') {
                            return null;
                        }

                        return {
                            id: term,
                            text: term,
                            newTag: true
                        }
                    },
                    ajax: {
                        url: $(this).data('get-items-route'),
                        data: function(params) {

                            var query = {
                                search: params.term,
                                type: $(this).data('get-items-field'),
                                method: $(this).data('method'),
                                id: $(this).data('id'),
                                page: params.page || 1,
                                model: $(this).data('related-model'),
                                label: $(this).data('label'),
                            }
                            return query;
                        }
                    },
                    maximumSelectionLength: $(this).data('max-selection') ? $(this).data(
                        'max-selection') : null,
                });

                $(this).on('select2:select', function(e) {
                    var data = e.params.data;

                    if (data.id == '') {
                        // "None" was selected. Clear all selected options
                        $(this).val([]).trigger('change');
                    } else {
                        $(e.currentTarget).find("option[value='" + data.id + "']").attr('selected',
                            'selected');
                    }
                });

                $(this).on('select2:unselect', function(e) {
                    var data = e.params.data;
                    $(e.currentTarget).find("option[value='" + data.id + "']").attr('selected',
                        false);
                });

                $(this).on('select2:selecting', function(e) {
                    // console.log(e.params.data);
                    if (!$(this).data('tags')) {
                        return;
                    }
                    var $el = $(this);
                    var route = $el.data('route');
                    var label = $el.data('label');
                    var errorMessage = $el.data('error-message');
                    var newTag = e.params.args.data.newTag;

                    // console.log(route);

                    if (!newTag) return;

                    $el.select2('close');

                    $.post(route, {
                        [label]: e.params.args.data.text,
                        _tagging: true,
                    }).done(function(data) {
                        var newOption = new Option(e.params.args.data.text, data.results.id,
                            false, true);
                        $el.append(newOption).trigger('change');
                    }).fail(function(error) {
                        // toastr.error(errorMessage);
                        console.log(errorMessage);
                    });

                    return false;
                });
            });

            $('input[name=sample_requirements]').on('change', function() {
                if ($(this).is(':checked')) {
                    $(this).val(1);
                    $(this.nextElementSibling).html('Oui');
                    $('.element').parent().show();
                    $('.element').find('input, select').attr('required', true).show();
                    $('.element').find('input, select').val('');
                    $('.element').find('select').find("option:selected").attr('selected', false);
                } else {
                    $(this).val(0);
                    $(this.nextElementSibling).html('Non');
                    $('.element').parent().hide();
                    $('.element').find('input, select').attr('required', false).hide();
                    $('.element').find('input').val('');
                    $('.element').find('select').find("option:selected").attr('selected', false);
                }
            });

            $('input[name=validite]').on('change', function() {
                if ($(this).is(':checked')) {
                    $(this).val(1);
                    console.log($(this));
                    // $(this.nextElementSibling).html('Oui');
                    $('.element2.validite').parent().hide();
                    $('.element2.validite').find('input').attr('required', false).hide();
                    $('.element2.validite').find('input').val('');
                } else {
                    $(this).val(0);
                    console.log($(this));
                    // $(this.nextElementSibling).html('Non');
                    $('.element2.validite').parent().show();
                    $('.element2.validite').find('input').attr('required', true).show();
                }
            });

            $('input[name=is_mandatory]').on('change', function() {
                if ($(this).is(':checked')) {
                    $(this).val(1);
                    $(this.nextElementSibling).html('Obligatoire');
                } else {
                    $(this).val(0);
                    $(this.nextElementSibling).html('Volontaire');
                }
            });

            $('input[type=checkbox].yes-no').on('change', function() {
                if ($(this).is(':checked')) {
                    $(this).val(1);
                    $(this.nextElementSibling).html('Oui');
                } else {
                    $(this).val(0);
                    $(this.nextElementSibling).html('Non');
                }
            });
        });
    </script>
@endsection
