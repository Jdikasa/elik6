<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Agent extends Model
{
    use HasFactory;


    /**
     * Get the adresse associated with the Agent
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function adresse()
    {
        return $this->hasOne(Adresse::class, 'agent_id');
    }

    /**
     * The fonctions that belong to the Agent
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function fonctions()
    {
        return $this->belongsToMany(Fonction::class, PivotAgentFonction::class)->withPivot([
        'statut_id', 'date_debut', 'created_by', 'updated_by'])->withTimestamps();
    }

    /**
     * The fonctions that belong to the Agent
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function fonction()
    {
        // return $this->fonctions()->wherePivot('statut_id', '=', 1)->first();
        return $this->belongsToMany(Fonction::class, PivotAgentFonction::class)->withPivot([
            'statut_id', 'date_debut', 'created_by', 'updated_by'])->withTimestamps()->wherePivot('statut_id', '=', 1)->first();
    }

    /**
     * Get the user that owns the Agent
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function pointages() {
        return $this->hasMany(Pointage::class);
    }

    public function planning() {
        return $this->belongsTo(Planning::class);
    }

    /**
     * Get all of the permissions for the Agent
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function permissions()
    {
        return $this->hasMany(ArchivePermission::class, 'agent_id');
    }

    /**
     * Get the contrat associated with the Agent
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function contrat()
    {
        return $this->hasOne(Contrat::class, 'agent_id');
    }

    /**
     * The courrier that belong to the agent
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function courriers()
    {
        return $this->belongsToMany(Courrier::class, CourrierFollower::class);
    }

    /**
     * Scope a query to only include actifs
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActif($query)
    {
        return $query->where('statut_id', 1);
    }

    /**
     * Scope a query to only include actifs
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeInactif($query)
    {
        return $query->where('statut_id', 2);
    }

    /**
     * Scope a query to only include actifs
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeArchived($query)
    {
        return $query->where('statut_id', 3);
    }

    /**
     * The documents that belong to the Agent
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function documents()
    {
        return $this->belongsToMany(Document::class, PivotDocumentsAgents::class, 'agent_id', 'document_id');
    }

    /**
     * Get all of the created_documents for the Agent
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function created_documents()
    {
        return Document::where('created_by', $this->user?->id)->get();
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
