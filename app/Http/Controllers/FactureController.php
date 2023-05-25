<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\PayTransaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $factures = Facture::forCurrentTeam()->select('id', 'compte_id', 'customer_id', 'date_limit_paie', 'total_net', 'statut_id', 'created_at')
            ->with('client', 'statut', 'compte')
            ->orderBy('id', 'desc')
            ->get();
        return view('pm.finance.factures.index')->with([
            'factures' => $factures,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pm.finance.factures.create');
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

            $facture = new Facture();
            $facture->compte_id = $request->carte_id;
            $facture->customer_id = $request->customer_id;
            $facture->date_limit_paie = Carbon::createFromFormat('d/m/Y', $request->date_limit_paie)->format('Y-m-d');
            $facture->total = doubleval(Str::replaceArray('.', [''], $request->total));
            $facture->tax = doubleval(Str::replaceArray('.', [''], $request->tax));
            $facture->total_net = doubleval(Str::replaceArray('.', [''], $request->total_net));
            $facture->save();

            if (doubleval($request->post_pay) > 0) {
                PayTransaction::create([
                    'user_id' => Auth::user()->id,
                    'facture_id' => $facture->id,
                    'montant' => doubleval(Str::replaceArray('.', [''], $request->post_pay)),
                    'description' => 'paiement de ' . $request->post_pay . '$ pour la facture <a href="' . route("pm.fin.factures.show", $facture) . '">#' . str_pad($facture->id, 6, '0', 0) . '</a>',
                ]);
                if ($request->post_pay == doubleval(Str::replaceArray('.', [''], $facture->total_net))) {
                    $facture->statut_id = 3;
                    $facture->save();
                } else {
                    $facture->statut_id = 2;
                    $facture->save();
                }
            } else {
                $facture->statut_id = 1;
                $facture->save();
            }

            foreach ($items as $key => $item) {
                $facture->projects()->attach($item['project_id'],
                    [
                        'prix' => doubleval(Str::replaceArray('.', [''], $item['price'])),
                        'qt' => $item['qt'],
                    ]
                );
            }

            $content = json_encode([
                'name' => 'Finance / facture',
                'statut' => 'success',
                'message' => 'L\'enregistrement de la facture a réussi avec succès !',
            ]);

        } catch (\Throwable $th) {
            $content = json_encode([
                'name' => 'Finance / facture',
                'statut' => 'error',
                'message' => 'L\'enregistrement de la facture a échoué ! '.$th->message,
            ]);
            return redirect()->back();
        }

        session()->flash(
            'session',
            $content
        );

        return redirect()->route('pm.fin.factures.index');

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
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function show(Facture $facture)
    {
        return view('pm.finance.factures.show')->with([
            'facture' => $facture,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function edit(Facture $facture)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facture $facture)
    {
        //
    }

    public function savePaiement(Request $request)
    {
        try {
            $facture = Facture::find($request->facture_id);
            PayTransaction::create([
                'user_id' => Auth::user()->id,
                'facture_id' => $facture->id,
                'montant' => doubleval(Str::replaceArray('.', [''], $request->montant)),
                'description' => $request->description,
            ]);

            if ($facture->transactions->sum('montant') < $facture->total_net) {
                $facture->statut_id = 2;
                $facture->save();
            } else {
                $facture->statut_id = 3;
                $facture->save();
            }

            $content = json_encode([
                'name' => 'Finance / facturation',
                'statut' => 'success',
                'message' => 'L\'enregistrement du paiement a réussi avec succès !',
            ]);
        } catch (\Throwable$th) {
            $content = json_encode([
                'name' => 'Finance / facturation',
                'statut' => 'error',
                'message' => 'L\'enregistrement du paiement a echoué !',
            ]);
        }

        session()->flash(
            'session',
            $content
        );

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facture $facture)
    {
        try {
            $facture->delete();
            $content = json_encode([
                'name' => 'Finance / facturation',
                'statut' => 'success',
                'message' => 'La suppression de la facture a réussi avec succès !',
            ]);
        } catch (\Throwable $th) {
            $content = json_encode([
                'name' => 'Finance / facturation',
                'statut' => 'error',
                'message' => 'La suppression de la facture a echoué !',
            ]);
        }

        session()->flash(
            'session',
            $content
        );
        return redirect()->back();
    }
}
