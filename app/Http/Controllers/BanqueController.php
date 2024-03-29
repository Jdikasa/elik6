<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Compte;
use App\Models\Country;
use App\Models\PayTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BanqueController extends Controller
{
    public function index()
    {
        $banks = Bank::forCurrentTeam()->select('id', 'nom')->get();
        $countries = Country::all();
        
        $comptes = Compte::forCurrentTeam()->select('*')->get();

        $total = PayTransaction::forCurrentTeam()->sum('montant');

        $this_year = PayTransaction::whereYear('created_at', now()->year)
        ->where('team_id', Auth::user()->current_team_id)
        ->sum('montant');
        $last_year = PayTransaction::forCurrentTeam()->whereYear('created_at', '<', now()->year)
            ->whereYear('created_at', '>=', (now()->subYear(1)->year))
            ->sum('montant');

        $total_count = PayTransaction::forCurrentTeam()->count();
        $this_year_count = PayTransaction::forCurrentTeam()->whereYear('created_at', now()->year)->count();
        $last_year_count = PayTransaction::forCurrentTeam()->whereYear('created_at', '<', now()->year)
            ->whereYear('created_at', '>=', (now()->subYear(1)->year))
            ->count();

        return view('pm.finance.bancks.index')->with([
            'banks' => $banks,
            'comptes' => $comptes,
            'total' => $total,
            'this_year' => $this_year,
            'last_year' => $last_year,
            'total_count' => $total_count,
            'this_year_count' => $this_year_count,
            'last_year_count' => $last_year_count,
            'countries' => $countries,
        ]);
    }

    public function store(Request $request)
    {
        try {

            Bank::create([
                'country_id' => $request->country_id,
                'nom' => $request->nom,
                'code_swift' => $request->code_swift,
                'image' => (new Image)->handle($request, 'image', 'banks'),
                'team_id' => Auth::user()->current_team_id
            ]);

            $content = json_encode([
                'name' => 'Finance / banque',
                'statut' => 'success',
                'message' => 'L\'enregistrement de la banque a reussi avec succès !',
            ]);

        } catch (\Throwable $th) {
            $content = json_encode([
                'name' => 'Finance / banque',
                'statut' => 'error',
                'message' => 'L\'enregistrement de la banque a échoué !',
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
}
