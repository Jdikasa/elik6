<?php

namespace App\Http\Controllers\Taches;

use App\Http\Controllers\Controller;
use App\Http\Controllers\File;
use App\Models\Classeur;
use App\Models\Document;
use App\Models\Dossier;
use App\Models\Tache;
use Auth;
use Illuminate\Http\Request;

class TacheDocumentController extends Controller
{
    public function store(Request $request)
    {
        $classer = Classeur::firstOrCreate(
            [
                'service_id' => Auth::user()->agent?->fonction()->service?->id,
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

        $doc = $request->file('document');
        $document = Document::create([
            'dossier_id' => $dossier->id,
            'libelle' => \Str::beforeLast($doc->getClientOriginalName(), '.'),
            'category_id' => 9,
            'reference' => 'DT/' . Auth::user()->agent?->matricule,
            'type' => 3,
            'document' => (new File)->handle($doc, 'document', 'documents'),
            'user_id' => Auth::user()->id,
            'statut_id' => 1,
            'created_by' => Auth::user()->agent->id,
        ]);
        $tache = Tache::findOrFail($request->tache_id);
        $tache->documents()->attach($document->id);
        return response()->json(['success' => $document]);
    }


    public function delete(Request $request)
    {
        $tache = Tache::find($request->tache_id);
        $doc = Document::find($request->documents_id);
        $tache->documents()->detach($doc->id);
        $doc->delete();

        return response()->json(['delete' => 'operation successful']);
    }
}
