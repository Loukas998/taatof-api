<?php

use App\Http\Controllers\V1\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('users/auditor-participants', [UserController::class, 'getAuditorParticipant'])->middleware(['auth:sanctum', 'role:auditor']);
Route::get('users/by-auditor', [UserController::class, 'getParticipantByAuditor'])->middleware(['auth:sanctum', 'role:admin']);
Route::get('users/participants', [UserController::class, 'getParticipants']);

Route::apiResource('users', UserController::class)->middleware(['auth:sanctum', 'role:admin']);