<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCountryRequest;
use App\Http\Requests\UpdateCountryRequest;
use App\Models\Certificat;
use App\Models\CertificatsLeadsTime;
use App\Models\CertificatsTypesEchantillon;
use App\Models\CertificatsTypesHomologation;
use App\Models\Classeur;
use App\Models\Country;
use App\Models\Document;
use App\Models\Dossier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Certificat::forCurrentTeam()->get();
        return view('pm.countries.index')->with([
            'countries' => $countries
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::select('id','name_fr')->get();
        $typesHomologations = CertificatsTypesHomologation::select('id','nom')->get();
        $typesEchantillons = CertificatsTypesEchantillon::select('id','nom')->get();
        $leadTimes = CertificatsLeadsTime::select('id','lead_time')->get();

        return view('pm.countries.create')->with([
            'countries' => $countries,
            'typesHomologations' => $typesHomologations,
            'typesEchantillons' => $typesEchantillons,
            'leadTimes' => $leadTimes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCountryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCountryRequest $request)
    {
        try{
            $certificat = new Certificat();
            $certificat->country_id = $request->country_id;
            $certificat->types_homologation_id = $request->types_homologation_id;
            $certificat->lead_time_id = $request->lead_time_id;
            $certificat->sample_requirements = $request->has('sample_requirements') ? $request->sample_requirements : 0;
            $certificat->types_echantillon_id = $request->has('sample_requirements') ? $request->types_echantillon_id : null;
            $certificat->nombre_echantillon = $request->has('sample_requirements') ? $request->nombre_echantillon : null;
            $certificat->validite = $request->has('validite') ? 'A vie' : $request->nombre_an . ' ' . Str::plural('an', $request->nombre_an ?? 0);
            $certificat->total_cost = $request->total_cost;
            $certificat->renewal_price = $request->renewal_price;
            $certificat->documents = json_encode($request->documents);
            $certificat->is_mandatory = $request->has('is_mandatory') ? $request->is_mandatory : 0;
            $certificat->ettiquetage = $request->has('ettiquetage') ? $request->ettiquetage : 0;
            $certificat->local_representation =  $request->has('local_representation') ? $request->local_representation : 0;
            $certificat->description = $request->description;
            $certificat->reglementation = (new File)->handle($request, 'reglementation', 'certificats');
            $certificat->model_cert = (new File)->handle($request, 'model_cert', 'certificats');
            $certificat->formulaire = (new File)->handle($request, 'formulaire', 'certificats');
            $certificat->autre_doc = (new File)->handle($request, 'autre_doc', 'certificats');
            $certificat->team_id = Auth::user()->current_team_id;
            $certificat->save();

            $this->saveToDocModule($certificat, $certificat->reglementation, 'Reglementation');
            $this->saveToDocModule($certificat, $certificat->model_cert, 'Modele de certificat');
            $this->saveToDocModule($certificat, $certificat->formulaire, 'Formulaire');
            foreach (json_decode($certificat->autre_doc, true) ?? [] as $key => $value) {
                $this->saveToDocModule($certificat, json_encode([$value]), 'Autre Document ' . $key);
            }

            $content = json_encode([
                'name' => 'Pays',
                'statut' => 'success',
                'message' => 'L\'ajout du pays a reussi avec succès !',
            ]);

        } catch (\Throwable $th) {
            $content = json_encode([
                'name' => 'Pays',
                'statut' => 'error',
                'message' => 'L\'ajout du pays a échoué ! '.$th->message,
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

        return redirect()->route('pm.countries.index');
    }

    public function saveToDocModule($certificat, $doc_path, $doc_name)
    {
        if ($doc_path) {

            $classer = Classeur::firstOrCreate(
                [
                    'departement_id' => Auth::user()->current_team_id,
                    'titre' => 'Classeur pays',
                    'team_id' => Auth::user()->current_team_id,
                    'reference' => 'PAYS/' . Str::upper(Str::replace(' ', '', Auth::user()->currentTeam->name)) . '/DOCS/' . str_pad(Auth::user()->current_team_id, 6, '0', STR_PAD_RIGHT),
                ],
                [
                    'description' => 'Classeur pour les documents des pays',
                    'created_by' => Auth::user()->id,
                    'updated_by' => Auth::user()->id,
                ]
            );

            $dossier = Dossier::firstOrCreate([
                'classeur_id' => $classer->id,
                'titre' => 'Dossier du pays : ' . $certificat->country->name_fr ?? $certificat->country->name_en,
                'reference' => 'PAYS/' . str_pad($certificat->id, 6, '0', STR_PAD_RIGHT),
                'team_id' => Auth::user()->current_team_id,
            ],
            [
                'description' => 'Dossier pour les documents du pays : ' . $certificat->country->name_fr ?? $certificat->country->name_en,
                'confidentiel' => 0,
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id,
            ]);


            $document = Document::create([
                'dossier_id' => $dossier->id,
                'libelle' => $doc_name,
                'category_id' => 4,
                'reference' => 'PAYS/DOC/' . str_pad(Document::forCurrentTeam()->count()+1, 6, '0', STR_PAD_RIGHT),
                'type' => 3,
                'document' => $doc_path,
                'user_id' => Auth::user()->id,
                'statut_id' => 1,
                'created_by' => Auth::user()->id,
                'team_id' => Auth::user()->current_team_id,
            ]);

            $certificat->documents()->attach($document);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Country $country)
    {
        $certificat = $country->certificat;
        $projects = null;

        $stat = $request->project_stat ? $request->project_stat : 0;

        switch ($stat) {
            case 1:
                $projects = $certificat->projects;
                $stat = 1;
                break;
            case 2:
                $projects = $certificat->projects->where('statut_id', 1);
                $stat = 2;
                break;
            case 3:
                $projects = $certificat->projects->where('statut_id', 2);
                $stat = 3;
                break;
            default:
                $projects = $certificat->projects;
                $stat = 1;
                break;
        }

        return view('pm.countries.show')->with([
            'projects' => $projects,
            'stat' => $stat,
            'certificat' => $certificat
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit($certificat)
    {
        $certificat = Certificat::find($certificat);
        $countries = Country::select('id','name_fr')->get();
        $typesHomologations = CertificatsTypesHomologation::forCurrentTeam()->select('id','nom')->get();
        $typesEchantillons = CertificatsTypesEchantillon::forCurrentTeam()->select('id','nom')->get();
        $leadTimes = CertificatsLeadsTime::forCurrentTeam()->select('id','lead_time')->get();

        return view('pm.countries.edit')->with([
            'countries' => $countries,
            'typesHomologations' => $typesHomologations,
            'typesEchantillons' => $typesEchantillons,
            'leadTimes' => $leadTimes,
            'certificat' => $certificat
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCountryRequest  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCountryRequest $request, $certificat)
    {
        $certificat = Certificat::find($certificat);
        $certificat->country_id = $request->country_id;
        $certificat->types_homologation_id = $request->types_homologation_id;
        $certificat->lead_time_id = $request->lead_time_id;
        $certificat->sample_requirements = $request->has('sample_requirements') ? $request->sample_requirements : 0;
        $certificat->types_echantillon_id = $request->has('sample_requirements') ? $request->types_echantillon_id : null;
        $certificat->nombre_echantillon = $request->has('sample_requirements') ? $request->nombre_echantillon : null;
        $certificat->validite = $request->has('validite') ? 'A vie' : $request->nombre_an . ' ' . Str::plural('an', $request->nombre_an ?? 0);
        $certificat->total_cost = $request->total_cost;
        $certificat->renewal_price = $request->renewal_price;
        $certificat->documents = json_encode($request->documents);
        $certificat->is_mandatory = $request->has('is_mandatory') ? $request->is_mandatory : 0;
        $certificat->ettiquetage = $request->has('ettiquetage') ? $request->ettiquetage : 0;
        $certificat->local_representation =  $request->has('local_representation') ? $request->local_representation : 0;
        $certificat->description = $request->description;
        $certificat->reglementation = $request->hasFile('reglementation') ? (new File)->handle($request, 'reglementation', 'certificats') : $certificat->reglementation;
        $certificat->model_cert = $request->hasFile('model_cert') ? (new File)->handle($request, 'model_cert', 'certificats') : $certificat->model_cert;
        $certificat->formulaire = $request->hasFile('formulaire') ? (new File)->handle($request, 'formulaire', 'certificats') : $certificat->formulaire;
        $certificat->autre_doc = $request->hasFile('autre_doc') ? (new File)->handle($request, 'autre_doc', 'certificats') : $certificat->autre_doc;
        $certificat->save();

        return redirect()->route('pm.countries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy($certificat)
    {
        $certificat = Certificat::find($certificat);
        $certificat->delete();
        return redirect()->route('pm.countries.index');
    }

    /**
     * Bulk Remove the specified resources from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function bulkDestroy($ids)
    {
        try {
            Certificat::destroy(explode(',', $ids));

            $content = json_encode([
                'name' => 'Pays',
                'statut' => 'success',
                'message' => 'La suppression des pays a réussi avec succès !',
            ]);

        } catch (\Throwable $th) {
            $content = json_encode([
                'name' => 'Pays',
                'statut' => 'error',
                'message' => 'La suppression des pays a échoué ! '.$th->message,
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

        return redirect()->route('pm.countries.index');
    }

}


