<?php

namespace App\Models;

use App\Models\Document;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Tache extends Model
{
    use HasFactory;
    protected $guarded = [];
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $casts = [
        'date_debut' => 'date',
        'date_fin' => 'date'
    ];

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }

    // public function updatePourcentage()
    // {
    //     $totalTacheObjectifs = $this->objectifs()->count();
    //     $termineTacheObjectifs = $this->objectifs()->where('statut', 0)->count();

    //     if ($totalTacheObjectifs > 0) {
    //         $pourcentage = ($termineTacheObjectifs / $totalTacheObjectifs) * 100;
    //     } else {
    //         $pourcentage = 0;
    //     }

    //     $this->pourcentage = $pourcentage;
    //     $this->save();
    // }

    public function updateTacheStatutId()
    {
        if ($this->pourcentage >= 100) {
            $this->tache_statut_id = 3;
            $this->save();
        }
    }

    public function objectifs()
    {
        return $this->hasMany(TacheObjectif::class);
    }


    public static function scopeGetTachesForCurrentUser($query)
    {
        $agent_id = Auth::user()->agent->id;

        return $query->whereHas('objectifs', function ($query) use ($agent_id) {
            $query->where('agent_id', $agent_id);
        });
    }


    public function etat()
    {
        return $this->belongsTo(Etat::class);
    }

    public function tache_statut()
    {
        return $this->belongsTo(TachesStatut::class);
    }

    public function fichiers()
    {
        return $this->hasMany(Fichier::class);
    }

    public function pivotusertaches()
    {
        return $this->hasMany(PivotUserTache::class);
    }

    /**
     * The executants that belong to the Tache
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function executants()
    {
        return $this->belongsToMany(Agent::class, PivotUserTache::class, 'agent_id', 'tache_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function statut()
    {
        return $this->belongsTo(TachesStatut::class, 'statut_id');
    }

    /**
     * Scope a query to only include initiale
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeInitiale($query)
    {
        return $query->where('statut_id', 1);
    }

    /**
     * Scope a query to only include encours
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeEncours($query)
    {
        return $query->where('statut_id', 2);
    }

    /**
     * Get the priorite that owns the Tache
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function priorite()
    {
        return $this->belongsTo(Priorite::class, 'priorite_id');
    }

    /**
     * Get the document that owns the Tache
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function documents()
    {
        return $this->belongsToMany(Document::class, 'tache_documents', 'tache_id', 'document_id');
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
