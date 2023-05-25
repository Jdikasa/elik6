<div class="modal fade participant" id="modal-add-participants-{{ $tache->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
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
                <form method="post" action="{{ route('pm.taches.participants.store') }}">
                    @csrf
                    <input type="hidden" name="tache_id" value="{{ $tache->id }}">
                    <div class="form-group row g-2">
                        <div class="col-lg-12">
                            <label for="">Agents</label>
                            <select class="form-select agent_select" name="agent_id" aria-label="Default select example"
                                placeholder="Selectionnez l'etat" id="agent_id">
                                <option value="" selected disabled>Selectionnez</option>
                                @foreach($agents as $agent)
                                    <option value="{{ $agent->id }}">{{ $agent->prenom }} {{ $agent->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-12">
                            <label for="">Tâches à effectuer</label>
                            <select class="form-select tag" name="taches[]" aria-label="Default select example"
                                placeholder="Selectionnez les taches" id="" multiple>
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
            console.log('modal-add-participants-');

            $('.tag').select2({
                dropdownParent: $('modal-add-participants-'+ {{ $tache->id }}),
                width: '100%',
                placeholder: $(this).data('placeholder'),
                tags:true,
            });

            // var data = [
            //     @foreach($agents as $agent)
            //         {
            //             id: {{ $agent->id }},
            //             text: '{{ $agent->prenom }} {{ $agent->nom }}',
            //             html: '{{ $agent->prenom }} {{ $agent->nom }}</div>',
            //             title: '{{ $agent->prenom }} {{ $agent->nom }}'
            //         },
            //     @endforeach
            // ];

            // $(".agent_select").select2({
            //     dropdownParent: $('.participant'),
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
    </script>
@endpush
