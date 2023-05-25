<div class="modal fade" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog">
        <form class="modal-content" action="{{ route('pm.projects.updateStep', $project) }}" method="POST" id="delete-form">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-12">
                        <h5>Mis à jour</h5>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Etape du projet <sup class="text-danger">*</sup></label>
                        <div class="tom-select-custom" wire:ignore>
                            <select class="js-select form-select form-select-sm" autocomplete="off"
                                data-hs-tom-select-options='{
                                    "placeholder": "Selectionnez une etape..."
                                }' name="note_etape_id" wire:model='noteetape' required>
                                <option value="" selected disabled>Choisir l'etape</option>
                                @foreach ($noteEtapes as $noteEtape)
                                    <option value="{{ $noteEtape->id }}">
                                        {{ $noteEtape->titre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Statut du projet <sup class="text-danger">*</sup></label>
                        <div class="tom-select-custom" wire:ignore.self>
                            <select id="js-select" class="js-selec form-select form-select-sm" autocomplete="off"
                                data-hs-tom-select-options='{
                                    "placeholder": "Selectionnez un statut..."
                                }' name="note_statut_id" required>

                                <option value="" selected disabled>Choisir le statut</option>
                                @foreach ($noteStatuts as $noteStatut)
                                    <option value="{{ $noteStatut->id }}">
                                        {{ $noteStatut->titre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Note</label>
                        <textarea class="form-control" name="maj_text" placeholder="Note" rows="4" cols="4"></textarea>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-success" data-bs-dismiss="modal">Annuler</a>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
        </form>
    </div>
</div>

@push('scripts')

    <script>

        document.addEventListener('livewire:load', function () {

            HSCore.components.HSTomSelect.init('.modal #js-select');

        });

        $(document).ready(function () {

            $('select[name=note_etape_id]').on('change', function (e) {

                HSCore.components.HSTomSelect.getItems()[0].destroy();
                document.addEventListener('livewire:load', function () {
                    HSCore.components.HSTomSelect.init('.modal #js-select');
                });

                // HSCore.components.HSTomSelect.getItems()[0].refreshItems();
                // HSCore.components.HSTomSelect.init('.modal #js-select');

                // var data = $(this).val();
                // @this.set('date_soumission', data);
            });

        });
    </script>

@endpush
