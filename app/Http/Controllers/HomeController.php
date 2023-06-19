<?php

namespace App\Http\Controllers;

use App\Models\Certificat;
use App\Models\Country;
use App\Models\Customer;
use App\Models\FacturesStatut;
use App\Models\Note;
use App\Models\NoteEtape;
use App\Models\PayTransaction;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use stdClass;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $clients = Customer::forCurrentTeam()->whereMonth('created_at', now())->get();
        $totalClients = $clients->count();
        $clientChartData = $this->chartData($clients);

        $certificats = Certificat::forCurrentTeam()->whereHas('projects')->whereMonth('created_at', now())->get();
        $totalCertificats = $certificats->count();
        $certificatChartData = $this->chartData($certificats);

        $projects = Project::forCurrentTeam()->whereMonth('created_at', now())->get();
        $totalProjects = $projects->count();
        $projectChartData = $this->chartData($projects);
        $projectStatuts = NoteEtape::forCurrentTeam()->get();

        $data = [];

        $projectsGroup = $projects->groupBy(function ($project)
        {
            return $project->notes->last()->id;
        });

        foreach ($projectStatuts as $key => $etape) {
            foreach ($projectsGroup as $key1 => $noteProjects) {
                $note = Note::find($key1);
                $noteProjectsGroup = $noteProjects->groupBy(function ($project)
                {
                    return $project->notes->last()->created_at->month;
                });
                foreach ($noteProjectsGroup as $key2 => $noteProject) {
                    for ($i=1; $i < 13; $i++) {
                        if($key2 == $i){
                            if ($note->etape->id == $etape->id) {
                                $data[$key][$i] = $noteProjects->count();
                            }else{
                                $data[$key][$i] = 0;
                            }
                        }else{
                            $data[$key][$i] = 0;
                        }
                    }
                }
            }
        }

        $projectMainChartData = [];

        foreach ($data as $key => $value) {
            $projectMainChartData[$key] = Str::replace('}', '', Str::replace('{', '', json_encode(array_values($value)))) ;
        }

        $projects = $projects->take(5);

        $transactions = PayTransaction::forCurrentTeam()->whereMonth('created_at', now())->get();
        $transactionMontant = $transactions->sum("montant");
        $transactionChartData = $this->transactionChartData($transactions);
        $transactionChartData2 = FacturesStatut::with('transactions:montant')->withCount('transactions')->get();

        // $countries = Country::whereHas('certificat');
        // $clients = $countries->map(function ($country) {
        //     $object = new stdClass();
        //     $object->coords = $country->action;
        //     $object->name = $country->name_fr;
        //     $object->reel = $country->customers->where('type_id', 3)->count();
        //     $object->simple = $country->customers->where('type_id', 1)->count();
        //     $object->potentiel = $country->customers->where('type_id', 2)->count();
        //     $object->code = $country->code;
        //     return $object;
        // });

        $certificats = Certificat::forCurrentTeam()->with('country')->get();
        $clients = $certificats->map(function ($certificat) {
            $object = new stdClass();
            $object->coords = $certificat->country->action;
            $object->name = $certificat->country->name_fr;
            $object->reel = $certificat->country->customers->where('type_id', 3)->count();
            $object->simple = $certificat->country->customers->where('type_id', 1)->count();
            $object->potentiel = $certificat->country->customers->where('type_id', 2)->count();
            $object->code = $certificat->country->code;
            return $object;
        });
        $sumClient['reel'] = $clients->sum('reel');
        $sumClient['simple'] = $clients->sum('simple');
        $sumClient['potentiel'] = $clients->sum('potentiel');

        return view('pm.dashboard.index')->with([
            'totalClients' => $totalClients,
            'clientChartData' => $clientChartData,
            'certificats' => $certificats,
            'totalCertificats' => $totalCertificats,
            'certificatChartData' => $certificatChartData,
            'projects' => $projects,
            'totalProjects' => $totalProjects,
            'projectChartData' => $projectChartData,
            'transactions' => $transactions,
            'transactionMontant' => $transactionMontant,
            'transactionChartData' => $transactionChartData,
            'transactionChartData2' => $transactionChartData2,
            'projectStatuts' => $projectStatuts,
            'projectMainChartData' => $projectMainChartData,
            'clients' => $clients,
            'sumClient' => $sumClient,
        ]);
    }

    public function chartData($collection)
    {
        $data = $collection->map(function ($data) {
            return [
                'label' => $data->created_at->isoFormat('DD MMM'),
                'data' => 1,
            ];
        })->groupBy('label');

        $labels = $data->map(function ($label, $key) {
            return $key;
        })->flatten()->toArray();

        $values = $data->map(function ($label, $key) {
            return collect($label)->sum('data');
        })->flatten()->toArray();

        return [
            'labels' => Str::replace('}', '', Str::replace('{', '', json_encode(array_values($labels)))),
            'values' => Str::replace('}', '', Str::replace('{', '', json_encode(array_values($values)))),
        ];
    }

    public function transactionChartData($collection)
    {
        $data = $collection->map(function ($data) {
            return [
                'label' => $data->created_at->isoFormat('DD MMM'),
                'data' => $data->montant,
            ];
        })->groupBy('label');

        $labels = $data->map(function ($label, $key) {
            return $key;
        })->flatten()->toArray();

        $values = $data->map(function ($label, $key) {
            return collect($label)->sum('data');
        })->flatten()->toArray();

        return [
            'labels' => Str::replace('}', '', Str::replace('{', '', json_encode(array_values($labels)))),
            'values' => Str::replace('}', '', Str::replace('{', '', json_encode(array_values($values)))),
        ];
    }

    public function projectChartData($projects, $statuts)
    {
        $data = $projects->map(function ($data) {
            // {
            //     "backgroundColor": ["rgba(55,125,255, .5)", "rgba(255, 255, 255, .2)"],
            //     "borderColor": "#377dff",
            //     "borderWidth": 2,
            //     "pointRadius": 0,
            //     "hoverBorderColor": "#377dff",
            //     "pointBackgroundColor": "#377dff",
            //     "pointBorderColor": "#fff",
            //     "pointHoverRadius": 0,
            //     "tension": 0.4
            // }
            // return [
            //     'label' => $data->created_at->isoFormat('DD MMM'),
            //     'data' => $data->montant
            // ];

            Str::createRandomStringsUsingSequence(['0', '1', '2', '3']);

            return '{
                "backgroundColor": ["rgba(55,125,255, .5)", "rgba(255, 255, 255, .2)"],
                "borderColor": "#377dff",
                "borderWidth": 2,
                "pointRadius": 0,
                "hoverBorderColor": "#377dff",
                "pointBackgroundColor": "#377dff",
                "pointBorderColor": "#fff",
                "pointHoverRadius": 0,
                "tension": 0.4
            }';
        });

        $labels = $data->map(function ($label, $key) {
            return $key;
        })->flatten()->toArray();

        $values = $data->map(function ($label, $key) {
            return collect($label)->sum('data');
        })->flatten()->toArray();

        return [
            'labels' => Str::replace('}', '', Str::replace('{', '', json_encode(array_values($labels)))),
            'values' => Str::replace('}', '', Str::replace('{', '', json_encode(array_values($values)))),
        ];
    }
}
