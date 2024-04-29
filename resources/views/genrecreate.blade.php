
@extends('layouts.main')

@section('content')
<div class="container py-5">
    <div class="card shadow-lg p-5 rounded">
        <h1 class="mb-4">Add New Genre</h1>

        <form action="{{ route('genres.store') }}" method="POST">
            @csrf

            <div class="form-group mb-4">
                <label for="name" class="mb-2">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required minlength="3" maxlength="255">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="style" class="mb-2">Style</label>
                <select class="form-control @error('style') is-invalid @enderror" id="style" name="style">
                    <option value="">Choose...</option>
                    <option value="primary">Primary</option>
                    <option value="secondary">Secondary</option>
                    <option value="success">Success</option>
                    <option value="danger">Danger</option>
                    <option value="warning">Warning</option>
                    <option value="info">Info</option>
                    <option value="light">Light</option>
                    <option value="dark">Dark</option>
                </select>
                @error('style')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div>
</div>
@endsection
