@extends('pm.layouts.master')

@section('css')
    <style>
        .tom-select-custom .ts-wrapper.form-select .ts-control,
        .tom-select-custom .ts-wrapper.multi .ts-control.has-items.hs-select-single-multiple {
            padding: 0.2rem !important;
            padding-top: 0.3rem !important;
        }
    </style>
@endsection

@section('titre', 'ELIK6 - Nouvel equipement')

@section('body')
    <div class="page-header card card-lg">
        <div class="text-star">
            <h1>Équipements</h1>
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
                                <a href="{{ route('pm.products.index') }}">Équipement</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Modifier un équipement</li>
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

        <form class="" method="POST" action="{{ route('pm.products.update', $product) }}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row g-3">
                <div class="col-12 col-lg-8">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row g-3">

                                <div class="col-12">
                                    <label class="form-label">Non de l'équipement <sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control" name="nom"
                                        placeholder="Non de l'équipement" required value="{{ $product->nom }}">
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Type de l'équipement <sup class="text-danger">*</sup></label>
                                    <!-- Select -->
                                    <div class="tom-select-custom">
                                        <select class="js-select form-select form-select-sm" autocomplete="off" multiple
                                            data-hs-tom-select-options='{
                                                "create": true,
                                                "maxItems":1,
                                                "placeholder": "Choisir le Type équipement ou ajouter une nouvelle"
                                            }'
                                            name="type_id" required>
                                            <option value="">Choisir le Type d'équipement ou ajouter une nouvelle
                                            </option>
                                            @foreach ($types as $type)
                                                <option value="{{ $type->id }}" @selected($product->type_id == $type->id)>
                                                    {{ $type->nom }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- End Select -->
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Marque de l'équipement <sup
                                            class="text-danger">*</sup></label>
                                    <!-- Select -->
                                    <div class="tom-select-custom">
                                        <select class="js-select form-select" autocomplete="off" multiple
                                            data-hs-tom-select-options='{
                                                "create": true,
                                                "maxItems":1,
                                                "placeholder": "Choisir la Marque de équipement ou ajouter une nouvelle"
                                            }'
                                            name="marque_id" required>
                                            <option value="">Choisir la Marque de l'équipement ou ajouter une nouvelle
                                            </option>
                                            @foreach ($marques as $marque)
                                                <option value="{{ $marque->id }}" @selected($product->marque_id == $marque->id)>
                                                    {{ $marque->marque }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- End Select -->
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Modèle de l'équipement <sup
                                            class="text-danger">*</sup></label>
                                    <!-- Select -->
                                    <div class="tom-select-custom">
                                        <select class="js-select form-select form-select-sm" autocomplete="off" multiple
                                            data-hs-tom-select-options='{
                                                "create": true,
                                                "maxItems":1,
                                                "placeholder": "Choisir le Modèle de équipement ou ajouter une nouvelle"
                                            }'
                                            name="modele_id" required>
                                            <option value="">Choisir le Modèle de l'équipement ou ajouter une nouvelle
                                            </option>
                                            @foreach ($modeles as $modele)
                                                <option value="{{ $modele->id }}" @selected($product->modele_id == $modele->id)>
                                                    {{ $modele->modele }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- End Select -->
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Bande de fréquence</label>
                                    <!-- Select -->
                                    <div class="tom-select-custom">
                                        <select class="js-select form-select form-select-sm" autocomplete="off" multiple
                                            data-hs-tom-select-options='{
                                                "create": true,
                                                "placeholder": "Choisir la Bande de fréquence ou ajouter une nouvelle"
                                            }'
                                            name="frequences[]" required>
                                            <option value="">Choisir la Bande de fréquence</option>
                                            @foreach ($frequences as $frequence)
                                                <option value="{{ $frequence->id }}" @selected(in_array($frequence->id, $product->frequences->pluck('id')->toArray()))>
                                                    {{ $frequence->frequence }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- End Select -->
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Puissance</label>
                                    <!-- Select -->
                                    <div class="tom-select-custom">
                                        <select class="js-select form-select form-select-sm" autocomplete="off" multiple
                                            data-hs-tom-select-options='{
                                                "create": true,
                                                "placeholder": "Choisir la Puissance ou ajouter une nouvelle"
                                            }'
                                            name="puissances[]">
                                            <option value="">Choisir la Puissance</option>
                                            @foreach ($puissances as $puissance)
                                                <option value="{{ $puissance->id }}" @selected(in_array($puissance->id, $product->puissances->pluck('id')->toArray()))>
                                                    {{ $puissance->puisance }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- End Select -->
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Normes</label>
                                    <!-- Select -->
                                    <div class="tom-select-custom">
                                        <select class="js-select form-select form-select-sm" autocomplete="off" multiple
                                            data-hs-tom-select-options='{
                                                "create": true,
                                                "placeholder": "Choisir la Normes ou ajouter une nouvelle"
                                            }'
                                            name="normes[]">
                                            <option value="">Choisir la Normes</option>
                                            @foreach ($normes as $norme)
                                                <option value="{{ $norme->id }}" @selected(in_array($norme->id, $product->normes->pluck('id')->toArray()))>
                                                    {{ $norme->norme }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- End Select -->
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Description <small>(optionnel)</small></label>
                                    <textarea class="form-control" name="description" placeholder="Description" rows="4" cols="4">{!! $product->description !!}</textarea>
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
                                    <label class="form-label">Images <small>(optionnel)</small></label>
                                    <input class="form-control" type="file" name="image"
                                        accept="image/jpeg,.jpg,.png,.webp">
                                </div>

                                <hr>

                                <div class="py-0 my-0 col-12">
                                    <h5 class="p-0 m-0">Rapports des tests</h5>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Rapports de test RF <small>(optionnel)</small></label>
                                    <input class="form-control" type="file" name="rapport_rf"
                                        accept=".pdf,.doc,.docx,application/msword,.jpeg,.jpg,.png,.webp">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Rapports de test SAFETY <small>(optionnel)</small></label>
                                    <input class="form-control" type="file" name="rapport_safety"
                                        accept=".pdf,.doc,.docx,application/msword,.jpeg,.jpg,.png,.webp">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Rapports de test EMC <small>(optionnel)</small></label>
                                    <input class="form-control" type="file" name="rapport_emc"
                                        accept=".pdf,.doc,.docx,application/msword,.jpeg,.jpg,.png,.webp">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Rapports de test SAR <small>(optionnel)</small></label>
                                    <input class="form-control" type="file" name="rapport_sar"
                                        accept=".pdf,.doc,.docx,application/msword,.jpeg,.jpg,.png,.webp">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Déclaration de conformité <small>(optionnel)</small></label>
                                    <input class="form-control" type="file" name="declaration"
                                        accept=".pdf,.doc,.docx,application/msword,.jpeg,.jpg,.png,.webp">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Autre <small>(optionnel)</small></label>
                                    <input class="form-control" type="file" name="autre_rapport"
                                        accept=".pdf,.doc,.docx,application/msword,.jpeg,.jpg,.png,.webp">
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
            </div>
        </form>
    </div>
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

            var btnAdd = $('#add-contact');
            var parent = $('fieldset');
            var element = $('.element');

            btnAdd.on('click', function() {
                var clone = element.clone();
                clone.find('hr').removeClass('d-none');
                clone.find('input').val('');
                clone.find('.btn-close').removeClass('d-none');
                clone.appendTo(parent);
            });

            $('select[name=type_id]').on('change', function() {
                if ($(this).val() == 2) {
                    $('.action-field').removeClass('d-none');
                } else {
                    $('.action-field').addClass('d-none');
                }
            });

        });

        function removeThisElement(btn) {
            $(btn).parent().remove();
        }
    </script>
@endsection
