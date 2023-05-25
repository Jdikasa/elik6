<?php

namespace App\Http\Livewire\Document;

use Livewire\Component;
use App\Models\Classeur;
use App\Models\Document;
// use App\Models\Document;
use App\Models\Dossier;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class DocumentIndex extends Component
{
    public $classeurs;
    public $dossiers;
    public $files;
    public $filter;
    public $search;
    public $filterText = 'Filtre';

    public function mount()
    {
        $this->filter = "Tous";
    }

    public function render()
    {
        $this->classeurs = Classeur::forCurrentTeam()->orderBy('created_at', 'desc')->get();
        // ->filter(function ($classeur)
        // {
        //     return Gate::allows('view', $classeur);
        // });

        if ($this->search) {
            $this->classeurs = $this->classeurs->filter(function ($classeur)
            {
                return Str::contains(Str::lower($classeur->titre), Str::lower($this->search)) || Str::contains(Str::lower($classeur->reference), Str::lower($this->search));
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
                $this->classeurs = $this->classeurs->sortBy('created_at',);
                break;
            case 5:
                $this->filterText = 'Date de modification';
                $this->classeurs = $this->classeurs->sortByDesc('updated_at');
                break;
            default:
                # code...
                break;
        }

        return view('livewire.document.document-index');
    }

    public function changeFilter($value)
    {
        $this->filter = $value;
    }
}
