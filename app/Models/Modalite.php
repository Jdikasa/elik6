<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Modalite extends Model
{
    /**
     * Get the country that owns the Modalite
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
