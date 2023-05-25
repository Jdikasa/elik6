<?php
namespace App\Http\Controllers\RH;

use App\Models\User;
use App\Models\Statut;
use App\Models\Absence;
use App\Models\TypeAbsence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AbsenceController extends Controller
{
    public function index()
    {
        $typeabsences = TypeAbsence::orderBy('libelle', 'asc')->get();
        $absences = Absence::where('statut_id', '1')->get();
        $users = User::where('statut_id', '1')->get();
        $statuts = Statut::all();

        foreach ($absences as $absence) {
            if ((date('Y-m', strtotime($absence->fin)) < now()->format('Y-m'))) {
                Absence::where('id', $absence->id)->update([
                    'statut_id' => '3',
                ]);
            }
        }

        $absences = Absence::orderBy('debut', 'desc')->get();

        session()->put('menu', '4');

        return view('pages.rh.absences.index', compact('users', 'absences', 'typeabsences', 'statuts'));
    }

    public function store(Request $request)
    {
        // dd($request->type_absence_id);
        $absence = Absence::create([
            'debut' => $request->debut,
            'jour' => $request->jour,
            'employe_id' => $request->employe_id,
            'type_absence_id' => $request->type_absence_id,
            'user_id' => Auth::user()->id,
            'statut_id' => 1,
        ]);

        if($absence->id != null){
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
        $absence = Absence::where('id', $request->absence_id)->update([
            'debut' => $request->debut,
            'jour' => $request->jour,
            'employe_id' => $request->employe_id,
            'type_absence_id' => $request->type_absence_id,
            'statut_id' => $request->statut_id,
        ]);

        if($absence == 1){
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
        $absence = Absence::where('id', $id)->delete();

        if($absence == 1){
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
