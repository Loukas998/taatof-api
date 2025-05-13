<?php

use App\Http\Controllers\V1\Department\DepartmentController;
use Illuminate\Support\Facades\Route;

Route::apiResource('categories', DepartmentController::class);