<?php

namespace App\Models\Department;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Department extends Model implements HasMedia
{
    use InteractsWithMedia, HasTranslations;
    protected $guarded = [];
    public $translatable = ['title', 'description'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images');
    }
}
