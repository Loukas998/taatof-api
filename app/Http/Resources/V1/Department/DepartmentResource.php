<?php

namespace App\Http\Resources\V1\Department;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DepartmentResource extends JsonResource
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
            'title'               => $this->getTranslation('title', app()->getLocale()),
            'description'         => $this->getTranslation('description', app()->getLocale()),
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
