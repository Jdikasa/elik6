<?php
namespace App\Http\Controllers\RH;

use App\Models\User;
use App\Models\Conge;
use App\Models\Statut;
use Illuminate\Http\Request;
use App\Models\PivotUserConge;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class CongeController extends Controller
{
    public function index()
    {
        $conges = Conge::orderBy('libelle', 'asc')->get();
        $pivotuserconges = PivotUserConge::all();
        $users = User::where('statut_id', '1')->get();
        $statuts = Statut::all();

        foreach ($pivotuserconges as $pivotuserconge) {
            if ((date('Y-m', strtotime($pivotuserconge->fin)) < now()->format('Y-m'))) {
                PivotUserConge::where('id', $pivotuserconge->id)->update([
                    'statut_id' => '3',
                ]);
            }
        }

        $pivotuserconges = PivotUserConge::orderBy('debut', 'desc')->get();

        session()->put('menu', '4');

        return view('pages.rh.conges.index', compact('users', 'conges', 'pivotuserconges', 'statuts'));
    }

    public function store(Request $request)
    {
        $conge = Conge::create([
            'libelle' => $request->libelle,
            'description' => $request->description,
            'user_id' => Auth::user()->id,
            'statut_id' => 1,
        ]);

        if($conge->id != null){
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'success',
                'message' => 'L\'ajout du congé a réussi avec succès !',
            ]);
        } else {
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'error',
                'message' => 'L\'ajout du congé a échoué !',
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
        $conge = Conge::where('id', $request->conge_id)->update([
            'libelle' => $request->libelle,
            'description' => $request->description,
            'statut_id' => $request->statut_id,
        ]);

        if($conge == 1){
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'success',
                'message' => 'La modification du congé a réussi avec succès !',
            ]);
        } else {
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'error',
                'message' => 'La modification du congé a échoué !',
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
        $conge = Conge::where('id', $id)->delete();

        if($conge == 1){
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'success',
                'message' => 'La suppression du congé a réussi avec succès !',
            ]);
        } else {
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'error',
                'message' => 'La suppression du congé a échoué !',
            ]);
        }

        session()->put(
            'session',
            $content
        );

        return back();
    }
}
