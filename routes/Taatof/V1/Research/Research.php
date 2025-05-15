<?php

use App\Http\Controllers\V1\Research\ResearchController;
use Illuminate\Support\Facades\Route;

Route::apiResource('research', ResearchController::class)
    ->only(['store', 'update', 'delete'])
    ->middleware(['auth:sanctum', 'role:admin,media']);

Route::apiResource('research', ResearchController::class)
    ->only(['index','show']);