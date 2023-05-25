<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Carte;
use App\Models\CarteType;
use App\Models\PayTransaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banks = Bank::select('id', 'nom')->where('team_id', Auth::user()->current_team_id)->get();
        $typeCartes = CarteType::select('id', 'titre', 'image')
        ->where('team_id', Auth::user()->current_team_id)->get();
        $cartes = Carte::select('*')->where('team_id', Auth::user()->current_team_id)->get();
        $total = PayTransaction::where('team_id', Auth::user()->current_team_id)->sum('montant');
        $this_year = PayTransaction::whereYear('created_at', now()->year)
        ->where('team_id', Auth::user()->current_team_id)->sum('montant');
        $last_year = PayTransaction::whereYear('created_at', '<', now()->year)
            ->whereYear('created_at', '>=', (now()->subYear(1)->year))
            ->where('team_id', Auth::user()->current_team_id)
            ->sum('montant');

            // dd($this_year, $last_year);

        $total_count = PayTransaction::where('team_id', Auth::user()->current_team_id)->count();
        $this_year_count = PayTransaction::whereYear('created_at', now()->year)
        ->where('team_id', Auth::user()->current_team_id)->count();
        $last_year_count = PayTransaction::whereYear('created_at', '<', now()->year)
            ->whereYear('created_at', '>=', (now()->subYear(1)->year))
            ->where('team_id', Auth::user()->current_team_id)
            ->count();

        return view('pm.finance.bancks.index')->with([
            'banks' => $banks,
            'typeCartes' => $typeCartes,
            'cartes' => $cartes,
            'total' => $total,
            'this_year' => $this_year,
            'last_year' => $last_year,
            'total_count' => $total_count,
            'this_year_count' => $this_year_count,
            'last_year_count' => $last_year_count,
        ]);
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
        try{
            $bank = Bank::find($request->bank_id);
            if ($request->has('nom_bank')) {
                $bank = Bank::create([
                    'nom' => $request->nom_bank,
                    'team_id' => Auth::user()->current_team_id
                ]);
            }
            $dateMonthArray = explode('/', $request->date_expir);
            $month = $dateMonthArray[0];
            $year = $dateMonthArray[1];
            $date = Carbon::createFromDate($year, $month, 1);

            Carte::create([
                'bank_id' => $bank->id,
                'type_id' => $request->type_id,
                'nom' => $request->nom,
                'num' => $request->num,
                'date_expir' => $date,
                'code_cvv' => $request->code_cvv,
                'is_primary' => ($request->is_primary == 'on' || $request->is_primary == 1) ? 1 : 0,
                'team_id' => Auth::user()->current_team_id
            ]);

            $content = json_encode([
                'name' => 'Finance',
                'statut' => 'success',
                'message' => 'L\'ajout du compte a réussi avec succès !',
            ]);

        } catch (\Throwable$th) {
            $content = json_encode([
                'name' => 'Ressources humaines',
                'statut' => 'error',
                'message' => 'L\'ajout du compte a échoué !',
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
     * @param  \App\Models\Carte  $carte
     * @return \Illuminate\Http\Response
     */
    public function show($carte)
    {
        // $typeCartes = CarteType::select('id', 'titre', 'image')->get();
        $carte = Carte::find($carte);
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
            'carte' => $carte,
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
     * @param  \App\Models\Carte  $Carte
     * @return \Illuminate\Http\Response
     */
    public function edit(Carte $carte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carte  $Carte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $carte)
    {
        $bank = Bank::find($request->bank_id);
        if ($request->has('nom_bank')) {
            $bank = Bank::create([
                'nom' => $request->nom_bank
            ]);
        }

        $carte = Carte::find($carte);
        $dateMonthArray = explode('/', $request->date_expir);
        $month = $dateMonthArray[0];
        $year = $dateMonthArray[1];
        $date = Carbon::createFromDate($year, $month)->startOfMonth();

        $carte->update([
            'bank_id' => $bank->id,
            'type_id' => $request->type_id,
            'nom' => $request->nom,
            'num' => $request->num,
            'date_expir' => $date->format('Y-m-d'),
            'code_cvv' => $request->code_cvv,
            'is_primary' => ($request->is_primary == 'on' || $request->is_primary == 1) ? 1 : 0,
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carte  $carte
     * @return \Illuminate\Http\Response
     */
    public function destroy($carte)
    {
        $carte = Carte::find($carte);
        $carte->delete();
        return redirect()->back();
    }
}
