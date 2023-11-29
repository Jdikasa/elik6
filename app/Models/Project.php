<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Venturecraft\Revisionable\RevisionableTrait;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;
    use RevisionableTrait;

    protected $revisionEnabled = true;
    protected $revisionCleanup = true;
    protected $historyLimit = 700;
    protected $revisionCreationsEnabled = true;
    protected $revisionForceDeleteEnabled = true;

    protected $keepRevisionOf = [
        'client_id', 'certificat_id', 'product_id', 'partenaire_id', 'duree',
        'prix', 'renewal_price', 'date_reception', 'date_soumission',
        'update_date', 'date_cloture', 'date_renouv', 'description',
        'created_at', 'updated_at', 'deleted_at',
    ];
    // protected $dontKeepRevisionOf = ['category_id'];
    protected $revisionFormattedFields = [
        // 'nom' => 'string:<strong>%s</strong>',
        // 'public'     => 'boolean:No|Yes',
        // 'modified'   => 'datetime:m/d/Y g:i A',
        'deleted_at' => 'isEmpty:Active|Supprimé',
    ];

    protected $revisionFormattedFieldNames = [
        'client_id' => 'le client',
        'certificat_id' => 'le pays',
        'product_id' => 'le produit',
        'partenaire_id' => 'le partenaire',
        'duree' => 'la duree du projet',
        'description' => 'la description du projet',
        'prix' => 'le prix',
        'renewal_price' => 'le prix de renouvellement',
        'date_reception' => 'la date de reception',
        'date_soumission' => 'la date de soumission',
        'update_date' => 'la date du prochaine mis à jour',
        'date_cloture' => 'la date de cloture',
        'date_renouv' => 'la date de renouvellement',
        'deleted_at' => 'Supprimé le',
    ];

    protected $revisionNullString = 'nothing';
    protected $revisionUnknownString = 'unknown';

    protected $guarded = [];

    public function identifiableName()
    {
        return $this->nom;
    }

    // protected $dates = [
    //     'date_reception',
    //     'date_soumission',
    //     'update_date',
    //     'date_cloture',
    //     'created_at',
    //     'updated_at',
    //     'deleted_at',
    // ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'date_reception' => 'date',
        'date_soumission' => 'date',
        'update_date' => 'date',
        'date_cloture' => 'date',
    ];

    /**
     * Get the prixPartenaire
     *
     * @param  string  $value
     * @return string
     */
    public function getPrixPartenaireAttribute($value)
    {
        return $this->partenaire->modalites->where('country_id', $this->certificat->country->id)->first()->prix ?? 0;
    }

    /**
     * Get the customer that owns the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'client_id');
    }

    /**
     * Get the certificat that owns the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function certificat()
    {
        return $this->belongsTo(Certificat::class, 'certificat_id');
    }

    /**
     * Get the equipement that owns the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function equipement()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    /**
     * Get the partenaire that owns the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function partenaire()
    {
        return $this->belongsTo(Partenaire::class, 'partenaire_id');
    }

    /**
     * Get all of the note for the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notes()
    {
        return $this->hasMany(Note::class, 'project_id');
    }

    /**
     * Get all of the statuts for the Project
     *
     */
    public function statuts()
    {
        return $this->notes()->whereHas('statut')->get()->map(function ($note)
        {
            return $note->statut;
        });
    }

    /**
     * Get all of the statuts for the Project
     *
     */
    public function etape()
    {
        return $this->notes()->with('etape')->get()->map(function ($note)
        {
            return $note->etape;
        });
    }

    /**
     * Get all of the post's comments.
     */
    public function renouvellements()
    {
        return $this->morphMany(Renouvellable::class, 'renouvellable');
    }

    /**
     * Get the user's most recent renouvellement.
     */
    public function latestRenouvellement()
    {
        return $this->morphOne(Renouvellable::class, 'renouvellable')->latestOfMany();
    }

    /**
     * The projects that belong to the Facture
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function factures()
    {
        return $this->belongsToMany(Facture::class, PivotFacturesProject::class)->withPivot(['prix','qt'])->withTimestamps();
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
