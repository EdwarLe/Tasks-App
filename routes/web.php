<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/assign-task', [App\Http\Controllers\HomeController::class, 'assignTask'])->name('assign-task')->middleware('admin');


    Route::get('/my-tasks', [App\Http\Controllers\MyTasksController::class, 'index']);
    Route::get('/tasks', [App\Http\Controllers\TaskController::class, 'index']);

