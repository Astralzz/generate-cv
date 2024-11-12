<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CvCustomizationResource extends JsonResource
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
        return [
            'id' => $this->id,
            'person_id' => $this->person,
            'layout' => $this->layout,
            'font_family' => $this->font_family,
            'font_size' => $this->font_size,
            'title_color' => $this->title_color,
            'text_color' => $this->text_color,
            'primary_color' => $this->primary_color,
            'secondary_color' => $this->secondary_color,
        ];
    }
}
