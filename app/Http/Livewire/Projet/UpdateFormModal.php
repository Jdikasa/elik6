<?php

namespace App\Http\Livewire\Projet;

use Livewire\Component;
use App\Models\NoteEtape;

class UpdateFormModal extends Component
{

    public $noteEtapes = [];
    public $noteStatuts = [];
    public $project;
    public $noteetape = '';

    public function mount($project)
    {
        $this->noteEtapes = NoteEtape::forCurrentTeam()->select('id','titre')->get();
        $this->project = $project;
    }

    public function updatedNoteetape()
    {
        $etape = NoteEtape::find($this->noteetape);
        if(!is_null($etape) && !is_null($etape)){
            $this->noteStatuts = $etape->statuts;
        }
    }

    public function render()
    {
        return view('livewire.projet.update-form-modal');
    }
}
