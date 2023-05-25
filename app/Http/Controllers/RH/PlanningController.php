<?php

namespace App\Http\Controllers\RH;

use App\Models\Statut;
use App\Models\Planning;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlanningController extends Controller
{
    public function index()
    {
        $plannings = Planning::all();
        $statuts = Statut::all();

        session()->put('menu', '4');

        return view('pages.rh.planning.index', compact('plannings', 'statuts'));
    }

    public function store(Request $request)
    {
        $planning = Planning::create([
            'libelle' => $request->libelle,
            'lundi' => $request->lundi_begin.' - '.$request->lundi_end,
            'mardi' => $request->mardi_begin.' - '.$request->mardi_end,
            'mercredi' => $request->mercredi_begin.' - '.$request->mercredi_end,
            'jeudi' => $request->jeudi_begin.' - '.$request->jeudi_end,
            'vendredi' => $request->vendredi_begin.' - '.$request->vendredi_end,
            'samedi' => $request->samedi_begin.' - '.$request->samedi_end,
            'dimanche' => $request->dimanche_begin.' - '.$request->dimanche_end,
            'statut_id' => '1',
        ]);

        if($planning->id != null){
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'success',
                'message' => 'L\'ajout du planning a réussi avec succès !',
            ]);
        } else {
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'error',
                'message' => 'L\'ajout du planning a échoué !',
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
        $planning = Planning::where('id', $request->planning_id)->update([
            'libelle' => $request->libelle,
            'lundi' => $request->lundi_begin.' - '.$request->lundi_end,
            'mardi' => $request->mardi_begin.' - '.$request->mardi_end,
            'mercredi' => $request->mercredi_begin.' - '.$request->mercredi_end,
            'jeudi' => $request->jeudi_begin.' - '.$request->jeudi_end,
            'vendredi' => $request->vendredi_begin.' - '.$request->vendredi_end,
            'samedi' => $request->samedi_begin.' - '.$request->samedi_end,
            'dimanche' => $request->dimanche_begin.' - '.$request->dimanche_end,
            'statut_id' => $request->statut_id,
        ]);

        if($planning == 1){
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'success',
                'message' => 'La modification du planning a réussie avec succès !',
            ]);
        } else {
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'error',
                'message' => 'La modification du planning a échouée !',
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
        $planning = Planning::where('id', $id)->update([
            'statut_id' => '4',
        ]);

        if($planning == 1){
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'success',
                'message' => 'La suppression du planning a réussie avec succès !',
            ]);
        } else {
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'error',
                'message' => 'La suppression du planning a échouée !',
            ]);
        }

        session()->put(
            'session',
            $content
        );

        return back();
    }
}
