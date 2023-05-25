@extends('pm.layouts.layout-doc')

@section('content')
    <div class="block-scanner">
        <div class="sidebar-doc">
            <div class="header-sidebar">
                <h4 class="m-0">Details du fichier</h4>
            </div>
            <div>
                <div class="body-siderbar">
                    <a href="{{ route('pm.dossiers.show', $find_document->dossier) }}">
                        <i class="bi bi-arrow-left"></i> Retoure
                    </a>
                    <div class="d-flex justify-content-between my-4">
                        <button class="btn btn-primary rounded-pill mb-0" data-bs-toggle="modal"
                            data-bs-target="#modal-new-task-ass">
                            <i class="bi bi-person-plus"></i> Assigner une tâche
                        </button>
                        <a href="{{ route('pm.documents.edit', $find_document) }}" class="btn btn-light rounded-pill">
                            <i class="bi bi-pencil"></i> Modifier
                        </a>
                    </div>

                    <div class="form-group row g-3">
                        <div class="col-12">
                            <h5 class="mb-2 title-info">Informations générales</h5>
                        </div>
                        <div class="col-12">
                            <div class="row align-items-center">
                                <label for="inputPassword" class="col-5 col-form-label">Nom</label>
                                <div class="col-7">
                                    <p class="items">: {{ Str::ucfirst($find_document->libelle ?? '') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row align-items-center">
                                <label for="inputPassword" class="col-5 col-form-label">Référence</label>
                                <div class="col-7">
                                    <p class="items">: {{ Str::ucfirst($find_document->reference ?? '') }}</p>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-12">
                            <div class="row align-items-center">
                                <label for="inputPassword" class="col-5 col-form-label">Catégorie</label>
                                <div class="col-7">
                                    <p class="items">
                                        {{ Str::ucfirst($find_document->categorie->title) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row align-items-center">
                                <label for="inputPassword" class="col-5 col-form-label">Type de document</label>
                                <div class="col-7">
                                    <p class="items">
                                        : {{ Str::ucfirst($find_document->typeDocument?->titre) }}
                                    </p>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-12">
                            <div class="row align-items-center">
                                <label for="inputPassword" class="col-5 col-form-label">Nature du document</label>
                                <div class="col-7">
                                    <p class="items">
                                        : {{ $find_document->nature?->titre }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row align-items-center">
                                <label for="inputPassword" class="col-5 col-form-label">Description</label>
                                <div class="col-7">
                                    <p class="items">
                                        : {{ $find_document->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row align-items-center">
                                <label for="inputPassword" class="col-5 col-form-label">Date de création</label>
                                <div class="col-7">
                                    <p class="items">
                                        : {{ $find_document->created_at->isoFormat('LL') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row align-items-center">
                                <label for="inputPassword" class="col-5 col-form-label">Ajouté par</label>
                                <div class="col-7">
                                    <p class="items">
                                        : {{ Str::ucfirst($find_document->author->prenom ?? '') }}
                                        {{ Str::ucfirst($find_document->author->nom ?? '') }}
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="footer-sidebar">
                    <a href="#" class="btn btn-danger text-white" data-bs-toggle="modal"
                        data-bs-target="#modal-delete-document">Supprimer</a>
                    <a href="#" class="btn btn-valid" data-bs-toggle="modal"
                        data-bs-target="#modal-new-archive">Archiver</a>
                </div>
            </div>

        </div>
        <div class="content-scanner">
            <div class="container-fluid">
                <iframe src="{{ files($find_document->document)->link }}" frameborder="0" class="w-100"></iframe>
            </div>
        </div>

    </div>

    <div class="modal fade" id="modal-new-task-ass" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center" id="exampleModalLabel">
                        <span>Nouvelle tâche</span>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('pm.taches.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="document_id" value="{{ $find_document->id }}">
                        <div class="form-group row g-3">
                            <div class="col-lg-12">
                                <label for="">Titre de la tâche <sup class="text-danger fs-5">*</sup></label>
                                <input type="text" name="libelle" class="form-control" placeholder="Dénomination"
                                    required>
                            </div>
                            <div class="col-lg-12">
                                <label for="">Description <sup class="text-danger fs-5">*</sup></label>
                                <textarea name="description" id="description" cols="30" rows="3" class="form-control"
                                    placeholder="Description" required></textarea>
                            </div>
                            <div class="col-lg-6">
                                <label for="">Date debut <sup class="text-danger fs-5">*</sup></label>
                                <input type="date" name="debut" class="form-control" placeholder="Date debut"
                                    required>
                            </div>
                            <div class="col-lg-6">
                                <label for="">Date fin</label>
                                <input type="date" name="fin" class="form-control" placeholder="Date fin">
                            </div>
                            <div class="col-lg-12">
                                <label for="agents">Agents concernés <sup class="text-danger fs-5">*</sup></label>
                                <div class="tom-select-custom">
                                    <select class="js-select form-select form-select-sm" name="agents[]" id="agents"
                                        autocomplete="off"
                                        data-hs-tom-select-options='{
                                            "placeholder": "Selectionnez des agents"
                                        }'
                                        multiple required>
                                        {{-- <option value="" disabled selected>Select agent</option> --}}
                                        @foreach ($agents as $agent)
                                            <option value="{{ $agent->id }}"
                                                data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle me-2" src="{{ imageOrDefault($agent->image) }}" alt="{{ $agent->nom }}" /><span class="text-truncate">{{ $agent->prenom . ' ' . $agent->nom }}</span></span>'>
                                                {{ $agent->prenom . ' ' . $agent->nom }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <label for="">Priorité <sup class="text-danger fs-5">*</sup></label>
                                <div class="tom-select-custom">
                                    <select class="js-select form-select" name="priorite_id" autocomplete="off"
                                        data-hs-tom-select-options='{
                                                "placeholder": "Selectionnez une priorité"
                                            }'
                                        wire:model='stat.etat_id' required>
                                        <option value="">Selectionnez une priorité</option>
                                        @foreach ($priorites as $priorite)
                                            <option value="{{ $priorite->id }}"
                                                data-option-template='<span class="d-flex align-items-center"><span @class([
                                                    'legend-indicator',
                                                    'bg-success' => $priorite->id == 1,
                                                    'bg-warning' => $priorite->id == 2,
                                                    'bg-danger' => $priorite->id == 3,
                                                ])></span><span class="text-truncate">{{ $priorite->titre }}</span></span>'>
                                                {{ $priorite->titre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <label for="" class="mb-0 p-0">Tâche parent</label><span> (optionnel)</span> <br>
                                <small class="mb-2">(cette tâche sera une sous-tâche de celle que vous selectionnez ici)</small>
                                <div class="tom-select-custom">
                                    <select class="js-select form-select" name="priorite_id" autocomplete="off"
                                        data-hs-tom-select-options='{
                                            "placeholder": "Selectionnez une priorité"
                                        }'
                                        wire:model='stat.etat_id'>
                                        @foreach ($taches as $tache)
                                            <option value="{{ $tache->id }}">{{ $tache->titre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="from-group row">
                            <div class="col-lg-12 text-end my-3">
                                <button class="btn btn-add">Enregistrer</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-new-archive" tabindex="-1" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group row g-3">
                        <form action="{{ route('pm.documents.archive') }}" method="post">
                            @csrf
                            <input type="hidden" name="document_id" id="" value="{{ $find_document->id }}">
                            <div class="content-text text-center">
                                <h5>Archivage du document</h5>
                                <p class="mb-0">Etes-vous sûr de vouloir archiver ce document ?</p>
                            </div>
                            <div class="col-lg-12 text-center mb-3">
                                <button class="btn btn-add mt-2 w-100" type="submit">Archiver</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-delete-document" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center content-text">
                        <i data-feather="trash"></i>
                        <h5>Etes-vous sûr de vouloir supprimer ce document ?</h5>
                        <p>Cette action est irrémédiable</p>
                    </div>
                    <form action="{{ route('pm.documents.destroy', $find_document) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="mb-3 block-btn d-flex justify-content-center">
                            <a href="#" class="btn btn-cancel me-4" data-bs-dismiss="modal"
                                aria-label="Close">Annuler</a>
                            <button class="btn btn-delete">Supprimer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
