<?php

use App\Http\Controllers\V1\Department\DepartmentController;
use Illuminate\Support\Facades\Route;

Route::post('departments/bulk', [DepartmentController::class, 'bulk_update'])->middleware(['auth:sanctum', 'role:admin,media']);

Route::apiResource('departments', DepartmentController::class)
    ->only(['store', 'update', 'delete'])
    ->middleware(['auth:sanctum', 'role:admin,media']);

Route::apiResource('departments', DepartmentController::class)
    ->only(['show', 'index']);