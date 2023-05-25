<?php

namespace App\Http\Controllers\RH;

use App\Models\Statut;
use App\Models\Pointage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class PointageController extends Controller
{
    public function index()
    {
        $pointages = Pointage::where('created_at', '>=', now()->format('Y-m-d'))->get();
        $statuts = Statut::all();

        $jourssemaine = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
        $moisannee = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];

        $date = Str::title(now()->isoFormat('dddd, DD MMMM Y')); //$jourssemaine[strtotime(now()->format('N')) + 1].now()->format(', d ').$moisannee[now()->format('n') - 1].now()->format(' Y');
        // dd($date);

        session()->put('menu', '4');

        return view('pages.rh.pointages.index', compact('pointages', 'statuts', 'date'));
    }

    public function store(Request $request)
    {
        $pointage = Pointage::create([
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

        if($pointage->id != null){
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'success',
                'message' => 'L\'ajout du pointage a réussi avec succès !',
            ]);
        } else {
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'error',
                'message' => 'L\'ajout du pointage a échoué !',
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
        $pointage = Pointage::where('id', $request->pointage_id)->update([
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

        if($pointage == 1){
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'success',
                'message' => 'La modification du pointage a réussie avec succès !',
            ]);
        } else {
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'error',
                'message' => 'La modification du pointage a échouée !',
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
        $pointage = Pointage::where('id', $id)->update([
            'statut_id' => '4',
        ]);

        if($pointage == 1){
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'success',
                'message' => 'La suppression du pointage a réussie avec succès !',
            ]);
        } else {
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'error',
                'message' => 'La suppression du pointage a échouée !',
            ]);
        }

        session()->put(
            'session',
            $content
        );

        return back();
    }
}
