<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Compte extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bank_id',
        'intitule',
        'num_compte',
        'balance',
        'is_primary'
    ];

    /**
     * Get the bank that owns the Compte
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id');
    }

    /**
     * Get all of the tansactions for the Compte
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function transactions()
    {
        return $this->hasManyThrough(PayTransaction::class, Facture::class);
    }

    /**
     * Get all of the factures for the compte
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function factures()
    {
        return $this->hasMany(Facture::class, 'compte_id');
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
