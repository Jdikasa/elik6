<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Division extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function departement() {
        return $this->belongsTo(Departement::class);
    }

    public function responsable() {
        return $this->belongsTo(User::class, 'responsable_id');
    }

    public function statut() {
        return $this->belongsTo(Statut::class);
    }

    public function users() {
        return $this->hasMany(User::class);
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
