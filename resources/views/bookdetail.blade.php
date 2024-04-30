
@extends('layouts.main')

@section('content')
<div class="container mt-5 mb-5">
    <div class="card shadow-lg">
        <div class="card-body p-4">
            <h2 class="card-title">{{ $book->title }}</h2>
            <p><strong>Author:</strong> {{ $book->authors }}</p>
            <p><strong>Genres:</strong> {{ $book->genres->pluck('name')->join(', ') }}</p>
            <p><strong>Date of Publish:</strong> {{ $book->released_at }}</p>
            <p><strong>Number of Pages:</strong> {{ $book->pages }}</p>
            <p><strong>Language:</strong> {{ $book->language_code }}</p>
            <p><strong>ISBN:</strong> {{ $book->isbn }}</p>
            <p><strong>Number in Library:</strong> {{ $book->in_stock }}</p>
            <p><strong>Number of Available Books:</strong> {{ $book->available }}</p>
            <p><strong>Description:</strong> {{ $book->description }}</p>
            @if($book->cover_image)
                <img src="{{ $book->cover_image }}" alt="{{ $book->title }}" class="img-fluid rounded mb-3">
            @endif

            @auth
            <div class="mt-4">
                @if(auth()->user()->isLibrarian())
                    <form action="{{ route('books.edit', $book) }}" method="GET" class="d-grid gap-2 mb-3">
                        <button type="submit" class="btn btn-primary">Edit this book</button>
                    </form>

                    <form action="{{ route('books.destroy', $book) }}" method="POST" class="d-grid gap-2 mb-3">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete this book</button>
                    </form>
                @else
                    @if($book->hasOngoingRental(auth()->user()))
                        <p class="alert alert-warning">You have an ongoing rental process with this book.</p>
                    @else
                        <form action="{{ route('books.borrow', $book) }}" method="POST" class="d-grid gap-2 mb-3">
                            @csrf
                            <button type="submit" class="btn btn-primary">Borrow this book</button>
                        </form>
                    @endif
                @endif
            </div>
            @endauth
        </div>
    </div>
</div>
@endsection
