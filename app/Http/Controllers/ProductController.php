<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\BandesFrequence;
use App\Models\Classeur;
use App\Models\Document;
use App\Models\Dossier;
use App\Models\Norme;
use App\Models\Product;
use App\Models\ProductsMarque;
use App\Models\ProductsModel;
use App\Models\ProductsType;
use App\Models\Puissance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pm.equipements.index', [
            'products' => Product::forCurrentTeam()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = ProductsType::forCurrentTeam()->select('id', 'nom')->get();
        $marques = ProductsMarque::forCurrentTeam()->select('id', 'marque')->get();
        $modeles = ProductsModel::forCurrentTeam()->select('id', 'modele')->get();
        $frequences = BandesFrequence::forCurrentTeam()->select('id', 'frequence')->get();
        $puissances = Puissance::forCurrentTeam()->select('id', 'puisance')->get();
        $normes = Norme::forCurrentTeam()->select('id', 'norme')->get();

        return view('pm.equipements.create')->with([
            'types' => $types,
            'marques' => $marques,
            'modeles' => $modeles,
            'frequences' => $frequences,
            'puissances' => $puissances,
            'normes' => $normes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        try {
            $type_id = $request->type_id;
            $marque_id = $request->marque_id;
            $modele_id = $request->modele_id;

            if (!is_numeric($type_id)) {
                $type = new ProductsType();
                $type->nom = $type_id;
                $type->team_id = Auth::user()->current_team_id;
                $type->save();
                $type_id = $type->id;
            }

            if (!is_numeric($marque_id)) {
                $marque = new ProductsMarque();
                $marque->marque = $marque_id;
                $marque->team_id = Auth::user()->current_team_id;
                $marque->save();
                $marque_id = $marque->id;
            }

            if (!is_numeric($modele_id)) {
                $modele = new ProductsModel();
                $modele->modele = $modele_id;
                $modele->team_id = Auth::user()->current_team_id;
                $modele->save();
                $modele_id = $modele->id;
            }

            $product = new Product();
            $product->nom = $request->nom;
            $product->type_id = $type_id;
            $product->marque_id = $marque_id;
            $product->modele_id = $modele_id;
            $product->description = $request->description;
            // $product->image = (new Image)->handle($request, 'image', 'products');
            $product->rapport_rf = (new File)->handle($request, 'rapport_rf', 'products');
            $product->rapport_safety = (new File)->handle($request, 'rapport_safety', 'products');
            $product->rapport_emc = (new File)->handle($request, 'rapport_emc', 'products');
            $product->rapport_sar = (new File)->handle($request, 'rapport_sar', 'products');
            $product->declaration = (new File)->handle($request, 'declaration', 'products');
            $product->autre_rapport = (new File)->handle($request, 'autre_rapport', 'products');
            $product->team_id = Auth::user()->current_team_id;
            $product->save();

            $frequences = [];
            $puissances = [];
            $normes = [];

            foreach ($request->frequences ?? [] as $key => $value) {
                if (!is_numeric($value)) {
                    $frequence = new BandesFrequence();
                    $frequence->frequence = $value;
                    $frequence->team_id = Auth::user()->current_team_id;
                    $frequence->save();
                    array_push($frequences, $frequence->id);
                } else {
                    array_push($frequences, $value);
                }
            }

            foreach ($request->puissances ?? [] as $key => $value) {
                if (!is_numeric($value)) {
                    $puissance = new Puissance();
                    $puissance->puisance = $value;
                    $puissance->team_id = Auth::user()->current_team_id;
                    $puissance->save();
                    array_push($puissances, $puissance->id);
                } else {
                    array_push($puissances, $value);
                }
            }

            foreach ($request->normes ?? [] as $key => $value) {
                if (!is_numeric($value)) {
                    $norme = new Norme();
                    $norme->norme = $value;
                    $norme->team_id = Auth::user()->current_team_id;
                    $norme->save();
                    array_push($normes, $norme->id);
                } else {
                    array_push($normes, $value);
                }
            }

            $product->frequences()->attach($frequences);
            $product->puissances()->attach($puissances);
            $product->normes()->attach($normes);

            $this->saveToDocModule($product, $product->image, 'image');
            $this->saveToDocModule($product, $product->rapport_rf, 'Rapport RF');
            $this->saveToDocModule($product, $product->rapport_safety, 'Rapport Safety');
            $this->saveToDocModule($product, $product->rapport_emc, 'Rapport EMC');
            $this->saveToDocModule($product, $product->rapport_sar, 'Rapport SAR');
            $this->saveToDocModule($product, $product->declaration, 'Declaration de conformité');
            foreach (json_decode($product->autre_rapport, true) ?? [] as $key => $value) {
                $this->saveToDocModule($product, json_encode([$value]), 'Autre Rapport ' . $key);
            }

            $content = json_encode([
                'name' => 'Equipement',
                'statut' => 'success',
                'message' => 'L\'enregistrement de l\'équipement a réussi avec succès !',
            ]);

        } catch (\Throwable $th) {
            $content = json_encode([
                'name' => 'Equipement',
                'statut' => 'error',
                'message' => 'L\'enregistrement de l\'équipement a échoué ! ' . $th->message,
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

        return redirect()->route('pm.products.index');
    }

    public function saveToDocModule($product, $doc_path, $doc_name)
    {
        if ($doc_path) {

            $classer = Classeur::firstOrCreate(
                [
                    'departement_id' => Auth::user()->current_team_id,
                    'titre' => 'Classeur équipements',
                    'team_id' => Auth::user()->current_team_id,
                    'reference' => 'EQPMT/' . Str::upper(Str::replace(' ', '', Auth::user()->currentTeam->name)) . '/DOCS/' . str_pad(Auth::user()->current_team_id, 6, '0', STR_PAD_RIGHT),
                ],
                [
                    'description' => 'Classeur pour les documents des équipements',
                    'created_by' => Auth::user()->id,
                    'updated_by' => Auth::user()->id,
                ]
            );

            $dossier = Dossier::firstOrCreate([
                'classeur_id' => $classer->id,
                'titre' => 'Dossier de l\'équipement : ' . $product->nom,
                'reference' => 'EQPMT/' . str_pad($product->id, 6, '0', STR_PAD_RIGHT),
                'team_id' => Auth::user()->current_team_id,
            ],
                [
                    'description' => 'Dossier pour les documents de l\'équipement : ' . $product->nom,
                    'confidentiel' => 0,
                    'created_by' => Auth::user()->id,
                    'updated_by' => Auth::user()->id,
                ]);

            $document = Document::create([
                'dossier_id' => $dossier->id,
                'libelle' => $doc_name,
                'category_id' => 4,
                'reference' => 'EQPMT/DOC/' . str_pad(Document::forCurrentTeam()->count() + 1, 6, '0', STR_PAD_RIGHT),
                'type' => 3,
                'document' => $doc_path,
                'user_id' => Auth::user()->id,
                'statut_id' => 1,
                'created_by' => Auth::user()->id,
                'team_id' => Auth::user()->current_team_id,
            ]);

            $product->documents()->attach($document);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Product $product)
    {
        $projects = $product->projects;
        $stat = 0;
        if ($request->has('project_stat')) {
            switch ($request->project_stat) {
                case 1:
                    $projects = $product->projects;
                    $stat = 1;
                    break;
                case 2:
                    $projects = $product->projects;
                    $stat = 2;
                    break;
                case 3:
                    $projects = $product->projects;
                    $stat = 3;
                    break;
                default:
                    $projects = $product->projects;
                    $stat = 0;
                    break;
            }
        }
        return view('pm.equipements.show')->with([
            'product' => $product,
            'projects' => $projects,
            'stat' => $stat,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $types = ProductsType::forCurrentTeam()->select('id', 'nom')->get();
        $marques = ProductsMarque::forCurrentTeam()->select('id', 'marque')->get();
        $modeles = ProductsModel::forCurrentTeam()->select('id', 'modele')->get();
        $frequences = BandesFrequence::forCurrentTeam()->select('id', 'frequence')->get();
        $puissances = Puissance::forCurrentTeam()->select('id', 'puisance')->get();
        $normes = Norme::forCurrentTeam()->select('id', 'norme')->get();

        return view('pm.equipements.edit')->with([
            'product' => $product,
            'types' => $types,
            'marques' => $marques,
            'modeles' => $modeles,
            'frequences' => $frequences,
            'puissances' => $puissances,
            'normes' => $normes,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        try {
            $type_id = $request->type_id;
            $marque_id = $request->marque_id;
            $modele_id = $request->modele_id;

            if (!is_numeric($type_id)) {
                $type = new ProductsType();
                $type->nom = $type_id;
                $type->save();
                $type_id = $type->id;
            }

            if (!is_numeric($marque_id)) {
                $marque = new ProductsMarque();
                $marque->marque = $marque_id;
                $marque->save();
                $marque_id = $marque->id;
            }

            if (!is_numeric($modele_id)) {
                $modele = new ProductsModel();
                $modele->modele = $modele_id;
                $modele->save();
                $modele_id = $modele->id;
            }

            $product->nom = $request->nom;
            $product->type_id = $request->type_id;
            $product->marque_id = $request->marque_id;
            $product->modele_id = $request->modele_id;
            $product->description = $request->description;
            $product->image = (new Image)->handle($request, 'image', 'products') ?? $product->image;
            $product->rapport_rf = (new File)->handle($request, 'rapport_rf', 'products') ?? $product->rapport_rf;
            $product->rapport_safety = (new File)->handle($request, 'rapport_safety', 'products') ?? $product->rapport_safety;
            $product->rapport_emc = (new File)->handle($request, 'rapport_emc', 'products') ?? $product->rapport_emc;
            $product->rapport_sar = (new File)->handle($request, 'rapport_sar', 'products') ?? $product->rapport_sar;
            $product->declaration = (new File)->handle($request, 'declaration', 'products') ?? $product->declaration;
            $product->autre_rapport = (new File)->handle($request, 'autre_rapport', 'products') ?? $product->autre_rapport;
            $product->save();

            $frequences = [];
            $puissances = [];
            $normes = [];

            foreach ($request->frequences as $key => $value) {
                if (!is_numeric($value)) {
                    $frequence = new BandesFrequence();
                    $frequence->frequence = $value;
                    $frequence->save();
                    array_push($frequences, $frequence->id);
                } else {
                    array_push($frequences, $value);
                }
            }

            foreach ($request->puissances as $key => $value) {
                if (!is_numeric($value)) {
                    $puissance = new Puissance();
                    $puissance->puisance = $value;
                    $puissance->save();
                    array_push($puissances, $puissance->id);
                } else {
                    array_push($puissances, $value);
                }
            }

            foreach ($request->normes as $key => $value) {
                if (!is_numeric($value)) {
                    $norme = new Norme();
                    $norme->norme = $value;
                    $norme->save();
                    array_push($normes, $norme->id);
                } else {
                    array_push($normes, $value);
                }
            }

            $product->frequences()->sync($frequences);
            $product->puissances()->sync($puissances);
            $product->normes()->sync($normes);

            $content = json_encode([
                'name' => 'Equipement',
                'statut' => 'success',
                'message' => 'La modification de l\'équipement a réussi avec succès !',
            ]);

        } catch (\Throwable $th) {
            $content = json_encode([
                'name' => 'Equipement',
                'statut' => 'error',
                'message' => 'La modification de l\'équipement a échoué ! ' . $th->message,
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

        return redirect()->route('pm.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
            $content = json_encode([
                'name' => 'Equipement',
                'statut' => 'success',
                'message' => 'La suppression de l\'équipement a réussi avec succès !',
            ]);

        } catch (\Throwable $th) {
            $content = json_encode([
                'name' => 'Equipement',
                'statut' => 'error',
                'message' => 'La suppression de l\'équipement a échoué !',
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
        return redirect()->route('pm.products.index');
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
            Product::destroy(explode(',', $ids));

            $content = json_encode([
                'name' => 'Equipement',
                'statut' => 'success',
                'message' => 'La suppression des équipements a réussi avec succès !',
            ]);

        } catch (\Throwable $th) {
            $content = json_encode([
                'name' => 'Equipement',
                'statut' => 'error',
                'message' => 'La suppression des équipements a échoué !',
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

        return redirect()->route('pm.products.index');
    }

}
