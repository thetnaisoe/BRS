@extends('layouts.main') 

@section('content')
    <div class="container mt-4">
        <h2 class="mb-3">Genre: {{ $genre->name }}</h2>

        <h3 class="mb-3">Books</h3>
        <ul class="list-unstyled">
            @foreach($books as $book)
                <li class="mb-4">
                    <a href="{{ route('books.detail', $book->id) }}" style="text-decoration: none; color: black;">
                        <h4 class="mb-1">{{ $book->title }}</h4>
                        <p class="mb-1"><strong>Author:</strong> {{ $book->authors }}</p>
                        <p class="mb-1"><strong>Date:</strong> {{ $book->released_at }}</p>
                        <p><strong>Description:</strong> {{ $book->description }}</p>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
