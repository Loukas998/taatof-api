<?php

use App\Http\Controllers\V1\Manual\ManualController;
use Illuminate\Support\Facades\Route;

Route::post('manuals/bulk', [ManualController::class, 'bulk_update'])->middleware(['auth:sanctum', 'role:admin,media']);

Route::apiResource('manuals', ManualController::class)
    ->only(['store', 'update', 'delete'])
    ->middleware(['auth:sanctum', 'role:admin,media']);

Route::apiResource('manuals', ManualController::class)
    ->only(['show', 'index']);