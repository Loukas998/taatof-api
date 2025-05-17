<?php

namespace App\Models\State;

use App\Models\Story\Story;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class State extends Model
{
    use HasTranslations;
    protected $guarded = [];
    public $translatable = ['name'];

    public function stories(): HasMany
    {
        return $this->hasMany(Story::class);
    }
}
