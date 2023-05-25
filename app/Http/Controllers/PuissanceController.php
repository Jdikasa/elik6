<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePuissanceRequest;
use App\Http\Requests\UpdatePuissanceRequest;
use App\Models\Puissance;
use Illuminate\Support\Facades\Auth;

class PuissanceController extends Controller
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
     * @param  \App\Http\Requests\StoreProductsStatuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePuissanceRequest $request)
    {
        $puissance = new Puissance();
        $puissance->puisance = $request->puisance;
        $puissance->team_id = Auth::user()->current_team_id;
        $puissance->save();

        return response()->json([
            'results'    => $puissance,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductsStatu  $productsStatu
     * @return \Illuminate\Http\Response
     */
    public function show(Puissance $productsStatu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductsStatu  $productsStatu
     * @return \Illuminate\Http\Response
     */
    public function edit(Puissance $productsStatu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductsStatuRequest  $request
     * @param  \App\Models\ProductsStatu  $productsStatu
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePuissanceRequest $request, Puissance $productsStatu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductsStatu  $productsStatu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Puissance $productsStatu)
    {
        //
    }
}
