<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CommentController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
 
Route::middleware('auth:api')->group(function () {
    Route::apiResource('/tasks', 'TaskController');
    Route::post('/tasks/{id}', 'TaskController@update');
    Route::post('/tasks/{task}/comments', 'CommentController@store');
    Route::get('tasks/{task_id}/comments', [CommentController::class, 'getTaskComments']);
    Route::delete('comments/{id}', [CommentController::class, 'deleteComment']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
