<?php

use App\Http\Controllers\V1\Training\TrainingController;
use Illuminate\Support\Facades\Route;

Route::apiResource('trainings', TrainingController::class);