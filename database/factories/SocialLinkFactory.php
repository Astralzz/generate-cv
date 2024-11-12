<?php

namespace Database\Factories;

use App\Enums\SocialLinkPlatform;
use App\Models\SocialLink;
use Illuminate\Database\Eloquent\Factories\Factory;

class SocialLinkFactory extends Factory
{
    /**
     * Nombre del modelo
     * @var SocialLink $model
     */
    protected $model = SocialLink::class;

    /**
     * Estado predeterminado del modelo.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'platform' => $this->faker->randomElement(array_column(SocialLinkPlatform::cases(), "value")),
            "url" => $this->faker->url
        ];
    }
}
