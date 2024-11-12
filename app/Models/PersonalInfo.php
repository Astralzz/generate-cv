<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @class User - Modelo para información personal.
 *
 *
 * @property int $id
 * @property string $name
 * @property string $email - [unique]
 * @property string $description
 * @property string|null $job_title
 * @property string|null $phone
 * @property string|null $address
 * @property string|null $date_birth
 * @property string|null $path_imagen
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 */

class PersonalInfo extends Model
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
    protected $table = 'personal_info';

    /**
     * Atributos visibles
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'description',
        'job_title',
        'phone',
        'address',
        'date_birth',
        'path_imagen',
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
    protected $casts = [];


    /**
     * Relación "tiene muchos"
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function education()
    {
        return $this->hasMany(Education::class, "person_id");
    }

    public function workExperience()
    {
        return $this->hasMany(WorkExperience::class, "person_id");
    }

    public function skills()
    {
        return $this->hasMany(Skill::class, "person_id");
    }

    public function socialLinks()
    {
        return $this->hasMany(SocialLink::class, "person_id");
    }

    /**
     * Relación "tiene uno"
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cvCustomization()
    {
        return $this->hasOne(CvCustomization::class, "person_id");
    }
}
