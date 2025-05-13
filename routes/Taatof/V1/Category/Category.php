<?php

use App\Http\Controllers\V1\Category\CategoryController;
use Illuminate\Support\Facades\Route;

Route::apiResource('categories', CategoryController::class);