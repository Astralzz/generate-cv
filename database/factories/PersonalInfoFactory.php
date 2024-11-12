<?php

namespace Database\Factories;

use App\Models\CvCustomization;
use App\Models\Education;
use App\Models\PersonalInfo;
use App\Models\Skill;
use App\Models\SocialLink;
use App\Models\WorkExperience;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonalInfoFactory extends Factory
{

    /**
     * Nombre del modelo
     * @var PersonalInfo $model
     */
    protected $model = PersonalInfo::class;

    /**
     * Estado predeterminado del modelo.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'description' => $this->faker->paragraph,
            'job_title' => $this->faker->jobTitle,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'date_birth' => $this->faker->date(),
            'path_imagen' => $this->faker->imageUrl(),
        ];
    }

    /**
     * Define las relaciones con otros modelos.
     */
    public function configure()
    {
        return $this->afterCreating(function (PersonalInfo $personalInfo) {
            // Crear las relaciones para cada PersonalInfo generado
            $personalInfo->education()->saveMany(Education::factory(rand(1, 3))->make());
            $personalInfo->workExperience()->saveMany(WorkExperience::factory(rand(1, 5))->make());
            $personalInfo->skills()->saveMany(Skill::factory(rand(3, 10))->make());
            $personalInfo->socialLinks()->saveMany(SocialLink::factory(rand(3, 6))->make());
            $personalInfo->cvCustomization()->save(CvCustomization::factory()->make());
        });
    }
}
