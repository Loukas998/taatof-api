<?php

namespace App\Http\Resources\V1\Story;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogStoryResource extends JsonResource
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
            'body'     => $this->body,
            'story_id' => $this->story_id
        ];
    }
}
