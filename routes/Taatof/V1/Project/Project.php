<?php

use App\Http\Controllers\V1\Project\ProjectController;
use Illuminate\Support\Facades\Route;

Route::post('projects/bulk', [ProjectController::class, 'bulk_update'])->middleware(['auth:sanctum', 'role:admin,media']);

Route::apiResource('projects', ProjectController::class)
    ->only(['store', 'update', 'delete'])
    ->middleware(['auth:sanctum', 'role:admin,media']);

Route::apiResource('projects', ProjectController::class)
    ->only(['show', 'index']);