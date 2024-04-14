<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/genres/{genre}', [GenreController::class, 'show'])->name('genres.show');

Route::get('/search', [BookController::class, 'search'])->name('search');

Route::get('/books/{book}', [BookController::class, 'show'])->name('books.detail');