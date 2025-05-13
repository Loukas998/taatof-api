<?php

use App\Http\Controllers\V1\Project\ProjectController;
use Illuminate\Support\Facades\Route;

Route::apiResource('projects', ProjectController::class);