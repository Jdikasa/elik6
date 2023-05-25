<?php

namespace App\Http\Livewire\Finances\Cotation;

use App\Models\Certificat;
use App\Models\Cotation;
use App\Models\Customer;
use App\Models\Facture;
use App\Models\Partenaire;
use App\Models\Product;
use App\Models\Project;
use Livewire\Component;

class CotationForm extends Component
{

    public $stat = [
        'num_cotation' => 1,
        'customers' => [],
        'customer' => '',
        'date_limit_paie' => '',
        'date_facute' => '',
        'customer_adresse' => '',
        'products' => [],
        'selected_product' => '',
        'prices' => [],
        'qt' => 1,
        'post_pay' => 0,
        'bancks' => [],
        'banck_id' => '',
        'certificats' => [],
        'certificat_id' => '',
        'partenaire_id' => '',
        'partenaires' => [],
    ];

    public $partener_cost = 0;
    public $total_cost = 0;
    public $selectedStat = [];
    public $hasItem = false;

    public function render()
    {
        $this->stat['num_cotation'] = Cotation::forCurrentTeam()->orderBy('id', 'desc')->limit(1)->first() ? Facture::orderBy('id', 'desc')->limit(1)->first()->id + 1 : 1;
        $this->stat['customers'] = Customer::forCurrentTeam()->select('id', 'societe_id')->get();
        $this->stat['countries'] = Certificat::forCurrentTeam()->get();
        $this->stat['date_facute'] = now()->format('d/m/Y');
        $this->stat['products'] = Product::forCurrentTeam()->get();

        return view('livewire.finances.cotation.cotation-form');
    }

    public function selectClient()
    {
        $client = Customer::find($this->stat['customer']);
        $this->stat['customer_adresse'] = $client->adresse->is_shipping ? $client->adresse->adresse_1 . ', ' . $client->adresse->adresse_2 . ',' . json_decode($client->adresse->phone)[0]->num . ', ' . $client->adresse->email : '';
    }

    public function selectCertificat()
    {
        $certificat = Certificat::find($this->stat['certificat_id']);

        if(!is_null($certificat)) {
            $this->stat['partenaires'] = Partenaire::forCurrentTeam()
            ->whereHas('modalites', function ($query) use ($certificat) {
                $query->where('country_id', $certificat->country_id);
            })->get() ?? [];
            //$certificat->partenaires ?? [];
            $this->total_cost = $certificat->total_cost;
        }
    }

    public function addItem()
    {
        if ($this->stat['customer'] && $this->stat['selected_product']) {
            $client = Customer::find($this->stat['customer']);
            $product = Product::find($this->stat['selected_product']);
            $certificat = Certificat::find($this->stat['certificat_id']);

            $partenaire = Partenaire::find($this->stat['partenaire_id']);

            $modalite = $partenaire->modalites->where('certificat_id', $certificat->country->id)->first();
            $this->partener_cost = $modalite ? $modalite->prix : 0;

            array_push($this->selectedStat, [
                'client_id' => $client->id,
                'client_nom' => $client->societe->nom,
                'client_adresse' => $client->adresse->is_shipping ? $client->adresse->adresse_1 . ',<br>' . $client->adresse->adresse_2 . '<br>' . json_decode($client->adresse->phone)[0]->num . '<br>' . $client->adresse->email : $this->stat['customer_adresse'],
                'product_id' => $product->id,
                'partenaire_id' => $partenaire->id,
                'product' => 'Equipement : '.$product->nom. '<br>Pays : ' . $certificat->country->name_fr ?? $certificat->country->name_en,
                'price' => $this->total_cost + $this->partener_cost,
                'qt' => $this->stat['qt'],
            ]);

            $this->stat['selected_product'] = '';
            $this->stat['partenaire_id'] = '';
            $this->stat['qt'] = 1;

            $this->hasItem = true;
        }
    }

    public function removeItem($key)
    {
        unset($this->selectedStat[$key]);
    }
}
