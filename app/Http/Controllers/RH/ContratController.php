<?php

namespace App\Http\Controllers\RH;

use App\Models\User;
use App\Models\Statut;
use App\Models\Contrat;
use App\Models\Document;
use App\Models\Division;
use Illuminate\Http\Request;
use App\Models\TypeContrat;
use App\Http\Controllers\Controller;
use App\Http\Controllers\File;
use App\Models\Agent;
use App\Models\Classeur;
use App\Models\Dossier;
use Illuminate\Support\Facades\Auth;

class ContratController extends Controller
{
    public function index()
    {
        $users = User::orderBy('nom', 'asc')->get();
        $statuts = Statut::all();
        $typecontrats = TypeContrat::where('statut_id', '1')->get();

        // session()->put('menu', '4');

        return view('pages.rh.contrats.index', compact('users', 'typecontrats', 'statuts'));
    }

    public function store(Request $request)
    {
        // dd('sds');
        Contrat::where('employe_id', $request->employe_id)->update([
            'statut_id' => '3'
        ]);

        $contrat = Contrat::create([
            'debut' => $request->debut,
            'fin' => $request->fin,
            'temps' => $request->temps,
            'salaire' => $request->salaire,
            'devise' => '$',
            'employe_id' => $request->employe_id,
            'type_contrat_id' => $request->type_contrat_id,
            'user_id' => Auth::user()->id,
            'statut_id' => '1',
        ]);

        if($contrat->id != null){
            $contrat = Contrat::where('id', $contrat->id)->first();

            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'success',
                'message' => 'L\'ajout du contrat a réussi avec succès !',
            ]);
        } else {
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'error',
                'message' => 'L\'ajout du contrat a échoué !',
            ]);
        }

        session()->flash(
            'session',
            $content
        );

        return back();
    }

    public function update(Request $request)
    {
        $contrat = Contrat::find($request->contrat_id);
        if ($request->hasFile('document')) {
            $classer = Classeur::firstOrCreate([
                'departement_id' => $contrat->agent->fonction()->departement?->id,
                'titre' => 'Cursus agents',
            ],
            [
                'reference' => 'AG/DOCS',
                'description' => 'Classeur pour les documents cursus des agents',
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id,
            ]);

            $dossier = Dossier::firstOrCreate(
                [
                'classeur_id' => $classer->id,
                'titre' => 'Dossier de l\'agent ' . $contrat->agent->nom,
                ],
                [
                    'reference' => 'AG/' . $contrat->agent->matricule,
                    'description' => 'Dossier pour les documents cursus de l\'agent ' . $agent->nom,
                    'confidentiel' => 0,
                    'created_by' => Auth::user()->id,
                    'updated_by' => Auth::user()->id,
                ]
            );

            $document = Document::create([
                'dossier_id' => $dossier->id,
                'libelle' => $request->doc_titre,
                'category_id' => 4,
                'reference' => 'AG/' . $contrat->agent->matricule,
                'type' => 3,
                'document' => (new File())->handle($request, 'document', 'documents'),
                'user_id' => Auth::user()->id,
                'statut_id' => '1',
                'created_by' => Auth::user()->id,
            ]);

            $contrat->agent->documents()->attach($document);
        }

        $contrat = $contrat->update([
            'date_debut' => \Carbon\Carbon::parse($request->date_contrat),
            'fin' => \Carbon\Carbon::parse($request->date_fin_contrat),
            'temps' => $request->temps,
            'salaire' => $request->salaire,
            'devise' => $request->devise,
            'employe_id' => $request->employe_id,
            'type_contrat_id' => $request->type_contrat,
            // 'user_id' => $agent->user->id,
            // 'agent_id' => $agent->id,
            // 'statut_id' => '1',
        ]);

        // $content = json_encode([
        //     'name' => 'Ressources humaines',
        //     'statut' => 'success',
        //     'message' => 'L\'ajout de l\'agent a réussi avec succès !',
        // ]);

        // $contrat = Contrat::where('id', $request->contrat_id)->update([
        //     'debut' => $request->debut,
        //     'fin' => $request->fin,
        //     'temps' => $request->temps,
        //     'salaire' => $request->salaire,
        //     'devise' => '$',
        //     'employe_id' => $request->employe_id,
        //     'type_contrat_id' => $request->type_contrat_id,
        //     'user_id' => Auth::user()->id,
        // ]);

        if($contrat == 1){
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'success',
                'message' => 'La modification du contrat a réussie avec succès !',
            ]);
        } else {
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'error',
                'message' => 'La modification du contrat a échouée !',
            ]);
        }

        session()->flash(
            'session',
            $content
        );

        return back();
    }

    public function destroy($id)
    {
        $contrat = Contrat::where('id', $id)->update([
            'statut_id' => '4',
        ]);

        if($contrat == 1){
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'success',
                'message' => 'La suppression du contrat a réussie avec succès !',
            ]);
        } else {
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'error',
                'message' => 'La suppression du contrat a échouée !',
            ]);
        }

        session()->flash(
            'session',
            $content
        );

        return back();
    }

    public function contrat($id, $value)
    {

        $contrat = Contrat::where('id', $id)->update([
            'statut_id' => $value,
        ]);

        if($contrat == 1){
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'success',
                'message' => $value == '1' ? 'Le renouvelement du contrat a réussi avec succès !' : 'La rupture du contrat a réussie avec succès !',
            ]);
        } else {
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'error',
                'message' => $value == '1' ? 'Le renouvelement du contrat a échoué !' : 'La rupture du contrat a échouée !',
            ]);
        }

        session()->flash(
            'session',
            $content
        );

        return back();
    }

    public function documentstore(Request $request)
    {
        try {
            if ($request->hasFile('document')) {

                $agent = Agent::find($request->agent_id);

                $classer = Classeur::firstOrCreate([
                    'departement_id' => 4,
                    'titre' => 'Cursus agents',
                ],
                [
                    'reference' => 'AG/DOCS',
                    'description' => 'Classeur pour les documents cursus des agents',
                    'created_by' => Auth::user()->id,
                    'updated_by' => Auth::user()->id,
                ]);

                $dossier = Dossier::firstOrCreate([
                    'classeur_id' => $classer->id,
                    'titre' => 'Dossier de l\'agent ' . $agent->nom,
                ],
                [
                    'reference' => 'AG/' . $agent->matricule,
                    'description' => 'Dossier pour les documents cursus de l\'agent ' . $agent->nom,
                    'confidentiel' => 0,
                    'created_by' => Auth::user()->id,
                    'updated_by' => Auth::user()->id,
                ]);

                $document = Document::create([
                    'dossier_id' => $dossier->id,
                    'libelle' => $request->libelle,
                    'category_id' => 4,
                    'reference' => 'AG/' . $agent->matricule,
                    'type' => 3,
                    'document' => (new File())->handle($request, 'document', 'documents'),
                    'user_id' => Auth::user()->id,
                    'statut_id' => '1',
                    'created_by' => Auth::user()->id,
                ]);

                $agent->documents()->attach($document);

                $content = json_encode([
                    'name' => 'Ressources humaines',
                    'statut' => 'success',
                    'message' => 'Document enregistré avec succès !',
                ]);
            }else {
                # code...
                $content = json_encode([
                    'name' => 'Ressources humaines',
                    'statut' => 'error',
                    'message' => 'L\'enregistrement du document a échoué !',
                ]);
            }
        } catch (\Throwable $th) {
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'error',
                'message' => 'L\'enregistrement du document a échoué !',
            ]);
        }

        session()->flash(
            'session',
            $content
        );

        return back();
    }
}
