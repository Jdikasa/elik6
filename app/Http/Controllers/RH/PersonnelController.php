<?php

namespace App\Http\Controllers\RH;

use App\Http\Controllers\Controller;
use App\Http\Controllers\File;
use App\Http\Controllers\Image;
use App\Models\Adresse;
use App\Models\Agent;
use App\Models\Classeur;
use App\Models\Conge;
use App\Models\Contrat;
use App\Models\Departement;
use App\Models\Division;
use App\Models\Document;
use App\Models\Dossier;
use App\Models\Etat;
use App\Models\Fonction;
use App\Models\Service;
use App\Models\Statut;
use App\Models\TypeContrat;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'departements' => Departement::select('id', 'libelle')->orderby('libelle', 'asc')->get(),
            'personnels' => Agent::select('*')->get(),
            'divisions' => Division::select('id', 'libelle')->orderby('libelle', 'asc')->get(),
            'fonctions' => Fonction::select('id', 'titre')->orderby('titre', 'asc')->get(),
            'services' => Service::select('id', 'titre')->orderby('titre', 'asc')->get(),
            'dossiers' => Dossier::all(),
            'typeContrats' => TypeContrat::select('id', 'libelle')->orderby('libelle', 'asc')->get(),
        ];

        return view("pm.rh.personnels.index")->with($data);
    }

    public function store(Request $request)
    {
        try {
            $team = Auth::user()->currentTeam;
            $count = Agent::forCurrentTeam()->count() + 1;
            $matricule = '';

            if (!$request->has('matricule') || $request->get('matricule') == null) {
                $teamFirstLettresArray = Arr::map(Str::ucsplit(Str::title($team->name)), function ($text) {
                    return Str::charAt($text, 0);
                });
                $teamFirstLettres = implode($teamFirstLettresArray);
                $matricule = $teamFirstLettres . '/AG/' . strtoupper($request->prenom[0]) . strtoupper($request->nom[0]) . '/' . date('Y') . date('m') . date('d') . '/' . str_pad($count + 1, 4, 0, STR_PAD_LEFT);
            } else {
                $matricule = $request->get('matricule');
            }

            $fonction = Fonction::where('id', $request->fonction_id)->first();

            $user = null;
            if ($request->password == $request->password_confirm) {
                $user = User::firstOrCreate(
                    [
                        'email' => $request->email,
                    ],
                    [
                        'name' => $request->prenom . ' ' . $request->nom,
                        'password' => Hash::make($request->password),
                        'profile_photo_path' => (new Image())->handle($request, 'image', 'profile-photos'),
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
            $agent->nom = Str::ucfirst(Str::lower($request->nom));
            $agent->post_nom = Str::ucfirst(Str::lower($request->post_nom));
            $agent->prenom = Str::ucfirst(Str::lower($request->prenom));
            $agent->sexe = $request->sexe;
            $agent->lieu_naiss = $request->lieu_naiss;
            $agent->date_naiss = Carbon::parse($request->date_naiss);
            $agent->etat_civil = $request->etat_civil;
            $agent->nbr_enfant = $request->nbr_enfants;
            $agent->nationalite = $request->nationalite;
            $agent->matricule = $matricule;
            $agent->image = (new Image())->handle($request, 'image', 'agents');
            $agent->slug = Str::slug($request->nom . ' ' . $request->post_nom . ' ' . $request->prenom);
            $agent->created_by = Auth::user()->id;
            $agent->updated_by = Auth::user()->id;
            $agent->team_id = Auth::user()->current_team_id;
            $agent->save();

            $adresse = new Adresse();
            $adresse->agent_phone = $request->telephone;
            $adresse->agent_email = Str::lower($request->email);
            $adresse->residence = $request->adresse;
            $adresse->agent_id = $agent->id;
            $adresse->save();

            if ($fonction) {
                $agent->fonctions()->attach(
                    $fonction->id, [
                        'statut_id' => 1,
                        'date_debut' => $request->debut_fonction,
                        'created_by' => Auth::user()->id,
                        'updated_by' => Auth::user()->id,
                    ]
                );
            }

            if ($request->hasFile('document')) {
                $classer = Classeur::firstOrCreate(
                    [
                        'departement_id' => $agent?->fonction()?->service?->division?->departement?->id ?? Auth::user()->current_team_id,
                        'titre' => 'Classeur cursus agents',
                        'team_id' => Auth::user()->current_team_id,
                        'reference' => 'AG/' . Str::upper(Str::replace(' ', '', Auth::user()->currentTeam->name)) . '/DOCS/' . str_pad(Auth::user()->current_team_id, 6, '0', STR_PAD_RIGHT),
                    ],
                    [
                        'description' => 'Classeur pour les documents cursus des agents',
                        'created_by' => Auth::user()->id,
                        'updated_by' => Auth::user()->id,
                    ]
                );

                $dossier = Dossier::firstOrCreate([
                    'classeur_id' => $classer->id,
                    'titre' => 'Dossier de l\'agent ' . $agent->nom,
                    'reference' => 'AG/' . $agent->matricule,
                    'team_id' => Auth::user()->current_team_id,
                ], [
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
                    'team_id' => Auth::user()->current_team_id,
                ]);

                $agent->documents()->attach($document);
            }

            Contrat::create([
                'date_debut' => $request->date_contrat,
                'fin' => $request->date_fin_contrat,
                'temps' => $request->temps,
                'salaire' => $request->salaire,
                'devise' => $request->devise,
                'employe_id' => $request->employe_id,
                'type_contrat_id' => $request->type_contrat,
                'user_id' => $agent->user->id,
                'agent_id' => $agent->id,
                'statut_id' => 1,
            ]);

            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'success',
                'message' => 'L\'ajout de l\'agent a réussi avec succès !',
            ]);

        } catch (\Throwable $th) {
            dd($th);
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'error',
                'message' => 'L\'ajout de l\'agent a échoué !',
            ]);
        }

        session()->flash(
            'session',
            $content
        );

        return redirect()->route('pm.personnels.index');
    }

    public function show($id)
    {
        $data = [
            'users' => User::orderBy('id', 'asc')->get(),
            'user' => User::where('id', $id)->first(),
            'divisions' => Division::all(),
            'departements' => Departement::all(),
            'etats' => Etat::all(),
            'statuts' => Statut::all(),
            'typecontrats' => TypeContrat::all(),
            'historiques' => Conge::all(),
            'contrats' => Contrat::all(),
        ];

        return view('rh.personnels', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $agent = Agent::find($id);
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

        $adresse = $agent->adresse ?? new Adresse();
        $adresse->agent_phone = $request->telephone;
        // $adresse->agent_email = Str::lower($request->email);
        if (!$agent->adresse) {
            $adresse->agent_id = $agent->id;
        }
        $adresse->residence = $request->adresse;
        $adresse->save();

        $content = json_encode([
            'name' => 'Ressources humaines',
            'statut' => 'success',
            'message' => 'La modification des informations de l\'agent a réussie avec succès !',
        ]);

        session()->flash(
            'session',
            $content
        );

        return back();
    }

    public function updateperso(Request $request)
    {
        // user_id    planning_id    adresse_id    statut_id    nom    post_nom    prenom    sexe    etat_civil    nationalite    matricule    image    slug    created_by    updated_by
        $user = Agent::where('id', Auth::user()->agent->id)->update([
            'nom' => $request->nom,
            'post_nom' => $request->postnom,
            'prenom' => $request->prenom,
            'sexe' => $request->sexe,
            'etat_civil' => $request->etatcivil,
            'nbr_enfant' => $request->enfants,
            'lieu_naiss' => $request->lieunaissance,
            'date_naiss' => $request->datenaissance,
            'nationalite' => $request->nationalite,
            'updated_by' => Auth::user()->id,
        ]);

        $adresse = Adresse::where('agent_id', Auth::user()->agent->id)->first();
        $adresse->phone = $request->telephone;
        // $adresse->phone_2 = $request->autre_telephone;
        $adresse->email = Str::lower($request->email);
        $adresse->residence = $request->adresse;
        // $adresse->agent_id = Auth::user()->agent->id;
        $adresse->save();

        if ($user == 1) {
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'success',
                'message' => 'La modification de vos informations a réussie avec succès !',
            ]);
        } else {
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'error',
                'message' => 'La modification de vos informations a échouée !',
            ]);
        }

        session()->flash(
            'session',
            $content
        );

        return back();
    }

    public function updateAuth(Request $request)
    {
        // try {
        if ($request->has('password') && $request->password) {
            if ($request->has('user_id') && $request->user_id != null) {

                if ($request->password == $request->password_confirm) {
                    $user = User::find($request->user_id)->update([
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                        'statut_id' => $request->statut_id,
                    ]);
                    $agent = Agent::find($request->agent_id);
                    $agent->user_id = $request->user_id;
                    $agent->agent_email = $request->email;
                    $agent->save();

                    if ($user == 1) {
                        $content = json_encode([
                            'name' => 'Ressources humaines',
                            'statut' => 'success',
                            'message' => 'La modification de votre mot de passe a réussie avec succès !',
                        ]);
                    } else {
                        $content = json_encode([
                            'name' => 'Ressources humaines',
                            'statut' => 'error',
                            'message' => 'La modification de votre mot de passe a échouée !',
                        ]);
                    }
                } else {
                    $content = json_encode([
                        'name' => 'Nouveau Mot de passe incorrect',
                        'statut' => 'error',
                        'message' => 'Votre nouveau mot de passe n\'est pas identique à sa confirmation !',
                    ]);
                }
            } else {
                if ($request->password == $request->password_confirm) {
                    $agent = Agent::find($request->agent_id);
                    $user = User::create([
                        'nom' => $agent->prenom . ' ' . $agent->nom,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                        'statut_id' => $request->statut_id,
                        'role_id' => 2,
                    ]);

                    $agent->user_id = $user->id;
                    $agent->agent_email = $user->email;
                    $agent->save();

                    $content = json_encode([
                        'name' => 'Ressources humaines',
                        'statut' => 'success',
                        'message' => 'L\'enregistrement de votre mot de passe a réussie avec succès !',
                    ]);

                } else {
                    $content = json_encode([
                        'name' => 'Nouveau Mot de passe incorrect',
                        'statut' => 'error',
                        'message' => 'Votre nouveau mot de passe n\'est pas identique à sa confirmation !',
                    ]);
                }
            }
        } else {

            $user = User::find($request->user_id);
            $user->email = $request->email;
            $user->statut_id = $request->statut_id;
            $user->save();

            $agent = Agent::find($request->agent_id);
            $agent->user_id = $user->id;
            $agent->agent_email = $user->email;
            $agent->save();

            if ($user->save()) {
                $content = json_encode([
                    'name' => 'Ressources humaines',
                    'statut' => 'success',
                    'message' => 'La modification de votre mot de passe a réussie avec succès !',
                ]);
            } else {
                $content = json_encode([
                    'name' => 'Ressources humaines',
                    'statut' => 'error',
                    'message' => 'La modification de votre mot de passe a échouée !',
                ]);
            }
        }

        // } catch (\Throwable $th) {
        //     $content = json_encode([
        //         'name' => 'Ressources humaines',
        //         'statut' => 'error',
        //         'message' => 'La modification de votre mot de passe a échouée !',
        //     ]);
        // }

        session()->flash(
            'session',
            $content
        );

        return back();
    }

    public function updatepassword(Request $request)
    {
        if ($request->password == $request->password_confirm) {
            if (Hash::check($request->password_old, Auth::user()->password) == true) {
                $user = User::where('id', Auth::user()->id)->update([
                    'password' => Hash::make($request->password),
                ]);

                if ($user == 1) {
                    $content = json_encode([
                        'name' => 'Ressources humaines',
                        'statut' => 'success',
                        'message' => 'La modification de votre mot de passe a réussie avec succès !',
                    ]);
                } else {
                    $content = json_encode([
                        'name' => 'Ressources humaines',
                        'statut' => 'error',
                        'message' => 'La modification de votre mot de passe a échouée !',
                    ]);
                }
            } else {
                $content = json_encode([
                    'name' => 'Ressources humaines',
                    'statut' => 'error',
                    'message' => 'Votre ancien mot de passe est incorrect !',
                ]);
            }
        } else {
            $content = json_encode([
                'name' => 'Nouveau Mot de passe incorrect',
                'statut' => 'error',
                'message' => 'Votre nouveau mot de passe n\'est pas identique à sa confirmation !',
            ]);
        }

        session()->put(
            'session',
            $content
        );

        return back();
    }

    public function updateplanning(Request $request)
    {
        $user = User::where('id', $request->user_id)->update([
            'planning_id' => $request->planning_id,
            'id_updated_at' => Auth::user()->id,
        ]);

        if ($user == 1) {
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'success',
                'message' => 'La modification du planning de l\'agent a réussie avec succès !',
            ]);
        } else {
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'error',
                'message' => 'La modification du planning de l\'agent a échouée !',
            ]);
        }

        session()->put(
            'session',
            $content
        );

        return back();
    }

    public function destroy($id)
    {
        $user = User::where('id', $id)->update([
            'id_deleted_at' => Auth::user()->id,
            'statut_id' => '4',
        ]);

        if ($user == 1) {
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'success',
                'message' => 'La suppression de l\'agent a réussie avec succès !',
            ]);
        } else {
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'error',
                'message' => 'La suppression de l\'agent a échouée !',
            ]);
        }

        session()->put(
            'session',
            $content
        );

        return back();
    }

    public function activate(Agent $agent)
    {
        try {
            $agent->contrat->statut_id = 1;
            $agent->contrat->save();

            $agent->user->statut_id = 1;
            $agent->user->save();

            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'success',
                'message' => 'Agent reactivé avec succès !',
            ]);

        } catch (\Throwable $th) {
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'error',
                'message' => 'La réactivation de l\'agent a échouée !',
            ]);
        }

        session()->flash(
            'session',
            $content
        );

        return back();
    }

    public function suspension(Agent $agent)
    {
        try {
            $agent->contrat->statut_id = 3;
            $agent->contrat->save();

            $agent->user->statut_id = 3;
            $agent->user->save();

            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'success',
                'message' => 'La suspension de l\'agent a réussie avec succès !',
            ]);

        } catch (\Throwable $th) {
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'error',
                'message' => 'La suspension de l\'agent a échouée !',
            ]);
        }

        session()->flash(
            'session',
            $content
        );

        return back();
    }

    public function permissions(Request $request)
    {
        if (!$request->has('user_id') || $request->user_id == null) {
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'error',
                'message' => 'L\'enregistrement de permissions a échouée. Veillez d\'abord enregistre les information d\'authentification ci-dessus !',
            ]);
            session()->flash(
                'session',
                $content
            );
            return redirect()->back();
        }

        $user = User::find($request->user_id);
        $user->permissions()->sync($request->input('permissions', []));

        $content = json_encode([
            'name' => 'Ressources humaines',
            'statut' => 'success',
            'message' => 'L\'enregistrement de permissions a réussie avec succès !',
        ]);

        session()->flash(
            'session',
            $content
        );

        return redirect()->back();
    }
}
