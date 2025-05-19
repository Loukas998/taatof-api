<?php

namespace App\Models\ContactUs;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ContactUs extends Model
{
    use HasTranslations;
    protected $guarded = [];

    public $translatable = ['location'];
}
