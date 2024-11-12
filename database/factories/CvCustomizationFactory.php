<?php

namespace Database\Factories;

use App\Enums\FontFamily;
use App\Enums\LayoutCv;
use App\Models\CvCustomization;
use Illuminate\Database\Eloquent\Factories\Factory;

class CvCustomizationFactory extends Factory
{

    /**
     * Nombre del modelo
     * @var CvCustomization $model
     */
    protected $model = CvCustomization::class;

    /**
     * Estado predeterminado del modelo.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'layout' => $this->faker->randomElement(array_column(LayoutCv::cases(), "value")),
            'font_family' => $this->faker->randomElement(array_column(FontFamily::cases(), "value")),
            'font_size' => $this->faker->numberBetween(10, 14),
            'title_color' => $this->faker->hexColor,
            'text_color' => $this->faker->hexColor,
            'primary_color' => $this->faker->hexColor,
            'secondary_color' => $this->faker->hexColor,
        ];
    }
}
