<?php

namespace App\Http\Livewire\Document;

use App\Models\Agent;
use App\Models\CourrierCategory;
use App\Models\CourrierTraitement;
use App\Models\DocumentType;
use App\Models\Priorite;
use Livewire\Component;

class EditDocForm extends Component
{
    public $types;
    public $natures;
    public $departements;
    public $agents;
    public $agentSelected;
    public $followers;
    public $priorites;
    public $destination;
    public $copies;
    public $isConfidentiel;
    public $dg;
    public $categories;
    public $traitements;
    public $dossier_id;
    public $document;

    public function render()
    {
        $this->dossier_id = $this->document->dossier->id;
        $this->priorites = Priorite::forCurrentTeam()->get();
        $this->followers = $this->agents->where('id', '!=', $this->agentSelected);
        $this->dg = Agent::forCurrentTeam()->whereHas('fonctions', function ($query)
        {
            $query->where('fonctions.id', 1)->where('pivot_agent_fonctions.statut_id', 1);
        })->first();

        $this->types = DocumentType::forCurrentTeam()->select('id','titre')->get();

        return view('livewire.document.edit-doc-form');
    }
}
