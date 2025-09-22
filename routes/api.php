<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TaskController;

Route::name('api.')->group(function () {
    Route::apiResource('tasks', TaskController::class);
});


