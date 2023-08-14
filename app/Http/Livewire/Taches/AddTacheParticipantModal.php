<?php

namespace App\Http\Livewire\Taches;

use App\Models\Agent;
use App\Models\TacheObjectif;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddTacheParticipantModal extends Component
{
    public $tache;
    public $agents;
    public $agent_id;
    public $libelle;

    protected $rules = [
        'agent_id' => 'required',
        'libelle' => 'required',
    ];
    public function mount($tache)
    {
        $this->tache = $tache;
        $this->agents = Agent::select('id', 'nom', 'prenom')->where('id','!=',Auth::user()->id)->get();
    }

    public function ajouterParticipant()
    {
        $this->validate();

        TacheObjectif::create([
            'libelle' => $this->libelle,
            'tache_id' => $this->tache->id,
            'agent_id' => $this->agent_id,
            'user_id' => Auth::id(),
            'statut' => 0,
        ]);
        $this->emit('reloadComponent');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.taches.add-tache-participant-modal');
    }
}
