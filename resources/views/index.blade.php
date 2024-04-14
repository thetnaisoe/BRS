@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Welcome to Our Library</h1>

    <div class="row">
        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Users</div>
                <div class="card-body">
                    <h5 class="card-title">42</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-info mb-3">
                <div class="card-header">Genres</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $genreCount }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-dark mb-3">
                <div class="card-header">Books</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $bookCount }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Active Rentals</div>
                <div class="card-body">
                    <h5 class="card-title">50</h5>
                </div>
            </div>
        </div>
    </div>

    <h3 class="text-center mb-3">Genres</h3>
    <div class="row">
    @foreach($genres as $genre)
        <div class="col-md-4 mb-4">
            <a class="text-decoration-none text-{{ $genre->style == 'light' ? 'dark' : 'white' }}" href="{{ route('genres.show', $genre->name) }}">
                <div class="card bg-{{ $genre->style }} text-{{ $genre->style == 'light' ? 'dark' : 'white' }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $genre->name }}</h5>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>
</div>
@endsection
