<?php

use App\Http\Controllers\MainPageController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;


Route::get('/', [MainPageController::class, 'index'])->name('index');

Route::get('/search', [BookController::class, 'search'])->name('search');

Route::get('/books/create', [BookController::class, 'create'])->name('books.create')->middleware('auth'); 

Route::post('/books/create', [BookController::class, 'store'])->name('books.store')->middleware('auth');

Route::get('/books/{book}', [BookController::class, 'show'])->name('books.detail');
Route::post('/books/{book}/borrow', [BookController::class, 'borrow'])->name('books.borrow')->middleware('auth');
Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit')->middleware('auth');
Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update')->middleware('auth');
Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy')->middleware('auth');


Route::get('/genres', [GenreController::class, 'index'])->name('genres.index')->middleware('auth'); 
Route::get('/genres/create', [GenreController::class, 'create'])->name('genres.create')->middleware('auth');
Route::get('/genres/{genre}', [GenreController::class, 'show'])->name('genres.show');
Route::post('/genres/create', [GenreController::class, 'store'])->name('genres.store')->middleware('auth');
Route::get('/genres/{genre}/edit', [GenreController::class, 'edit'])->name('genres.edit')->middleware('auth');
Route::put('/genres/{genre}', [GenreController::class, 'update'])->name('genres.update')->middleware('auth');
Route::delete('/genres/{genre}', [GenreController::class, 'destroy'])->name('genres.destroy')->middleware('auth');

Route::get('/profile', [ProfileController::class, 'show'])->name('profile')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// the issue was due to the order of your route definitions. In Laravel, the order of routes in your file matters because Laravel will match the incoming request to the first route it encounters that matches the request.

// You had these two routes:

// Route::get('/books/create', [BookController::class, 'create'])->name('books.create')->middleware('auth');
// The first route is a wildcard route that matches any GET request to /books/{anything}. So when you tried to access /books/create, Laravel was matching this request to the first route, because create was considered as a {book} parameter.



