<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Models\Role;

class Dossier extends Model
{
    protected $guarded = [];
    protected $fillable = ['classeur_id', 'reference', 'titre', 'description', 'confidentiel', 'statut_id', 'created_by', 'updated_by', 'team_id'];

    public function personnel()
    {
        return $this->belongsTo(Personel::class, 'created');
    }
    public function classeur()
    {
        return $this->belongsTo(Classeur::class, 'classeur_id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'niveau');
    }
    public function division()
    {
        return $this->belongsTo(Division::class, 'division');
    }

    public function departement()
    {
        return $this->belongsTo(Departement::class, 'departement_id');
    }

    public function documents()
    {
        return $this->hasMany(Document::class, 'dossier_id');
    }

    /**
     * Get the author that owns the Classeur
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(Agent::class, 'created_by');
    }

    /**
     * Get the access associated with the Dossier
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function access()
    {
        return $this->hasOne(DossierPassword::class, 'dossier_id');
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
