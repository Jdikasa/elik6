<?php

namespace App\Http\Controllers;

use App\Models\ProductsMarque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsMarqueController extends Controller
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
        $productsMarque = new ProductsMarque();
        $productsMarque->marque = $request->marque;
        $productsMarque->team_id = Auth::user()->current_team_id;
        $productsMarque->save();

        return response()->json([
            'results'    => $productsMarque,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProduitsMarque  $produitsMarque
     * @return \Illuminate\Http\Response
     */
    public function show(ProductsMarque $produitsMarque)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProduitsMarque  $produitsMarque
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductsMarque $produitsMarque)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProduitsMarque  $produitsMarque
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductsMarque $produitsMarque)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProduitsMarque  $produitsMarque
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductsMarque $produitsMarque)
    {
        //
    }
}
