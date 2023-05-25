<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Contrat extends Model
{
    use HasFactory;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'date_debut' => 'date',
        'fin' => 'date',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['date_debut', 'fin', 'temps', 'salaire', 'devise', 'employe_id', 'type_contrat_id', 'user_id', 'statut_id', 'agent_id'];

    public function employe()
    {
        return $this->belongsTo(User::class, 'employe_id');
    }

    public function type()
    {
        return $this->belongsTo(TypeContrat::class, 'type_contrat_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function statut()
    {
        return $this->belongsTo(Statut::class);
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class, 'agent_id');
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
