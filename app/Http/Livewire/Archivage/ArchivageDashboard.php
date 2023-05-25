<?php

namespace App\Http\Livewire\Archivage;

use App\Models\Classeur;
use App\Models\Document;
use App\Models\DocumentArchivage;
use App\Models\Dossier;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Illuminate\Support\Str;

class ArchivageDashboard extends Component
{
    public $classeurs;
    public $dossiers;
    public $files;
    public $groupeFiles;
    public $filter;
    public $search;

    public function mount()
    {
        $this->filter = "Tous";
    }

    public function render()
    {
        $this->groupeFiles = Document::forCurrentTeam()->archive()->select('created_at')->orderBy('created_at', 'desc')->get();

        return view('livewire.archivage.archivage-dashboard');
    }

    public function changeFilter($value)
    {
        $this->filter = $value;
    }
}
