<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Document extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['dossier_id', 'category_id', 'reference', 'libelle', 'type', 'document', 'user_id', 'statut_id', 'created_by', 'team_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function statut()
    {
        return $this->belongsTo(DocumentStatut::class, 'statut_id');
    }

    /**
     * Scope a query to only include no archive
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNoArchive($query)
    {
        return $query->where('statut_id', '!=', 6);
    }

    /**
     * Scope a query to only include archive
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeArchive($query)
    {
        return $query->where('statut_id', '=', 6);
    }

    /**
     * The agent that belong to the Courrier
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function followers()
    {
        return $this->belongsToMany(Agent::class, DocumentFollower::class);
    }

    /**
     * Get the author that owns the Classeur
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(Agent::class, 'created_by');
    }

    /**
     * Get the categorie that owns the Document
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categorie()
    {
        return $this->belongsTo(CourrierCategory::class, 'category_id');
    }

    /**
     * Get the dossier that owns the Document
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dossier()
    {
        return $this->belongsTo(Dossier::class, 'dossier_id');
    }

    /**
     * Get the dossier that owns the Document
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nature()
    {
        return $this->belongsTo(DocumentNature::class, 'nature_id');
    }

    /**
     * Get the typeDocument that owns the Document
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function typeDocument()
    {
        return $this->belongsTo(DocumentType::class, 'type');
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
