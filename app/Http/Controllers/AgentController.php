<?php

namespace App\Http\Controllers;

use App\Http\Controllers\File;
use App\Http\Controllers\Image;
use App\Models\Adresse;
use App\Models\Agent;
use App\Models\Classeur;
use App\Models\Contrat;
use App\Models\Departement;
use App\Models\Division;
use App\Models\Document;
use App\Models\Dossier;
use App\Models\Fonction;
use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("pm.rh.personnels.index");
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
            $userscount = User::forCurrentTeam()->count();
            $count = 0;

            if ($userscount < 10) {
                $count = '000' . $userscount;
            } elseif ($userscount >= 10 && $userscount < 100) {
                $count = '00' . $userscount;
            } elseif ($userscount >= 100 && $userscount < 1000) {
                $count = '0' . $userscount;
            } else {
                $count = $userscount;
            }

            $nom = $request->nom;
            $postnom = $request->post_nom;
            $prenom = $request->prenom;
            $matricule = '';

            if (!$request->has('matricule') || $request->get('matricule') == null) {
                $nom[0] = strtoupper($nom[0]);
                $prenom[0] = strtoupper($prenom[0]);
                $matricule = 'ARSP/' . $prenom[0] . $nom[0] . '/' . date('Y') . date('m') . date('d') . '/' . $count + 1;
            } else {
                $matricule = $request->get('matricule');
            }

            $fonction = Fonction::forCurrentTeam()->where('id', $request->fonction_id)->firstOrFail();

            $user = null;
            if ($request->password == $request->password_confirm) {
                $user = User::firstOrCreate(
                    [
                        'email' => $request->email,
                    ],
                    [
                        'email' => $request->email,
                        'name' => $request->prenom . ' ' . $request->nom,
                        'password' => Hash::make($request->password),
                        'statut_id' => 1,
                    ]);
            } else {
                $content = json_encode([
                    'name' => 'Ressources humaines',
                    'statut' => 'error',
                    'message' => 'L\'ajout de l\'agent a échoué. le mot de passe et la confirmation du mot de passe ne correspondent pas',
                ]);
                session()->flash(
                    'session',
                    $content
                );
                return back();
            }

            $agent = new Agent();
            $agent->user_id = $user->id;
            $agent->planning_id = $request->planning_id;
            $agent->statut_id = 1;
            $agent->nom = Str::ucfirst(Str::lower($nom));
            $agent->post_nom = Str::ucfirst(Str::lower($postnom));
            $agent->prenom = Str::ucfirst(Str::lower($prenom));
            $agent->sexe = $request->sexe;
            $agent->lieu_naiss = $request->lieu_naiss;
            $agent->date_naiss = Carbon::parse($request->date_naiss);
            $agent->etat_civil = $request->etat_civil;
            $agent->nbr_enfant = $request->nbr_enfants;
            $agent->nationalite = $request->nationalite;
            $agent->matricule = $matricule;
            $agent->image = (new Image())->handle($request, 'image', 'agents');
            $agent->slug = Str::slug($nom . ' ' . $postnom . ' ' . $prenom);
            $agent->created_by = Auth::user()->id;
            $agent->updated_by = Auth::user()->id;
            $agent->save();

            $adresse = new Adresse();
            $adresse->phone = $request->telephone;
            $adresse->email = Str::lower($request->email);
            $adresse->residence = $request->adresse;
            $adresse->agent_id = $agent->id;
            $adresse->save();

            $agent->fonctions()->attach(
                $fonction->id, [
                    'statut_id' => 1,
                    'date_debut' => $request->debut_fonction,
                    'created_by' => Auth::user()->id,
                    'updated_by' => Auth::user()->id,
                ]
            );

            if ($request->hasFile('document')) {
                $classer = Classeur::firstOrCreate(
                    [
                        'departement_id' => $agent?->fonction()->service?->division?->departement->id ?? 4,
                        'titre' => 'Cursus agents',
                    ],
                    [
                        'reference' => 'AG/DEP-' . ($agent?->fonction()->service?->division?->departement->id ?? 4) . '/DOCS',
                        'description' => 'Classeur pour les documents cursus des agents',
                        'created_by' => Auth::user()->id,
                        'updated_by' => Auth::user()->id,
                    ]
                );

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
                    'libelle' => $request->doc_titre,
                    'category_id' => 4,
                    'reference' => 'AG/' . $agent->matricule,
                    'type' => 3,
                    'document' => (new File())->handle($request, 'document', 'documents'),
                    'user_id' => Auth::user()->id,
                    'statut_id' => '1',
                    'created_by' => Auth::user()->id,
                ]);

                $agent->documents()->attach($document);
            }

            $contrat = Contrat::create([
                'date_debut' => $request->date_contrat,
                'fin' => $request->date_fin_contrat,
                'temps' => $request->temps,
                'salaire' => $request->salaire,
                'devise' => $request->devise,
                'employe_id' => $request->employe_id,
                'type_contrat_id' => $request->type_contrat,
                'user_id' => $agent->user->id,
                'agent_id' => $agent->id,
                'statut_id' => '1',
            ]);

            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'success',
                'message' => 'L\'ajout de l\'agent a réussi avec succès !',
            ]);

        } catch (\Throwable $th) {
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'error',
                'message' => 'L\'ajout de l\'agent a échoué !',
            ]);
            session()->flash(
                'session',
                $content
            );
            return redirect()->back();
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
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function show(Agent $agent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function edit(Agent $agent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agent $agent)
    {
        $agent->nom = Str::ucfirst(Str::lower($request->nom));
        $agent->post_nom = Str::ucfirst(Str::lower($request->post_nom));
        $agent->prenom = Str::ucfirst(Str::lower($request->prenom));
        $agent->sexe = $request->sexe;
        $agent->lieu_naiss = $request->lieu_naiss;
        $agent->date_naiss = Carbon::parse($request->date_naiss);
        $agent->etat_civil = $request->etat_civil;
        $agent->nbr_enfant = $request->nbr_enfant;
        $agent->nationalite = $request->nationalite;
        $agent->image = $request->hasFile('image') ? (new Image())->handle($request, 'image', 'agents') : $agent->image;
        $agent->slug = Str::slug($request->nom . ' ' . $request->post_nom . ' ' . $request->prenom);
        $agent->updated_by = Auth::user()->id;
        $agent->save();

        $adresse = $agent->adresse;
        $adresse->phone = $request->telephone;
        $adresse->residence = $request->adresse;
        $adresse->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agent $agent)
    {
        //
    }
}
