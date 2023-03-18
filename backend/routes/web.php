<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/api/task/all', [App\Http\Controllers\TaskController::class, 'getTasks']);
Route::get('/api/task/add/{title}/{desc}', [App\Http\Controllers\TaskController::class, 'setTask']);
Route::get('/api/task/delete/{id}', [App\Http\Controllers\TaskController::class, 'delTask']);
Route::get('/api/task/show/{id}', [App\Http\Controllers\TaskController::class, 'showTask']);