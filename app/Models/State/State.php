<?php

namespace App\Models\State;

use App\Models\Story\Story;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class State extends Model implements HasMedia
{
    use HasTranslations, InteractsWithMedia;
    protected $guarded = [];
    public $translatable = ['name'];

    public function stories(): HasMany
    {
        return $this->hasMany(Story::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')
            ->singleFile();
    }
}
