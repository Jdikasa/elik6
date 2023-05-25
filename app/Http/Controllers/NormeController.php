<?php

namespace App\Http\Controllers;

use App\Models\Norme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NormeController extends Controller
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
        $norme = new Norme();
        $norme->norme = $request->norme;
        $norme->team_id = Auth::user()->current_team_id;
        $norme->save();

        return response()->json([
            'results'    => $norme,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Norme  $norme
     * @return \Illuminate\Http\Response
     */
    public function show(Norme $norme)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Norme  $norme
     * @return \Illuminate\Http\Response
     */
    public function edit(Norme $norme)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Norme  $norme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Norme $norme)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Norme  $norme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Norme $norme)
    {
        //
    }
}
