<?php

namespace App\Http\Resources\V1\Manual;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ManualResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->id,
            'title'       => $this->getTranslation('title', app()->getLocale()),
            'description' => $this->getTranslation('description', app()->getLocale()),
        ];
    }
}
