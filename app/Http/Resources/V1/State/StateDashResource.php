<?php

namespace App\Http\Resources\V1\State;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StateDashResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'      => $this->id,
            'name_en' => $this->getTranslation('name', 'en'),
            'name_ar' => $this->getTranslation('name', 'ar'),
        ];
    }
}
