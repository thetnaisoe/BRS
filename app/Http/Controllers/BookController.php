<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function show(Book $book)
    {
        return view('bookdetail', ['book' => $book]);
    }


    public function search(Request $request)
    {
        $query = $request->get('query');
        $books = Book::where('title', 'LIKE', "%{$query}%")
            ->orWhere('authors', 'LIKE', "%{$query}%")
            ->get();

        // Debugging: output the search query and the number of results
        error_log('Search query: ' . $query);
        error_log('Number of results: ' . $books->count());

        return view('search', ['books' => $books]);
    }

}
