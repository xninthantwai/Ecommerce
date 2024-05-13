<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('articles', [ArticleController::class, 'index']);

Route::get('/articles/detail', [ArticleController::class, 'detail']);

Route::get('/articles/add', [ArticleController::class, 'add']);
Route::post('/articles/add', [ArticleController::class, 'create']);
Route::get('/articles/delete/{id}', [ArticleController::class, 'delete']);

Route::get('/articles/add-to-cart/{id}', [ArticleController::class, 'addToCart']);
Route::post('/articles/add-to-cart/{id}', [ArticleController::class, 'storeToCart']);

// Route::get('/cart', 'CartController@show')->name('cart.show');
// Route::post('/cart/add', 'CartController@add')->name('cart.add');
// Route::post('/cart/remove', 'CartController@remove')->name('cart.remove');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
