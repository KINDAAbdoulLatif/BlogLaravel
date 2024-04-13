<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\FrontContactController;
use App\Http\Controllers\FrontCategoryController;
use App\Http\Controllers\Article\ArticleController;
use App\Http\Controllers\Category\CategoryController;

//Page d'accuiel
Route::get('/', [HomeController::class, 'index'])->name('home');

//Page detail article
Route::get('/detail/{slug}', [DetailController::class, 'index'])->name('article.detail');

//Commentaires
Route::post('/comment/{id}', [DetailController::class, 'comment'])->name('comment');

//Categories
Route::get('/categorie/{slug}', [FrontCategoryController::class, 'index'])->name('category.article');

//Recherches
Route::post('/recherches', [SearchController::class, 'index'])->name('search');

Route::get('/contacts', [FrontContactController::class, 'index'])->name('front.contact');
Route::post('/contact/envoyer', [FrontContactController::class, 'contact'])->name('contact.send');


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

//Partie commentaires
Route::resource('/comment', CommentController::class);
Route::put('/comment/unlock/{id}', [CommentController::class, 'unlock'])->name('comment.unlock');

//Partie contact
Route::resource('/contact', ContactController::class);

//Partie Paramettrage
Route::get('/paramettre', [SettingsController::class, 'index'])->name('setting.index');
Route::put('/modifier/paramettre', [SettingsController::class, 'update'])->name('setting.update');
require __DIR__.'/auth.php';
