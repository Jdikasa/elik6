<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Venturecraft\Revisionable\RevisionableTrait;

class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;
    use RevisionableTrait;

    protected $revisionEnabled = true;
    protected $revisionCleanup = true;
    protected $historyLimit = 700;
    protected $revisionCreationsEnabled = true;
    protected $revisionForceDeleteEnabled = true;
    //
    protected $keepRevisionOf = [
        'societe_id', 'adresse_id', 'type_id', 'logo', 'contrat',
        'nda', 'autre_doc', 'description', 'created_at',
        'updated_at', 'deleted_at'
    ];

    protected $revisionFormattedFieldNames = [
        'societe_id' => 'la societé',
        'adresse_id' => 'l\'adresse',
        'type_id' => 'le type',
        'logo' => 'le logo',
        'contrat' => 'le contrat',
        'nda' => 'le NDA',
        'autre_doc' => 'autres document',
        'description' => 'la description',
        'deleted_at' => 'Supprimé le'
    ];

    protected $revisionNullString = 'nothing';
    protected $revisionUnknownString = 'unknown';

    /**
     * Get the societe that owns the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function societe()
    {
        return $this->belongsTo(Societe::class, 'societe_id', 'id');
    }

    /**
     * Get the country that owns the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    /**
     * The personnes that belong to the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function personnes()
    {
        return $this->belongsToMany(ContactsPeople::class, CustomersContactsPeople::class);
    }

    /**
     * Get the type that owns the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(TypesClient::class, 'type_id');
    }

    /**
     * Get all of the projects for the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projects()
    {
        return $this->hasMany(Project::class, 'client_id');
    }

    public function getRouteKeyName() {
        return 'id';
    }

    /**
     * Get the adresse that owns the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function adresse()
    {
        return $this->belongsTo(Adresse::class, 'adresse_id');
    }

    /**
     * The documents that belong to the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function documents(): BelongsToMany
    {
        return $this->belongsToMany(Document::class, PivotDocumentsCustomer::class);
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
