<?php

namespace App\Http\Controllers\RH;

use Illuminate\Http\Request;
use App\Models\PivotUserConge;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class PivotUserCongeController extends Controller
{
    public function store(Request $request)
    {
        $conge = PivotUserConge::create([
            'debut' => $request->debut,
            'jour' => $request->jour,
            'employe_id' => $request->employe_id,
            'conge_id' => $request->conge_id,
            'user_id' => Auth::user()->id,
            'statut_id' => '1',
        ]);

        if($conge->id != null){
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'success',
                'message' => 'L\'attributtion du congé à un utilisateur a réussi avec succès !',
            ]);
        } else {
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'error',
                'message' => 'L\'attributtion du congé à un utilisateur a échoué !',
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
        $conge = PivotUserConge::where('id', $request->pivotuserconge_id)->update([
            'debut' => $request->debut,
            'jour' => $request->jour,
            'employe_id' => $request->employe_id,
            'conge_id' => $request->conge_id,
            'statut_id' => $request->statut_id,
        ]);

        if($conge == 1){
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'success',
                'message' => 'La modification du congé à un employé a réussi avec succès !',
            ]);
        } else {
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'error',
                'message' => 'La modification du congé à un employé a échoué !',
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
        $conge = PivotUserConge::where('id', $id)->delete();

        if($conge == 1){
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'success',
                'message' => 'La suppression du congé à un employé a réussi avec succès !',
            ]);
        } else {
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'error',
                'message' => 'La suppression du congé à un employé a échoué !',
            ]);
        }

        session()->put(
            'session',
            $content
        );

        return back();
    }
}
