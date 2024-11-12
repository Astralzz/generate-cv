<?php

namespace Database\Factories;

use App\Enums\SkillLevel;
use App\Models\Skill;
use Illuminate\Database\Eloquent\Factories\Factory;

class SkillFactory extends Factory
{

    /**
     * Nombre del modelo
     * @var Skill $model
     */
    protected $model = Skill::class;

    /**
     * Estado predeterminado del modelo.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'level' => $this->faker->randomElement(array_column(SkillLevel::cases(), "value")),
        ];
    }
}
