<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Venturecraft\Revisionable\RevisionableTrait;

class Partenaire extends Model
{
    use HasFactory;
    use RevisionableTrait;

    protected $revisionEnabled = true;
    protected $revisionCleanup = true;
    protected $historyLimit = 700;
    protected $revisionCreationsEnabled = true;
    protected $revisionForceDeleteEnabled = true;
    protected $keepRevisionOf = [
        'societe_id', 'country_id', 'mode_id', 'nom', 'prix',
        'phone', 'email', 'description', 'image','paiement_attributs',
        'created_at','deleted_at'
    ];
    // protected $dontKeepRevisionOf = ['category_id'];
    // protected $revisionFormattedFields = [
    //     'is_mandatory' => 'boolean:Volontaire|Obligatoire',
    //     'sample_requirements' => 'boolean:Non|Oui',
    //     'ettiquetage' => 'boolean:Non|Oui',
    //     'local_representation' => 'boolean:Non|Oui',
    //     // 'modified'   => 'datetime:m/d/Y g:i A',
    //     'deleted_at' => 'isEmpty:Active|Supprimé'
    // ];

    protected $revisionNullString = 'nulle';
    protected $revisionUnknownString = 'unknown';

    public function identifiableName()
    {
        return $this->societe->nom;
    }

    /**
     * Get the societe that owns the partenaire
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function societe()
    {
        return $this->belongsTo(Societe::class, 'societe_id', 'id');
    }

    /**
     * Get the country that owns the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    /**
     * The modalites that belong to the Partenaire
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function modalites()
    {
        return $this->belongsToMany(Modalite::class, PivotPartenairesModalite::class);
    }

    /**
     * Get the mode that owns the Partenaire
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mode()
    {
        return $this->belongsTo(ModesPaiement::class, 'mode_id');
    }

    /**
     * Get all of the projects for the Partenaire
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projects()
    {
        return $this->hasMany(Project::class, 'partenaire_id');
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
