<?php

namespace App\Models\State;

use App\Models\Story\Story;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class State extends Model
{
    protected $guarded = [];

    public function stories(): HasMany
    {
        return $this->hasMany(Story::class);
    }
}
