<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;
use App\Http\Controllers\TaskController;

use App\Http\Controllers\ProjectController;


Route::post('/receive-data', [APIController::class, 'Data']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/tasks/{projectId}', [TaskController::class, 'index']);

Route::post('/tasks/update-status/{id}', [TaskController::class, 'updateStatus']);

Route::get('/projects/{teamId}', [ProjectController::class, 'index']);
Route::get('/projects/id/{projectId}', [ProjectController::class, 'show']);





