<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/assign-task', [App\Http\Controllers\HomeController::class, 'getAssignTask'])->name('assign-task');
    Route::post('/assign-task', [App\Http\Controllers\HomeController::class, 'postAssignTask'])->name('assign-task');

    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users');
    Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users');

    Route::get('/user/{id}', [App\Http\Controllers\UserController::class, 'edit']);
    Route::post('/user/{id}', [App\Http\Controllers\UserController::class, 'update']);
});


Route::get('/my-tasks', [App\Http\Controllers\MyTasksController::class, 'index']);
Route::get('/tasks', [App\Http\Controllers\TaskController::class, 'index']);

