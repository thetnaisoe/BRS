
@extends('layouts.main') 

@section('content')
    <div class="container mt-5">
        <h2 class="mb-3">Genre: {{ $genre->name }}</h2>

        <h3 class="mb-3">Books</h3>
        @foreach($books as $book)
            <div class="card mb-4 shadow-lg">
                <div class="card-body">
                    <h4 class="card-title mb-1">{{ $book->title }}</h4>
                    <p class="card-text mb-1"><strong>Author:</strong> {{ $book->authors }}</p>
                    <p class="card-text mb-1"><strong>Date:</strong> {{ $book->released_at }}</p>
                    <p class="card-text"><strong>Description:</strong> {{ $book->description }}</p>
                    <a href="{{ route('books.detail', $book->id) }}" class="btn btn-primary">View Details</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
