<?php

use App\Http\Controllers\V1\Category\CategoryController;
use Illuminate\Support\Facades\Route;

Route::apiResource('categories', CategoryController::class)
    ->only(['store', 'update', 'delete'])
    ->middleware(['auth:sanctum', 'role:admin,media']);

    
Route::apiResource('categories', CategoryController::class)
    ->only(['index', 'show']);