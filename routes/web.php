<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


    Route::get("/todos",[Controllers\TodoController::class,'index'])->name('todo.index');
    Route::get("/todos/create",[Controllers\TodoController::class,'create']);
    Route::get("/todos/edit/{todo}",[Controllers\TodoController::class,'edit']);
    Route::patch("/todos/edit/{todo}",[Controllers\TodoController::class,'update'])->name('todo.update');
    Route::delete("/todos/delete/{todo}",[Controllers\TodoController::class,'delete'])->name('todo.delete');
//Route::resource('todos',Controllers\TodoController::class);
    Route::put("/todos/complate/{todo}",[Controllers\TodoController::class,'complate'])->name('todo.complate');
    Route::delete("/todos/incomplate/{todo}",[Controllers\TodoController::class,'incomplate'])->name('todo.incomplate');


Route::post('/todos/create',[Controllers\TodoController::class,'store']);

Route::get('/user', [UserController::class, 'index']);

Route::post('/upload' , [UserController::class, 'uploadAvatar']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
