<?php

namespace App\Http\Livewire\Taches;

use App\Models\Tache;
use Auth;
use Livewire\Component;

class IndexTache extends Component
{
    public $taches;
    public $assignees;
    public $tab;
    public $newTaches;
    public $tacheEncours;
    public $horsDelais;
    public $endTaches;
    public $users;

    protected $listeners = ['reloadComponent' => '$refresh'];

    public function mount()
    {
        if (Auth::user()->id == 1) {
            # code...
            $this->tab = 1;
        } else {
            # code...
            $this->tab = 2;
        }

    }
    public function refresh()
    {
        $this->reset();
    }

    public function updateStatut($id)
    {
        $tache = Tache::findOrFail($id);
        if ($tache->pourcentage == 0) {
            # code...
            $tache->update([
                "tache_statut_id" => 2,
                "pourcentage" => 1
            ]);
        } else {
            $tache->update([
                "tache_statut_id" => 2,
            ]);
        }
        $this->tab = 3;
    }
    public function changeTab($value)
    {
        $this->tab = $value;
    }
    public function render()
    {
        switch ($this->tab) {
            case 1:
                $this->tab = 1;
                break;
            case 2:
                $this->tab = 2;
                break;
            case 3:
                $this->tab = 3;
                break;
            case 4:
                $this->tab = 4;
                break;
            case 5:
                $this->tab = 5;
                break;
            default:
                # code...
                break;
        }
        if (Auth::user()->id == 1) {
            # code...
            $taches = Tache::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
            $this->taches = $taches;
        } else {
            # code...
            $assignees = Tache::getTachesForCurrentUser();
            $this->assignees = $assignees;
            $this->newTaches = $this->assignees->where('tache_statut_id', '1')->sortByDesc('id');
            $this->tacheEncours = $this->assignees->where('tache_statut_id', '2')->sortByDesc('id');
            $this->endTaches = $this->assignees->where('tache_statut_id', '3')->sortByDesc('id');
            $this->horsDelais = $this->assignees->where('tache_statut_id', '4')->sortByDesc('id');
        }

        return view('livewire.taches.index-tache');
    }
}