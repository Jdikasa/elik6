<?php

namespace App\Http\Controllers\RH;

use App\Models\User;
use App\Models\Statut;
use App\Models\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Division::all();
        $statuts = Statut::all();
        $users = User::where('statut_id', '1')->get();

        session()->put('menu', '4');

        return view('pages.rh.services.index', compact('services', 'users', 'statuts'));
    }

    public function store(Request $request)
    {
        $division = Division::create([
            'libelle' => $request->libelle,
            'description' => $request->description,
            'responsable_id' => $request->responsable_id,
            'statut_id' => '1',
        ]);

        if($division->id != null){
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'success',
                'message' => 'L\'ajout du service a réussi avec succès !',
            ]);
        } else {
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'error',
                'message' => 'L\'ajout du service a échoué !',
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
        $division = Division::where('id', $request->service_id)->update([
            'libelle' => $request->libelle,
            'description' => $request->description,
            'responsable_id' => $request->responsable_id,
            'statut_id' => $request->statut_id,
        ]);

        if($division == 1){
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'success',
                'message' => 'La modification du service a réussie avec succès !',
            ]);
        } else {
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'error',
                'message' => 'La modification du service a échouée !',
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
        $division = Division::where('id', $id)->update([
            'statut_id' => '4',
        ]);

        if($division == 1){
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'success',
                'message' => 'La suppression du service a réussie avec succès !',
            ]);
        } else {
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'error',
                'message' => 'La suppression du service a échouée !',
            ]);
        }

        session()->put(
            'session',
            $content
        );

        return back();
    }
}
