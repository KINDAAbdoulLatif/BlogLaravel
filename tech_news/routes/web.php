<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Article\ArticleController;
use App\Http\Controllers\Category\CategoryController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('back.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Partie categorie
Route::resource('/category', CategoryController::class);

//Partie articles
Route::resource('/article', ArticleController::class);

//Partie author
// Route::resource('/author', UserController::class);
require __DIR__.'/auth.php';
