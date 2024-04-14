@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <h2>{{ $book->title }}</h2>
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
        <img src="{{ $book->cover_image }}" alt="{{ $book->title }}">
    @endif
</div>
@endsection