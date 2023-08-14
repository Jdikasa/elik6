<?php

namespace App\Http\Livewire\Taches;

use App\Models\Commentaire;
use Auth;
use Livewire\Component;

class TacheCommentairePane extends Component
{
    public $tache;
    public $message;
    protected $rules = [
        'message' => 'required|string',
    ];

    public function mount($tache)
    {
        $this->tache = $tache;
    }

    public function addCommentaire()
    {
        $this->validate();

        Commentaire::create([
            'tache_id' => $this->tache->id,
            'user_id' => Auth::id(),
            'message' => $this->message,
        ]);

        $this->message = '';

        $this->emit('reloadComponent');
    }

    public function render()
    {
        $commentaires = $this->tache->commentaires()->orderBy('created_at', 'desc')->get();

        return view('livewire.taches.tache-commentaire-pane', [
            'commentaires' => $commentaires,
        ]);
    }
}
