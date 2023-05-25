<?php

namespace App\Http\Livewire\Projet;

use App\Models\Certificat;
use App\Models\NoteEtape;
use App\Models\Partenaire;
use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;

class Create extends Component
{
    public $clients;
    public $certificats;
    public $certificat = '';
    public $date_soumission;
    public $date_cloture;
    public $date_maj;
    public $duree;
    public $products;
    public $partenaires = [];
    public $partenaire = '';
    public $pays = '';
    public $total_cost = 0;
    public $partener_cost = 0;
    public $noteetape = '';
    public $noteEtapes = [];
    public $noteStatuts = [];

    public function mount()
    {
        $this->partenaires = Partenaire::forCurrentTeam()->get();
        $this->noteEtapes = NoteEtape::forCurrentTeam()->get();
    }

    public function updatedCertificat()
    {
        $certificat = Certificat::find($this->certificat);
        if (!is_null($certificat)) {

            $this->partenaires = Partenaire::forCurrentTeam()
                ->whereHas('modalites', function ($query) use ($certificat) {
                    $query->where('country_id', $certificat->country_id);
                })->get() ?? [];
            //$certificat->partenaires ?? [];
            $this->pays = $certificat->country->name_fr;
            $this->total_cost = $certificat->total_cost;

        }
    }

    public function updatedPartenaire()
    {
        $partenaire = Partenaire::find($this->partenaire);
        $certificat = Certificat::find($this->certificat);
        if (!is_null($partenaire) && !is_null($certificat)) {
            $modalite = $partenaire->modalites->where('country_id', $certificat->country->id)->first();
            $this->partener_cost = $modalite ? $modalite->prix : 0;
        }
    }

    public function updatedNoteetape()
    {
        $etape = NoteEtape::find($this->noteetape);
        if (!is_null($etape) && !is_null($etape)) {
            $this->noteStatuts = $etape->statuts;
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

        return view('livewire.projet.create');
    }
}
