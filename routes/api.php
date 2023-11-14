<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('/receive-data', [APIController::class, 'Data']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// routes/web.php or routes/api.php

use App\Http\Controllers\TaskController;
//Attempt to insert data
Route::get('/create-sample-task', [TaskController::class, 'createSampleTask']);

use App\Http\Controllers\GetTasksController;
//Get tasks
Route::get('/fetch-data', [GetTasksController::class, 'fetchData']);

use App\Http\Controllers\UpdateCertainTaskController;
//Update tasks
Route::put('/tasks/{id}', [UpdateCertainTaskController::class, 'update'])->name('tasks.update');
