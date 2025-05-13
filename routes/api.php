<?php

use Illuminate\Support\Facades\Route;

$dev_path = __DIR__ . '/Taatof/V1/';

Route::prefix('v1')->group(function () use ($dev_path) {

    include "{$dev_path}Category.php";
    include "{$dev_path}Department.php";
    include "{$dev_path}Manual.php";
    include "{$dev_path}Project.php";
    include "{$dev_path}Research.php";
    include "{$dev_path}State.php";
    include "{$dev_path}Story.php";
    include "{$dev_path}Training.php";
    include "{$dev_path}User.php";

});

