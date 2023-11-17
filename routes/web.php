<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\APIController;
use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordReset;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', [UserController::class, 'Test']);

Route::get('/api', [APIController::class, 'getData']);


Route::get('/test-mail', function () {
    $recipient = 'caupupsik@gmail.com';
    $mail = new PasswordReset();

    Mail::to($recipient)->send($mail);

    return "Test email sent successfully!";
});
