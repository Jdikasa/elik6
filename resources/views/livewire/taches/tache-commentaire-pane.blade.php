<div class="tab-pane fade" id="comment-{{ $tache->id }}" role="tabpanel"
    aria-labelledby="home-tab">
    <div class="all-comments">
        <div class="block-scroll" id="tache-commentaires">
            @if ($commentaires->count() == 0)
                <div class="file d-flex">
                    <div class="name-file">
                        Aucun commentaire pour l'instant !
                    </div>
                </div>
            @else
                @foreach ($commentaires as $commentaire)
                    <div
                        class="block-comment {{ $commentaire->user_id == Auth::id() ? 'block-comment-me' : '' }} commentaires">
                        <div class="block-info-comment d-flex">
                            <div class="avatar-comment commentaires">
                                <img src="{{ imageOrDefault($commentaire->user->agent->image) }}" alt="Photo profil">
                            </div>
                            <div class="name-comment commentaires">
                                <h6>{{ $commentaire->user->agent->prenom . ' ' . $commentaire->user->agent->nom }}</h6>
                                <p>{{ $commentaire->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        <div class="comment commentaires">
                            <p>{{ $commentaire->message }}</p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <form wire:submit.prevent="addCommentaire" class="form-float">
            <div class="form-group">
                <textarea wire:model="message" class="form-control" rows="3" placeholder="Ajouter un commentaire..."></textarea>
                @error('message')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-primary" wire:loading>Envoyer</button>
            </div>
        </form>
    </div>

</div>
