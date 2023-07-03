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
        $etats = Etat::where('statut_id', 1)->get();
        $taches = Tache::forCurrentTeam()->get();
        $users = Auth::user()->currentTeam->allUsers()->reject(function ($user) {
            return $user->id == Auth::user()->id;
        });
        $agents = $users->map(function ($user) {
            return $user->agent;
        });
        // Agent::forCurrentTeam()->get();
        $priorites = Priorite::all();
        $tacheEncours = Tache::forCurrentTeam()->encours()->get();

        return view('pm.taches.index')->with([
            'agents' => $agents,
            'taches' => $taches,
            'etats' => $etats,
            'priorites' => $priorites,
            'tacheEncours' => $tacheEncours,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

            $tache = Tache::create([
                'titre' => $request->libelle,
                'description' => $request->description,
                'date_debut' => $request->debut,
                'date_fin' => $request->fin,
                'priorite_id' => $request->priorite_id,
                'user_id' => Auth::user()->id,
                'document_id' => $request->document_id,
                'team_id' => Auth::user()->currentTeam->id,
                'statut_id' => 1,
            ]);

            if (count($request->agents ?? [])) {
                $tache->executants()->attach($request->agents);
            }

            event(new TacheCreated($tache));

            $content = json_encode([
                'name' => 'Gestion de tâche',
                'statut' => 'success',
                'message' => 'L\'ajout de la tâche a réussi avec succès !',
            ]);

        } catch (\Throwable $th) {
            dd($th);
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

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

        if($tache == 1){
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

    public function deleteobjectif($id)
    {
        Cible::where('id', $id)->delete([]);

        return back();
    }

    public function storeobjectif(Request $request)
    {
        Cible::create([
            'libelle' => $request->libelle,
            'tache_id' => $request->tache_id,
            'user_id' => Auth::user()->id,
        ]);

        return back();
    }

    public function storeparticipants(Request $request)
    {
        $tache = PivotUserTache::create([
            'tache_id' => $request->tache_id,
            'agent_id' => $request->agent_id,
            'user_id' => Auth::user()->id,
            'statut_id' => '1',
        ]);

        if($tache->id != null){
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'success',
                'message' => 'L\'ajout du participant à la tâche a réussi avec succès !',
            ]);
        } else {
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'error',
                'message' => 'L\'ajout du participant à la tâche a échoué !',
            ]);
        }

        session()->flash(
            'session',
            $content
        );

        return back();
    }

    public function deleteparticipants($id)
    {
        $pivotusertache = PivotUserTache::where('id', $id)->delete();

        if($pivotusertache == 1){
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'success',
                'message' => 'La suppression du participant à la tâche a réussie avec succès !',
            ]);
        } else {
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'error',
                'message' => 'La suppression du participant à la tâche a échouée !',
            ]);
        }

        session()->flash(
            'session',
            $content
        );

        return back();
    }

    public function storecommentaire(Request $request)
    {
        $commentaire = Commentaire::create([
            'message' => $request->message,
            'tache_id' => $request->tache_id,
            'user_id' => Auth::user()->id,
            'statut_id' => '1',
        ]);

        $commentaires = $commentaire->tache->commentaires;

        return back();
    }

    public function updateciblechecked(Request $request)
    {
        Cible::where('id', $request->id)->update([
            'statut' => '1'
        ]);

        $taches = Tache::all();

        return response()->json($taches, 200);
    }

    public function updatecibleunchecked(Request $request)
    {
        Cible::where('id', $request->id)->update([
            'statut' => '0'
        ]);

        $taches = Tache::all();

        return response()->json($taches, 200);
    }

    public function storefichier(Request $request) {
        try {

            if ($request->hasFile('document')) {
                $tache = Tache::find($request->tache_id);
                $classer = Classeur::firstOrCreate(
                    [
                        'departement_id' => Auth::user()->agent?->fonction()?->service?->division?->departement?->id ?? Auth::user()->current_team_id,
                        'titre' => 'Classeur gestion des tâches',
                        'team_id' => Auth::user()->current_team_id,
                        'reference' => 'TACHE/' . Str::upper(Str::replace(' ', '', Auth::user()->currentTeam->name)) . '/DOCS/' . str_pad(Auth::user()->current_team_id, 6, '0', STR_PAD_RIGHT),
                    ],
                    [
                        'description' => 'Classeur pour les documents en rapport avec la gestion des tâche',
                        'created_by' => Auth::user()->id,
                        'updated_by' => Auth::user()->id,
                    ]
                );

                $dossier = Dossier::firstOrCreate([
                    'classeur_id' => $classer->id,
                    'titre' => 'Dossier du tâche : ' . $tache->titre,
                    'reference' => 'TACHE/' . $tache->created_at->format('d/m/Y'),
                    'team_id' => Auth::user()->current_team_id,
                ], [
                    'description' => 'Dossier pour les documents en rapport avec la gestion du tâche : ' . $tache->titre,
                    'confidentiel' => 0,
                    'created_by' => Auth::user()->id,
                    'updated_by' => Auth::user()->id,
                ]);

                $document = Document::create([
                    'dossier_id' => $dossier->id,
                    'libelle' => $tache->titre,
                    'category_id' => 4,
                    'reference' => 'TACHE/' .$tache->id.'/'. $tache->created_at->format('d/m/Y'),
                    'type' => 3,
                    'document' => (new File())->handle($request, 'document', 'documents'),
                    'user_id' => Auth::user()->id,
                    'statut_id' => 1,
                    'created_by' => Auth::user()->id,
                    'team_id' => Auth::user()->current_team_id,
                ]);

                $tache->document_id = $document->id;
                $tache->save();

                $content = json_encode([
                    'name' => 'Document',
                    'statut' => 'success',
                    'message' => 'Document enregistré avec succès !',
                ]);

            }else {
                $content = json_encode([
                    'name' => 'Document',
                    'statut' => 'error',
                    'message' => 'Impossible de créer le document, une erreur s\'est produite',
                ]);
            }


        } catch (\Throwable $th) {
            dd($th);
            $content = json_encode([
                'name' => 'Document',
                'statut' => 'error',
                'message' => 'Impossible de créer le document, une erreur s\'est produite',
            ]);
        }

        session()->flash(
            'session',
            $content
        );

        return redirect()->back();
    }

}
