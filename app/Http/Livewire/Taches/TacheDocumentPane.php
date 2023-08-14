<?php

namespace App\Http\Livewire\Taches;

use App\Http\Controllers\File;
use App\Models\Classeur;
use App\Models\Commentaire;
use App\Models\Document;
use App\Models\Dossier;
use App\Models\Tache;
use Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Storage;
use Str;

class TacheDocumentPane extends Component
{
    use WithFileUploads;

    public $tache;
    public $file;

    protected $rules = [
        'file' => 'required|file',
    ];

    public function mount($tache)
    {
        $this->tache = $tache;
    }

    public function addFichier()
    {
        $this->validate();

        $classer = Classeur::firstOrCreate(
            [
                'service_id' => Auth::user()->agent?->fonction()->service?->id ?? 1,
                'titre' => 'Classeur tâches',
                'reference' => 'CT/SERV-' . (Auth::user()->agent?->fonction()->service?->division?->departement->id ?? 4) . '/DOCS',
            ],
            [
                'description' => 'Classeur pour les documents des tâches',
                'created_by' => Auth::user()->agent->id,
                'updated_by' => Auth::user()->agent->id,
            ]
        );

        $dossier = Dossier::firstOrCreate(
            [
                'classeur_id' => $classer->id,
                'titre' => 'Dossier de l\'agent ' . Auth::user()->agent?->prenom . ' ' . Auth::user()->agent?->nom,
                'reference' => 'DT/' . Auth::user()->agent?->matricule,
            ],
            [
                'description' => 'Dossier pour les documents tache de l\'agent ' . Auth::user()->agent?->nom,
                'confidentiel' => 0,
                'created_by' => Auth::user()->agent->id,
                'updated_by' => Auth::user()->agent->id,
            ]
        );

        $document = Document::create([
            'dossier_id' => $dossier->id,
            'libelle' => Str::beforeLast($this->file->getClientOriginalName(), '.'),
            'category_id' => 9,
            'reference' => 'DT/' . Auth::user()->agent?->matricule,
            'type' => 3,
            'document' => (new File)->handle($this->file, 'document', 'documents'),
            'user_id' => Auth::user()->id,
            'statut_id' => 1,
            'created_by' => Auth::user()->agent->id,
        ]);
        $tache = Tache::findOrFail($this->tache->id);
        $tache->documents()->attach($document->id);

        $this->file = null;

        $this->emit('reloadComponent');
    }

    public function deleteFichier($fichierId)
    {
        $fichier = Document::findOrFail($fichierId);

        Storage::disk('public')->delete($fichier->document);

        $fichier->delete();

        $this->emit('reloadComponent');
    }

    public function render()
    {
        $fichiers = $this->tache->documents;

        return view('livewire.taches.tache-document-pane', [
            'fichiers' => $fichiers,
        ]);
    }

}