<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class TypeContrat extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function contrats() {
        return $this->hasMany(Contrat::class, 'type_contrat_id');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function statut() {
        return $this->belongsTo(Statut::class);
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
