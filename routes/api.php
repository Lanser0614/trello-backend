<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class,'register']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/category/{category}/tasks', [CategoryController::class, 'tasks']);
    Route::resource('/category', CategoryController::class);
    Route::resource('/task', TaskController::class);
});
