<?php

use App\Http\Controllers\V1\Home\HomeController;
use Illuminate\Support\Facades\Route;

Route::apiResource('home', HomeController::class)
    ->only(['update'])
    ->middleware(['auth:sanctum', 'role:admin,media']);

Route::apiResource('home', HomeController::class)
    ->only(['index']);