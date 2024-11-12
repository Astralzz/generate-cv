<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @class Education - Modelo para educación.
 *
 * @property int $id
 * @property int $person_id - [foreign key to personal_info]
 * @property string $institution
 * @property string|null $description
 * @property string|null $start_date
 * @property string|null $end_date
 * @property bool|null $is_current
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 */
class Education extends Model
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
    protected $table = 'education';

    /**
     * Atributos visibles
     * @var array<int, string>
     */
    protected $fillable = [
        'person_id',
        'institution',
        'description',
        'start_date',
        'end_date',
        'is_current',
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
        'is_current' => 'boolean',
        'start_date' => 'date',
        'end_date' => 'date',
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
