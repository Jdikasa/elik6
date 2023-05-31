<div class=" modal fade " id="updateModal" tabindex="-1" aria-labelledby="updateModal" aria-hidden="true"
    wire:ignore.self>
    <div class="modal-dialog modal-dialog-scrollable modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="container">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Mise à jour</h5>
                    {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> --}}
                </div>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <p>{{ $message }}</p>
                    <div class="d-flex justify-content-center gap-2">
                        <button class="btn px-2 py-1 btn-info btn-sm"
                            wire:click='fetch'>
                            Rechercher une mise à jour
                        </button>
                        @if ($hasFetsh)
                            <button class="btn px-2 py-1 btn-success btn-sm"
                                wire:click='pull'>
                                Mettre à jour
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
