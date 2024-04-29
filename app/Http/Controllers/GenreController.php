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
    
    public function create()
    {
        return view('genrecreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:255',
            'style' => 'required|in:primary,secondary,success,danger,warning,info,light,dark',
        ]);

        Genre::create($request->all());

        return redirect()->route('genres.index');
    }

    public function edit($id)
    {
        $genre = Genre::findOrFail($id);
        return view('genredit', compact('genre'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3|max:255',
            'style' => 'required|in:primary,secondary,success,danger,warning,info,light,dark',
        ]);

        $genre = Genre::findOrFail($id);
        $genre->update($request->all());

        return redirect()->route('genres.index');
    }


    public function destroy($id)
    {
        $genre = Genre::findOrFail($id);
        $genre->delete();

        return redirect()->route('genres.index');
    }


}
