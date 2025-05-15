<?php

use App\Http\Controllers\V1\Story\StoryController;
use Illuminate\Support\Facades\Route;

Route::get('stories/by-category', [StoryController::class, 'getStoriesByCategory']);
Route::get('stories/by-state', [StoryController::class, 'getStoriesByState']);
Route::get('stories/participant-stories', [StoryController::class, 'getParticipantStories']);

Route::apiResource('stories', StoryController::class)
    ->only(['update', 'delete'])
    ->middleware(['auth:sanctum', 'role:admin,auditor,participant']);

Route::apiResource('stories', StoryController::class)
    ->only(['store', 'delete'])
    ->middleware(['auth:sanctum', 'role:participant']);

Route::apiResource('stories', StoryController::class)
    ->only(['index', 'show']);