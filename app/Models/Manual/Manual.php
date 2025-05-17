<?php

namespace App\Models\Manual;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Manual extends Model
{
    use HasTranslations;
    protected $guarded = [];
    public $translatable = ['title', 'description'];
}
