<?php

namespace Database\Factories;

use App\Models\WorkExperience;
use Illuminate\Database\Eloquent\Factories\Factory;

class WorkExperienceFactory extends Factory
{

    /**
     * Nombre del modelo
     * @var WorkExperience $model
     */
    protected $model = WorkExperience::class;

    /**
     * Estado predeterminado del modelo.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'company' => $this->faker->company,
            'position' => $this->faker->jobTitle,
            'responsibilities' => $this->faker->paragraph,
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->optional()->date(),
            'is_current' => $this->faker->boolean(30),
        ];
    }
}
