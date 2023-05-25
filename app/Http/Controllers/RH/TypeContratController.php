<?php

namespace App\Http\Controllers\RH;

use App\Models\User;
use App\Models\Statut;
use App\Models\Contrat;
use App\Models\Document;
use App\Models\Division;
use App\Models\TypeContrat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TypeContratController extends Controller
{
    public function index()
    {
        $typecontrats = TypeContrat::orderBy('libelle', 'asc')->get();
        $statuts = Statut::all();

        session()->put('menu', '9');

        return view('pages.rh.typecontrats.index', compact('typecontrats', 'statuts'));
    }

    public function store(Request $request)
    {
        $typecontrat = TypeContrat::create([
            'libelle' => $request->libelle,
            'user_id' => Auth::user()->id,
            'statut_id' => '1',
        ]);

        if($typecontrat->id != null){
            $typecontrat = Contrat::where('id', $typecontrat->id)->first();

            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'success',
                'message' => 'L\'ajout du type de contrat a réussi avec succès !',
            ]);
        } else {
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'error',
                'message' => 'L\'ajout du type de contrat a échoué !',
            ]);
        }

        session()->put(
            'session',
            $content
        );

        return back();
    }

    public function update(Request $request)
    {
        $typecontrat = TypeContrat::where('id', $request->typecontrat_id)->update([
            'libelle' => $request->libelle,
            'user_id' => Auth::user()->id,
            'statut_id' => $request->statut_id,
        ]);

        if($typecontrat == 1){
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'success',
                'message' => 'La modification du type de contrat a réussie avec succès !',
            ]);
        } else {
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'error',
                'message' => 'La modification du type de contrat a échouée !',
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
        $typecontrat = TypeContrat::where('id', $id)->update([
            'statut_id' => '4',
        ]);

        if($typecontrat == 1){
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'success',
                'message' => 'La suppression du type de contrat a réussie avec succès !',
            ]);
        } else {
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'error',
                'message' => 'La suppression du type de contrat a échouée !',
            ]);
        }

        session()->put(
            'session',
            $content
        );

        return back();
    }
}
