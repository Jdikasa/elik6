<div class="modal fade" id="modal-new-task-ass" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog"
    wire:ignore>
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
                    <input type="hidden" name="document_id" value="{{ $document->id }}">
                    <div class="form-group row g-3">
                        <div class="col-lg-12">
                            <label for="">Titre de la tâche</label>
                            <input type="text" name="libelle" class="form-control" placeholder="Dénomination"
                                wire:model='stat.libelle' required>
                        </div>
                        <div class="col-lg-12">
                            <label for="">Description</label>
                            <textarea name="description" id="description" cols="30" rows="3" class="form-control"
                                placeholder="Description" wire:model='stat.description' required></textarea>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Date debut</label>
                            <input type="date" name="debut" class="form-control" placeholder="Date debut"
                                wire:model='stat.debut' required>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Date fin</label>
                            <input type="date" name="fin" class="form-control" placeholder="Date fin"
                                wire:model='stat.fin' required>
                        </div>
                        <div class="col-lg-12">
                            <label for="">Agent</label>
                            <select class="form-select select-agent" name="agents[]"
                                aria-label="Default select example" required>
                                <option value="" selected disabled>Selectionnez</option>
                                @foreach ($agents as $agent)
                                    <option value="{{ $agent->id }}">{{ $agent->nom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-12">
                            <label for="">Priorité</label>
                            <select class="form-select" name="priorite_id" aria-label="Default select example"
                                wire:model='stat.etat_id' required>
                                <option value="" selected disabled>Selectionnez</option>
                                @foreach ($priorites as $priorite)
                                    <option value="{{ $priorite->id }}">{{ $priorite->titre }}</option>
                                @endforeach
                            </select>
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


@push('scripts')
    <script>
        $(document).ready(function() {
            $('.add-agent').on('click', function() {
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
                $('.select-agent').on('change', function() {
                    var element = $(this).parent().parent();
                    var tache = element.find('select.tag');
                    tache.attr('name', 'taches[' + $(this).val() + '][]');
                });
            }
        });
    </script>
@endpush
