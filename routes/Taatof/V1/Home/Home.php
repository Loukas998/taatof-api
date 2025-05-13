<?php

use App\Http\Controllers\V1\Home\HomeController;
use Illuminate\Support\Facades\Route;

Route::apiResource('home', HomeController::class);