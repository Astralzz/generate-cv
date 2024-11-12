<?php

namespace App\Models;

use App\Enums\SkillLevel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @class Skill - Modelo para habilidades.
 *
 * @property int $id
 * @property int $person_id - [foreign key to personal_info]
 * @property string $name
 * @property SkillLevel $level
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 */
class Skill extends Model
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
    protected $table = 'skills';

    /**
     * Atributos visibles
     * @var array<int, string>
     */
    protected $fillable = [
        'person_id',
        'name',
        'level',
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
        'level' => SkillLevel::class,
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
