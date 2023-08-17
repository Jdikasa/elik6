@extends('pm.layouts.master')

@section('css')
@endsection

@section('body')
    <!--breadcrumb-->
    <div class="page-header card card-lg">
        <div class="text-star">
            <h1>Modification d'un projets</h1>
            <div class="page-breadcrumb d-none d-sm-flex align-items-center">
                <div class="mt-2">
                    <nav aria-label="breadcrumb">
                        <ol class="p-0 mb-0 breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('pm.home') }}"><i class="bi bi-house-fill"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('pm.projects.index') }}">Projets</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">#{{ $project->id }}</li>
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
    <!--end breadcrumb-->
    <div class="pb-5 content container-fluid">
        @livewire('projet.edit', ['clients' => $clients, 'certificats' => $certificats, 'project' => $project])
        <!--end row-->
    </div>
@endsection

@section('script-vendor')
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            $('select.select2-ajax').each(function() {
                // console.log($(this).data('get-items-route'));
                $(this).select2({
                    tags: $(this).data('tags') ? $(this).data('tags') : false,
                    placeholder: $(this).data('placeholder'),
                    language: "fr",
                    createTag: function(params) {
                        // console.log(params);
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
                        console.log(error);
                    });

                    return false;
                });
            });

            // ajax query
            $('select[name=certificat_id]').on('change', function() {
                var certificat_id = $(this).val();
                var type_id = $('select[name=type_id]').val();
                var route = "{{ route('pm.certificats.getCertificat') }}";
                $.ajax({
                    url: route,
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        id: certificat_id,
                        type: type_id,
                    },
                    success: function(data) {
                        // fill the parteners select2 field
                        $('select[name=partenaire_id]').empty();
                        $('select[name=partenaire_id]').select2('destroy');

                        $('select[name=partenaire_id]').append(
                            '<option value="-1">-- Selectionnez un partenaire --</option>');

                        $.each(data.parteners, function(key, value) {
                            $('select[name=partenaire_id]').append(
                                '<option value="' + value.id + '">' + value.societe
                                .nom + '</option>'
                            );
                        });

                        $('select[name=partenaire_id]').select2({
                            placeholder: $(this).data('placeholder'),
                        });

                        $('td.pays').html(data.pays);
                        $('td.prix_pays').html(data.prix + '$');
                        $('td.prix_marge').html((data.prix - parseInt($('td.prix_part')
                            .html())) + '$');

                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });

            $('select[name=partenaire_id]').on('change', function() {
                var partenaire_id = $(this).val();
                var type_id = $('select[name=type_id]').val();
                var route = "{{ route('pm.certificats.getModalitePart') }}";
                $.ajax({
                    url: route,
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        id: partenaire_id,
                        country_id: $('select[name=certificat_id]').val(),
                        type: type_id,
                    },
                    success: function(data) {
                        $('td.prix_part').html(data.prix + '$');
                        $('td.prix_marge').html((parseInt($('td.prix_pays').html()) - data
                            .prix) + '$');
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });

        });
    </script>
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

            // INITIALIZATION OF FLATPICKR
            // =======================================================
            HSCore.components.HSFlatpickr.init('.js-flatpickr')
        })();
    </script>
    <script>
        $(document).ready(function() {
            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });
            // $('select.select2').each(function() {
            //     $(this).select2({
            //         tags: $(this).data('tags') ? $(this).data('tags') : false,
            //         placeholder: $(this).data('placeholder'),
            //         language: "fr",
            //         createTag: function(params) {
            //             var term = $.trim(params.term);

            //             if (term === '') {
            //                 return null;
            //             }

            //             return {
            //                 id: term,
            //                 text: term,
            //                 newTag: true
            //             }
            //         },
            //         ajax: {
            //             url: $(this).data('get-items-route'),
            //             data: function(params) {

            //                 var query = {
            //                     search: params.term,
            //                     type: $(this).data('get-items-field'),
            //                     method: $(this).data('method'),
            //                     id: $(this).data('id'),
            //                     page: params.page || 1,
            //                     model: $(this).data('related-model'),
            //                     label: $(this).data('label'),
            //                 }
            //                 return query;
            //             }
            //         },
            //         maximumSelectionLength: $(this).data('max-selection') ? $(this).data(
            //             'max-selection') : null,
            //     });

            //     $(this).on('select2:select', function(e) {
            //         var data = e.params.data;

            //         if (data.id == '') {
            //             // "None" was selected. Clear all selected options
            //             $(this).val([]).trigger('change');
            //         } else {
            //             $(e.currentTarget).find("option[value='" + data.id + "']").attr('selected',
            //                 'selected');
            //         }
            //     });

            //     $(this).on('select2:unselect', function(e) {
            //         var data = e.params.data;
            //         $(e.currentTarget).find("option[value='" + data.id + "']").attr('selected',
            //             false);
            //     });

            //     $(this).on('select2:selecting', function(e) {
            //         // console.log(e.params.data);
            //         if (!$(this).data('tags')) {
            //             return;
            //         }
            //         var $el = $(this);
            //         var route = $el.data('route');
            //         var label = $el.data('label');
            //         var errorMessage = $el.data('error-message');
            //         var newTag = e.params.args.data.newTag;

            //         // console.log(route);

            //         if (!newTag) return;

            //         $el.select2('close');

            //         $.post(route, {
            //             [label]: e.params.args.data.text,
            //             _tagging: true,
            //         }).done(function(data) {
            //             var newOption = new Option(e.params.args.data.text, data.results.id,
            //                 false, true);
            //             $el.append(newOption).trigger('change');
            //         }).fail(function(error) {
            //             // toastr.error(errorMessage);
            //             console.log(errorMessage);
            //         });

            //         return false;
            //     });
            // });

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
    @stack('scripts')
@endsection
