<?php

namespace App\Http\Controllers\Archives;

use App\Http\Controllers\Controller;
use App\Models\ArchivePermission;
use App\Models\Classeur;
use App\Models\Dossier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DossierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dossier = Dossier::create([
            'titre' => $request->titre,
            'classeur_id' => $request->classeur_id,
            'reference'=> $request->reference,
            'description' => $request->description,
            'created_by' => Auth::user()->agent->id,
            'updated_by' => Auth::user()->agent->id,
            'team_id' => Auth::user()->current_team_id,
        ]);

        ArchivePermission::create([
            'agent_id' => Auth::user()->agent->id,
            'permissionable_id' => $dossier->id,
            'permissionable_type' => 'App\Models\Dossier',
            'key' => 'view_dossier',
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($classeur, $dossier)
    {
        $classeur = Classeur::find($classeur);
        $dossier = Dossier::find($dossier);

        return view("pm.archives.document-details")->with([
            'dossier' => $dossier,
            'classeur' => $classeur,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
