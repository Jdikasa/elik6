<?php

namespace App\Http\Controllers\Taches;

use App\Http\Controllers\Controller;
use App\Models\TacheObjectif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TacheObjectifController extends Controller
{
    public function store(Request $request)
    {

        $tache = TacheObjectif::create([
            'tache_id' => $request->tache_id,
            'agent_id' => $request->agent_id,
            'user_id' => Auth::id(),
            'libelle' => $request->libelle,
            'statut' => 0,
        ]);

        return response()->json(['success' => $tache]);
    }

    public function update(Request $request, $id)
    {
        dd($request);
        $tache = TacheObjectif::find($id);
        $tache->update([
            'tache_id' => $request->tache_id,
            'agent_id' => $request->agent_id,
            'user_id' => Auth::id(),
            'libelle' => $request->libelle,
            'statut' => 0,
        ]);

        return response()->json(['update' => $tache]);
    }

    public function delete($id)
    {
        $tache = TacheObjectif::find($id);

        $tache->delete();

        return response()->json(['delete' => 'operation successful']);
    }
}