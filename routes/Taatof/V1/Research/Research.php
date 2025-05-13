<?php

use App\Http\Controllers\V1\Research\ResearchController;
use Illuminate\Support\Facades\Route;

Route::apiResource('research', ResearchController::class);