<?php

namespace App\Http\Controllers;

use App\Models\BandesFrequence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BandesFrequenceController extends Controller
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
        $bandesFrequence = new BandesFrequence();
        $bandesFrequence->frequence = $request->frequence;
        $bandesFrequence->team_id = Auth::user()->current_team_id;
        $bandesFrequence->save();

        return response()->json([
            'results'    => $bandesFrequence,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BandesFrequence  $bandesFrequence
     * @return \Illuminate\Http\Response
     */
    public function show(BandesFrequence $bandesFrequence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BandesFrequence  $bandesFrequence
     * @return \Illuminate\Http\Response
     */
    public function edit(BandesFrequence $bandesFrequence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BandesFrequence  $bandesFrequence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BandesFrequence $bandesFrequence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BandesFrequence  $bandesFrequence
     * @return \Illuminate\Http\Response
     */
    public function destroy(BandesFrequence $bandesFrequence)
    {
        //
    }
}
