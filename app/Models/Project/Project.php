<?php

namespace App\Models\Project;

use App\Models\Category\Category;
use App\Models\Story\Story;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Project extends Model implements HasMedia
{
    use InteractsWithMedia, HasTranslations;
    protected $guarded = [];
    public $translatable = ['title', 'home_description', 'detailed_description'];

    public function categories() : HasMany 
    {
        return $this->hasMany(Category::class);    
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images');
    }
}
