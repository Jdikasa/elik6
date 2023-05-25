<?php

namespace App\Http\Livewire\Projet;

use App\Models\Certificat;
use App\Models\Partenaire;
use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;

class Edit extends Component
{
    public $clients;
    public $certificats;
    public $certificat;
    public $date_soumission;
    public $date_cloture;
    public $date_maj;
    public $duree;
    public $project;
    public $products;
    public $partenaires = [];
    public $partenaire = '';
    public $pays = '';
    public $total_cost = 0;
    public $partener_cost = 0;

    public function mount($clients, $certificats, $project)
    {
        $this->clients = $clients;
        $this->certificats = $certificats;
        $this->project = $project;
        $this->date_maj = $this->project->update_date?->format('d/m/Y');
        $this->date_cloture = $this->project->date_cloture?->format('d/m/Y');
        $this->date_soumission = $this->project->date_soumission?->format('d/m/Y');
        $this->duree = $this->project->duree;
        $this->certificat = $this->project->certificat->id;
        $this->pays = $this->project->certificat->country->name_fr;
        $this->total_cost = $this->project->certificat->total_cost;
        $this->partener_cost = $this->project->partenaire?->modalites->where('country_id', $this->project->certificat->country->id)->first()?->prix ?? 0;
        $this->partenaires = $this->project->certificat->partenaires ?? Partenaire::all();
        $this->partenaire = $this->project->partenaire?->id;
    }

    public function updatedCertificat()
    {
        $certificat = Certificat::find($this->certificat);
        if(!is_null($certificat)){
            $this->partenaires = $certificat->partenaires ?? [];
            $this->pays = $certificat->country->name_fr;
            $this->total_cost = $certificat->total_cost;
        }
    }

    public function updatedPartenaire()
    {
        $partenaire = Partenaire::find($this->partenaire);
        $certificat = Certificat::find($this->certificat);
        if(!is_null($partenaire) && !is_null($certificat)){
            $this->partener_cost = $partenaire->modalites->where('country_id', $certificat->country->id)->first()?->prix ?? 0;
        }
    }

    public function render()
    {
        $this->products = Product::forCurrentTeam()->get();

        if ($this->certificat && $this->date_soumission) {
            $lead_time_id = Certificat::find($this->certificat)->lead_time_id;
            $date_soumission = Carbon::createFromFormat('d/m/Y', $this->date_soumission);
            $date_cloture = Carbon::createFromFormat('d/m/Y', $this->date_soumission)->addWeeks($lead_time_id);
            $duree = $date_soumission->diffInDays($date_cloture);
            $this->date_cloture = $date_cloture->format('d/m/Y');
            $this->date_maj = Carbon::now()->next('Friday')->format('d/m/Y');
            $this->duree = $duree;
        }

        return view('livewire.projet.edit');
    }
}
