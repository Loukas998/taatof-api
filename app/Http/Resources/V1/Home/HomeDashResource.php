<?php

namespace App\Http\Resources\V1\Home;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HomeDashResource extends JsonResource
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
            'subtitle_en'         => $this->getTranslation('subtitle', 'en'),
            'subtitle_ar'         => $this->getTranslation('subtitle', 'ar'),
            'trainings_number'    => $this->trainings_number,
            'trainers_number'     => $this->trainers_number,
            'stories_number'      => $this->stories_number,
            'life_groups_members' => $this->life_groups_members,
            'images'               => $this->getMedia('slider_images')->map(function($media) {
                return [
                    'url'   => $media->getFullUrl()
                ];
            }),
        ];
    }
}
