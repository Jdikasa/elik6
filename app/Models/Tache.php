<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class Tache extends Model
{
    use HasFactory;
    protected $guarded = [];
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'date_debut' => 'date',
        'date_fin' => 'date',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'parent_id', 'user_id', 'document_id', 'statut_id', 'priorite_id', 'titre', 'description', 'date_debut', 'date_fin', 'team_id',
    ];

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }

    // public function objectifs() {
    //     return $this->hasMany(TacheObjectif::class, 'tache_id');
    // }

    public function etat()
    {
        return $this->belongsTo(Etat::class);
    }

    public function fichier()
    {
        return $this->belongsTo(Document::class, 'document_id');
    }

    // public function pivotusertaches()
    // {
    //     return $this->hasMany(PivotUserTache::class);
    // }

    /**
     * The executants that belong to the Tache
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function executants()
    {
        return $this->belongsToMany(Agent::class, PivotUserTache::class, 'agent_id', 'tache_id')->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function statut()
    {
        return $this->belongsTo(TachesStatut::class, 'statut_id');
    }

    /**
     * Scope a query to only include initiale
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeInitiale($query)
    {
        return $query->where('statut_id', 1);
    }

    /**
     * Scope a query to only include encours
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeEncours($query)
    {
        return $query->where('statut_id', 2);
    }

    /**
     * Get the priorite that owns the Tache
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function priorite()
    {
        return $this->belongsTo(Priorite::class, 'priorite_id');
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

    /**
     * Get all of the sous_taches for the Tache
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sous_taches(): HasMany
    {
        return $this->hasMany(Tache::class, 'parent_id');
    }
}
