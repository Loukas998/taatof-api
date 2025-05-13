<?php

use App\Http\Controllers\V1\Story\StoryController;
use Illuminate\Support\Facades\Route;

Route::apiResource('stories', StoryController::class);