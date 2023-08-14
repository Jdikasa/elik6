<?php

namespace App\Http\Livewire\Taches;

use App\Http\Controllers\File;
use App\Models\Classeur;
use App\Models\Commentaire;
use App\Models\Document;
use App\Models\Dossier;
use App\Models\Tache;
use App\Models\TacheObjectif;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class TachePane extends Component
{
    use WithFileUploads;

    public $tache;
    public $pourcentage;
    public $fichiers;
    public $commentaires;
    public $file;
    public $message;
    public $pan = 1;
    protected $listeners = ['reloadPane' => '$refresh'];
    protected $rules = [
        'message' => 'required|string',
        'file' => 'required|file',
    ];
    public function mount($tache, $pan = null)
    {
        $this->tache = $tache;
        $this->pourcentage = $tache->pourcentage;
    }

    public function objetcifChangeStatut($id)
    {
        $objectif = TacheObjectif::findOrFail($id);
        $statut = $objectif->statut;

        $objectif->update([
            'statut' => !$statut
        ]);
        $tache = Tache::findOrFail($objectif->tache_id);
        $a = $tache->objectifs->count();
        $b = $tache->objectifs->where('statut', 1)->count();
        $pourcentage = ($b / $a) * 100;
        $tache->pourcentage = $pourcentage;
        $tache->save();

        $this->tache = $tache;
        $this->pourcentage = $pourcentage;
        // $this->emit('reloadPane');
    }

    public function addCommentaire()
    {
        $this->validate([
            'message' => 'required', // Ajoutez ici les règles de validation pour le champ 'message'
        ]);
        Commentaire::create([
            'tache_id' => $this->tache->id,
            'user_id' => Auth::id(),
            'message' => $this->message,
        ]);

        $this->message = '';

        $this->emit('reloadPane');
        $this->pan = 2;

    }
    public function addFichier()
    {
        try {
            //code...
            $classer = Classeur::firstOrCreate(
                [
                    'service_id' => Auth::user()->agent?->fonction()->service?->id ?? 1,
                    'titre' => 'Classeur tâches',
                    'reference' => 'CT/SERV-' . (Auth::user()->agent?->fonction()->service?->id ?? 4) . '/DOCS',
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
                    'reference' => 'DT/' . Auth::user()->agent?->matricule ?? Auth::user()->id,
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
                'libelle' => Str::beforeLast($this->file->getClientOriginalName() ?? $this->tache->id, '.'),
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
            $this->emit('alert', 'success', 'Document a été ajouté à la tâche');
        } catch (\Throwable $th) {
            // throw $th;
            $this->emit('alert', 'error', 'Echec dans l\'ajout de la tâche');
        }
        // $this->validate();

        $this->reset(['file']);
        $this->fichiers = $this->tache->documents->sortByDesc('id');
        $this->emit('reloadPane');

        $this->pan = 3;
    }

    public function changeTab($value)
    {
        $this->pan = $value;
    }
    public function render()
    {
        switch ($this->pan) {
            case 1:
                $this->pan = 1;
                break;
            case 2:
                $this->pan = 2;
                break;
            case 3:
                $this->pan = 3;
                break;
            default:
                # code...
                break;
        }
        $this->fichiers = $this->tache->documents->sortByDesc('id');
        $this->commentaires = $this->tache->commentaires()->orderBy('created_at', 'desc')->get();

        return view('livewire.taches.tache-pane');
    }
}
