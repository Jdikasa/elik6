<?php
namespace App\Http\Controllers\RH;

use App\Models\TypeAbsence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class TypeAbsenceController extends Controller
{
    public function store(Request $request)
    {
        $typeabsence = TypeAbsence::create([
            'libelle' => $request->libelle,
            'user_id' => Auth::user()->id,
            'statut_id' => 1,
        ]);

        if($typeabsence->id != null){
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'success',
                'message' => 'L\'ajout du type d\'absence a réussi avec succès !',
            ]);
        } else {
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'error',
                'message' => 'L\'ajout du type d\'absence a échoué !',
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
        $typeabsence = TypeAbsence::where('id', $request->type_absence_id)->update([
            'libelle' => $request->libelle,
            'statut_id' => $request->statut_id,
        ]);

        if($typeabsence == 1){
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'success',
                'message' => 'La modification du type d\'absence a réussi avec succès !',
            ]);
        } else {
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'error',
                'message' => 'La modification du type d\'absence a échoué !',
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
        $typeabsence = TypeAbsence::where('id', $id)->update([
            'statut_id' => '4',
        ]);

        if($typeabsence == 1){
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'success',
                'message' => 'La suppression du type d\'absence a réussi avec succès !',
            ]);
        } else {
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'error',
                'message' => 'La suppression du type d\'absence a échoué !',
            ]);
        }

        session()->put(
            'session',
            $content
        );

        return back();
    }
}
