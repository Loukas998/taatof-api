<?php

namespace App\Http\Resources\V1\Home;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HomeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'                 => $this->id,
            'title'              => $this->title,
            'subtitle'           => $this->subtitle,
            'trainings_number'   => $this->trainings_number,
            'trainers_number'    => $this->trainers_number,
            'stories_number'     => $this->stories_number,
            'life_groups_number' => $this->life_groups_number
        ];
    }
}
