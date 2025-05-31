<?php

use App\Http\Controllers\V1\ContactUs\ContactUsController;
use Illuminate\Support\Facades\Route;

Route::post('contact-us/bulk', [ContactUsController::class, 'bulk_update'])->middleware(['auth:sanctum', 'role:admin,media']);

Route::apiResource('contact-us', ContactUsController::class)
    ->only(['index']);