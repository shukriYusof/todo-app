<?php

use App\Action\PriorityAction;
use App\Enums\Priority;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TaskController;
use Illuminate\Support\Facades\Route;

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

/**
 * Authentication
 */
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/priority', fn() => (new PriorityAction) ());

Route::middleware('auth:api')->group(function() {
    Route::resource('/task', TaskController::class);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
