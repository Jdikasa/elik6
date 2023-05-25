<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Auth;
use Venturecraft\Revisionable\RevisionableTrait;

class Product extends Model
{
    use HasFactory;
    use RevisionableTrait;

    protected $revisionEnabled = true;
    protected $revisionCleanup = true;
    protected $historyLimit = 700;
    protected $revisionCreationsEnabled = true;
    protected $revisionForceDeleteEnabled = true;
    protected $keepRevisionOf = [
        'nom', 'type_id', 'marque_id', 'modele_id', 'image',
        'description', 'rapport_rf', 'rapport_safety', 'rapport_emc',
        'rapport_sar', 'declaration', 'autre_rapport','updated_at',
        'created_at','deleted_at'
    ];
    // protected $dontKeepRevisionOf = ['category_id'];
    protected $revisionFormattedFields = [
        'nom'      => 'string:<strong>%s</strong>',
        // 'public'     => 'boolean:No|Yes',
        // 'modified'   => 'datetime:m/d/Y g:i A',
        'deleted_at' => 'isEmpty:Active|Supprimé'
    ];

    protected $revisionFormattedFieldNames = [
        'nom'      => 'le nom',
        'type_id' => 'le type de l\'équipement',
        'marque_id' => 'la marque de l\'équipement',
        'modele_id' => 'le modele de l\'équipement',
        'image' => 'l\'image de l\'équipement',
        'description' => 'la description de l\'équipement',
        'rapport_rf' => 'le Rapport RF',
        'rapport_safety' => 'le Rapport safety',
        'rapport_emc' => 'le Rapport EMC',
        'rapport_sar' => 'le Rapport SAR',
        'declaration' => 'la Declaration de conformité',
        'autre_rapport' => 'Autre rapport',
        'deleted_at' => 'Supprimé le'
    ];

    protected $revisionNullString = 'nothing';
    protected $revisionUnknownString = 'unknown';

    public function identifiableName()
    {
        return $this->nom;
    }

    /**
     * Get the type that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(ProductsType::class, 'type_id');
    }

    /**
     * Get the marque that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function marque(): BelongsTo
    {
        return $this->belongsTo(ProductsMarque::class, 'marque_id');
    }

    /**
     * Get the modele that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function modele(): BelongsTo
    {
        return $this->belongsTo(ProductsModel::class, 'modele_id');
    }

    /**
     * The frequences that belong to the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function frequences(): BelongsToMany
    {
        return $this->belongsToMany(BandesFrequence::class, PivotBandesFrequencesProduct::class, 'product_id', 'bandes_frequence_id');
    }

    /**
     * The puissances that belong to the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function puissances(): BelongsToMany
    {
        return $this->belongsToMany(Puissance::class, PivoPuissancesProduct::class, 'product_id', 'puissance_id');
    }

    /**
     * The puissances that belong to the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function normes(): BelongsToMany
    {
        return $this->belongsToMany(Norme::class, PivoNormesProduct::class, 'product_id', 'norme_id');
    }

    /**
     * Get all of the projects for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projects()
    {
        return $this->hasMany(Project::class, 'product_id');
    }

    /**
     * The documents that belong to the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function documents(): BelongsToMany
    {
        return $this->belongsToMany(Document::class, PivotDocumentsProduct::class);
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
