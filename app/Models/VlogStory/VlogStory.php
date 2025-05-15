<?php

namespace App\Models\VlogStory;

use App\Models\Story\Story;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VlogStory extends Story
{
    protected $guarded = [];

    public function story(): BelongsTo
    {
        return $this->belongsTo(Story::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('video')
            ->singleFile();
    }
}
