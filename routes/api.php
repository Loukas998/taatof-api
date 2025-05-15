<?php

use App\Http\Controllers\V1\Auth\AuthController;
use Illuminate\Support\Facades\Route;

$dev_path = __DIR__ . '/Taatof/V1/';

Route::prefix('v1')->group(function () use ($dev_path) {

    include "{$dev_path}Category/Category.php";
    include "{$dev_path}Department/Department.php";
    include "{$dev_path}Manual/Manual.php";
    include "{$dev_path}Project/Project.php";
    include "{$dev_path}Home/Home.php";
    include "{$dev_path}Research/Research.php";
    include "{$dev_path}State/State.php";
    include "{$dev_path}Story/Story.php";
    include "{$dev_path}Training/Training.php";
    include "{$dev_path}User/User.php";

});

Route::post('login', [AuthController::class, 'login']);
Route::delete('logout', [AuthController::class, 'logout']);

