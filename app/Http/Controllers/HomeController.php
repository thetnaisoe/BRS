<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Book;

class HomeController extends Controller
{
    public function index()
    {
        //$userCount = User::count();
        $genreCount = Genre::count();
        $bookCount = Book::count();
        //$activeRentalsCount = Rental::where('status', 'accepted')->count();

        $genres = Genre::all();

        //return view('index', compact('userCount', 'genreCount', 'bookCount', 'activeRentalsCount', 'genres'));
        return view('index', compact( 'genreCount', 'bookCount', 'genres'));
    }
}
