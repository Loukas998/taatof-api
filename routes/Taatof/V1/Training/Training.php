<?php

use App\Http\Controllers\V1\Training\TrainingController;
use Illuminate\Support\Facades\Route;

Route::apiResource('trainings', TrainingController::class)
    ->only(['store', 'update', 'delete'])
    ->middleware(['auth:sanctum', 'role:admin,media']);

Route::apiResource('trainings', TrainingController::class)
    ->only(['show', 'index']);