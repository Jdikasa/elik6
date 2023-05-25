<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cotation extends Model
{
    use HasFactory;

    /**
     * The produits that belong to the Cotation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, PivotProductsCotation::class, 'cotation_id', 'product_id')->withTimestamps()->withPivot(['partenaire_id', 'prix', 'qt']);
    }

    /**
     * Get the certificat that owns the Cotation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function certificat()
    {
        return $this->belongsTo(Certificat::class, 'country_id');
    }

    /**
     * Get the customer that owns the Cotation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
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
