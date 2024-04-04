<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HelloController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/accueil', [HelloController::class, 'index']);
Route::get('/article', [ArticleController::class, 'list']);
