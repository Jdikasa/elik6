<div>
    <div class="modal fade" id="modal-new-task-ass"  aria-labelledby="exampleModalLabel" aria-modal="true"
        role="dialog" wire:ignore>
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center" id="exampleModalLabel">
                        <span>Partager ce document</span>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="savePartager">
                        <div class="form-group row g-2">

                            <div class="col-12">
                                <label for="">Direction</label>
                                <select class="form-select select-agent" name="agent_id" aria-label="Default select example" required
                                    wire:model='stat.agent_id'>
                                    <option value="" selected disabled>Selectionnez</option>
                                    @foreach ($agents as $agent)
                                        <option value="{{ $agent->id }}">
                                            {{ $agent->titre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12">
                                <label for="">Traitement</label>
                                <select class="form-select select-agent" name="traitements" aria-label="Default select example" required
                                    wire:model='stat.traitement_id'>
                                    <option value="" selected disabled>Selectionnez</option>
                                    @foreach ($traitements as $traitement)
                                        <option value="{{ $traitement->id }}">
                                            {{ $traitement->titre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-6">
                                <label for="">Date debut</label>
                                <input type="date" name="debut" class="form-control" placeholder="Date debut"
                                    wire:model='stat.debut' min="{{ now()->format('Y-m-d') }}" required>
                            </div>

                            <div class="col-lg-6">
                                <label for="">Date échéance</label>
                                <input type="date" name="fin" class="form-control" placeholder="Date fin"
                                    wire:model='stat.fin' min="{{ now()->format('Y-m-d') }}" required>
                            </div>

                            <div class="col-lg-12">
                                <label for="">Priorité</label>
                                <select class="form-select" name="priorite_id" aria-label="Default select example"
                                    wire:model='stat.priorite_id' required>
                                    <option value="" selected disabled>Selectionnez</option>
                                    @foreach ($priorites as $priorite)
                                        <option value="{{ $priorite->id }}">{{ $priorite->titre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-12">
                                <label for="">Commentaires</label>
                                <textarea name="note" id="" cols="30" rows="5" class="form-control" wire:model='stat.note'></textarea>
                            </div>

                        </div>
                        <div class="from-group row">
                            <div class="col-lg-12 text-end mb-3">
                                <button type="submit" class="btn btn-add w-100">Partager</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="modal modal-assign fade" id="modal-assignation" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-modal="true" role="dialog" wire:ignore>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Assigner ce document à </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pt-0">
                    <form action="#" wire:submit.prevent="storeparticipants">
                        <div class="block-serach-contact">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="bi bi-search"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Recherche" aria-label="Username"
                                    aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="content-users">
                            <div class="form-group row">
                                @foreach ($agents as $agent)
                                    <div class="col-12">
                                        <div class="form-check align-items-center d-flex ps-0 block-row-user"
                                            style="flex-direction: column">

                                            <div class="d-flex align-items-center w-100" data-bs-toggle="collapse"
                                                href="#collapseExample-{{ $loop->iteration }}" role="button" aria-expanded="true"
                                                aria-controls="collapseExample">
                                                <input class="form-check-input mt-0" type="checkbox"
                                                    name="agent_id[]" value="{{ $agent->id }}"
                                                    id="flexCheckDefault{{ $loop->iteration }}" wire:model='stat2.agent_id'>
                                                <label class="form-check-label" for="flexCheckDefault{{ $loop->iteration }}">
                                                    <div class="d-flex align-items-center block-user-ass">
                                                        <div class="block-avatar-user-ass">
                                                            <img src="{{ imageOrDefault($agent->image) }}"
                                                                alt="photo de">
                                                        </div>
                                                        <div class="block-detail-user-ass">
                                                            <h6>{{ $agent->prenom }} {{ $agent->nom }}</h6>
                                                            <p>{{ $agent->fonction()?->titre }}</p>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="w-100 pt-1 pb-2 collapse" id="collapseExample-{{ $loop->iteration }}">
                                                <div class="form-group row">
                                                    <div class="col-lg-12">
                                                        <input type="text" name="objectif[]" class="form-control"
                                                            placeholder="Objectif" wire:model='stat2.objectif'>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12 d-flex justify-content-end mt-3 align-items-center my-3">
                                <div class="btn ms-2" data-bs-target="#modal-new-task-ass" data-bs-toggle="modal"
                                    style="color: var(--colorTitre)"><i class="bi bi-arrow-left me-1"></i> Retour
                                </div>

                                <button class="btn btn-add mt-0"><i class="bi bi-person-plus-fill me-1"
                                        style="font-size: 16px"></i> Assigner</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
</div>

@push('scripts')
    <script>

        Livewire.on('finishPartage', function () {
            var moadal = bootstrap.Modal.getInstance($('#modal-new-task-ass'));
            setTimeout(() => {
                moadal.hide();
            }, 3000);
        });

        // bootstrap.Modal.prototype.enforceFocus = function () {
        //     $(document)
        //     .off('focusin.bs.modal') // guard against infinite focus loop
        //     .on('focusin.bs.modal', $.proxy(function (e) {
        //         if (this.$element[0] !== e.target && !this.$element.has(e.target).length) {
        //             this.$element.focus()
        //         }
        //     }, this))
        // }

        // bootstrap.Modal.Default.keyboard = false;
        $(document).ready(function() {
            // bootstrap.Modal.Constructor.prototype.enforceFocus = true;
            // $('.select2').select2({
            //     dropdownParent: $('#modal-new-task'),
            //     width: '100%',
            //     placeholder: $(this).data('placeholder')
            // });

            $('.tag').select2({
                dropdownParent: $('#modal-new-task-ass'),
                width: '100%',
                placeholder: $(this).data('placeholder'),
                tags:true,
                allowClear: false,
            });

            $('.add-agent').on('click', function () {
                // var clone = $('.element:last-child').clone();
                var parent = $('.parent-tache');
                var clone = $('.element').last().clone();
                clone.addClass('mt-2');
                parent.append(clone);

                clone.find('span.select2').remove();
                clone.find('a').last().removeClass('d-none');

                clone.find('span.select2').remove();
                var input = clone.find('select.tag');
                input.removeClass("select2-hidden-accessible");
                input.removeAttr('data-select2-id');
                input.removeAttr('tabindex');
                input.removeAttr('aria-hidden');
                input.find('option').remove();
                input.select2({
                    tags: true,
                    placeholder: $(this).data('placeholder'),
                    allowClear: true,
                    dropdownParent: $('#modal-new-task-ass'),
                });
                selectAgent();
            });

            $('body').on('click', '.element-remove', function() {
                $(this).parent().remove();
                if ($('.element').length == 1) {
                    $('.element').find('a').last().addClass('d-none');
                }
            });

            selectAgent();
            function selectAgent() {
                $('.select-agent').on('change', function () {
                    var element = $(this).parent();
                    var tache = element.find('select.tag');
                    tache.attr('name', 'taches['+$(this).val()+'][]');
                });
            }

            // $('.element').each(function () {
                // var agent_id = $(this).find('.select-agent').val();

            // });

            // var data = [
            //     @foreach($agents as $agent)
            //         {
            //             id: {{ $agent->id }},
            //             text: '<div class="block-info-formule d-flex py-1 ps-1"><div class="icon avatar"><img src="{{ imageOrDefault($agent->image) }}"/></div> {{ $agent->prenom }} {{ $agent->nom }}</div>',
            //             html: '<div class="block-info-formule d-flex py-1 ps-1"><div class="icon avatar"><img src="{{ imageOrDefault($agent->image) }}"/></div> {{ $agent->prenom }} {{ $agent->nom }}</div>',
            //             title: '{{ $agent->prenom }} {{ $agent->nom }}'
            //         },
            //     @endforeach
            // ];

            // $("#agent_select").select2({
            //     dropdownParent: $('#modal-new-task'),
            //     width: '100%',
            //     placeholder: $(this).data('placeholder'),
            //     data: data,
            //     escapeMarkup: function(markup) {
            //         return markup;
            //     },
            //     templateResult: function(data) {
            //         return data.html;
            //     },
            //     templateSelection: function(data) {
            //         return data.text;
            //     }
            // });
        });
        // $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    </script>
@endpush
