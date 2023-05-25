<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class TeamInfo extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['phone','email','adresse','rccm','idnat','impot','logo','team_id'];

    /**
     * Get the Logo
     *
     * @param  string  $value
     * @return string
     */
    public function getLogoAttribute($value)
    {
        return $value ? Storage::disk($this->logoDisk())->url($value) : $this->defaultLogoUrl();
    }

    /**
     * Get the team that owns the TeamInfo
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function defaultLogoUrl()
    {
        $name = trim(collect(explode(' ', $this->team->name))->map(function ($segment) {
            return mb_substr($segment, 0, 1);
        })->join(' '));

        return 'https://ui-avatars.com/api/?name='.urlencode($name).'&color=7F9CF5&background=EBF4FF';
    }

    protected function logoDisk()
    {
        return isset($_ENV['VAPOR_ARTIFACT_NAME']) ? 's3' : config('jetstream.profile_photo_disk', 'public');
    }
}
