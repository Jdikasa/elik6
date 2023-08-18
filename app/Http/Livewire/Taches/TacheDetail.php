<?php

namespace App\Http\Livewire\Taches;

use App\Models\Tache;
use App\Models\TacheObjectif;
use Livewire\Component;

class TacheDetail extends Component
{
    public $tache;
    // public $pourcentage;

    public function mount($tache)
    {
        $this->tache = $tache;
        // $this->pourcentage = $tache->pourcentage;
    }

    // public function objetcifChangeStatut($id)
    // {
    //     $objectif = TacheObjectif::findOrFail($id);
    //     $statut = $objectif->statut;

    //     $objectif->update([
    //         'statut' => !$statut
    //     ]);
    //     $tache = Tache::findOrFail($objectif->tache_id);
    //     $a = $tache->objectifs->count();
    //     $b = $tache->objectifs->where('statut', 1)->count();
    //     $pourcentage = ($b / $a) * 100;
    //     $tache->pourcentage = $pourcentage;
    //     $tache->save();

    //     $this->tache = $tache;
    //     $this->pourcentage = $pourcentage;
    //     $this->emit('reloadComponent');
    // }


    public function render()
    {
        // $this->tache = Tache::findOrFail($this->tache->id);
        // dd($this->tache);
        return view('livewire.taches.tache-detail');
    }
}
