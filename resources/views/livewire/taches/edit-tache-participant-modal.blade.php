@if ($objectif)
    <div class="modal fade" id="modal-edit-participants-{{ $objectif->id }}" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center" id="exampleModalLabel">
                        Modifier un objectif
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pt-0">
                    <form wire:submit.prevent="modifierParticipant">
                        <div class="form-group row g-3">
                            <div class="col-lg-12">
                                <label for="" class="mb-1">Agent assigné: </label>
                                <p class="mb-0">
                                    {{ $objectif->agent?->prenom . ' ' . $objectif->agent?->nom }}
                                </p>
                            </div>
                            <div class="col-lg-12">
                                <label for="" class="mb-1">Objectif en cours: </label>
                                <ul class="list-object">
                                    <li class="d-flex align-items-baseline">
                                        <i class="fi fi-rr-target me-1" style="flex: 0 0 auto;"></i> {{ $objectif->libelle }}
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-12">
                                <label for="">Nouvel objectif</label>
                                <input type="text" class="form-control" required>
                                @error('libelle')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- <div class="col-lg-12 text-center">
                                <a href="#" class="btn btn-danger text-end"
                                    wire:click='deleteParticipant({{ $objectif->id }})' data-bs-dismiss="modal"><i
                                        class="fi fi-rr-trash"></i></a>
                            </div> --}}
                            <div class="col-lg-12 text-end mb-3">
                                <button type="submit" class="btn btn-add mt-3" data-bs-dismiss="modal">Modifier</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif
