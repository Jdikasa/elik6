<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductsTypeRequest;
use App\Http\Requests\UpdateProductsTypeRequest;
use App\Models\ProductsType;
use Illuminate\Support\Facades\Auth;

class ProductsTypeController extends Controller
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
     * @param  \App\Http\Requests\StoreProductsTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductsTypeRequest $request)
    {
        $productsType = new ProductsType();
        $productsType->nom = $request->nom;
        $productsType->team_id = Auth::user()->current_team_id;
        $productsType->save();

        return response()->json([
            'results'    => $productsType//['id' => $societe->id, 'text' => $societe->nom],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductsType  $productsType
     * @return \Illuminate\Http\Response
     */
    public function show(ProductsType $productsType)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductsType  $productsType
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductsType $productsType)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductsTypeRequest  $request
     * @param  \App\Models\ProductsType  $productsType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductsTypeRequest $request, ProductsType $productsType)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductsType  $productsType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductsType $productsType)
    {
    }
}
