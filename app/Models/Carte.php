<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Carte extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bank_id',
        'type_id',
        'nom',
        'num',
        'date_expir',
        'code_cvv',
        'is_primary',
        'team_id'
    ];

    /**
     * Get the type that owns the Carte
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(CarteType::class, 'type_id');
    }

    /**
     * Get the bank that owns the Carte
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id');
    }

    /**
     * Get all of the factures for the Carte
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function factures()
    {
        return $this->hasMany(Facture::class, 'carte_id');
    }

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['date_expir','created_at', 'updated_at', 'deleted_at'];

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
