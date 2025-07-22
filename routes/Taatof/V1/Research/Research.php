<?php

use App\Http\Controllers\V1\Research\ResearchController;
use Illuminate\Support\Facades\Route;

Route::post('research/bulk', [ResearchController::class, 'bulk_update'])->middleware(['auth:sanctum', 'role:admin,media']);

Route::apiResource('research', ResearchController::class)
    ->only(['store', 'update', 'destroy'])
    ->middleware(['auth:sanctum', 'role:admin,media']);

Route::apiResource('research', ResearchController::class)
    ->only(['index','show']);