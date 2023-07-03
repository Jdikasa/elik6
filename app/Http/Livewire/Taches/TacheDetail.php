<?php

namespace App\Http\Livewire\Taches;

use App\Models\Tache;
use Livewire\Component;

class TacheDetail extends Component
{
    public $selectedTache;
    public $tab = 1;
    public $agents;

    protected $listeners = [
        'selectTache' => 'selectedTache'
    ];

    public function render()
    {
        return view('livewire.taches.tache-detail');
    }

    function selectedTache($id, $tab) {
        $this->selectedTache = Tache::find($id);
        $this->tab = $tab;
    }
}
