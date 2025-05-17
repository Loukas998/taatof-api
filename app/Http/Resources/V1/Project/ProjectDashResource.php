<?php

namespace App\Http\Resources\V1\Project;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectDashResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'                      => $this->id,
            'title_en'                => $this->getTranslation('title', 'en'),
            'title_ar'                => $this->getTranslation('title', 'ar'),
            'home_description_en'     => $this->getTranslation('home_description', 'en'),
            'home_description_ar'     => $this->getTranslation('home_description', 'ar'),
            'detailed_description_en' => $this->getTranslation('detailed_description', 'en'),
            'detailed_description_ar' => $this->getTranslation('detailed_description', 'ar'),
            'images'                  => $this->getMedia('images')->map(function($media) {
                return [
                    'id'    => $media->id,
                    'url'   => $media->getFullUrl()
                ];
            }),
        ];
    }
}
