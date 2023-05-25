<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Country extends Model
{
    use HasFactory;

    /**
     * Get all of the parteners for the Country
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function parteners()
    {
        return $this->hasMany(Partenaire::class, 'country_id');
    }

    /**
     * Get all of the comments for the Country
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function modalites()
    {
        return $this->hasMany(Modalite::class, 'country_id');
    }

    /**
     * Get all of the certificat for the Country
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function certificat()
    {
        return $this->hasOne(Certificat::class, 'country_id');
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
