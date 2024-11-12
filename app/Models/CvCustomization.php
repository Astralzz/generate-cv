<?php

namespace App\Models;

use App\Enums\FontFamily;
use App\Enums\LayoutCv;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @class CvCustomization - Modelo para personalización de CV.
 *
 * @property int $id
 * @property int $person_id - [foreign key to personal_info]
 * @property LayoutCv $layout
 * @property FontFamily $font_family
 * @property int $font_size
 * @property string $title_color
 * @property string $text_color
 * @property string $primary_color
 * @property string $secondary_color
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 */
class CvCustomization extends Model
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

    protected $table = 'cv_customization';

    /**
     * Atributos visibles
     * @var array<int, string>
     */
    protected $fillable = [
        'person_id',
        'layout',
        'font_family',
        'font_size',
        'title_color',
        'text_color',
        'primary_color',
        'secondary_color',
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
        'font_size' => 'integer',
        'layout' => LayoutCv::class,
        'font_family' => FontFamily::class
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
