<?php

namespace App\Http\Controllers\Taches;

use App\Http\Controllers\Controller;
use App\Models\Commentaire;
use Auth;
use Illuminate\Http\Request;

class TacheCommentaireController extends Controller
{
    public function store(Request $request)
    {

        $comment = Commentaire::create([
            'tache_id' => $request->tache_id,
            'user_id' => Auth::id(),
            'message' => $request->message,
            'statut_id' => $request->statut_id,
        ]);

        return response()->json(['success' => $comment]);
    }

    public function update(Request $request, $id)
    {
        $comment = Commentaire::find($id);
        $comment->update([
            'tache_id' => $request->tache_id,
            'agent_id' => $request->agent_id,
            'user_id' => Auth::id(),
            'libelle' => $request->libelle,
            'statut' => 0,
        ]);

        return response()->json(['update' => $comment]);
    }

    public function delete($id)
    {
        $comment = Commentaire::find($id);

        $comment->delete();

        return response()->json(['delete' => 'operation successful']);
    }
}