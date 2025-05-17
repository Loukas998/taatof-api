<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Home extends Model implements HasMedia
{
    use InteractsWithMedia, HasTranslations;
    protected $guarded = [];
    protected $table = 'home';
    public $translatable = ['title', 'subtitle'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('slider_images');
    }
}
