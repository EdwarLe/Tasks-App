<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'admin', 'namespace' => 'Admin'], function () {
    // Task
    Route::get('/assign-task', [App\Http\Controllers\Admin\TasksController::class, 'index'])->name('assign-task');
    Route::post('/assign-task', [App\Http\Controllers\Admin\TasksController::class, 'store'])->name('assign-task');

    Route::get('/assign-task/{id}', [App\Http\Controllers\Admin\TasksController::class, 'edit']);
    Route::post('/assign-task/{id}', [App\Http\Controllers\Admin\TasksController::class, 'update']);

    Route::get('/assign-task/{id}/delete', [App\Http\Controllers\Admin\TasksController::class, 'delete']);
    Route::get('/assign-task/{id}/restore', [App\Http\Controllers\Admin\TasksController::class, 'restore']);

    // Users
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users');
    Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users');

    Route::get('/user/{id}', [App\Http\Controllers\UserController::class, 'edit']);
    Route::post('/user/{id}', [App\Http\Controllers\UserController::class, 'update']);

    Route::get('/user/{id}/delete', [App\Http\Controllers\UserController::class, 'delete']);

});


Route::get('/my-tasks', [App\Http\Controllers\MyTasksController::class, 'index']);
Route::get('/tasks', [App\Http\Controllers\TaskController::class, 'index']);

