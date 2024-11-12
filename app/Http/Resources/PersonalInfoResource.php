<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PersonalInfoResource extends JsonResource
{
    /**
     * Transforme el recurso en una matriz.
     *
     * @param Request $request
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        // Obtener las relaciones si existen
        $skills = $this->skills ? SkillResource::collection($this->skills) : null;
        $socialLinks = $this->socialLinks ? SocialLinkResource::collection($this->socialLinks) : null;
        $workExperience = $this->workExperience ? WorkExperienceResource::collection($this->workExperience) : null;
        $education = $this->education ? EducationResource::collection($this->education) : null;

        // Obtener la configuración del CV si existe
        $cvCustomization = $this->cvCustomization ? new CvCustomizationResource($this->cvCustomization) : null;

        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'description' => $this->description,
            'job_title' => $this->job_title,
            'phone' => $this->phone,
            'address' => $this->address,
            'date_birth' => $this->date_birth,
            'path_imagen' => $this->path,
            'skills' => $skills,
            'social_links' => $socialLinks,
            'work_experience' => $workExperience,
            'education' => $education,
            'cv_customization' => $cvCustomization,
        ];
    }
}
