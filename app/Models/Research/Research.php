<?php

namespace App\Models\Research;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Research extends Model
{
    use HasTranslations;
    protected $guarded = [];
    public $translatable = ['title'];
}
