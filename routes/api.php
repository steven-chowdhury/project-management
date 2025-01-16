<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

// Project Routes
Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/{id}', [ProjectController::class,'show']);
Route::post('/projects', [ProjectController::class,'store']);
Route::put('/projects/{id}', [ProjectController::class,'update']);
Route::delete('/projects/{id}', [ProjectController::class,'destroy']);

// Task Routes
Route::get('/tasks', [TaskController::class,'index']);
Route::get('/projects/{project_id}/tasks', [TaskController::class,'indexByProjectId']);
Route::get('/tasks/{id}', [TaskController::class,'show']);
Route::post('/projects/{project_id}/tasks', [TaskController::class,'store']);
Route::put('/tasks/{id}', [TaskController::class,'update']);
Route::delete('/tasks/{id}', [TaskController::class,'destroy']);