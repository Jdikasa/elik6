@extends('pm.layouts.master')

@section('css')
@endsection

@section('titre', 'ELIK6 - Nouveau client')

@section('body')
    <div class="page-header card card-lg">
        <div class="text-star">
            <h1>Clients</h1>
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
                                <a href="{{ route('pm.clients.index') }}">Clients</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Ajouter un client</li>
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
        <form class="row g-2 dropzone" method="POST" action="{{ route('pm.clients.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="col-lg-8">
                <!-- Card -->
                <div class="mb-2 card">
                    <!-- Body -->
                    <div class="card-body">
                        <h4>Information du client</h4>
                        <div class="mt-1 row g-3">
                            <div class="col-12">
                                <!-- Select -->
                                <label for="firstNameLabel" class="form-label">Type de client</label>
                                <div class="tom-select-custom">
                                    <select class="js-select form-select form-select-sm" autocomplete="off"
                                        data-hs-tom-select-options='{
                                            "placeholder": "Selectionnez un type..."
                                        }'
                                        name="type_id">
                                        <option value="">Select a person...</option>
                                        @foreach ($customerTypes as $customerType)
                                            <option value="{{ $customerType->id }}">{{ $customerType->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- End Select -->
                            </div>

                            <div class="col-12">
                                <!-- Select -->
                                <label for="firstNameLabel" class="form-label">Societé</label>
                                <div class="tom-select-custom">
                                    <select class="js-select form-select form-select-sm" autocomplete="off"
                                        data-hs-tom-select-options='{
                                            "create": true,
                                            "searchInDropdown": false
                                            {{-- "hidePlaceholderOnSearch": true --}}
                                            {{-- "placeholder": "Selectionnez une societé..." --}}
                                        }'
                                        name="societe_id">
                                        <option value="">Selectionnez une societe...</option>
                                        @foreach ($societes as $societe)
                                            <option value="{{ $societe->id }}">{{ $societe->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- End Select -->
                            </div>

                            <div class="col-md-6">
                                <label for="country_id" class="form-label">Pays</label>
                                <!-- Select -->
                                <div class="mb-3 tom-select-custom">
                                    <select class="js-select form-select" name="country_id" id="country_id"
                                        autocomplete="off"
                                        data-hs-tom-select-options='{
                                            "placeholder": "Select country"
                                        }'>
                                        <option value="">Aland Islands</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}"
                                                data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle me-2" src="{{ asset('assets/vendor/flag-icon-css/flags/1x1/' . Str::lower($country->code) . '.svg') }}" alt="{{ $country->name_fr ?? $country->name_en }}" /><span class="text-truncate">{{ $country->name_fr ?? $country->name_en }}</span></span>'>
                                                {{ $country->name_fr ?? $country->name_en }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- End Select -->
                            </div>

                            <div class="col-md-6">
                                <label for="ville" class="form-label">Ville</label>
                                <input type="text" class="form-control" name="ville" id="ville" placeholder="Ville"
                                    aria-label="Ville">
                            </div>

                            <div class="col-12">
                                <label for="adresse_1" class="form-label">Adresse 1</label>
                                <input type="text" class="form-control" name="adresse_1" id="adresse_1"
                                    placeholder="Votre adresse" aria-label="Votre adresse">
                            </div>

                            <div class="col-12">
                                <label for="adresse_2" class="form-label">
                                    Adresse 2 <span class="form-label-secondary">(Optional)</span>
                                </label>
                                <input type="text" class="form-control" name="adresse_2" id="adresse_2"
                                    placeholder="Votre adresse" aria-label="Votre adresse">
                            </div>

                            <div class="col-md-12">
                                <label for="emailLabel" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="emailLabel"
                                    placeholder="clarice@site.com" aria-label="clarice@site.com">
                            </div>

                            <div class="col-12 js-add-field"
                                data-hs-add-field-options='{
                                    "template": "#addPhoneFieldTemplate",
                                    "container": "#addPhoneFieldContainer",
                                    "defaultCreated": 0
                                }'>
                                <label for="phoneLabel" class="form-label">Téléphone <span
                                        class="form-label-secondary">(Optional)</span></label>

                                <div class="input-group">
                                    <input type="text" class="form-control" name="phone[]" id="phoneLabel"
                                        placeholder="Téléphone" aria-label="Téléphone">

                                    <div class="input-group-append">
                                        <!-- Select -->
                                        <div class="tom-select-custom tom-select-custom-end">
                                            <select class="js-select form-select" autocomplete="off" name="phoneSelect[]"
                                                data-hs-tom-select-options='{
                                                    "searchInDropdown": false,
                                                    "hideSearch": true,
                                                    "dropdownWidth": "8rem"
                                                }'>
                                                <option value="Mobile" selected>Mobile</option>
                                                <option value="Home">Maison</option>
                                                <option value="Work">Bureau</option>
                                                <option value="Fax">Fax</option>
                                                <option value="Directe">Directe</option>
                                            </select>
                                            <!-- End Select -->
                                        </div>
                                    </div>
                                </div>

                                <!-- Container For Input Field -->
                                <div id="addPhoneFieldContainer"></div>

                                <a href="javascript:;" class="js-create-field form-link">
                                    <i class="bi-plus"></i> Ajouter un autre téléphne
                                </a>

                            </div>

                            <div id="addPhoneFieldTemplate" class="input-group-add-field d-flex align-items-center gap-2" style="display: none !important;">
                                <div class="input-group">
                                    <input type="text" class="form-control" data-name="phone[]"
                                        placeholder="Téléphone" aria-label="Téléphone">

                                    <div class="input-group-append">
                                        <!-- Select -->
                                        <div class="tom-select-custom tom-select-custom-end">
                                            <select class="js-select-dynamic form-select" autocomplete="off"
                                                data-name="phoneSelect[]"
                                                data-hs-tom-select-options='{
                                                    "searchInDropdown": false,
                                                    "hideSearch": true,
                                                    "dropdownWidth": "8rem"
                                                }'>
                                                <option value="Mobile" selected>Mobile</option>
                                                <option value="Home">Maison</option>
                                                <option value="Work">Bureau</option>
                                                <option value="Fax">Fax</option>
                                                <option value="Directe">Directe</option>
                                            </select>
                                            <!-- End Select -->
                                        </div>
                                    </div>
                                </div>

                                <a class="js-delete-field input-group-add-field-delete btn btn-light btn-sm border-danger" href="javascript:;">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </div>

                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="0"
                                        id="billingAddressCheckbox" name="is_shipping">
                                    <label class="form-check-label" for="billingAddressCheckbox">
                                        Utiliser ces information d'adresse pour la facturation
                                    </label>
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Description <small>(optionnel)</small></label>
                                <textarea class="form-control" name="description" placeholder="Description" rows="4" cols="4"></textarea>
                                <!-- Quill -->
                                {{-- <div class="quill-custom">
                                    <div class="js-quill"  style="min-height: 15rem;"
                                        data-hs-quill-options='{
                                            "placeholder": "Type your message...",
                                            "name":"description",
                                            "modules": {
                                                "toolbar": [
                                                ["bold", "italic", "underline", "strike", "link", "image", "blockquote", "code", {"list": "bullet"}]
                                                ]
                                            }
                                        }'>
                                    </div>
                                </div> --}}
                                <!-- End Quill -->
                            </div>
                        </div>
                    </div>
                    <!-- Body -->
                </div>
                <!-- End Card -->

                <!-- Card -->
                <div class="card">
                    <!-- Body -->
                    <div class="card-body">
                        <h4>Personne à contacter</h4>
                        {{-- <p>The primary address of this customer.</p> --}}
                        <div class="mt-1 js-add-field"
                            data-hs-add-field-options='{
                                "template": "#newPersonTemplate",
                                "container": "#newPersonContainer",
                                "defaultCreated": 0
                            }'>

                            {{-- <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-4">
                                        <label for="" class="form-label">Prénom</label>
                                        <input type="text" class="form-control" name="person_prenom[]" id=""
                                            placeholder="Clarice" aria-label="Clarice">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="mb-4">
                                        <label for="" class="form-label">Nom</label>
                                        <input type="text" class="form-control" name="person_nom[]" id=""
                                            placeholder="Boone" aria-label="Boone" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-4">
                                        <label for="" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="person_email[]" id=""
                                            placeholder="clarice@site.com" aria-label="clarice@site.com" required>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="phoneLabel" class="form-label">Téléphone <span class="form-label-secondary">(Optional)</span></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="person_phone[]"
                                            id="phoneLabel" placeholder="Téléphone" aria-label="Téléphone" required>

                                        <div class="input-group-append">
                                            <div class="tom-select-custom tom-select-custom-end">
                                                <select class="js-select form-select" autocomplete="off"
                                                    name="person_phone_type[]"
                                                    data-hs-tom-select-options='{
                                                        "searchInDropdown": false,
                                                        "hideSearch": true,
                                                        "dropdownWidth": "8rem"
                                                    }'>
                                                    <option value="Mobile" selected>Mobile</option>
                                                    <option value="Home">Maison</option>
                                                    <option value="Work">Bureau</option>
                                                    <option value="Fax">Fax</option>
                                                    <option value="Directe">Directe</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            <!-- Container For Input Field -->
                            <div id="newPersonContainer"></div>
                            <!-- End Row -->

                            <a href="javascript:;" class="js-create-field form-link">
                                <i class="bi-plus"></i> Ajouter une personne
                            </a>
                        </div>

                        <div id="newPersonTemplate" style="display: none; position: relative;">
                            <hr>
                            <a class="js-delete-field input-group-add-field-delete position-absolute btn btn-sm btn-light border-danger" href="javascript:;"
                                style="top: 5px; right:5px;font-size: 16px;">
                                <i class="bi-trash"></i>
                            </a>
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label for="" class="form-label">Prénom</label>
                                    <input type="text" class="form-control" data-name="person_prenom[]"
                                        id="" placeholder="Clarice" aria-label="Clarice">
                                </div>

                                <div class="col-sm-6">
                                    <label for="" class="form-label">Nom</label>
                                    <input type="text" class="form-control" data-name="person_nom[]" id=""
                                        placeholder="Boone" aria-label="Boone">
                                </div>
                                <div class="col-12">
                                    <label for="" class="form-label">Email</label>
                                    <input type="email" class="form-control" data-name="person_email[]" id=""
                                        placeholder="clarice@site.com" aria-label="clarice@site.com">
                                </div>

                                <div class="col-12">
                                    <label for="phoneLabel" class="form-label">Téléphone <span
                                            class="form-label-secondary">(Optional)</span></label>
                                    <div class="input-group">
                                        {{-- <input type="text" class="form-control" data-name="person_phone[]"
                                            id="phoneLabel" placeholder="Téléphone" aria-label="Téléphone">

                                        <div class="input-group-append">
                                            <div class="tom-select-custom tom-select-custom-end">
                                                <select class="js-select form-select" autocomplete="off"
                                                    data-name="person_phone_type[]"
                                                    data-hs-tom-select-options='{
                                                        "searchInDropdown": false,
                                                        "hideSearch": true,
                                                        "dropdownWidth": "8rem"
                                                    }'>
                                                    <option value="Mobile" selected>Mobile</option>
                                                    <option value="Home">Maison</option>
                                                    <option value="Work">Bureau</option>
                                                    <option value="Fax">Fax</option>
                                                    <option value="Directe">Directe</option>
                                                </select>
                                            </div>
                                        </div> --}}
                                        <input type="text" class="form-control" data-name="person_phone[]"
                                            placeholder="Téléphone" aria-label="Téléphone" {{-- data-hs-mask-options='{ js-input-mask
                                            "mask": "+0(000)000-00-00"
                                        }' --}}>

                                        <div class="input-group-append">
                                            <!-- Select -->
                                            <div class="tom-select-custom tom-select-custom-end">
                                                <select class="js-select-dynamic form-select" autocomplete="off"
                                                    data-name="person_phone_type[]"
                                                    data-hs-tom-select-options='{
                                                        "searchInDropdown": false,
                                                        "hideSearch": true,
                                                        "dropdownWidth": "8rem"
                                                    }'>
                                                    <option value="Mobile" selected>Mobile</option>
                                                    <option value="Home">Maison</option>
                                                    <option value="Work">Bureau</option>
                                                    <option value="Fax">Fax</option>
                                                    <option value="Directe">Directe</option>
                                                </select>
                                                <!-- End Select -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Body -->
                </div>
                <!-- End Card -->
            </div>

            <div class="col-lg-4">
                <!-- Card -->
                <div class="card">
                    <!-- Body -->
                    <div class="card-body">
                        <h4>Logo du client</h4>
                        <!-- Media -->
                        <div class="mt-3 mb-5 d-flex align-items-center">
                            <!-- Avatar -->
                            <label class="avatar avatar-xl avatar-circle" for="avatarUploader">
                                <img id="avatarImg" class="avatar-img" src="../assets/img/160x160/img1.jpg"
                                    alt="Image Description">
                            </label>

                            <div class="gap-2 d-flex ms-4">
                                <button type="button"
                                    class="form-attachment-btn btn btn-sm btn-outline-primary rounded-pill">
                                    <i class="bi bi-download" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Importer" data-bs-original-title="Importer" aria-label="Importer"></i>
                                    <input type="file" class="js-file-attach form-attachment-btn-label"
                                        id="avatarUploader"
                                        data-hs-file-attach-options='{
                                            "textTarget": "#avatarImg",
                                            "mode": "image",
                                            "targetAttr": "src",
                                            "resetTarget": ".js-file-attach-reset-img",
                                            "resetImg": "../assets/img/160x160/img1.jpg",
                                            "allowTypes": [".png", ".jpeg", ".jpg"]
                                        }'
                                        name="logo">
                                </button>
                                <!-- End Avatar -->

                                <button type="button"
                                    class="js-file-attach-reset-img btn btn-sm btn-outline-danger rounded-pill">
                                    <i class="bi bi-trash-fill" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="" data-bs-original-title="Supprimer" aria-label="Delete"></i>
                                </button>
                            </div>
                        </div>
                        <!-- End Media -->

                        <h4>Documents du client</h4>

                        <!-- Form -->
                        <div class="my-4">
                            <div class="mb-4 tom-select-custom">
                                <label for="contrat" class="js-file-attach form-label"
                                    data-hs-file-attach-options='{
                                    "textTarget": "[for=\"contrat\"]"
                                    }'>Contrat</label>
                                <input class="form-control" type="file" id="contrat" name="contrat">
                            </div>
                            <!-- End Select -->

                            <!-- Select -->
                            <div class="mb-4 tom-select-custom">
                                <label for="nda" class="js-file-attach form-label"
                                    data-hs-file-attach-options='{
                                    "textTarget": "[for=\"nda\"]"
                                    }'>NDA</label>
                                <input class="form-control" type="file" id="nda" name="nda">
                            </div>
                            <!-- End Select -->
                            <div class="mb-4 ">
                                <label for="" class="form-label">Autres documents</label>
                                <!-- Dropzone -->
                                <div id="basicExampleDropzone" class="mx-0 js-dropzone row dz-dropzone dz-dropzone-card"
                                    data-hs-dropzone-options='{
                                        "url":"{{ route('pm.dropzon.post') }}?_token={{ csrf_token() }}"
                                    }'>
                                    <div class="dz-message">
                                        <img class="mb-3 avatar avatar-sm avatar-4x3"
                                            src="{{ asset('assets/svg/illustrations/oc-browse.svg') }}"
                                            alt="Image Description">

                                        <h6>Glisser et deposer votre document ici</h6>

                                        <p class="mb-2">ou</p>

                                        <span class="btn btn-white btn-sm">Importer</span>
                                    </div>
                                    {{-- <div class="fallback">

                                    </div> --}}
                                </div>
                                <!-- End Dropzone -->
                                <input id="files" multiple="true" name="autre_doc[]" type="file" class="d-none">
                            </div>
                        </div>
                        <!-- End Form -->
                    </div>
                    <!-- Body -->
                </div>
                <!-- End Card -->
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
