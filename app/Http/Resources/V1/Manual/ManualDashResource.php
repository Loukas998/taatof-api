<?php

namespace App\Http\Resources\V1\Manual;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ManualDashResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'             => $this->id,
            'title_en'       => $this->getTranslation('title', 'en'),
            'title_ar'       => $this->getTranslation('title', 'ar'),
            'description_en' => $this->getTranslation('description', 'en'),
            'description_ar' => $this->getTranslation('description', 'ar'),
        ];
    }
}
