<?php

namespace App\Http\Livewire\Taches;

use App\Models\Agent;
use App\Models\TachesStatut;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddTacheModal extends Component
{
    public $etats;
    public $agents;

    public function render()
    {
        $this->agents = Agent::all();
        $this->etats = TachesStatut::all();

        return view('livewire.taches.add-tache-modal');
    }
}
