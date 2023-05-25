<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Fonction extends Model
{
    use HasFactory;

    /**
     * The agents that belong to the Fonction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function agents()
    {
        return $this->belongsToMany(Agent::class, PivotAgentFonction::class)->withPivot([
        'statut_id', 'date_debut', 'created_by', 'updated_by'])->withTimestamps();
    }

    /**
     * Get the direction that owns the Fonction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function direction()
    {
        return $this->belongsTo(Direction::class, 'direction_id');
    }

    /**
     * Get the departement that owns the Fonction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function departement()
    {
        return $this->belongsTo(Departement::class, 'departement_id');
    }

    /**
     * Get the service that owns the Fonction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    /**
     * Get the classification that owns the Fonction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function classification()
    {
        return $this->belongsTo(PosteClassification::class, 'classification_id');
    }

    /**
     * Get the categorie that owns the Fonction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categorie()
    {
        return $this->belongsTo(PosteCategorie::class, 'category_id');
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
