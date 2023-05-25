<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class NoteEtape extends Model
{
    use HasFactory;

    /**
     * Get all of the statuts for the NoteEtape
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function statuts()
    {
        return $this->hasMany(NoteStatut::class, 'etape_id');
    }

    /**
     * Get all of the notes for the NoteEtape
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notes(): HasMany
    {
        return $this->hasMany(Note::class, 'etape_id');
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
