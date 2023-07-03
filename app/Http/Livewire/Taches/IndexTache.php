<?php

namespace App\Http\Livewire\Taches;

use App\Models\Tache;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class IndexTache extends Component
{
    public $taches;
    public $newTaches;
    public $tacheEncours;
    public $users;
    public $agents;
    public $page = 1;
    public $selectedTache;

    protected $queryString = [
        'page' => [
            'except' => 1,
            'as' => 'p',
        ],
    ];

    public function render()
    {
        $this->users = Auth::user()->currentTeam->usersAll;
        $this->newTaches = Tache::forCurrentTeam()->initiale()->orderBy('created_at', 'desc')->get();
        $this->tacheEncours = Tache::forCurrentTeam()->encours()->orderBy('created_at', 'desc')->get();
        $this->taches = Tache::forCurrentTeam()->orderBy('created_at', 'desc')->get();

        return view('livewire.taches.index-tache');
    }

    public function startTraitement($id)
    {
        $tache = Tache::find($id);
        $tache->statut_id = 2;
        $tache->save();
    }

    public function switchPage($num)
    {
        $this->page = $num;
    }

    public function selectTache($id, $tab)
    {
        $this->emit('selectTache', $id, $tab);
        // $this->selectedTache = Tache::find($id);
        // $this->page = $page;
    }
}
