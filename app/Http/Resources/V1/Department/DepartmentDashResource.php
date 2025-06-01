<?php

namespace App\Http\Resources\V1\Department;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DepartmentDashResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'                  => $this->id,
            'title_en'            => $this->getTranslation('title', 'en'),
            'title_ar'            => $this->getTranslation('title', 'ar'),
            'description_en'      => $this->getTranslation('description', 'en'),
            'description_ar'      => $this->getTranslation('description', 'ar'),
            'participants_number' => $this->participants_number,
            'groups_number'       => $this->groups_number,
            'images'              => $this->getMedia('images')->map(function($media) {
                return [
                    'url'   => $media->getFullUrl()
                ];
            }),
        ];
    }
}
