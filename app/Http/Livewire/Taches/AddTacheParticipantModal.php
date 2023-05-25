<?php

namespace App\Http\Livewire\Taches;

use App\Models\Agent;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddTacheParticipantModal extends Component
{
    public $tache;
    public $agents;

    public function render()
    {
        $this->agents = Agent::all();

        return view('livewire.taches.add-tache-participant-modal');
    }
}
