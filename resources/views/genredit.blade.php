
@extends('layouts.main')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Edit Genre</h1>
    <form action="{{ route('genres.update', $genre->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-4">
            <label for="name" class="mb-2">Name</label>
            <input type="text" class="form-control py-2 @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $genre->name) }}" required minlength="3" maxlength="255">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-4">
            <label for="style" class="mb-2">Style</label>
            <select class="form-control py-2 @error('style') is-invalid @enderror" id="style" name="style">
                <option value="primary" @if($genre->style == 'primary') selected @endif>Primary</option>
                <option value="secondary" @if($genre->style == 'secondary') selected @endif>Secondary</option>
                <option value="success" @if($genre->style == 'success') selected @endif>Success</option>
                <option value="danger" @if($genre->style == 'danger') selected @endif>Danger</option>
                <option value="warning" @if($genre->style == 'warning') selected @endif>Warning</option>
                <option value="info" @if($genre->style == 'info') selected @endif>Info</option>
                <option value="light" @if($genre->style == 'light') selected @endif>Light</option>
                <option value="dark" @if($genre->style == 'dark') selected @endif>Dark</option>
            </select>
            @error('style')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
</div>
@endsection
