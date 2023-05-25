<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Departement extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function divisions() {
        return $this->hasMany(Division::class);
    }

    public function responsable() {
        return $this->belongsTo(User::class, 'responsable_id');
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
