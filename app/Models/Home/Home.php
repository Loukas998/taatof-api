<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Home extends Model implements HasMedia
{
    use InteractsWithMedia;
    protected $guarded = [];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('slider_images');
    }
}
