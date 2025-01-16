<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

// Project Routes
Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/{id}', [ProjectController::class,'show']);
Route::post('/projects', [ProjectController::class,'store']);
Route::put('/projects/{id}', [ProjectController::class,'update']);
Route::delete('/projects/{id}', [ProjectController::class,'destroy']);