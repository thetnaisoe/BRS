@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <h3 class="text-center mb-3">Search Results</h3>
    @foreach($books as $book)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title"><a href="{{ route('books.detail', $book) }}" style="text-decoration: none; color: black;">{{ $book->title }}</a></h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $book->authors }}</h6>
                <p class="card-text">{{ $book->released_at }}</p>
                <p class="card-text">{{ $book->description }}</p>
            </div>
        </div>
    @endforeach
</div>
@endsection
