<?php

use App\Http\Controllers\V1\Story\StoryController;
use Illuminate\Support\Facades\Route;

Route::get('stories/by-category', [StoryController::class, 'getStoriesByCategory']);
Route::get('stories/by-state', [StoryController::class, 'getStoriesByState']);
Route::get('stories/by-participant', [StoryController::class, 'getStoriesByParticipant']);

Route::get('stories/my-participants-stories', [StoryController::class, 'getMyParticipantStories'])->middleware(['auth:sanctum', 'role:auditor']);

Route::get('stories/participant-stories', [StoryController::class, 'getParticipantStories'])->middleware(['auth:sanctum', 'role:participant']);

Route::put('stories/chage-status/{id}', [StoryController::class, 'updateStoryStatus'])->middleware(['auth:sanctum', 'role:admin,auditor']);

Route::apiResource('stories', StoryController::class)
    ->only(['update', 'store', 'destroy'])
    ->middleware(['auth:sanctum', 'role:admin,auditor,participant']);

Route::apiResource('stories', StoryController::class)
    ->only(['index', 'show']);
