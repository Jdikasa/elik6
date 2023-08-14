<?php

namespace App\Http\Controllers\Taches;

use App\Events\TacheCreated;
use App\Http\Controllers\Controller;
use App\Http\Controllers\File;
use App\Models\Agent;
use App\Models\ArchivePermission;
use App\Models\Cible;
use App\Models\Classeur;
use App\Models\Commentaire;
use App\Models\Document;
use App\Models\Dossier;
use App\Models\Etat;
use App\Models\Historique;
use App\Models\PivotUserTache;
use App\Models\Priorite;
use App\Models\Tache;
use App\Models\TacheObjectif;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TacheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taches = Tache::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
        $agents = Agent::all();

        return view('pm.taches.index')->with([
            'agents' => $agents,
            'taches' => $taches,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = [
            'agents' => Agent::select('id', 'nom', 'prenom')->where('id', '!=', Auth::id())->get(),
            'priorites' => Priorite::select('id', 'titre')->get(),
        ];
        if ($request->doc != null) {
            $id = intval($request->doc);
            $document = Document::findOrFail($id);
            $data['document'] = $document;
        } else {
            $data['document'] = null;
        }
        return view('arsp.pages.taches.new-task', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            // dd($request->hasFile('documents'));
            $tache = Tache::create([
                'titre' => $request->titre,
                'description' => $request->description,
                'date_debut' => $request->date_debut,
                'date_fin' => $request->date_fin,
                'priorite_id' => $request->priorite_id,
                'user_id' => Auth::user()->id,
                'tache_statut_id' => '1',
            ]);

            $agents = $request->input('agent_id');
            $objects = $request->input('objects');

            if ($request->has('agent_id') && $request->has('objects')) {
                foreach ($agents as $index => $agentId) {
                    PivotUserTache::create([
                        'tache_id' => $tache->id,
                        'agent_id' => $agentId,
                        'user_id' => Auth::user()->id,
                        'statut_id' => 1,
                    ]);
                }

                foreach ($agents as $index => $agentId) {
                    TacheObjectif::create([
                        'libelle' => $objects[$index],
                        'tache_id' => $tache->id,
                        'user_id' => Auth::user()->id,
                        'statut' => 0,
                        'agent_id' => $agentId
                    ]);

                }
            }
            if ($request->has('doc_id')) {
                $newDoc = Document::findOrFail($request->doc_id);
                $tache->documents()->attach($newDoc->id);
            }

            if ($request->hasFile('documents')) {

                $classer = Classeur::firstOrCreate(
                    [
                        'service_id' => Auth::user()->agent?->fonction()->service?->division?->departement->id ?? 4,
                        'titre' => 'Classeur tâches',
                        'reference' => 'CT/DEP-' . (Auth::user()->agent?->fonction()->service?->division?->departement->id ?? 4) . '/DOCS',
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

                foreach ($request->file('documents') as $key => $doc) {
                    // $path = "documents" . DIRECTORY_SEPARATOR . date('FY') . DIRECTORY_SEPARATOR;
                    // $name = Str::random(20);
                    // $ext = $doc->getClientOriginalExtension(); // Utiliser getgetClientOriginalExtension() au lieu de getClientOriginalExtension()

                    $document = Document::create([
                        'dossier_id' => $dossier->id,
                        'libelle' => Str::beforeLast($doc->getClientOriginalName(), '.'),
                        'category_id' => 9,
                        'reference' => 'DT/' . Auth::user()->agent?->matricule,
                        'type' => 3,
                        'document' => (new File)->handle($doc, 'document', 'documents'),
                        'user_id' => Auth::user()->id,
                        'statut_id' => 1,
                        'created_by' => Auth::user()->agent->id,
                    ]);

                    ArchivePermission::create([
                        'agent_id' => Auth::user()->agent->id,
                        'permissionable_id' => $document->id,
                        'permissionable_type' => 'App\Models\Document',
                        'key' => 'view_document',
                    ]);

                    $tache->documents()->attach($document->id);
                }
            }

            event(new TacheCreated($tache));

            $content = json_encode([
                'name' => 'Gestion de tâche',
                'statut' => 'success',
                'message' => 'L\'ajout de la tâche a réussi avec succès !',
            ]);

        } catch (\Throwable $th) {
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'error',
                'message' => 'L\'ajout de la tâche a échoué !',
            ]);
        }

        session()->flash(
            'session',
            $content
        );

        return redirect()->route('arsp.taches.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tache = Tache::findOrFail($id);
        if ($tache->user_id == Auth::user()->id) {
            # code...
            $agents = Agent::select('id', 'nom', 'prenom')->get();
            $priorites = Priorite::select('id', 'titre')->get();
            return view('arsp.pages.taches.edit-task', compact('tache', 'priorites', 'agents'));
        } else {
            # code...
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'error',
                'message' => 'Accès non autorisé !',
            ]);
            session()->flash(
                'session',
                $content
            );
            return back();
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            //code...
            $tache = Tache::findOrFail($id);
            if ($tache->user_id == Auth::user()->id) {
                # code...
                $tache->update([
                    'titre' => $request->titre,
                    'description' => $request->description,
                    'date_debut' => $request->date_debut,
                    'date_fin' => $request->date_fin,
                    'priorite_id' => $request->priorite_id,
                    'user_id' => Auth::user()->id,
                    'tache_statut_id' => '1',
                ]);

                $content = json_encode([
                    'name' => 'Gestion de tâche',
                    'statut' => 'success',
                    'message' => 'La modification de la tâche a réussi avec succès !',
                ]);
            } else {
                $content = json_encode([
                    'name' => 'Ressources humaines',
                    'statut' => 'error',
                    'message' => 'Accès non autorisé !',
                ]);
            }
        } catch (\Throwable $th) {
            //throw $th;
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'error',
                'message' => 'La modification de la tâche a échoué !',
            ]);
        }
        session()->flash(
            'session',
            $content
        );

        return redirect()->route('arsp.taches.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tache = Tache::where('id', $id)->update([
            'statut_id' => '4',
        ]);

        if ($tache == 1) {
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'success',
                'message' => 'La suppression de la tâche a réussie avec succès !',
            ]);
        } else {
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'error',
                'message' => 'La suppression de la tâche a échouée !',
            ]);
        }

        session()->flash(
            'session',
            $content
        );

        return back();
    }

    // public function deleteobjectif($id)
    // {
    //     Cible::where('id', $id)->delete([]);

    //     return back();
    // }

    // public function storeobjectif(Request $request)
    // {
    //     Cible::create([
    //         'libelle' => $request->libelle,
    //         'tache_id' => $request->tache_id,
    //         'user_id' => Auth::user()->id,
    //     ]);

    //     return back();
    // }

    // public function storeparticipants(Request $request)
    // {
    //     $tache = PivotUserTache::create([
    //         'tache_id' => $request->tache_id,
    //         'agent_id' => $request->agent_id,
    //         'user_id' => Auth::user()->id,
    //         'statut_id' => '1',
    //     ]);

    //     if ($tache->id != null) {
    //         $content = json_encode([
    //             'name' => 'Ressources humaines',
    //             'statut' => 'success',
    //             'message' => 'L\'ajout du participant à la tâche a réussi avec succès !',
    //         ]);
    //     } else {
    //         $content = json_encode([
    //             'name' => 'Ressources humaines',
    //             'statut' => 'error',
    //             'message' => 'L\'ajout du participant à la tâche a échoué !',
    //         ]);
    //     }

    //     session()->flash(
    //         'session',
    //         $content
    //     );

    //     return back();
    // }

    // public function deleteparticipants($id)
    // {
    //     $pivotusertache = PivotUserTache::where('id', $id)->delete();

    //     if ($pivotusertache == 1) {
    //         $content = json_encode([
    //             'name' => 'Ressources humaines',
    //             'statut' => 'success',
    //             'message' => 'La suppression du participant à la tâche a réussie avec succès !',
    //         ]);
    //     } else {
    //         $content = json_encode([
    //             'name' => 'Ressources humaines',
    //             'statut' => 'error',
    //             'message' => 'La suppression du participant à la tâche a échouée !',
    //         ]);
    //     }

    //     session()->flash(
    //         'session',
    //         $content
    //     );

    //     return back();
    // }

    // public function storecommentaire(Request $request)
    // {
    //     $commentaire = Commentaire::create([
    //         'message' => $request->message,
    //         'tache_id' => $request->tache_id,
    //         'user_id' => Auth::user()->id,
    //         'statut_id' => '1',
    //     ]);

    //     $commentaires = $commentaire->tache->commentaires;

    //     return back();
    // }

    // public function updateciblechecked(Request $request)
    // {
    //     Cible::where('id', $request->id)->update([
    //         'statut' => '1'
    //     ]);

    //     $taches = Tache::all();

    //     return response()->json($taches, 200);
    // }

    // public function updatecibleunchecked(Request $request)
    // {
    //     Cible::where('id', $request->id)->update([
    //         'statut' => '0'
    //     ]);

    //     $taches = Tache::all();

    //     return response()->json($taches, 200);
    // }

    // public function storecommentaire(Request $request)
    // {
    //     $commentaire = Commentaire::create([
    //         'message' => $request->message,
    //         'tache_id' => $request->tache_id,
    //         'user_id' => Auth::user()->id,
    //         'statut_id' => '1',
    //     ]);

    //     $commentaires = $commentaire->tache->commentaires;

    //     return back();
    // }

}
