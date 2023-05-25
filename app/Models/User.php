<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Jetstream\Jetstream;
use Laravel\Jetstream\OwnerRole;
use Spatie\Permission\Models\Role;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the role that the user has on the team.
     *
     * @param  mixed  $team
     * @return \Laravel\Jetstream\Role|null
     */
    public function teamRole($team)
    {
        // if ($this->ownsTeam($team)) {
        //     return new OwnerRole;
        // }

        if (!$this->belongsToTeam($team)) {
            return;
        }

        $role = $team->users
            ->where('id', $this->id)
            ->first()
            ->membership
            ->role;

        return $role ? Role::where('key', $role)->first() : null;
    }

    /**
     * Get the agent associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function agent()
    {
        return $this->hasOne(Agent::class, 'user_id');
    }

    // public function abouts() {
    //     return $this->hasMany(About::class);
    // }

    public function absences() {
        return $this->hasMany(Absence::class);
    }

    public function budgets() {
        return $this->hasMany(Budget::class);
    }

    public function categories() {
        return $this->hasMany(Categorie::class);
    }

    public function categoriebudgets() {
        return $this->hasMany(CategorieBudget::class);
    }

    public function chargesociales() {
        return $this->hasMany(ChargeSociale::class);
    }

    public function cibles() {
        return $this->hasMany(Cible::class);
    }

    public function commentaires() {
        return $this->hasMany(Commentaire::class);
    }

    public function commissions() {
        return $this->hasMany(Commission::class);
    }

    public function capacites() {
        return $this->hasMany(Capacite::class);
    }

    public function clients() {
        return $this->hasMany(Client::class);
    }

    public function compensations() {
        return $this->hasMany(Compensation::class, 'user_id');
    }

    public function contenants() {
        return $this->hasMany(Contenant::class);
    }

    public function contrat() {
        return $this->hasMany(Contrat::class, 'employe_id');
    }

    public function contrats() {
        return $this->hasMany(Contrat::class);
    }

    public function creances() {
        return $this->hasMany(Creance::class);
    }

    public function credits() {
        return $this->hasMany(Credit::class);
    }

    public function departements() {
        return $this->hasMany(Departement::class);
    }

    public function departementresponsable() {
        return $this->hasMany(Departement::class, 'responsable_id');
    }

    public function depenses() {
        return $this->hasMany(Depense::class);
    }

    public function division() {
        return $this->belongsTo(Division::class);
    }

    public function divisionresponsable() {
        return $this->hasMany(Division::class, 'responsable_id');
    }

    public function documents() {
        return $this->hasMany(Document::class);
    }

    public function etats() {
        return $this->hasMany(Etat::class);
    }

    // public function fournisseurs() {
    //     return $this->hasMany(Fournisseur::class);
    // }

    public function fichiers() {
        return $this->hasMany(Fichier::class);
    }

    public function fichepaies() {
        return $this->hasMany(FichePaie::class);
    }

    public function imposables() {
        return $this->hasMany(Imposable::class);
    }

    // public function inventaires() {
    //     return $this->hasMany(Inventaire::class);
    // }

    // public function journaux() {
    //     return $this->hasMany(Journal::class);
    // }

    // public function lots() {
    //     return $this->hasMany(Inventaire::class);
    // }

    public function modepaiements() {
        return $this->hasMany(ModePaiement::class);
    }

    public function paies() {
        return $this->hasMany(Paie::class, 'user_id');
    }

    public function pivotuserchargesociales() {
        return $this->hasMany(PivotUserChargeSociale::class);
    }

    public function pivotuserconge() {
        return $this->hasMany(PivotUserConge::class, 'employe_id');
    }

    public function pivotuserconges() {
        return $this->hasMany(PivotUserConge::class);
    }

    public function pivotuserdepenses() {
        return $this->hasMany(PivotUserDepense::class);
    }

    public function pivotusertache() {
        return $this->hasMany(PivotUserTache::class, 'agent_id');
    }

    public function pivotusertaches() {
        return $this->hasMany(PivotUserTache::class);
    }

    public function planning() {
        return $this->belongsTo(Planning::class);
    }

    public function poste() {
        return $this->belongsTo(Poste::class);
    }

    public function pointages() {
        return $this->hasMany(Pointage::class);
    }

    public function primes() {
        return $this->hasMany(Prime::class);
    }

    public function produits() {
        return $this->hasMany(Produit::class);
    }

    public function retenus() {
        return $this->hasMany(Retenu::class);
    }

    public function typeretenus() {
        return $this->hasMany(TypeRetenu::class);
    }

    // public function revenureports() {
    //     return $this->hasMany(RevenuReport::class);
    // }

    // public function role() {
    //     return $this->belongsTo(Role::class);
    // }

    // public function sites() {
    //     return $this->hasMany(Site::class);
    // }

    public function statut() {
        return $this->belongsTo(Statut::class);
    }

    // public function typebudgets() {
    //     return $this->hasMany(TypeBudget::class);
    // }

    // public function typejournaux() {
    //     return $this->hasMany(TypeJournal::class);
    // }

    public function types() {
        return $this->hasMany(Type::class);
    }

    // public function unites() {
    //     return $this->hasMany(Unite::class);
    // }

    // public function user() {
    //     return $this->belongsTo(User::class);
    // }

    // public function users() {
    //     return $this->hasMany(User::class);
    // }

    // public function ventes() {
    //     return $this->hasMany(Vente::class);
    // }

    // public function vendeurs() {
    //     return $this->hasMany(Vendeur::class);
    // }

    public function ville() {
        return $this->belongsTo(Ville::class);
    }

    public function notification(){
        return $this->hasMany(Notification::class,'user_receve');
    }

    public function message(){
        return $this->hasMany(Chat::class,'user_receve');
    }
    //fin roger

    // debut jean-louis
    public function actualPoste()
    {
        return $this->belongsToMany(Poste::class)->wherePivotNull('date_fin')->wherePivot('statu_id', 1)->withPivot('departement_id')->withTimestamps();
    }

    /**
     * Scope a query to only include for current team
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeForCurrentTeam($query)
    {
        return $query->where('team_id', Auth::user()->current_team_id);
    }
}
