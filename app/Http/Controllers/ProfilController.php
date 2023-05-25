<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Historique;
use App\Models\Etat;
use App\Models\Conge;
use App\Models\Planning;
use App\Models\Pointage;
use App\Models\TypeContrat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function index()
    {
        $etats = Etat::forCurrentTeam()->where('statut_id', 1)->get();
        $typecontrats = TypeContrat::forCurrentTeam()->where('statut_id', 1)->get();
        $conges = Conge::forCurrentTeam()->where('statut_id', 1)->get();
        $pointages = Auth::user()->pointages->sortByDesc('id');
        $plannings = Planning::forCurrentTeam()->where('statut_id', 1)->get();

        return view('profile.show', compact('etats', 'typecontrats', 'conges', 'pointages','plannings'));
    }

    public function updateAvatar(Request $request)
    {
        $agent = Agent::find($request->agent_id);
        $agent->image = (new Image())->handle($request, 'image', 'agents');
        $agent->save();

        $user = User::forCurrentTeam()->where('id', $agent->user_id)->first();
        $user->avatar = (new Image())->handle($request, 'image', 'users');
        $user->save();

        $content = json_encode([
            'name' => 'Ressources humaines',
            'statut' => 'success',
            'message' => 'La modification de l\'image a réussi avec succès !',
        ]);

        session()->flash(
            'session',
            $content
        );

        return redirect()->back();
    }
}
