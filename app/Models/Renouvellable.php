<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Renouvellable extends Model
{
    use HasFactory;

    /**
     * Get the parent renouvellable model (project).
     */
    public function renouvellable()
    {
        return $this->morphTo();
    }
}
