<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

// Project Routes
Route::get('/projects', [ProjectController::class, 'index']);