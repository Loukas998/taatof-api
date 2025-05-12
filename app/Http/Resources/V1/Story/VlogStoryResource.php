<?php

namespace App\Http\Resources\V1\Story;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VlogStoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'       => $this->id,
            'caption'  => $this->caption,
            'story_id' => $this->story_id
        ];
    }
}
