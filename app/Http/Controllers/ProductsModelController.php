<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductsModelRequest;
use App\Http\Requests\UpdateProductsModelRequest;
use App\Models\ProductsModel;
use Illuminate\Support\Facades\Auth;

class ProductsModelController extends Controller
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
     * @param  \App\Http\Requests\StoreProductsModelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductsModelRequest $request)
    {
        $productsModel = new ProductsModel();
        $productsModel->modele = $request->modele;
        $productsModel->team_id = Auth::user()->current_team_id;
        $productsModel->save();

        return response()->json([
            'results'    => $productsModel,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductsModel  $productsModel
     * @return \Illuminate\Http\Response
     */
    public function show(ProductsModel $productsModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductsModel  $productsModel
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductsModel $productsModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductsModelRequest  $request
     * @param  \App\Models\ProductsModel  $productsModel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductsModelRequest $request, ProductsModel $productsModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductsModel  $productsModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductsModel $productsModel)
    {
        //
    }
}
