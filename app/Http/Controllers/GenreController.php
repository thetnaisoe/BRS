<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        return view('genrelist', ['genres' => $genres]);
    }

    public function show($genreName)
    {
        $genreName = urldecode($genreName);
        $genre = Genre::where('name', $genreName)->firstOrFail();
        $books = $genre->books;
        return view('genre', ['genre' => $genre, 'books' => $books]);
    }
}
