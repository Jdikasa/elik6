<div class="modal fade" id="modal-new-task" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
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
                <form method="post" action="{{ route('pm.taches.store') }}">
                    @csrf
                    <div class="form-group row g-2">
                        <div class="col-lg-12">
                            <label for="">Sujet</label>
                            <input type="text" name="libelle" class="form-control" placeholder="Dénomination">
                        </div>
                        <div class="col-lg-12">
                            <label for="">Note</label>
                            <textarea name="description" id="description" cols="30" rows="3" class="form-control"
                                placeholder="Description"></textarea>
                        </div>
                        {{-- <div class="col-lg-12">
                            <label for="">Agents</label>
                            <select class="form-select" name="agents[]" aria-label="Default select example"
                                placeholder="Selectionnez l'etat" id="agent_select" multiple>
                            </select>
                        </div>
                        <div class="col-lg-12">
                            <label for="">Tâches à effectuer</label>
                            <select class="form-select tag" name="taches[]" aria-label="Default select example"
                                placeholder="Selectionnez les taches" id="" multiple>
                            </select>
                        </div> --}}
                        <div class="col-lg-12">
                            <label for="">Date debut</label>
                            <input type="date" name="debut" class="form-control" placeholder="Telephone">
                        </div>
                        <div class="col-lg-12">
                            <label for="">Date fin</label>
                            <input type="date" name="fin" class="form-control" placeholder="Telephone">
                        </div>
                        <div class="col-lg-12" wire:ignore>
                            <label for="">Priorité</label>
                            <select class="form-select select2" name="etat_id" aria-label="Default select example"
                                placeholder="Selectionnez l'etat">
                                <option value="" selected disabled>Selectionnez l'etat</option>
                                @foreach ($etats as $etat)
                                    <option value="{{ $etat->id }}">{{ $etat->libelle }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-12 text-end">
                            <button class="btn btn-add">Ajouter</button>
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
            // $('.select2').select2({
            //     dropdownParent: $('#modal-new-task'),
            //     width: '100%',
            //     placeholder: $(this).data('placeholder')
            // });

            $('.tag').select2({
                dropdownParent: $('#modal-new-task'),
                width: '100%',
                placeholder: $(this).data('placeholder'),
                tags:true,
            });

            var data = [
                @foreach($agents as $agent)
                    {
                        id: {{ $agent->id }},
                        text: '<div class="block-info-formule d-flex py-1 ps-1"><div class="icon avatar"><img src="{{ imageOrDefault($agent->image) }}"/></div> {{ $agent->prenom }} {{ $agent->nom }}</div>',
                        html: '<div class="block-info-formule d-flex py-1 ps-1"><div class="icon avatar"><img src="{{ imageOrDefault($agent->image) }}"/></div> {{ $agent->prenom }} {{ $agent->nom }}</div>',
                        title: '{{ $agent->prenom }} {{ $agent->nom }}'
                    },
                @endforeach
            ];

            $("#agent_select").select2({
                dropdownParent: $('#modal-new-task'),
                width: '100%',
                placeholder: $(this).data('placeholder'),
                data: data,
                escapeMarkup: function(markup) {
                    return markup;
                },
                templateResult: function(data) {
                    return data.html;
                },
                templateSelection: function(data) {
                    return data.text;
                }
            });
        });
    </script>
@endpush
