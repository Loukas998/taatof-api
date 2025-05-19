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
            'state_id'           => $this->state_id,
            'participant_name'   => $this->participant->first_name . ' ' . $this->participant->last_name,
            'title'              => $this->title,
            'date_of_submitting' => $this->date_of_submitting,
            'note'               => $this->note,
            'status'             => $this->status,
            'views'              => $this->views,
            'summary'            => $this->when($this->blogStory, $this->blogStory->summary),
            'image'              => $this->when($this->blogStory, $this->blogStory->getFirstMediaUrl('image')),
            'blog'               => BlogStoryResource::make($this->whenLoaded('blogStory'), $this->blogStory),
            'vlog'               => VlogStoryResource::make($this->whenLoaded('vlogStory'), $this->vlogStory),
        ];
    }
}
