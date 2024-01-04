<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePartenaireRequest;
use App\Http\Requests\UpdatePartenaireRequest;
use App\Models\Country;
use App\Models\Modalite;
use App\Models\ModesPaiement;
use App\Models\Partenaire;
use App\Models\Societe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use stdClass;

class PartenaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pm.partenaires.index', [
            'partenaires' => Partenaire::forCurrentTeam()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::select('id', 'code', 'name_fr', 'name_en')->orderBy('name_fr')->get();
        $societes = Societe::forCurrentTeam()->select('id', 'nom')->orderBy('nom')->get();
        $modePaiements = ModesPaiement::select('id', 'mode')->orderBy('mode')->get();
        return view('pm.partenaires.create')->with([
            'countries' => $countries,
            'societes' => $societes,
            'modePaiements' => $modePaiements,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePartenaireRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePartenaireRequest $request)
    {
        try {
            $paiement_attributs = new stdClass();
            if ($request->mode_id == 1) {
                $paiement_attributs->nom_bank = $request->nom_bank;
                $paiement_attributs->adresse_bank = $request->adresse_bank;
                $paiement_attributs->code_swift = $request->code_swift;
                $paiement_attributs->num_compte = $request->num_compte;
                $paiement_attributs->nom_beneficiaire = $request->nom_beneficiaire_1;
            } else {
                $paiement_attributs->nom_beneficiaire = $request->nom_beneficiaire_2;
                $paiement_attributs->phone_beneficiaire = $request->phone_beneficiaire;
            }

            $societe = null;
            if (is_numeric($request->societe_id)) {
                $societe = $request->societe_id;
            } else {
                $newSociete = new Societe();
                $newSociete->nom = $request->societe_id;
                $newSociete->team_id = Auth::user()->current_team_id;
                $newSociete->save();
                $societe = $newSociete->id;
            }

            $partenaire = new Partenaire();
            $partenaire->nom = $request->nom;
            $partenaire->societe_id = $societe;
            $partenaire->mode_id = $request->mode_id;
            $partenaire->paiement_attributs = json_encode($paiement_attributs);
            $partenaire->phone = $request->phone;
            $partenaire->email = $request->email;
            $partenaire->description = $request->description;
            $partenaire->image = (new Image)->handle($request, 'image', 'partenaires');
            $partenaire->team_id = Auth::user()->current_team_id;
            $partenaire->save();

            $modalites = [];
            for ($i = 0; $i < count($request->id_modalite); $i++) {
                $modalite = new Modalite();
                $modalite->country_id = $request->mod_country_id[$i];
                $modalite->prix = $request->mod_prix[$i];
                $modalite->renewal_price = $request->mod_renewal_price[$i];
                $modalite->save();
                array_push($modalites, $modalite->id);
            }

            $partenaire->modalites()->attach($modalite);

            $content = json_encode([
                'name' => 'Partenaire',
                'statut' => 'success',
                'message' => 'L\'enregistrement du partenaire a réussi avec succès !',
            ]);

        } catch (\Throwable $th) {
            $content = json_encode([
                'name' => 'Partenaire',
                'statut' => 'error',
                'message' => 'L\'enregistrement du partenaire a échoué !',
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

        return redirect()->route('pm.partenaires.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partenaire  $partenaire
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Partenaire $partenaire)
    {
        $projects = $partenaire->projects;
        $stat = 0;
        if ($request->has('project_stat')) {
            switch ($request->project_stat) {
                case 1:
                    $projects = $partenaire->projects;
                    $stat = 1;
                    break;
                case 2:
                    $projects = $partenaire->projects;
                    $stat = 2;
                    break;
                case 3:
                    $projects = $partenaire->projects;
                    $stat = 3;
                    break;
                default:
                    $projects = $partenaire->projects;
                    $stat = 0;
                    break;
            }
        }

        return view('pm.partenaires.show')->with([
            'partenaire' => $partenaire,
            'projects' => $projects,
            'stat' => $stat,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partenaire  $partenaire
     * @return \Illuminate\Http\Response
     */
    public function edit(Partenaire $partenaire)
    {
        $countries = Country::select('id', 'code', 'name_fr', 'name_en')->orderBy('name_fr')->get();
        $societes = Societe::forCurrentTeam()->select('id', 'nom')->orderBy('nom')->get();
        $modePaiements = ModesPaiement::select('id', 'mode')->orderBy('mode')->get();
        return view('pm.partenaires.edit')->with([
            'partenaire' => $partenaire,
            'countries' => $countries,
            'societes' => $societes,
            'modePaiements' => $modePaiements,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePartenaireRequest  $request
     * @param  \App\Models\Partenaire  $partenaire
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePartenaireRequest $request, Partenaire $partenaire)
    {
        $paiement_attributs = new stdClass();
        if ($request->mode_id == 1) {
            $paiement_attributs->nom_bank = $request->nom_bank;
            $paiement_attributs->adresse_bank = $request->adresse_bank;
            $paiement_attributs->code_swift = $request->code_swift;
            $paiement_attributs->num_compte = $request->num_compte;
            $paiement_attributs->nom_beneficiaire = $request->nom_beneficiaire_1;
        } else {
            $paiement_attributs->nom_beneficiaire = $request->nom_beneficiaire_2;
            $paiement_attributs->phone_beneficiaire = $request->phone_beneficiaire;
        }

        $partenaire->nom = $request->nom ?? $partenaire->nom;
        $partenaire->societe_id = $request->societe_id ?? $partenaire->societe_id;
        $partenaire->mode_id = $request->mode_id;
        $partenaire->paiement_attributs = json_encode($paiement_attributs);
        $partenaire->phone = $request->phone ?? $partenaire->phone;
        $partenaire->email = $request->email ?? $partenaire->email;
        $partenaire->description = $request->description ?? $partenaire->description;
        $partenaire->image = (new Image)->handle($request, 'image', 'partenaires') ?? $partenaire->image;
        $partenaire->save();

        $modalites = [];
        for ($i = 0; $i < count($request->id_modalite); $i++) {
            if ($request->id_modalite[$i] != 0) {
                $modalite = Modalite::find($request->id_modalite[$i]);
                $modalite->prix = $request->mod_prix[$i];
                $modalite->renewal_price = $request->mod_renewal_price[$i];
                $modalite->country_id = $request->mod_country_id[$i];
                $modalite->save();
                array_push($modalites, $modalite->id);
            } else {
                $modalite = new Modalite();
                $modalite->country_id = $request->mod_country_id[$i];
                $modalite->prix = $request->mod_prix[$i];
                $modalite->save();
                array_push($modalites, $modalite->id);
            }
        }

        $partenaire->modalites()->sync($modalites);

        return redirect()->route('pm.partenaires.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partenaire  $partenaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partenaire $partenaire)
    {
        //
    }

    public function relation(Request $request)
    {
        $routeName = explode('.', $request->route()->getName())[1];
        $slug = $routeName == 'clients' ? 'customers' : $routeName;

        //$slug = $this->getSlug($request);
        $page = $request->input('page');
        $on_page = 50;
        $search = $request->input('search', false);

        $method = $request->input('method', 'add');

        $model = app('\App\Models\\' . Str::ucfirst(Str::camel(Str::singular($slug))));

        if ($method != 'add') {
            $model = $model->find($request->input('id'));
        }

        $model = app('\App\Models\\' . Str::ucfirst(Str::camel(Str::singular($request->input('model')))));
        $skip = $on_page * ($page - 1);

        $additional_attributes = $model->additional_attributes ?? [];

        // If search query, use LIKE to filter results depending on field label
        if ($search) {
            $total_count = $model->where($request->input('label'), 'LIKE', '%' . $search . '%')->count();
            $relationshipOptions = $model->take($on_page)->skip($skip)
                ->where($request->input('label'), 'LIKE', '%' . $search . '%')
                ->get();
        } else {
            $total_count = $model->count();
            $relationshipOptions = $model->take($on_page)->skip($skip)->get();
        }

        $results = [];

        if (!$search && $page == 1) {
            $results[] = [
                'id' => '',
                'text' => __('voyager::generic.none'),
            ];
        }
        $relationshipOptions = $relationshipOptions->sortBy($request->input('label'));

        foreach ($relationshipOptions as $relationshipOption) {
            $results[] = [
                'id' => $relationshipOption->id,
                'text' => $relationshipOption->{$request->input('label')},
            ];
        }

        return response()->json([
            'results' => $results,
            'pagination' => [
                'more' => ($total_count > ($skip + $on_page)),
            ],
        ]);

        // No result found, return empty array
        return response()->json([], 404);
    }
}
