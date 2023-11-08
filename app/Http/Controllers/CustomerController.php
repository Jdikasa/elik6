<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Adresse;
use App\Models\Classeur;
use App\Models\ContactsPeople;
use App\Models\Country;
use App\Models\Customer;
use App\Models\Document;
use App\Models\Dossier;
use App\Models\Project;
use App\Models\Societe;
use App\Models\TypesClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pm.customers.index', [
            'customers' => Customer::with('societe')->forCurrentTeam()->get()->sortBy(function ($customer) {
                return $customer->societe->nom;
            }),
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
        $customerTypes = TypesClient::select('id', 'nom')->orderBy('nom')->get();
        return view('pm.customers.create')->with([
            'countries' => $countries,
            'societes' => $societes,
            'customerTypes' => $customerTypes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request)
    {
        try {
            $personnes = [];
            for ($i = 0; $i < count($request->person_nom ?? []); $i++) {
                if ($request->person_nom[$i]) {
                    $personne = new ContactsPeople;
                    $personne->nom = $request->person_nom[$i];
                    $personne->prenom = $request->person_prenom[$i];
                    $personne->phone = $request->person_phone[$i];
                    $personne->phone_type = $request->person_phone_type[$i] ?? '';
                    $personne->email = $request->person_email[$i];
                    $personne->save();
                    array_push($personnes, $personne->id);
                }
            }

            $phones = [];
            for ($i = 0; $i < count($request->phone); $i++) {
                array_push($phones, [
                    "type" => $request->phoneSelect[$i],
                    "num" => $request->phone[$i],
                ]);
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

            $adresse = new Adresse();
            $adresse->country_id = $request->country_id;
            $adresse->ville = $request->ville;
            $adresse->adresse_1 = $request->adresse_1;
            $adresse->adresse_2 = $request->adresse_2;
            $adresse->email = $request->email;
            $adresse->phone = json_encode($phones);
            $adresse->is_shipping = $request->is_shipping ? 1 : 0;
            $adresse->save();

            $customer = new Customer();
            $customer->societe_id = $societe;
            $customer->adresse_id = $adresse->id;
            $customer->type_id = $request->type_id;
            $customer->logo = (new Image)->handle($request, 'logo', 'customers');
            $customer->contrat = (new File)->handle($request, 'contrat', 'customers');
            $customer->nda = (new File)->handle($request, 'nda', 'customers');
            $customer->autre_doc = (new File)->handle($request, 'autre_doc', 'customers');
            $customer->team_id = Auth::user()->current_team_id;
            $customer->description = $request->description;
            $customer->save();

            $customer->personnes()->attach($personnes);

            $this->saveToDocModule($customer, $customer->logo, 'logo');
            $this->saveToDocModule($customer, $customer->contrat, 'contrat');
            $this->saveToDocModule($customer, $customer->nda, 'nda');
            foreach (json_decode($customer->autre_doc, true) ?? [] as $key => $value) {
                $this->saveToDocModule($customer, $value, 'Autre doc ' . $key);
            }

            $content = json_encode([
                'name' => 'Client',
                'statut' => 'success',
                'message' => 'L\'ajout du client a reussi avec succès !',
            ]);

        } catch (\Throwable $th) {

            $content = json_encode([
                'name' => 'Clients',
                'statut' => 'error',
                'message' => 'L\'ajout du client a échoué ! ' . $th->message,
            ]);

            // return redirect()->back();
        }

        session()->flash(
            'session',
            $content
        );

        return redirect()->route('pm.clients.index');
    }

    public function dropzonFile(Request $request)
    {
        return response()->json(['autre_doc' => $request->file()]);
    }

    public function saveToDocModule($customer, $doc_path, $doc_name)
    {
        if ($doc_path) {

            $classer = Classeur::firstOrCreate(
                [
                    'departement_id' => Auth::user()->current_team_id,
                    'titre' => 'Classeur clients',
                    'team_id' => Auth::user()->current_team_id,
                    'reference' => 'CLI/' . Str::upper(Str::replace(' ', '', Auth::user()->currentTeam->name)) . '/DOCS/' . str_pad(Auth::user()->current_team_id, 6, '0', STR_PAD_RIGHT),
                ],
                [
                    'description' => 'Classeur pour les documents des clients',
                    'created_by' => Auth::user()->id,
                    'updated_by' => Auth::user()->id,
                ]
            );

            $dossier = Dossier::firstOrCreate([
                'classeur_id' => $classer->id,
                'titre' => 'Dossier du client ' . $customer->societe->nom,
                'reference' => 'CLI/' . str_pad($customer->id, 6, '0', STR_PAD_RIGHT),
                'team_id' => Auth::user()->current_team_id,
            ], [
                'description' => 'Dossier pour les documents cursus de l\'agent ' . $customer->societe->nom,
                'confidentiel' => 0,
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id,
            ]);

            $document = Document::create([
                'dossier_id' => $dossier->id,
                'libelle' => $doc_name,
                'category_id' => 4,
                'reference' => 'CLI/DOC/' . str_pad(Document::forCurrentTeam()->count()+1, 6, '0', STR_PAD_RIGHT),
                'type' => 3,
                'document' => $doc_path,
                'user_id' => Auth::user()->id,
                'statut_id' => 1,
                'created_by' => Auth::user()->id,
                'team_id' => Auth::user()->current_team_id,
            ]);

            $customer->documents()->attach($document);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $customer)
    {
        $customer = Customer::find($customer);
        $projects = $customer->projects;
        $stat = 0;
        if ($request->has('project_stat')) {
            switch ($request->project_stat) {
                case 1:
                    $projects = $customer->projects;
                    $stat = 1;
                    break;
                case 2:
                    $projects = $customer->projects;
                    $stat = 2;
                    break;
                case 3:
                    $projects = $customer->projects;
                    $stat = 3;
                    break;
                default:
                    $projects = $customer->projects;
                    $stat = 0;
                    break;
            }
        }

        return view('pm.customers.show')->with([
            'customer' => $customer,
            'projects' => $projects,
            'stat' => $stat,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($customer)
    {
        $customer = Customer::find($customer);
        $countries = Country::select('id', 'code', 'name_fr', 'name_en')->orderBy('name_fr')->get();
        $societes = Societe::forCurrentTeam()->select('id', 'nom')->orderBy('nom')->get();
        $customerTypes = TypesClient::select('id', 'nom')->orderBy('nom')->get();
        return view('pm.customers.edit')->with([
            'customer' => $customer,
            'countries' => $countries,
            'societes' => $societes,
            'customerTypes' => $customerTypes,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerRequest  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, $customer)
    {
        try {
            $personnes = [];
            for ($i = 0; $i < count($request->person_nom); $i++) {
                if ($request->person_nom[$i]) {
                    $personne = new ContactsPeople;
                    $personne->nom = $request->person_nom[$i];
                    $personne->prenom = $request->person_prenom[$i];
                    $personne->phone = $request->person_phone[$i];
                    $personne->phone_type = $request->person_phone_type[$i] ?? '';
                    $personne->email = $request->person_email[$i];
                    $personne->save();
                    array_push($personnes, $personne->id);
                }
            }

            $phones = [];
            for ($i = 0; $i < count($request->phone ?? []); $i++) {
                array_push($phones, [
                    "type" => $request->phoneSelect[$i],
                    "num" => $request->phone[$i],
                ]);
            }

            $societe = null;
            if (is_numeric($request->societe_id)) {
                $societe = $request->societe_id;
            } else {
                $newSociete = new Societe();
                $newSociete->nom = $request->societe_id;
                $newSociete->save();
                $societe = $newSociete->id;
            }

            $adresse = Customer::find($customer)->adresse;
            $adresse->country_id = $request->country_id;
            $adresse->ville = $request->ville;
            $adresse->adresse_1 = $request->adresse_1;
            $adresse->adresse_2 = $request->adresse_2;
            $adresse->email = $request->email;
            $adresse->phone = json_encode($phones);
            $adresse->is_shipping = $request->is_shipping ? 1 : 0;
            $adresse->save();

            $customer = Customer::find($customer);
            $customer->societe_id = $societe;
            $customer->adresse_id = $adresse->id;
            $customer->type_id = $request->type_id;
            $customer->logo = $request->hasFile('logo') ? (new Image)->handle($request, 'logo', 'customers') : $customer->logo;
            $customer->contrat = $request->hasFile('contrat') ? (new File)->handle($request, 'contrat', 'customers') : $customer->contrat;
            $customer->nda = $request->hasFile('nda') ? (new File)->handle($request, 'nda', 'customers') : $customer->nda;
            $customer->autre_doc = $request->hasFile('autre_doc') ? (new File)->handle($request, 'autre_doc', 'customers') : $customer->autre_doc;
            $customer->description = $request->description;
            $customer->save();

            $customer->personnes()->sync($personnes);
            $content = json_encode([
                'name' => 'Client',
                'statut' => 'success',
                'message' => 'La modification du client a reussi avec succès !',
            ]);

        } catch (\Throwable $th) {
            $content = json_encode([
                'name' => 'Pays',
                'statut' => 'error',
                'message' => 'La modification du client a échoué !',
            ]);

            // session()->flash(
            //     'session',
            //     $content
            // );

            // return redirect()->back();
        }

        session()->flash(
            'session',
            $content
        );

        return redirect()->route('pm.clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($customer)
    {
        try {
            $customer = Customer::find($customer);
            $ids = $customer->projects->pluck('id')->toArray();
            Project::destroy($ids);
            $customer->delete();
            $content = json_encode([
                'name' => 'Pays',
                'statut' => 'success',
                'message' => 'La suppression du client a reussi avec succès !',
            ]);

        } catch (\Throwable $th) {
            $content = json_encode([
                'name' => 'Pays',
                'statut' => 'error',
                'message' => 'La suppression du client a échoué !',
            ]);
        }

        session()->flash(
            'session',
            $content
        );

        return redirect()->route('pm.clients.index');
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
            Customer::destroy(explode(',', $ids));

            $content = json_encode([
                'name' => 'Equipement',
                'statut' => 'success',
                'message' => 'La suppression des clients a réussi avec succès !',
            ]);

        } catch (\Throwable $th) {
            $content = json_encode([
                'name' => 'Equipement',
                'statut' => 'error',
                'message' => 'La suppression des clients a échoué !',
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

        return redirect()->route('pm.clients.index');
    }
}
