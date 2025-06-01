<?php

namespace App\Http\Resources\V1\Project;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'                   => $this->id,
            'title'                => $this->getTranslation('title', app()->getLocale()),
            'home_description'     => $this->getTranslation('home_description', app()->getLocale()),
            'detailed_description' => $this->getTranslation('detailed_description', app()->getLocale()),
            'images'               => $this->getMedia('images')->map(function($media) {
                return [
                    'url'   => $media->getFullUrl()
                ];
            }),
        ];
    }
}
