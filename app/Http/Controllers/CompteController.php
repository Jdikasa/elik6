<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Compte;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        try {

            $compte = Compte::create([
                'bank_id' => $request->bank_id,
                'intitule' => $request->nom,
                'num_compte' => $request->num,
                'is_primary' => ($request->is_primary == 'on' || $request->is_primary == 1) ? 1 : 0,
                'team_id' => Auth::user()->current_team_id
            ]);

            foreach (Compte::all() as $oldCompte) {
                if ($compte->is_primary && ($compte->id != $oldCompte->id) && $oldCompte->is_primary) {
                    $oldCompte->is_primary = 0;
                    $oldCompte->save();
                }
            }

            $content = json_encode([
                'name' => 'Finance / banque',
                'statut' => 'success',
                'message' => 'L\'enregistrement du compte a reussi avec succès !',
            ]);

        } catch (\Throwable $th) {
            $content = json_encode([
                'name' => 'Finance / banque',
                'statut' => 'error',
                'message' => 'L\'enregistrement du compte a échoué !',
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

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Compte  $compte
     * @return \Illuminate\Http\Response
     */
    public function show(Compte $compte)
    {
        // dd($compte);
        // $typeCartes = CarteType::select('id', 'titre', 'image')->get();
        // $carte = Compte::find($carte);
        // $total = PayTransaction::sum('montant');
        // $this_year = PayTransaction::whereYear('created_at', now()->year)->sum('montant');
        // $last_year = PayTransaction::whereYear('created_at', '<', now()->year)
        //     ->whereYear('created_at', '>=', (now()->subYear(1)->year))
        //     ->sum('montant');

        // $total_count = PayTransaction::count();
        // $this_year_count = PayTransaction::whereYear('created_at', now()->year)->count();
        // $last_year_count = PayTransaction::whereYear('created_at', '<', now()->year)
        //     ->whereYear('created_at', '>=', (now()->subYear(1)->year))
        //     ->count();

        return view('pm.finance.bancks.show')->with([
            // 'typeCartes' => $typeCartes,
            'compte' => $compte,
            // 'total' => $total,
            // 'this_year' => $this_year,
            // 'last_year' => $last_year,
            // 'total_count' => $total_count,
            // 'this_year_count' => $this_year_count,
            // 'last_year_count' => $last_year_count,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Compte  $compte
     * @return \Illuminate\Http\Response
     */
    public function edit(Compte $compte)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Compte  $compte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compte $compte)
    {
        try {

            $compte->update([
                'bank_id' => $request->bank_id,
                'intitule' => $request->nom,
                'num_compte' => $request->num,
                'is_primary' => ($request->is_primary == 'on' || $request->is_primary == 1) ? 1 : 0,
            ]);

            foreach (Compte::all() as $oldCompte) {
                if ($compte->is_primary && ($compte->id != $oldCompte->id) && $oldCompte->is_primary) {
                    $oldCompte->is_primary = 0;
                    $oldCompte->save();
                }
            }

            $content = json_encode([
                'name' => 'Finance / banque',
                'statut' => 'success',
                'message' => 'La modification du compte a reussi avec succès !',
            ]);

        } catch (\Throwable $th) {
            $content = json_encode([
                'name' => 'Finance / banque',
                'statut' => 'error',
                'message' => 'La modification du compte a échoué !',
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
     * @param  \App\Models\Compte  $compte
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compte $compte)
    {
        // $carte = Carte::find($cart);
        $compte->delete();
        return redirect()->back();
    }
}
