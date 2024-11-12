<?php

namespace Database\Factories;

use App\Models\Education;
use Illuminate\Database\Eloquent\Factories\Factory;

class EducationFactory extends Factory
{

    /**
     * Nombre del modelo
     * @var Education $model
     */
    protected $model = Education::class;

    /**
     * Estado predeterminado del modelo.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'institution' => $this->faker->company,
            'description' => $this->faker->sentence,
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->optional()->date(),
            'is_current' => $this->faker->boolean(30),
        ];
    }
}
