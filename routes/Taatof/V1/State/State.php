<?php

use App\Http\Controllers\V1\State\StateController;
use Illuminate\Support\Facades\Route;

Route::apiResource('states', StateController::class);