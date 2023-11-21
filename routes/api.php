<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\UpdatePasswordController;

use App\Http\Controllers\ProjectController;

use App\Http\Controllers\MemberController;
use App\Http\Controllers\TeamController;

Route::post('/update-password', [UpdatePasswordController::class, 'updatePassword']);

Route::post('/googleLogin', [GoogleController::class, 'loginOrRegister']);

Route::post('/login', [AuthController::class, 'login']);

Route::post('/create-user', [UserController::class, 'createUser']);

Route::post('/receive-data', [APIController::class, 'Data']);

Route::post('/create-task', [TaskController::class, 'createTask']);

Route::post('/forgot-password', [ForgotPasswordController::class, 'checkEmail']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/tasks/project/{projectId}', [TaskController::class, 'index']);
Route::post('/tasks/update-status/{id}', [TaskController::class, 'updateStatus']);
Route::delete('/tasks/delete/{id}', [TaskController::class, 'destroy']);

Route::get('/projects/{teamId}', [ProjectController::class, 'index']);
Route::get('/projects/id/{projectId}', [ProjectController::class, 'show']);
Route::post('/projects/create', [ProjectController::class, 'store']);

Route::get('/members/{userId}', [MemberController::class, 'getMembersByUserId']);
Route::get('/teams', [TeamController::class, 'getAllTeams']);


// routes/web.php or routes/api.php

//Attempt to insert data
Route::get('/create-sample-task', [TaskController::class, 'createSampleTask']);

use App\Http\Controllers\GetTasksController;
//Get tasks
Route::get('/fetch-data', [GetTasksController::class, 'fetchData']);

use App\Http\Controllers\UpdateCertainTaskController;
//Update tasks
Route::put('/tasks/{id}', [UpdateCertainTaskController::class, 'update'])->name('tasks.update');

use App\Http\Controllers\GetProjectsController;
//Get projects
Route::get('/fetch-projects', [GetProjectsController::class, 'fetchProjects']);


use App\Http\Controllers\ProjectCalendarController;

// Example route in web.php
Route::get('/CertainProjectCalendar-{projectId}', [ProjectCalendarController::class, 'show']);


