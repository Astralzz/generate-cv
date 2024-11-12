<?php

namespace App\Models;

use App\Enums\SocialLinkPlatform;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @class SocialLink - Modelo para enlaces sociales.
 *
 * @property int $id
 * @property int $person_id - [foreign key to personal_info]
 * @property SocialLinkPlatform $platform
 * @property string $url
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 */
class SocialLink extends Model
{
    /**
     * Soporte para fábrica.
     * @see HasFactory
     */
    use HasFactory;

    /**
     * Tabla de referencia
     * @var string $table
     */
    protected $table = 'social_link';

    /**
     * Atributos visibles
     * @var array<int, string>
     */
    protected $fillable = [
        'person_id',
        'platform',
        'url',
    ];

    /**
     * Atributos ocultos
     * @var array<int, string>
     */
    protected $hidden = [
        'updated_at',
        'created_at',
    ];

    /**
     * Atributos convertidos
     * @var array<int, string>
     */
    protected $casts = [
        'person_id' => 'integer',
        'platform' => SocialLinkPlatform::class,
    ];

    /**
     * Relación con `PersonalInfo`
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function personalInfo()
    {
        return $this->belongsTo(PersonalInfo::class, 'person_id');
    }
}
