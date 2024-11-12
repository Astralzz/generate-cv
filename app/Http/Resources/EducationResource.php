<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EducationResource extends JsonResource
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
            'institution' => $this->institution,
            'description' => $this->description,
            'start_date' => $this->startDate,
            'end_date' => $this->end_date,
            'is_current' => $this->is_current,
        ];
    }
}
