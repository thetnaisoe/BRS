<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Book;
use App\Models\User;
use App\Models\Borrow;

class MainPageController extends Controller
{
    
    public function index()
    {
        $userCount = User::count();
        $genreCount = Genre::count();
        $bookCount = Book::count();
        $activeRentalsCount = Borrow::where('status', 'ACCEPTED')->count();
        $genres = Genre::all();

        return view('index', compact('userCount', 'genreCount', 'bookCount', 'activeRentalsCount', 'genres'));
        //return view('index', compact( 'genreCount', 'bookCount', 'genres'));
    }
}
