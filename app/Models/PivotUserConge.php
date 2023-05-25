<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PivotUserConge extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function conge() {
        return $this->belongsTo(Conge::class);
    }

    public function employe() {
        return $this->belongsTo(User::class, 'employe_id');
    }

    public function statut() {
        return $this->belongsTo(Statut::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
