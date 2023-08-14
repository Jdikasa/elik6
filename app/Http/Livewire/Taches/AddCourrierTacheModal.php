<?php

namespace App\Http\Livewire\Taches;

use App\Events\CourrierPartage;
use App\Models\Agent;
use App\Models\Cible;
use App\Models\CourriersPartage;
use App\Models\CourrierTypesTraitement;
use App\Models\Direction;
use App\Models\Historique;
use App\Models\PivotUserTache;
use App\Models\Priorite;
use App\Models\Tache;
use App\Models\TacheObjectif;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddCourrierTacheModal extends Component
{
    public $stat = [
        'agent_id' => '',
        'traitement_id' => '',
        'debut' => '',
        'fin' => '',
        'priorite_id' => '',
        'note' => ''
    ];

    public $priorites;
    public $agents;
    public $traitements;
    public $courrier;

    public function render()
    {
        $this->priorites = Priorite::all();
        $this->agents = Direction::all();
        $this->traitements = CourrierTypesTraitement::all();
        return view('livewire.taches.add-courrier-tache-modal');
    }

    public function savePartager()
    {
        $direction = Direction::find($this->stat['agent_id']);
        $partage = CourriersPartage::create([
            'agent_id' => $direction->secretaire->agent->id,
            'courrier_id' => $this->courrier->id,
            'traitement_id' => $this->stat['traitement_id'],
            'date_debut' => $this->stat['debut'],
            'date_fin' => $this->stat['fin'],
            'priorite_id' => $this->stat['priorite_id'],
            'note' => $this->stat['note'],
            'send_by' => Auth::user()->id
        ]);

        Historique::create([
            "key" => "Accusé de reception",
            "historiquecable_id" => $this->courrier->id,
            "historiquecable_type" => Courrier::class,
            "description"  => "A partagé ce courrier avec la direction ". $direction->titre,
            "user_id" => Auth::user()->id,
        ]);

        event(new CourrierPartage($partage, 'Un courrier vous a été partagé par ' . Auth::user()->agent->prenom . ' ' . Auth::user()->agent->nom));

        $this->emit('alert', 'success', 'Partagé avec succès');
        $this->emit('finishPartage');
    }

}