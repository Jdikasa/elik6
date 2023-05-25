<?php

namespace App\Http\Controllers\RH;

use App\Models\User;
use App\Models\Poste;
use App\Models\Vente;
use App\Models\Contrat;
use App\Models\Produit;
use App\Models\Pointage;
use App\Models\Division;
use App\Models\Historique;
use App\Models\Departement;
use Illuminate\Http\Request;
use App\Models\PivotUserConge;
use App\Models\PosteCategorie;
use App\Models\PosteClassification;
use App\Http\Controllers\Controller;

class RhController extends Controller
{
    public function index()
    {
        $pivotuserconges = PivotUserConge::all();
        foreach ($pivotuserconges as  $pivotuserconge) {
            if ($pivotuserconge->statut_id == '1' || $pivotuserconge->statut_id == '3') {
                PivotUserConge::where('id', $pivotuserconge->id)->update([
                    'statut_id' => (now()->format('Y-m-d') > $pivotuserconge->fin) ? '3' : '1',
                ]);
            }
        }

        $departements = Departement::orderBy('libelle', 'asc')->get();
        $divisions = Division::orderBy('libelle', 'asc')->get();
        $postes = Poste::orderBy('libelle', 'asc')->get();
        $users = User::orderBy('role_id', 'asc')->get();
        $ventes = Vente::where('statut_id', '1')->get();
        $produits = produit::orderBy('nom', 'asc')->where('statut_id', '1')->get();
        $postecategories = PosteCategorie::orderBy('libelle', 'asc')->get();
        $posteclassifications = PosteClassification::orderBy('libelle', 'asc')->get();
        $historiques = Historique::all();
        $pointages = Pointage::all();
        $pivotuserconges = PivotUserConge::all();

        $soldedujour = 0;

        foreach ($ventes as $key => $vente) {
            $soldedujour = $soldedujour + ($vente->quantite * $vente->produit->prix);
        }

        session()->put('menu', '4');

        return view('pages.rh.index', compact('users', 'divisions', 'departements', 'postes', 'postecategories', 'posteclassifications', 'pointages', 'produits', 'soldedujour', 'historiques', 'pivotuserconges'));
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

        session()->put(
            'session',
            $content
        );


        return back();
    }
}
