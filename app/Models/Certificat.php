<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Auth;
use Venturecraft\Revisionable\RevisionableTrait;

class Certificat extends Model
{
    use RevisionableTrait;

    protected $revisionEnabled = true;
    protected $revisionCleanup = true;
    protected $historyLimit = 700;
    protected $revisionCreationsEnabled = true;
    protected $revisionForceDeleteEnabled = true;
    protected $keepRevisionOf = [
        'country_id', 'is_mandatory', 'types_homologation_id', 'lead_time_id', 'sample_requirements',
        'types_echantillon_id', 'nombre_echantillon', 'ettiquetage', 'validite',
        'local_representation', 'total_cost', 'renewal_price','description','reglementation',
        'model_cert','formulaire','autre_doc',
        'created_at','deleted_at'
    ];
    // protected $dontKeepRevisionOf = ['category_id'];
    protected $revisionFormattedFields = [
        'is_mandatory' => 'boolean:Volontaire|Obligatoire',
        'sample_requirements' => 'boolean:Non|Oui',
        'ettiquetage' => 'boolean:Non|Oui',
        'local_representation' => 'boolean:Non|Oui',
        // 'modified'   => 'datetime:m/d/Y g:i A',
        'deleted_at' => 'isEmpty:Active|Supprimé'
    ];

    // protected $revisionFormattedFieldNames = [
    //     'nom' => 'le nom',
    //     'type_id' => 'le type de l\'équipement',
    //     'marque_id' => 'la marque de l\'équipement',
    //     'modele_id' => 'le modele de l\'équipement',
    //     'image' => 'l\'image de l\'équipement',
    //     'description' => 'la description de l\'équipement',
    //     'rapport_rf' => 'le Rapport RF',
    //     'rapport_safety' => 'le Rapport safety',
    //     'rapport_emc' => 'le Rapport EMC',
    //     'rapport_sar' => 'le Rapport SAR',
    //     'declaration' => 'la Declaration de conformité',
    //     'autre_rapport' => 'Autre rapport',
    //     'deleted_at' => 'Supprimé le'
    // ];

    protected $revisionNullString = 'nothing';
    protected $revisionUnknownString = 'unknown';

    public function identifiableName()
    {
        return $this->country->name_fr;
    }
    /**
     * Get the country that owns the Certificat
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    /**
     * Get the typeHomologation that owns the Certificat
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function typeHomologation()
    {
        return $this->belongsTo(CertificatsTypesHomologation::class, 'types_homologation_id');
    }

    /**
     * Get the leadTime that owns the Certificat
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function leadTime()
    {
        return $this->belongsTo(CertificatsLeadsTime::class, 'lead_time_id');
    }

    /**
     * Get the typesEchantillon that owns the Certificat
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function typesEchantillon()
    {
        return $this->belongsTo(CertificatsTypesEchantillon::class, 'types_echantillon_id');
    }

    /**
     * Get all of the partenaires for the Certificat
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    // public function partenaires()
    // {
    //     return $this->hasManyThrough(Partenaire::class, Modalite::class, 'country_id');
    // }
    public function partenaires()
    {
        return $this->hasMany(Partenaire::class, 'country_id');
    }

    /**
     * Get all of the projects for the Certificat
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projects()
    {
        return $this->hasMany(Project::class, 'certificat_id');
    }

    /**
     * The documents that belong to the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function documents(): BelongsToMany
    {
        return $this->belongsToMany(Document::class, PivotDocumentsCertificat::class);
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
