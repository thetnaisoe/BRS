<?php

use App\Http\Controllers\MainPageController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainPageController::class, 'index']);

Route::get('/genres/{genre}', [GenreController::class, 'show'])->name('genres.show');

Route::get('/search', [BookController::class, 'search'])->name('search');

Route::get('/books/{book}', [BookController::class, 'show'])->name('books.detail');
Route::post('/books/{book}/borrow', [BookController::class, 'borrow'])->name('books.borrow')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


