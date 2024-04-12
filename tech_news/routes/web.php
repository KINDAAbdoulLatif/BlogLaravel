<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\Article\ArticleController;
use App\Http\Controllers\Category\CategoryController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', [DashBoardController::class, 'index'])->middleware(['auth', 'verified', 'check:admin,author'])->name('dashboard');


    // ->middleware(App\Http\Middleware\CheckRole::class, 'admin,author')

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Partie categorie
Route::resource('/category', CategoryController::class)->middleware(App\Http\Middleware\Admin::class);

//Partie articles
Route::resource('/article', ArticleController::class);

// Partie author
Route::resource('/author', UserController::class)->middleware(App\Http\Middleware\Admin::class);

//Partie Reseaux Sociaux
Route::resource('/social', SocialMediaController::class)->middleware(App\Http\Middleware\Admin::class);

//Partie Paramettrage
Route::get('/paramettre', [SettingsController::class, 'index'])->name('setting.index');
Route::put('/modifier/paramettre', [SettingsController::class, 'update'])->name('setting.update');
require __DIR__.'/auth.php';
