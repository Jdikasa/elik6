<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSocieteRequest;
use App\Http\Requests\UpdateSocieteRequest;
use App\Models\Societe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SocieteController extends Controller
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
     * @param  \App\Http\Requests\StoreSocieteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSocieteRequest $request)
    {
        $societe = new Societe;
        $societe->nom = $request->nom;
        $societe->team_id = Auth::user()->current_team_id;
        $societe->save();

        return response()->json([
            'results' => $societe, //['id' => $societe->id, 'text' => $societe->nom],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Societe  $societe
     * @return \Illuminate\Http\Response
     */
    public function show(Societe $societe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Societe  $societe
     * @return \Illuminate\Http\Response
     */
    public function edit(Societe $societe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSocieteRequest  $request
     * @param  \App\Models\Societe  $societe
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSocieteRequest $request, Societe $societe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Societe  $societe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Societe $societe)
    {
        //
    }

    public function relation(Request $request)
    {
        $routeName = explode('.', $request->route()->getName())[1];
        $slug = $routeName == 'clients' ? 'customers' : $routeName;
        $page = $request->input('page');
        $on_page = 50;
        $search = $request->input('search', false);
        // $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        $method = $request->input('method', 'add');

        $model = app('\App\Models\\' . Str::ucfirst(Str::camel(Str::singular($slug))));
        // $model = app($dataType->model_name);
        if ($method != 'add') {
            $model = $model->find($request->input('id'));
        }

        // dd($method);

        // $societe = new Societe;
        // $societe->nom = $request->nom;
        // $societe->save();

        return response()->json([
            'results' => $routeName, //['id' => $societe->id, 'text' => $societe->nom],
        ]);
    }

}
