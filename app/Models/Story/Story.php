<?php

namespace App\Models\Story;

use App\Models\BlogStory\BlogStory;
use App\Models\Category\Category;
use App\Models\Project\Project;
use App\Models\State\State;
use App\Models\User\User;
use App\Models\VlogStory\VlogStory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Story extends Model implements HasMedia
{
    use InteractsWithMedia;
    protected $guarded = [];
    
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }

    public function participant(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function blogStory(): HasOne
    {
        return $this->hasOne(BlogStory::class);
    }

    public function vlogStory(): HasOne
    {
        return $this->hasOne(VlogStory::class);
    }
}
