<div class="tab-pane fade" id="fichier-{{ $tache->id }}" role="tabpanel" aria-labelledby="home-tab" wire:ignore.self>
    <div class="block-scroll-file" style="overflow-y: auto; height: 35vh; overflow-x: hidden;">
        @if ($fichiers->count() == 0)
            <div class="file d-flex">
                <div class="name-file">
                    Aucun fichier téléversé !
                </div>
            </div>
        @else
            @foreach ($fichiers as $fichier)
                <div class="file d-flex">
                    <a href="{{ files($fichier->document)->link }}" target="_blank">
                        <div class="icon">
                            <i class="fi fi-rr-file"></i>
                        </div>
                    </a>
                    <a href="{{ files($fichier->document)->link }}" target="_blank">
                        <div class="name-file">
                            <h6>{{ $fichier->libelle }}</h6>
                            <p>{{ $fichier->type }}</p>
                        </div>
                    </a>
                    {{-- <button wire:click="deleteFichier({{ $fichier->id }})" class="btn btn-sm btn-delete">
                        <i class="fi fi-rr-trash"></i>
                    </button> --}}
                </div>
            @endforeach
        @endif
    </div>

    <form wire:submit.prevent="addFichier">
        <div class="form-group">
            <input type="file" wire:model="file" class="form-control">
            @error('file')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </div>
    </form>
</div>
