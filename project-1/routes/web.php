<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskSecController;
use Illuminate\Support\Facades\Route;







Route::get('/', [TaskController::class, 'index'])->name('index')->middleware('auth');
Route::resource('/tache', TaskSecController::class);




// Route::get('/tache/create', [TaskController::class, 'create'])->name('create');
// Route::post('/tache/create-post', [TaskController::class, 'store'])->name('store');
// Route::get('/tache/modifier/{id}', [TaskController::class, 'edit'])->name('edit');
// Route::put('/tache/update/{id}', [TaskController::class, 'update'])->name('update');
// Route::delete('/tache/supprimer/{id}', [TaskController::class, 'destroy'])->name('destroy');

//Authentification
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login/post', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



