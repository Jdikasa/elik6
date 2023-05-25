<?php

namespace App\Http\Controllers\Taches;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Cible;
use App\Models\Commentaire;
use App\Models\Etat;
use App\Models\Historique;
use App\Models\PivotUserTache;
use App\Models\Priorite;
use App\Models\Tache;
use App\Models\TacheObjectif;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $agents = Agent::forCurrentTeam()->get();
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

            // if ($request->has('taches') && count($request->taches)) {
            //     foreach ($request->taches as $key => $value) {
            //         PivotUserTache::create([
            //             'tache_id' => $tache->id,
            //             'agent_id' => $key,
            //             'user_id' => Auth::user()->id,
            //             'statut_id' => 1,
            //         ]);

            //         foreach ($value as $objectif) {
            //             TacheObjectif::create([
            //                 'libelle' => $objectif,
            //                 'tache_id' => $tache->id,
            //                 'user_id' => Auth::user()->id,
            //                 'statut' => 1,
            //                 'agent_id' => $key
            //             ]);

            //         }
            //     }
            // }

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
