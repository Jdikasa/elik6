<?php

namespace App\Http\Livewire\Finances\Facture;

use App\Models\Banck;
use App\Models\Carte;
use App\Models\Compte;
use App\Models\Customer;
use App\Models\Facture;
use App\Models\Project;
use Livewire\Component;

class FactureForm extends Component
{

    public $stat = [
        'num_facture' => 1,
        'customers' => [],
        'customer' => '',
        'date_limit_paie' => '',
        'date_facute' => '',
        'customer_adresse' => '',
        'projects' => [],
        'selected_project' => '',
        'prices' => [],
        'qt' => 1,
        'post_pay' => 0,
        'bancks' => [],
        'banck_id' => '',
    ];

    public $selectedStat = [];
    public $hasItem = false;

    public function render()
    {
        $this->stat['num_facture'] = Facture::forCurrentTeam()->orderBy('id', 'desc')->limit(1)->first() ? Facture::orderBy('id', 'desc')->limit(1)->first()->id + 1 : 1;
        $this->stat['customers'] = Customer::forCurrentTeam()->select('id', 'societe_id')->get();
        $this->stat['bancks'] = Compte::forCurrentTeam()->select('id', 'bank_id', 'intitule')->get();
        $this->stat['date_facute'] = now()->format('d/m/Y');

        if ($this->stat['customer']) {
            $this->stat['projects'] = Project::forCurrentTeam()->where('client_id', $this->stat['customer'])->get();
        }

        return view('livewire.finances.facture.facture-form');
    }

    public function selectClient()
    {
        $client = Customer::find($this->stat['customer']);
        $this->stat['customer_adresse'] = $client->adresse->is_shipping ? $client->adresse->adresse_1 . ', ' . $client->adresse->adresse_2 . ',' . json_decode($client->adresse->phone)[0]->num . ', ' . $client->adresse->email : '';
    }

    public function addItem()
    {
        if ($this->stat['customer'] && $this->stat['selected_project']) {
            $client = Customer::find($this->stat['customer']);
            $project = Project::find($this->stat['selected_project']);

            array_push($this->selectedStat, [
                'client_id' => $client->id,
                'client_nom' => $client->societe->nom,
                'client_adresse' => $client->adresse->is_shipping ? $client->adresse->adresse_1 . ',<br>' . $client->adresse->adresse_2 . '<br>' . json_decode($client->adresse->phone)[0]->num . '<br>' . $client->adresse->email : $this->stat['customer_adresse'],
                'project_id' => $project->id,
                'project' => 'Equipement : '.$project->equipement->nom. '<br>Pays : ' .$project->certificat->country->name_fr,
                'price' => $project->certificat->total_cost,
                'qt' => $this->stat['qt'],
                'post_pay' => $this->stat['post_pay'],
                'date_limit_paie' => $this->stat['date_limit_paie'],
            ]);

            $this->stat['selected_project'] = '';
            $this->stat['qt'] = 1;
            $this->stat['post_pay'] = 0;

            $this->hasItem = true;
        }
    }

    public function removeItem($key)
    {
        unset($this->selectedStat[$key]);
    }
}
