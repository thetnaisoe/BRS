@extends('layouts.main')

@section('content')
<div class="container py-5">
    <div class="card shadow-lg p-5 rounded">
    <h1 class="mb-5">Add New Book</h1>

    <form action="{{ route('books.store') }}" method="POST" class="bg-light p-5 rounded">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', '') }}"  maxlength="255">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Authors -->
        <div class="mb-3">
            <label for="authors" class="form-label">Authors</label>
            <input type="text" class="form-control @error('authors') is-invalid @enderror" id="authors" name="authors" value="{{ old('authors', '') }}"  maxlength="255">
            @error('authors')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Released At -->
        <div class="mb-3">
            <label for="released_at" class="form-label">Released At</label>
            <input type="date" class="form-control @error('released_at') is-invalid @enderror" id="released_at" name="released_at" value="{{ old('released_at', '') }}" >
            @error('released_at')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Pages -->
        <div class="mb-3">
            <label for="pages" class="form-label">Pages</label>
            <input type="number" class="form-control @error('pages') is-invalid @enderror" id="pages" name="pages" value="{{ old('pages') }}"  min="1">
            @error('pages')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- ISBN -->
        <div class="mb-3">
            <label for="isbn" class="form-label">ISBN</label>
            <input type="text" class="form-control @error('isbn') is-invalid @enderror" id="isbn" name="isbn" value="{{ old('isbn', '') }}"  pattern="^(?=(?:\D*\d){10}(?:(?:\D*\d){3})?$)[\d-]+$">
            @error('isbn')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description', '') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Genres -->
        <div class="mb-3">
            <label for="genres" class="form-label">Genres</label>
            @foreach($genres as $genre)
                <div class="form-check @error('genres') is-invalid @enderror">
                <input class="form-check-input " type="checkbox" value="{{ $genre->id }}" id="genre{{ $genre->id }}" name="genres[]" {{ in_array($genre->id, old('genres', [])) ? 'checked' : '' }}>
                    <label class="form-check-label" for="genre{{ $genre->id }}">
                        {{ $genre->name }}
                    </label>
                </div>
            @endforeach
            @error('genres')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- In Stock -->
        <div class="mb-3">
            <label for="in_stock" class="form-label">In Stock</label>
            <input type="number" class="form-control @error('in_stock') is-invalid @enderror" id="in_stock" name="in_stock" value="{{ old('in_stock') }}" min="0">
            @error('in_stock')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Cover Image -->
        <div class="mb-3">
            <label for="cover_image" class="form-label">Cover Image URL</label>
            <input type="text" class="form-control @error('cover_image') is-invalid @enderror" id="cover_image" name="cover_image" value="{{ old('cover_image') }}">
            @error('cover_image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
    </div>
</div>
@endsection