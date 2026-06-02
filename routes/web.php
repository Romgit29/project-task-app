<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    
});

Route::resource('projects', ProjectController::class)->only([
    'index', 'create', 'store'
]);

Route::resource('tasks', TaskController::class);
