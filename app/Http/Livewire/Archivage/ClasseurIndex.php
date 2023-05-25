<?php

namespace App\Http\Livewire\Archivage;

use Livewire\Component;
use App\Models\Classeur;
use App\Models\Document;
// use App\Models\Document;
use App\Models\Dossier;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class ClasseurIndex extends Component
{
    public $classeurs;
    public $dossiers;
    public $files;
    public $filter;
    public $filterText = 'Filtre';
    public $search;
    public $annee;

    public function mount()
    {
        $this->filter = "Tous";
    }

    public function render()
    {
        $this->classeurs = Classeur::forCurrentTeam()->whereHas('documents', function ($query)
        {
            $query->where('statut_id', 6);
        })->get();
        // ->filter(function ($classeur)
        // {
        //     return Gate::allows('view', $classeur);
        // });

        if ($this->search) {
            $this->classeurs = $this->classeurs->filter(function ($classeur)
            {
                return Str::contains($classeur->titre, $this->search) || Str::contains($classeur->reference, $this->search);
            });
        }

        switch ($this->filter) {
            case 1:
                $this->filterText = 'Filtre';
                $this->classeurs = $this->classeurs->sortByDesc('created_at');
                break;
            case 2:
                $this->filterText = 'A - Z';
                $this->classeurs = $this->classeurs->sortBy('titre');
                break;
            case 3:
                $this->filterText = 'Z - A';
                $this->classeurs = $this->classeurs->sortByDesc('titre');
                break;
            case 4:
                $this->filterText = "Date d'ajout";
                $this->classeurs = $this->classeurs->sortByDesc('created_at');
                break;
            case 5:
                $this->filterText = 'Date de modification';
                $this->classeurs = $this->classeurs->sortByDesc('updated_at');
                break;
            default:
                # code...
                break;
        }

        return view('livewire.archivage.classeur-index');
    }

    public function changeFilter($value)
    {
        $this->filter = $value;
    }
}
