<?php

namespace App\Models\BlogStory;

use App\Models\Story\Story;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BlogStory extends Story
{
    protected $guarded = [];

    public function story(): BelongsTo
    {
        return $this->belongsTo(Story::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')
            ->singleFile();
    }
}
