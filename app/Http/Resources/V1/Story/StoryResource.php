<?php

namespace App\Http\Resources\V1\Story;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StoryResource extends JsonResource
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
            'user_id'            => $this->user_id,
            'project_id'         => $this->project_id,
            'state_id'           => $this->state_id,
            'title'              => $this->title,
            'body'               => $this->body,
            'date_of_submitting' => $this->date_of_submitting,
            'note'               => $this->note,
            'status'             => $this->status,
            'views'              => $this->views 
        ];
    }
}
