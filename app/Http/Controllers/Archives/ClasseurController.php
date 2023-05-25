<?php

namespace App\Http\Controllers\Archives;

use App\Http\Controllers\Controller;
use App\Models\ArchivePermission;
use App\Models\Classeur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClasseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($annee)
    {
        return view('pm.archives.classeur')->with([
            'annee' => $annee
        ]);
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
        $classeur = Classeur::create([
            'titre' => $request->titre,
            'departement_id' => 1, //Auth::user()->agent->departement->id,
            'description' => $request->description,
            'reference'=> $request->reference,
            'created_by' => Auth::user()->agent->id,
            'team_id' => Auth::user()->current_team_id,
            'updated_by' => Auth::user()->agent->id,
        ]);

        ArchivePermission::create([
            'agent_id' => Auth::user()->agent->id,
            'permissionable_id' => $classeur->id,
            'permissionable_type' => 'App\Models\Classeur',
            'key' => 'view_classeur',
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $classeur = Classeur::find($id);
        return view("pm.archives.dossiers")->with([
            'classeur' => $classeur
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
    public function destroy(Classeur $classeur)
    {
        $classeur->delete();
        return redirect()->back();
    }
}
