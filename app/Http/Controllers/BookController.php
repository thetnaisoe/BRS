<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Genre;

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

    

    public function borrow(Book $book)
    {
        $existingBorrow = $book->borrows()
            ->where('reader_id', auth()->id())
            ->whereIn('status', ['PENDING', 'BORROWED'])
            ->first();
    
        if (!$existingBorrow) {
            $book->borrows()->create([
                'reader_id' => auth()->id(),
                'status' => 'PENDING',
            ]);
        }
    
        return redirect()->route('books.detail', $book);
    }

    public function create()
    {
        //$this->authorize('create', Book::class);

        $genres = Genre::all();
        return view('create', compact('genres'));
        //return view('create');
    }

    public function store(StoreBookRequest $request)
    {
        // dd('store method called'); // Debug code
        // $this->authorize('create', Book::class);
        
        $validated = $request->validated(); // Access validated data

        $genres = $validated['genres'];
        unset($validated['genres']);
    
        $book = Book::create($validated);
        $book->genres()->attach($request->genres);
    
        return redirect()->route('index');
    }

    public function edit(Book $book)
    {
        $genres = Genre::all();
        return view('edit', compact('book', 'genres'));
    }

    public function update(StoreBookRequest $request, Book $book)
    {
        $validated = $request->validated(); // Access validated data

        $genres = $validated['genres'];
        unset($validated['genres']);

        $book->update($validated);
        $book->genres()->sync($request->genres);

        return redirect()->route('books.detail', $book)->with('success', 'Book updated successfully');
    }


    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('index')->with('success', 'Book deleted successfully');
    }


}
