<?php

namespace App\Actions\Jetstream;

use App\Models\Agent;
use App\Models\BandesFrequence;
use App\Models\Bank;
use App\Models\Carte;
use App\Models\CarteType;
use App\Models\Certificat;
use App\Models\CertificatsDocument;
use App\Models\CertificatsLeadsTime;
use App\Models\CertificatsTypesEchantillon;
use App\Models\CertificatsTypesHomologation;
use App\Models\CertificatsValidite;
use App\Models\Classeur;
use App\Models\Compte;
use App\Models\Conge;
use App\Models\ContactsPeople;
use App\Models\Contrat;
use App\Models\Cotation;
use App\Models\CountriesAttribute;
use App\Models\Customer;
use App\Models\CustomersContactsPeople;
use App\Models\Departement;
use App\Models\Division;
use App\Models\Product;
use App\Models\Project;
use App\Models\Team;
use Laravel\Jetstream\Contracts\DeletesTeams;

class DeleteTeam implements DeletesTeams
{
    /**
     * Delete the given team.
     */
    public function delete(Team $team): void
    {
        CertificatsValidite::destroy(CertificatsValidite::forCurrentTeam()->get());
        BandesFrequence::destroy(BandesFrequence::forCurrentTeam()->get());
        Certificat::destroy(Certificat::forCurrentTeam()->get());
        Customer::destroy(Customer::forCurrentTeam()->get());
        Product::destroy(Product::forCurrentTeam()->get());
        Contrat::destroy(Contrat::forCurrentTeam()->get());
        Compte::destroy(Compte::forCurrentTeam()->get());
        Agent::destroy(Agent::forCurrentTeam()->get());
        Conge::destroy(Conge::forCurrentTeam()->get());
        Bank::destroy(Bank::forCurrentTeam()->get());
        Carte::destroy(Carte::forCurrentTeam()->get());
        Project::destroy(Project::forCurrentTeam()->get());
        Cotation::destroy(Cotation::forCurrentTeam()->get());
        Classeur::destroy(Classeur::forCurrentTeam()->get());
        Division::destroy(Division::forCurrentTeam()->get());
        CarteType::destroy(CarteType::forCurrentTeam()->get());
        Departement::destroy(Departement::forCurrentTeam()->get());
        ContactsPeople::destroy(ContactsPeople::forCurrentTeam()->get());
        CountriesAttribute::destroy(CountriesAttribute::forCurrentTeam()->get());
        CertificatsDocument::destroy(CertificatsDocument::forCurrentTeam()->get());
        CertificatsLeadsTime::destroy(CertificatsLeadsTime::forCurrentTeam()->get());
        CustomersContactsPeople::destroy(CustomersContactsPeople::forCurrentTeam()->get());
        CertificatsTypesEchantillon::destroy(CertificatsTypesEchantillon::forCurrentTeam()->get());

        $team->purge();
    }
}
