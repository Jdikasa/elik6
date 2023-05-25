<?php

namespace App\Http\Controllers;

use App\Models\Cotation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cotations = Cotation::forCurrentTeam()->get();
        return view('pm.finance.cotation.index')->with([
            'cotations' => $cotations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pm.finance.cotation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $items = json_decode($request->data, true);

            $cotation = new Cotation();
            $cotation->customer_id = $request->customer_id;
            $cotation->country_id = $request->country_id;
            $cotation->total = doubleval(Str::replaceArray('.', [''], $request->total));
            $cotation->tax = doubleval(Str::replaceArray('.', [''], $request->tax));
            $cotation->total_net = doubleval(Str::replaceArray('.', [''], $request->total_net));
            $cotation->team_id = Auth::user()->current_team_id;
            $cotation->save();

            foreach ($items as $key => $item) {
                $cotation->products()->attach($item['product_id'], [
                    'partenaire_id' => $item['partenaire_id'],
                    'prix' => doubleval(Str::replaceArray('.', [''], $item['price'])),
                    'qt' => $item['qt'],
                ]);
            }

            $content = json_encode([
                'name' => 'Finance / cotation',
                'statut' => 'success',
                'message' => 'L\'enregistrement de la cotation a reussi avec succès !',
            ]);

        } catch (\Throwable$th) {
            $content = json_encode([
                'name' => 'Finance / cotation',
                'statut' => 'error',
                'message' => 'L\'enregistrement de la cotation a échoué !',
            ]);
            session()->flash(
                'session',
                $content
            );
            return redirect()->back();
        }

        session()->flash(
            'session',
            $content
        );

        return redirect()->route('pm.fin.cotations.index');
    }

    public function makeFile(Request $request)
    {
        $pdfContent = $request->pdf;
        Storage::deleteDirectory('tmp');
        Storage::disk('local')->put('tmp', $pdfContent);
        return response()->json('true', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cotation  $cotation
     * @return \Illuminate\Http\Response
     */
    public function show(Cotation $cotation)
    {
        return view('pm.finance.cotation.show')->with([
            'cotation' => $cotation,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cotation  $cotation
     * @return \Illuminate\Http\Response
     */
    public function edit(Cotation $cotation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cotation  $cotation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cotation $cotation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cotation  $cotation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cotation $cotation)
    {
        try {
            $cotation->delete();
            $content = json_encode([
                'name' => 'Finance / facturation',
                'statut' => 'success',
                'message' => 'La suppression de la cotation a réussi avec succès !',
            ]);
        } catch (\Throwable$th) {
            $content = json_encode([
                'name' => 'Finance / facturation',
                'statut' => 'error',
                'message' => 'La suppression de la cotation a echoué !',
            ]);
        }

        session()->flash(
            'session',
            $content
        );
        return redirect()->back();
    }
}
