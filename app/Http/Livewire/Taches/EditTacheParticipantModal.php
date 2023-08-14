<?php

namespace App\Http\Livewire\Taches;

use App\Models\Agent;
use App\Models\TacheObjectif;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditTacheParticipantModal extends Component
{
    public $objectif;
    public $libelle;

    public function mount($objectif)
    {
        $this->objectif = $objectif;
        $this->libelle = $objectif->libelle;
    }

    public function modifierParticipant()
    {
        $this->objectif->update([
            'libelle' => $this->libelle,
        ]);
        $this->emit('reloadComponent');
    }

    public function deleteParticipant($id)
    {
        $objectif = TacheObjectif::findOrFail($id);
        $objectif->delete();

        $this->emit('reloadComponent');
        
    }

    public function render()
    {
        return view('livewire.taches.edit-tache-participant-modal');
    }
}
