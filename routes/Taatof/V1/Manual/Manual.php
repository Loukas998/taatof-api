<?php

use App\Http\Controllers\V1\Manual\ManualController;
use Illuminate\Support\Facades\Route;

Route::apiResource('manuals', ManualController::class);