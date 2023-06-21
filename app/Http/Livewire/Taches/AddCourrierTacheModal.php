<?php

namespace App\Http\Livewire\Taches;

use App\Models\Agent;
use App\Models\Cible;
use App\Models\PivotUserTache;
use App\Models\Priorite;
use App\Models\Tache;
use App\Models\TacheObjectif;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddCourrierTacheModal extends Component
{
    public $stat = [
        'libelle',
        'description',
        'debut',
        'fin',
        'etat_id'
    ];

    public $stat2 = [
        'agent_id' => [],
        'objectif' => []
    ];

    public $priorites;
    public $agents;
    public $tache;
    public $document;

    public function render()
    {
        $this->priorites = Priorite::all();
        $this->agents = Agent::all();
        return view('livewire.taches.add-courrier-tache-modal');
    }

    public function saveTache()
    {
        $this->tache = Tache::create([
            'libelle' => $this->stat['libelle'],
            'description' => $this->stat['description'],
            'debut' => $this->stat['debut'],
            'fin' => $this->stat['fin'],
            'etat_id' => $this->stat['etat_id'],
            'user_id' => Auth::user()->id,
            'statut_id' => '1',
        ]);
    }

    public function storeparticipants()
    {
        $this->tache = $this->tache ? $this->tache : Tache::where('etat_id', 1)->latest();
        foreach ($this->stat2['agent_id'] as $key => $agent_id) {
            PivotUserTache::create([
                'tache_id' => $this->tache->id,
                'agent_id' => $agent_id,
                'user_id' => Auth::user()->id,
                'statut_id' => '1',
            ]);

            TacheObjectif::create([
                'libelle' => $this->stat2['objectif'],
                'tache_id' => $this->tache->id,
                'agent_id' => $agent_id,
                'user_id' => Auth::user()->id,
            ]);
        }

        $content = null;
        if($this->tache->id != null){
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'success',
                'message' => 'L\'ajout du participant à la tâche a réussi avec succès !',
            ]);
        } else {
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'error',
                'message' => 'L\'ajout du participant à la tâche a échoué !',
            ]);
        }

        session()->flash(
            'success',
            $content
        );

        return redirect()->route('pm.courriers.index');
    }
}
